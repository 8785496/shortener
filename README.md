Shortener
==========
Сервис коротких ссылок.
[Демо](http://shurl.hol.es/)

Системные требования
-------------------

1. Apache HTTP Server
2. PHP 5.3 or higher
3. PDO PHP extension and the PDO driver pdo_mysql
4. MySQL Server

Инструкции по установке
-----------------------

1 Распакуйте shortener.zip файл в доступную из Веб директорию.

2 Создайте базу данных с названием ```shortener```. Затем создайте таблицу ```url``` в базе данных. Можете импортировать файл ```config/url.sql```.

```
CREATE TABLE IF NOT EXISTS `url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `long_url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1024;
```

3 В файле ```config/db.php``` измените параметры ```<your host>, <your databasename>, <your username>, <your password>``` на правильные для вашего MySQL сервера.

```
$db = Array(
    'dsn' => 'mysql:host=<your host>;dbname=<your db>;charset=utf8',
    'username' => '<your username>',
    'password' => '<your password>',
);
```
 
4 Рекомендованная конфигурация сервера Apache

Используйте следующую конфигурацию в файле ```httpd.conf``` сервера Apache.
Замените ```path for index.php``` на существущий путь для файла ```index.php```.

```
DocumentRoot "path for index.php"

<Directory "path for index.php">
    RewriteEngine on
    # If a directory or a file exists, use the request directly
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    # Convert URL http://yourdomain/abCdE 
    # to http://yourdomain/index.php?url=abCdE
    RewriteRule ^([0-9a-zA-Z]+)$ /index.php?url=$1 [L]

    # ...other settings...
</Directory>
```
Или используйте файл ```.htaccess```
