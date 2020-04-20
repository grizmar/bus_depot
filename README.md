<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Автобусный парк</h1>
    <br>
</p>

Тестовое задание

REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 7.2.


INSTALLATION
------------

~~~
composer install

php yii migrate
~~~

CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

Методы api
-------------
~~~
{domain}/api/travel/

GET-параметры
origins:Москва - начальный город для расчета дистанции
destinations:Волгоград - конечный город для получения дистанции
limit:2 - лимит получаемых записей
offset:10 - смещение

id:7 - идентификатор водителя

пример:
{domain}/api/travel/?origins=Москва&destinations=Волгоград&limit=2&offset=10 
~~~

Доступный функционал
-------------
~~~
{domain}/drivers/ - страница со списком водителей
{domain}/buses/ - страница со списком автобусов
~~~

Примечание
-------------
Поскольку api для расчета дистанции между городами плантые, у меня нет ключа и сделана заглушка,
но несмотря на это реализована интеграция с googleapis, которая будет работать при наличии ключа
~~~
ключ указать здесь
calculator/TravelCalculator.php
~~~