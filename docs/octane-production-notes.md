# Octane Production Notes

Octane меняет не Laravel как фреймворк, а жизненный цикл PHP процесса.
В классическом FPM подходе приложение обычно загружается заново на каждый запрос.
В long-running worker приложение загружается один раз, затем один и тот же процесс обслуживает много запросов.

Поэтому production notes должны отвечать не только на вопрос "работает ли endpoint", но и на вопросы про reload, память, соединения, stale state, logs и smoke checks после deploy.


## Local Octane Workflow

```bash
make octane-up
make octane-logs
make octane-reload
make octane-down
```

The course chooses FrankenPHP as the Octane server driver.
FrankenPHP is one way to run a long-running PHP worker lifecycle; it is not the only possible runtime model.
The important idea is that Laravel can be bootstrapped once and then reused by workers.
