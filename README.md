# comilones
Aplicació web amb cercador i valoracions de restaurants, amb tecnologies PHP i MySQL, desplegada mitjançant Docker.

## Como acceder a db-comilones a través de consola

Para acceder a la consola **Mysql** primeramente tendremos que acceder a la kernel de su contenedor. 

Para ello utilizaremos el siguiente comando:
`docker exec -it db-comilones bash`
![docker exec -it db-comilones bash](www/img/acceso_por_consola_mysql.PNG)

Dentro de la consola linux debemos acceder a la consola de **Mysql**,
introduciendo el siguiente comando con nombre del usuario: `user`.
Se nos solicitará la contraseña:
`mysql -u user -p`
![docker exec -it db-comilones bash](www/img/en_consola_a_la_consla_mysql.png)

Finalmente, ya podemos operar con comandos **Mysql**
![Operaciones Mysql](www/img/operaciones_mysql.png)

