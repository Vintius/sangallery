# Магазин сантехники SanGallery  

## CMS WordPress
* easy-storefront theme

## Установка
* скачайте сборку: ```git clone git@github.com:Vintius/sangallery.git```;
* в корне проекта продублируйте файл ```wp-config-sample.php``` и назовите ```wp-config.php```;
* обновите значения переменных в ```wp-config.php```;
* в БД обновите site urls (проще всего автозаменой в редакторе кода, ```/``` в конце строки не нужен, надо подумать над sql-запрросом);
* создайте и накатите измененную БД;
* запустите сервер;
* зайдите в админку ```http://your-site-url/wp-admin```;
* при необходимости обновите ссылки: ```Настройки -> Постоянные ссылки```.

## css
* [wp-scss](https://ru.wordpress.org/plugins/wp-scss/) - сборщик ```.scss``` файлов,
при ошибке сборки добавить папку ```wp-content/plugins/wp-scss/cache```;
* при предупреждениях ```Notice: Undefined index: base_compiling_folder```, ```Notice: Undefined offset: 1``` in `..plugins/wp-scss..` заходим в настройки плагина ```/wp-admin/options-general.php?page=wpscss_options``` и жмем ```Сохранить изменения```;
* файлы стилей находятся в папке ```/wp-content/themes/easy-storefront/library/scss/```;
* сборщик берет файл ```/wp-content/themes/easy-storefront/library/scss/style.scss``` => внутри делаем ```@import``` нужных файлов.
