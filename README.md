# 10x DevTeam 
Convenciones que se utilizaran en proyetos del equipo de Desarrollo 10x Informatica.
​

## Convenciones Laravel/PHP
- Controladores.
- Modelos.
- Funciones.
- Funciones Modelos.
- Rutas.
- Variables.
- Vistas.
- Redirecciones/Actions.
​
### Controlladores:
Los nombres de los controladores se obtienen del modelo, añadiendo el sufijo Controller. Se utiliza el estilo PascalCase ejemplo:
​
- [x] UserController
- [x] SellerController
- [x] ClientTypeController
- [ ] userController
- [ ] ClientDeTypeController
​
### Modelos
Para nombrar los modelos se tomara el nombre de la entidad en singular y siempre aplicando PascalCase ejemplo:
​
- [x] User
- [x] ClientType
- [x] UserStatus
- [ ] user
- [ ] DetalleDeClient
- [ ] Client-type
​
### Funciones
Las funciones deben ser nombradas aplicando camelCase ejemplo:
​
- [x] getUser()
- [x] clientType()
- [ ] ThisIsABadExample()
- [ ] this_is_also_incorrect()
​
### Funciones Modelo
Las funciones deben ser nombradas aplicando snake_case ejemplo:
​
- [x] user()
- [x] client_type()
- [x] user_status()
- [ ] ThisIsABadExample()
- [ ] this_is_also_incorrect()
​
### Rutas
Los sustantivos en las rutas deben ser indicadas en plural, aplicando durante todo esto kebab-case Ejemplo:
​
- [x] /users/23
- [x] /orders
- [ ] /user/15
​
### Variables
Las variables deben de ser descriptivas. Deben aplicar el estilo camelCase ejemplo:
​
- [x] $users = User::all();
- [x] $withUser = User::with('roles')->get();
- [ ] $user = User::all();
​
### Vistas
Para nombrar a las vistas en blade se aplica kebab-case. Estas vistas deben terminar en .blade.php. Ejemplo:
​
- [x] index.blade.php
- [x] index-user.blade.php
- [x] ecommerce-admin.blade.php
- [ ] index_user.blade.php
- [ ] ecommerceAdmin.blade.php
​
### Redirecciones/Actions
Todo tiene que ir apuntado a el nombre de la ruta y no a la URL (habran excepciones).
​
**Action**
```php
<form method="POST" action={{ route('products.store') }}>
```
​
**Redirect**
```php
return redirect()->route('view.index');
```
​
![N|Laravel](https://laravel.com/img/logotype.min.svg)
​
## Convenciones Base de Datos
​
- Nombre de Tablas.
- Nombre de Columnas.
- Llaves primarias y foráneas
​
### Tablas
Se escriben en inglés el nombre es en plural, aplicando snake_case ejemplo:
​
- [x] users
- [x] client_types
- [ ] user_statuses
- [ ] User
- [ ] receipt
- [ ] usuarios
​
### Columnas
Las columnas deben ser nombradas aplicando snake_case Ejemplo:
​
- [x] id
- [x] created_at
- [x] phone_number
- [x] user_status_id
- [ ] createdAt
- [ ] PhoneNumber
​
### Llaves primarias y foráneas
- Si no se especifica ninguna llave primaria en la tabla, Laravel asume por defecto que es id.
- Las llaves foráneas se nombran como la entidad en singular pero añadiendo el sufijo _id.
​
Ejemplos:
​
- [x] seller_id
- [x] user_id
- [x] client_type_id
- [ ] userId
- [ ] SellerId
​
## Tech Stack
.
**BackEnd:** PHP, Laravel.
**DataBase:** Mysql.
**Server:** Apache