###################
Recuperativo
###################

El blog fue echo con el framework codeigniter.
para modificar el host,usuario,clave y nombre de la base de datos, acceda a "application>config>database.php"
en el archivo sentencias.sql encontrar el codigo correspondiente para generar la base de datos.
en el archivo "application>config>config.php" cambie la variable "$config['base_url']" a su direccion base

este framework utiliza un patron de diseño MVC

las vistas se encuentran en application>views
los controladores en application>controllers
los modelos en application>models

### librerias utilizadas
-form validation: se encarga de validar los formularios, para mayor informacion acceder a https://www.codeigniter.com/user_guide/libraries/form_validation.html
-session: se encarga de gestionar las sesiones de usuario, para mayor informacion aceeder a https://www.codeigniter.com/user_guide/libraries/sessions.html?highlight=session
-Pagination: ayuda a paginizar, ejemplo si tenemos 20 post, y queremos que se muestren maximo 3 por pagina, accedemos a los otros iendo a la "segunda pagina" para mayor informacion https://www.codeigniter.com/user_guide/libraries/pagination.html
-upload: funciona para subir archivos al aplicativo, ya sean imagenes o documentos, para mayor inforamcion https://www.codeigniter.com/user_guide/libraries/file_uploading.html?highlight=upload

En la carpeta assets se encuentran los recursos del aplicativo, como por ejemplo hojas de estilos, iconos e imagenes

acceda a "application>config>routes.php" para acceder a las configuraciones de enrutamiento del aplicativo

### NOTA:
El archivo .htacess realiza ciertas configuracion del aplicativo para el enrutado del mismo, debe activar en apache el modulo RewriteEngine para que funcione.