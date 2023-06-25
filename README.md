 # MVC-API-FligthPHP-MySQL

CRUD API de práctica, elaborado con una tabla de productos en MySQL
Se utiliza el framework FligthPHP. 
Para ejecutar el proyecto es necesario utilizar este framework via Composer. 
Servir el proyecto desde src/public



### Endpoints


+ POST /producto

    Crea un nuevo producto, acepta nombre(str), precio(int), descripcion(str), media(str) - Devuelve datos ingresados
+ /all

    Devuelve en formato json una lista con todos los productos carrgados
+ /producto/id

    Devuelve en formato json los datos el producto especificado por id
+ DELETE /producto/id

    Elimina el producto especificado por id
+ PUT|POST /producto/id

    Actualiza la informacion del producto asociado al id. 

#### Producto

var|content|type
---|---|:---:
id | identificador | int PK
nombre | Nombre del producto | string
precio | Valor en $ | int
descripcion |Descripcion del producto | text 
