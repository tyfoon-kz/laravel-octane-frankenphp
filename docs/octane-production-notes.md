# Octane Production Notes

Octane меняет не Laravel как фреймворк, а жизненный цикл PHP процесса.
В классическом FPM подходе приложение обычно загружается заново на каждый запрос.
В long-running worker приложение загружается один раз, затем один и тот же процесс обслуживает много запросов.

Поэтому production notes должны отвечать не только на вопрос "работает ли endpoint", но и на вопросы про reload, память, соединения, stale state, logs и smoke checks после deploy.


## Watch Mode

```bash
make octane-watch
npm run watch
```

Watch mode is a development convenience.
It observes code paths and reloads workers when files change.
It is not a production deploy strategy because production should use explicit build, reload, smoke and logs.
