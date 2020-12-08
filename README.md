# Магазин сантехники SanGallery  

## CMS WordPress
* easy-storefront theme

## Установка
* скачайте сборку: ```git clone git@github.com:Vintius/sangallery.git```;
* обновите значения переменных в ```wp-config.php```;
* в БД обновите site urls (проще всего автозаменой в редакторе кода, ```/``` в конце строки не нужен);
* создайте и накатите БД;
* запустите сервер;
* зайдите в админку ```http://your-site-url/wp-admin``` (логин/пароль можно найти в БД в таблице ```wp_users```) и обновите медиалинки.

## css
* [wp-scss](https://ru.wordpress.org/plugins/wp-scss/) - сборщик ```.scss``` файлов,
при ошибке сборки добавить папку ```wp-content/plugins/wp-scss/cache```;
* файлы стилей находятся в папке ```\wp-content\themes\easy-storefront\library\scss\```.
