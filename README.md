# shortener
SYSTEM REQUIREMENTS
-------------------

1. Apache HTTP Server
2. PHP 5.3 or higher
3. PDO PHP extension and the PDO driver pdo_mysql
4. MySQL Server

INSTALLATION INSTRUCTIONS
-------------------------

1. Unpack the shortener.zip file to a Web-accessible folder.

2. Create a database named shortener. Then create a table named url in the database. Can import config/url.sql file.

CREATE TABLE IF NOT EXISTS `url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `long_url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1024;

3. In the config/db.php file change the parameters <your host>, <your databasename>, <your username>, <your password> to be correct for your MySQL Server.

```
$db = Array(
    'dsn' => 'mysql:host=<your host>;dbname=<your db>;charset=utf8',
    'username' => '<your username>',
    'password' => '<your password>',
);
```
 
4. Recommended Apache Configuration

Use the following configuration in Apache's httpd.conf file.
You should replace "path for index.php" with the actual path for index.php file.

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
