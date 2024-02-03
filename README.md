<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

### Versão do php

```sh
8.3.2
```

### Instale as dependências do projeto

```sh
composer install
```

### Exceute o docker com o banco

```sh
docker compose up -d

ps: para não ter problema com a porta do mysql de quem for testar coloquei na porta 8010
```

### Env

```sh
Clone o .env.example para .env
altere os campos para

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3310
DB_DATABASE=greenTech
DB_USERNAME=root
DB_PASSWORD=root
```

### Execute as migrations

```sh
php artisan migrate
```

### Execute o projeto

```sh
php artisan serve
```

### Documentação api

```sh
https://documenter.getpostman.com/view/10580830/2s9Yyv9zkX
```
