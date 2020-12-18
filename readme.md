# Эмуляция API

# Categories

## GET
### Получить все элементы
$ http://api2/api/categories
### Получить один элемент
$ http://api2/api/categories/1

## POST
### Добавить элемент
$ http://api2/api/categories/title?title=sdfg&categ=12345
### Удалить элемент
$ http://api2/api/categories/del?del=1
### Изменить элемент
$ http://api2/api/categories/upd?upd=1&newtitle=something&newcateg=anything