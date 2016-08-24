**Colaborador**

este sistema esta basado en en drupal 7.


**Requerimientos**:

- Docker (~1.12.0)
- Docker Compose (~1.8.0)

como instalar docker en windows en el siguiente enlace:

[Docker para windows](https://docs.docker.com/docker-for-windows/)

_Nota: la version `stable` ya viene con docker compose, asi que no es necesario
instalar aparte_



_______



**Instrucciones de instalacion**

clonar este repositorio

luego ejecutar los siguientes comandos:

`docker-compose build`

una vez finalizado el build, ejecutar:

`docker-compose up -d`

_Nota: recordar que el sistema necesita que se encuentren disponibles los puertos
`8000` y `3306` respectivamente_

una vez finalizado, visitar `http://localhost:8000` para ver drupal corriendo, si es 
la primera vez que instalas este sistema, debes esperar aprox 5 minutos luegos de 
ejecutar `docker-compose up -d`, ya que de forma interna docker esta migrando la bases
de datos del sistema.

___

**Versionar cambios**

todos los cambios a nivel de codigo se versionan de la forma tradicional, pero tambien
es necesario realizar los cambios que se encuentren en base de datos, para lo cual 
se ha creado un script llamado `recover-dump` (por el momento es solo para unix), este
script realiza el versionamiento de los cambios en base de datos de forma automatica

`./recover-dump` 

una vez ejecutado el script `recover-dump` y comiteado todos los demas cambios,podremos
hacer de forma correcta nuestro `git push origin <name branch>`

para mayor informacion, no dude en comunicarse con Moisés Godoy o Andres Santamaria