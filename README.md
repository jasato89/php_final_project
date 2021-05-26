# Proyecto final HLC

## Descripción

Sistema de gestión de tareas, asignaturas y cursos desarrollado en PHP y MySql. La aplicación presenta una pantalla para iniciar sesión o crear un nuevo usuario. Al acceder, se nos muestra la posibilidad de añadir cursos (en caso de que no tengamos ninguno creado) o los cursos ya creados. Tenemos tres pestañas: inicio, asignaturas y tareas. Cada curso tiene asignaturas asignadas y cada asignatura, tareas. 



## Tech Stack

El proyecto está desarrollado integramente en PHP, sin utilizar ningún framework. Para la conexión con la base de datos, hemos utilizado Medoo, una librería que nos permite gestionar fácilmente las llamadas a una base de datos MySQL.

La base de datos MySQL está formada por cuatro tablas:

1. Tabla **Users** donde se recogen el correo y la contraseña de los usuarios.
2. Tabla **Courses** donde se recoge la información sobre los cursos e incorpora como FK el correo del usuario.
3. Tabla **Subjects** donde se recoge la información sobre las asignaturas e incorpora como FK el id del curso al que corresponde.
4. Tabla **Tasks** donde se recoge la información sobre las tareas e incorpora como FK el id de la asignatura a la que corresponde.

Como librería adicional, se ha utilizado **Tailwind** para dar estilos a la web. 

## Entorno de desarrollo

El entorno de desarrollo utilizado para este proyecto es muy sencillo: Visual Studio Code para todo lo relacionado con el desarrollo en php y MySQLWorkbench para la moderación y gestión de la base de datos.

## Video presentación
El enlace al video es el siguiente: https://drive.google.com/file/d/13I147VXC78Xqk3cPheOR-fVu04sbyf6V/view?usp=sharing



