<p align="center">
 <img width="128" src="https://i.imgur.com/O31DxI7.png"/>
</p>
<p align="center">
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white"/>
  <img src="https://img.shields.io/badge/PHP-4f5b93?style=for-the-badge&logo=php&logoColor=white"/>
</p>

## Sumário

:small_blue_diamond: [Requisitos](#requisitos)

:small_blue_diamond: [Execução do projeto](#execução-do-projeto)

:small_blue_diamond: [Tecnologias utilizadas](#tecnologias-utilizadas)

:small_blue_diamond: [Autor](#autor)

:small_blue_diamond: [Licença](#licença)

## Requisitos

:warning: [PHP:^8.1](https://www.php.net/releases/8.1/en.php)

:warning: [Composer](https://getcomposer.org/download/)

:warning: [MySQL](https://hub.docker.com/_/mysql)

## Execução do projeto

No terminal, clone o projeto:

```
git clone https://github.com/AleixoThiago/comissao-vendas
```

Entre na pasta

```
cd comissao-vendas
```

Instale as dependências do composer:

```
composer install
```

Copie .env.example e preencha o .env:

```
cp .env.example .env
```

Abaixo da variável APP_URL, crie a variável APP_API_URL

Gerar a chave do projeto:

```
php artisan key:generate
```

Execute as migrations:

```
php artisan migrate
```

Execute o projeto no modo desenvolvimento duas vezes, isto é, abra a pasta do projeto em dois terminais distintos e sirva a aplicação em ambos, forçando que ela esteja respondendo em duas portas diferentes (geralmente 8000 e 8001):

```
php artisan serve
```

Na variável de ambiente APP_API_URL, atribua a URL de um dos projetos servidos e o outro será usado no navegador para consultar a API do outro.
Se as URLs são "http://127.0.0.1:8000" e "http://127.0.0.1:8001", atribua o valor "http://127.0.0.1:8001/api" à variável APP_API_URL e utilize a "http://127.0.0.1:8000" em seu navegador para seguir com a utilização."

## Tecnologias utilizadas

-   [PHP 8.1](https://www.php.net/)
-   [Laravel 10.x](https://laravel.com/docs/10.x)

## Autor

[<img src="https://avatars.githubusercontent.com/u/68597119?v=4" width=115><br><sub>Thiago Aleixo</sub>](https://github.com/AleixoThiago)

## Licença

The [MIT License]() (MIT)

Copyright :copyright: 2023 - app-ce4b9bea
