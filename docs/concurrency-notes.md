# Concurrency Notes

Race conditions are not exclusive to Octane.
They become harder to ignore when the application receives concurrent requests and keeps workers warm.

```bash
make race-demo
```

The unsafe demonstration uses read -> calculate -> write.
Two workers can read the same value and both write the same next value.
That is a lost update.
