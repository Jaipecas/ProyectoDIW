# Listado de variables disponibles en las plantillas *blade*

Este documento muestra las variables disponibles en las diferentes plantillas blade de la aplicación.

Se indica el nombre de la variable y su significado. En caso de ser un array o una colección, se indica los diferentes items de la colección unidos por un punto a la misma junto con su significado. Por ejemplo, _errors.name_. 

Existen dos lugares de procedencia de las variables:

* la sesión. La sesión es un fichero que se almacena en el servidor con información del usuario, fichero que únicamente está activo hasta que el usuario haga un logout o le caduque el tiempo de conexión. La información almacenada en él se puede obtener desde blade haciendo uso del helper _session_, indicando como parámetro el nombre de la variable a recuperar, por ejemplo _session('status')_.

* el propio servidor. Para usarlas simplemente se prefija con $ el nombre de la variable y se hace uso de ella, por ejemplo _$errors->first('password')_.

## Acceso a datos de colecciones

Muchas de las variables proporcionadas son de tipo _colección_. Para el acceso a sus valores, Laravel proporciona muchas funciones referenciadas en [la documentación](https://laravel.com/docs/5.6/collections#available-methods). Sin embargo, para el contexto en el que nos encontramos, las más habituales son:
* [all](https://laravel.com/docs/5.6/collections#method-all): devuelve una array con todos los datos de la colección. 
* [has](https://laravel.com/docs/5.6/collections#method-has): indica si un elemento dado existe o no en la colección.
* [count](https://laravel.com/docs/5.6/collections#method-count): devuelve el número de elementos en la colección.
* [first](https://laravel.com/docs/5.6/collections#method-first): devuelve el primer elemento de la colección. Se puede parametrizar para obtener el primer valor de un item de la colección, por ejemplo: _$error->first('item')_
* [get](https://laravel.com/docs/5.6/collections#method-get): devuelve un item en función de la clave o null si la clave no existe.

## register

| Parámetro          | Descripción       |
| :----------:       | :------------     |
| errors             | Colección de errores |
| errors.name               | Array de errores relativos al campo *name* |  
| errors.email              | Array de errores relativos al campo *email* |  
| errors.password           | Array de errores relativos al campo *password* |  
| errors.country            | Array de errores relativos al campo *country* |  
| errors.favourite_language | Array de errores relativos al campo *favourite_language* | 

## login

| Parámetro          | Descripción       |
| :----------:       | :------------     |
| errors             | Colección de errores |
| errors.email       | Array de errores relativos al campo *email* | 

## email

| Parámetro          | Descripción       |
| :----------:       | :------------     |
| errors             | Colección de errores |
| error.email        | Array de errores relativos al campo _email_ |  
| session            | Información asociada a la sesión del usuario |
| session.status     | Información sobre el estado de la petición |

## reset

| Parámetro          | Descripción       |
| :----------:       | :------------     |
| errors             | Colección de errores |
| email              | Array de errores relativos al campo _email_ |  
| password           | Array de errores relativos al campo _password_ |  