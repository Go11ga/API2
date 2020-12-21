# Эмуляция API

# Categories

## GET
### Получить все элементы
$ https://api2.garrykhr.ru/api/categories
### Получить один элемент
$ https://api2.garrykhr.ru/api/categories/1

## POST
### Добавить элемент
$ https://api2.garrykhr.ru/api/categories/title?title=sdfg&categ=12345
### Удалить элемент
$ https://api2.garrykhr.ru/api/categories/del?del=1
### Изменить элемент
$ https://api2.garrykhr.ru/api/categories/upd?upd=1&newtitle=something&newcateg=anything


# Products

## GET

### Получить все элементы
$ https://api2.garrykhr.ru/api/products
### Получить один элемент
$ https://api2.garrykhr.ru/api/products/1

# Cart

## GET
### Получить все элементы
$ https://api2.garrykhr.ru/api/cart
### Получить один элемент { id }
$ https://api2.garrykhr.ru/api/cart/1

## POST
### Добавить элемент { id, qty }
$ https://api2.garrykhr.ru/api/cart/add?add=1&param1=2
### Изменить элемент { id, qty }
$ https://api2.garrykhr.ru/api/cart/upd?upd=1&param1=100
### Удалить элемент { id }
$ https://api2.garrykhr.ru/api/cart/del?del=1
### Удалить все элементы
$ https://api2.garrykhr.ru/api/cart/delall?delall=1