# crudEmpleados


Pasos para iniciar el proyecto.

#Nota:
Por el momento hay inconvenientes al hacer pull request de los archivos a la rama main, por lo tanto se debe cambiar a la rama master.

#paso 1:
Clonar el proyecto. verificar que la version de php sea superior a la 7.1.3

#paso 2:
Iniciar el servidor apache, debe  contar con la instalacion de composer para no tener algun inconveniente ya que el proyecto esta en laravel.

#paso 3: 
Una vez clonado el proyecto, accedemos al proyecto crudEmpleados.

#paso 4:
en la consola colocamos: git checkout master

#paso 5:
git fetch y luego git pull. Esto es para tener los cambios de la rama master.

#paso 6:
composer install

#paso 7:
Modificamos el archivo .env.example por .env

#paso 8:
Accedemos al archivo .env y cambiamos el DB_DATABASE=laravel por DB_DATABASE=prueba_tecnica_dev

#paso 9:
php artisan serve

El proyecto debe de correr sin problema y continuamos con la base de datos.
inciamos el servicio de Mysql y debe de contar con el script de la base de datos prueba_tecnica_dev
