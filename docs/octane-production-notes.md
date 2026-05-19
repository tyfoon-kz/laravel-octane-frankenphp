# Octane Production Notes

Octane меняет не Laravel как фреймворк, а жизненный цикл PHP процесса.
В классическом FPM подходе приложение обычно загружается заново на каждый запрос.
В long-running worker приложение загружается один раз, затем один и тот же процесс обслуживает много запросов.

Поэтому production notes должны отвечать не только на вопрос "работает ли endpoint", но и на вопросы про reload, память, соединения, stale state, logs и smoke checks после deploy.


## Deploy Workflow

Recommended local rehearsal:

```bash
npm run build
php artisan config:cache
php artisan route:cache
make octane-reload
make deploy-smoke
make octane-logs
```

In production this sequence belongs to the deploy process, not to a random manual habit.
The important parts are explicit build, explicit worker reload or restart, smoke check and logs after the runtime update.
