#!/usr/bin/env bash
set -euo pipefail

repo_dir="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
course_dir="$(cd "$repo_dir/.." && pwd)"
modules_dir="$course_dir/modules"
branch_map="$repo_dir/docs/branch-map.md"

failures=0

report_failure() {
  echo "FAIL: $*" >&2
  failures=$((failures + 1))
}

if [[ ! -d "$modules_dir" ]]; then
  echo "Modules directory not found: $modules_dir" >&2
  exit 1
fi

if [[ ! -f "$branch_map" ]]; then
  echo "Branch map not found: $branch_map" >&2
  exit 1
fi

homework_count=0
mentor_count=0
block_count=0

while IFS= read -r file; do
  homework_count=$((homework_count + 1))
  first_line="$(head -n 1 "$file")"
  [[ "$first_line" == "# Homework" ]] || report_failure "$file must start with # Homework"
done < <(find "$modules_dir" -path '*/lessons/*/homework.md' -type f | sort)

while IFS= read -r file; do
  mentor_count=$((mentor_count + 1))
  first_line="$(head -n 1 "$file")"
  [[ "$first_line" == "# Mentor Review" ]] || report_failure "$file must start with # Mentor Review"
done < <(find "$modules_dir" -path '*/lessons/*/mentor-review.md' -type f | sort)

while IFS= read -r file; do
  block_count=$((block_count + 1))
  grep -q '```' "$file" || report_failure "$file must contain a fenced example"
done < <(find "$modules_dir" -path '*/lessons/*/blocks/*.md' -type f | sort)

lesson_dirs_without_required_files=0

while IFS= read -r lesson_dir; do
  for required in lesson.md homework.md mentor-review.md; do
    if [[ ! -f "$lesson_dir/$required" ]]; then
      report_failure "$lesson_dir missing $required"
      lesson_dirs_without_required_files=$((lesson_dirs_without_required_files + 1))
    fi
  done
done < <(find "$modules_dir" -path '*/lessons/*' -type d ! -path '*/blocks*' | sort)

map_branches="$(mktemp)"
homework_branches="$(mktemp)"
trap 'rm -f "$map_branches" "$homework_branches"' EXIT

grep -Eo '`homework-[^`]+`' "$branch_map" \
  | tr -d '`' \
  | grep -v '<' \
  | sort -u > "$map_branches"

grep -RhoE '`homework-[^`]+`' "$modules_dir" \
  | tr -d '`' \
  | grep -v '<' \
  | sort -u > "$homework_branches"

missing_from_map="$(comm -23 "$homework_branches" "$map_branches" || true)"
missing_from_homework="$(comm -13 "$homework_branches" "$map_branches" || true)"

if [[ -n "$missing_from_map" ]]; then
  report_failure "Branches present in homework.md but missing from branch-map:"
  echo "$missing_from_map" >&2
fi

if [[ -n "$missing_from_homework" ]]; then
  report_failure "Branches present in branch-map but missing from homework.md:"
  echo "$missing_from_homework" >&2
fi

echo "Homework files: $homework_count"
echo "Mentor review files: $mentor_count"
echo "Block files: $block_count"
echo "Branch-map homework branches: $(wc -l < "$map_branches" | tr -d ' ')"
echo "Homework-declared branches: $(wc -l < "$homework_branches" | tr -d ' ')"

if (( failures > 0 )); then
  echo "Course structure validation failed with $failures issue(s)." >&2
  exit 1
fi

echo "Course structure validation passed."
