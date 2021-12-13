# Sistema sencillo de colas

## Instalación

- Clonar el repositorio

- Crear el archivo **.env** en la raíz del proyecto y completar la configuración necesaria
```
APP_NAME=InitiumColas
APP_ENV=local
APP_KEY=base64:cpTdI9R6CUEBCQD9fa1VkvGsHms4to6Mme+fe7YN2BI=
APP_DEBUG=true
APP_URL=http://test-initium-colas.test

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=initiumcola
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

```

- Instalar las dependencias de Composer mediante `composer update -n`

- Instalar las dependencias de NodeJS mediante `npm install -y`

- Generar la clave de aplicación mediante `php artisan key:generate`

- Crear la base de datos mediante `CREATE DATABASE initiumcola DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;`

- Ejecutar las migraciones para generar las tablas `php artisan migrate`

- Generar los registros para la tabla que almacena las colas `php artisan db:seed --class=QueueSeeder`

