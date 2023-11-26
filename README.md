## Estructura del proyecto

Para el proyecto se ha creado un controlador llamado `QuestionsController` este se encuentra dentro de app\Http\Controllers. Este controlador contiene una única función que llama a otros métodos distribuidos en diversos Servicios.

Los servicios se encuentran en la carpeta App\Services. Hay creado un servicio para cada instancia: CurlService, StackExchangeService, QuestionsService.

La ruta principal del endpoint se encuentra en routes\api.php dentro del grupo de rutas stackexchange.


## Ejecutar el proyecto

El proyecto está configurado para que funcione con Docker.

En la raiz del proyecto se encuentra el archivo docker-compose.yml y la carpeta phpdocker que hacen que el proyecto funcione.

Antes de ejecutarlo es importante tener Docker Desktop instalado en el dispositivo. Si ya está instalado, ejecutaremos el comando
`docker compose up -d`

Esto creará una máquina virtual en Docker con la que podremos abrir el proyecto. Si no se ha modificado el archivo docker-compose.yml, la URL debería ser:
`http://localhost:8083/`

Al entrar en la URL seguramente aparezca un error 500, esto se debe a que todavía no hemos realizado la configuración inicial del proyecto. En el siguiente punto se explicará como realizar estos pasos.


## Configuración inicial

Para configurar el proyecto es necesario realizar varios pasos:

- Generaremos una copia del archivo `.env.example` y le cambiaremos el nombre a `.env`. Este archivo contiene la configuración básica para que el proyecto pueda funcionar.

- Ejecutar el comando `composer install` des de un terminal (Recomendado el de Docker). Esto instalará todas las dependencias del proyecto para que este pueda funcionar.

- Con esto ya tendremos el proyecto configurado y funcionando.


## Acceder y consultar la BD

Para acceder a la base de datos, se pueden ejecutar las migraciones que hay creadas en proyecto, lanzando el comando `php artisan migrate`.

Dentro de la carpeta database habrá un archivo comprimido con la base de datos en sql y un archivo llamado adminer.php que hay que colocar en la carpeta public.

Con este archivo colocado accederemos a `http://localhost:8083/adminer.php`. Esto nos mostrará un entorno gráfico en el que importar nuestra BD.

Las credenciales de Host, login y password se encuentran en el archivo .env y docker-compose.yml

Cuando esté importada, podremos acceder a ella y consultar todos los datos.


## Como utilizar el endpoint

En el fichero routes/api.php encontraremos la URL del endpoint desarrollado. La URL completa es: 
`http://localhost:8083/stackexchange/questions`.

El endpoint requiere de un filtro que es obligatorio (tagged) y otros dos opcionales (todate, fromdate).

Si queremos visualizar los resultados del endpoint, deberemos de especificarle el filtro tagged, quedando la URL de la siguiente manera:
`http://localhost:8083/stackexchange/questions?tagged=c;java`

En caso de añadir alguno de los otros filtros, deberá ejecutarse así:
`http://localhost:8083/stackexchange/questions?tagged=c;java&todate=123456789&fromdate=987654321`
