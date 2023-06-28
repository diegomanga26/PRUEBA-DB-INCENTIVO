# Prueba DATABASE campuslands:

Esta es una base de datos sencilla para mostrar la gestión de la información de una empresa llamada Campuslands donde contaremos con conexiones entre las distintas tablas, cada una con los requerimientos de la empresa, cumpliendo con cada uno de estos y haciendo algunas correciones que serán explicadas más adelante.

## Datos del estudiante:

- Nombre: Diego Alexander Manga Marulanda.

- Curso: M3.

## Requisitos

- MySQL: Asegúrate de tener instalado y configurado un servidor MySQL en tu entorno de desarrollo.

## Configuración de la Base de Datos

1. Clona este repositorio en tu máquina local:

```
git clone https://github.com/diegomanga26/PRUEBA-DB-INCENTIVO

```

1. Accede al directorio del proyecto:

```
cd proyecto-campusland

```

1. Importa la estructura de la base de datos a tu servidor MySQL:

```
mysql -u campus -p
"Enter password:" campus2023

```

## Uso

Una vez que hayas importado la estructura de la base de datos, puedes comenzar a utilizarla para almacenar y consultar información relacionada con CampusLand.

El archivo `campuslands.sql` contiene las declaraciones SQL para crear las 4 tablas principales:

1. País (`pais`): Almacena información sobre los paises, como su ID y su nombre.
2. Departamento (`departamento`): Almacena información sobre los departamentos, como su ID, nombre y el foreign key que está conectado a la tabla "pais".
3. Región (`region`): Almacena información sobre las regiones del país, incluyendo su ID, nombre y el foreign key que está conectado a la tabla "departamento".
4. Campers (`campers`): Almacena información sobre los campers de la región, como su ID, nombre, apellido, fecha de nacimiento y el foreign key que está conectado a la tabla "region".

Puedes utilizar las sentencias SQL estándar para realizar consultas, inserciones, actualizaciones y eliminaciones de datos en las tablas.

## Correcciones a los requerimientos:

En este proyecto se realizaron algunas correcciones que generaban un poco de discordia entre la lógica del objetivo y lo suministrado al developer, en este caso fueron 3:

1. En la tabla `pais` se realizaron ajustes en "nombrePais" ya que el requerimiento es que este se tome como un dato de tipo INT, lo cual no es lógico porque este no es un número entero y se hizo la corrección a VARCHAR(20) ya que se consideró que 20 caracteres era suficiente para dar nombre a un país.

2. En la misma tabla del punto anterior se puede ver en el esquema que es una foreign key, lo cual tambien fue corregido porque esta misma no conecta con nada además de solo ser un nombre y no un ID.

3. En la tabla `campers` se hizo la misma corrección de la tabla país en el dato "idCamper" ya que este para poder ser una primary key debe ser un número preferiblemente autoincrementable al momento de ingresar un registro en tabla.
