# Octane Production Notes

Octane меняет не Laravel как фреймворк, а жизненный цикл PHP процесса.
В классическом FPM подходе приложение обычно загружается заново на каждый запрос.
В long-running worker приложение загружается один раз, затем один и тот же процесс обслуживает много запросов.

Поэтому production notes должны отвечать не только на вопрос "работает ли endpoint", но и на вопросы про reload, память, соединения, stale state, logs и smoke checks после deploy.


## Frontend Build And Runtime Reload

```bash
make front
```

Vite writes a new manifest and hashed assets.
A long-running runtime may still hold old application state, cached views or stale assumptions until workers are reloaded.
The workflow is: build assets, reload/restart workers, then run smoke checks.
