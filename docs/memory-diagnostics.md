# Memory Leak Diagnostics

The memory leak endpoint intentionally retains payloads in a static array.
It is a safe artificial demo, not an application feature.

```bash
make memory-leak-demo
```

Under FPM the process boundary often hides this kind of mistake.
Under a long-running worker, the retained reference can accumulate until workers are recycled or the process is restarted.
Recycling workers is a mitigation; removing the retained reference is the real fix.
