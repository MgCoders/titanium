# Titanium
This website was developed with Wordpress


Wordpress en contenedor Docker detrás de Nginx+LetsEncrypt
----------------------------------------------------------
### Sitio Pipeline

En appsec.yml se debe configurar la carpeta destino en el servidor.
El nombre debe ser wp-$DEPLOYMENT_GROUP_NAME-deploy, siendo $DEPLOYMENT_GROUP_NAME el nombre del deployment group a configurar en la aplicación de CodeDeploy.
Debe existir asimismo en el servidor un archivo llamado "$DEPLOYMENT_GROUP_NAME".env con las variables de entorno necesarias para la ejcución del compose a saber: 

*WORDPRESS_DB_PASSWORD
*WORDPRESS_DB_HOST
*WORDPRESS_DB_USER
*WORDPRESS_DB_NAME
*VIRTUAL_HOST
*LETSENCRYPT_HOST
*LETSENCRYPT_EMAIL
*DEPLOYMENT_GROUP_NAME

### Servidor

Es necesario crear una red compartida:

    sudo docker network create nginx-proxy

### Secretos

Los secretos van en variables de entorno.

### Posibles Problemas

#### Error
    ERROR: for web  Cannot start service web: driver failed programming external
    connectivity on endpoint 9452d5f10a14_silicon_web_1
    (76ffe36c3639478cb5a1d0269dbeb831fd1e7ad7a17c3a5d2537eff44aa4c59b): Error
    starting userland proxy: Bind for 0.0.0.0:80: unexpected error (Failure
    EADDRINUSE)
    ERROR: Encountered errors while bringing up the project.

#### Solucion en mac
    sudo /usr/sbin/apachectl stop

