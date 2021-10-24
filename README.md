# inventory-manager-api-88ss5kai
### Sobre

- PHP - 7.4.16
- Laravel Framework Lumen (8.3.1) (Laravel Components ^8.0)

### Configurando o projeto

```jsx
git clone <url-https>
```

Na raiz do repositório:

```jsx
composer install
```

Crie o arquivo .env

```jsx
cp .env.example .env
```

Configure seu banco de dados:

```jsx
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

Faça a migração das tabelas do banco de dados:

```jsx
php artisan migrate
```

Agora é só rodar :

```jsx
php -S localhost:8080 -t public
```

### Ps. Documentação das rotas foi feita no Insomnia: 
[O arquivo está na raiz do projeto](https://github.com/sankassio99/inventory-manager-api-88ss5kai/blob/master/Insomnia-documenter.json)

# Sobre o Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen é um micro-framework PHP incrivelmente rápido para construir aplicações web com sintaxe expressiva e elegante. Acreditamos que o desenvolvimento deve ser uma experiência agradável e criativa para ser verdadeiramente gratificante. O Lumen tenta aliviar o desenvolvimento facilitando as tarefas comuns usadas na maioria dos projetos da web, como roteamento, abstração de banco de dados, enfileiramento e armazenamento em cache.

## Por que usei Lumen ?

Como é um projeto simples, acredito que não precisamos de todos os assets que o Laravel nos oferece, visando produtividade e eficiência o Lumen nos traz apenas o necessario para criar uma API RestFull de forma simples e rápida.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

