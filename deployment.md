# Railway Deployment

This proof of concept uses the Railway service's HTTPS domain in production. Do not commit an environment file or paste its secrets into this document.

## Railway Variables

In the service's **Variables** panel, add the production values from the local `.env.production` file. At minimum, set:

```text
APP_ENV=production
APP_DEBUG=false
APP_KEY=<the generated production key>
APP_URL=https://${{RAILWAY_PUBLIC_DOMAIN}}
LOG_CHANNEL=stderr
SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
FILESYSTEM_DISK=local
MAIL_MAILER=log
VITE_APP_NAME="Dr. Bhatti & Associates"
```

`RAILWAY_PUBLIC_DOMAIN` is provided by Railway after a public domain is generated. It contains the host only, so `APP_URL` must add `https://`.

## Build Command

Set the Railway **Custom Build Command** to:

```bash
composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction && npm ci && npm run build
```

## Pre-Deploy Command

Set the optional **Pre-Deploy Command** to:

```bash
php artisan optimize:clear && php artisan config:cache && php artisan route:cache && php artisan view:cache
```

## Start Command

Set the Railway **Custom Start Command** to:

```bash
/bin/sh -c "exec php artisan serve --host=0.0.0.0 --port $PORT"
```

The application provider forces `https` URLs only when `APP_ENV=production`; local and test environments deliberately generate `http` URLs. After deploying, open the generated Railway HTTPS domain and verify `/up` returns a healthy response.

For Railway service settings and Laravel deployment guidance, see the [Railway Laravel guide](https://docs.railway.com/guides/laravel) and [build/start command documentation](https://docs.railway.com/deployments/config-as-code#build-and-start-commands).
