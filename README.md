# docker-nginx-php-mysql

## Objetivo
Projeto publico para manutenção de um template de ambiente de desenvolvimento Docker para trabalhos com PHP e MySQL.

## O que ela faz?
- Roda aplicações PHP com possibilidade de conexão a um banco de dados MySQL e o gerenciador de banco de dados PhpMyAdmin.
- Ambiente construido a priori para rodar uma aplicação Laravel e Symfony.

## O que compõe o Projeto?
1. Docker
2. MySQL
3. PHP
4. Nginx
5. PhpMyAdmin

## Como usar?
1. Clone ou dê um fork no repositorio.
2. Jogue sua aplicação dentro da pasta /src (arquivo index.php deve estar dentro da pasta /src/public).
3. Digite no terminal:
```
docker-compose up -d
```
4. Acesse [localhost](http://localhost/) para acessar a aplicação ou [127.0.0.1:8080](http://127.0.0.1:8080) para acessar o PhpMyAdmin

## Notas
1. Composer esta instalado do dentro do container app. Para uso digite:
```
docker-compose exec app composer <comando composer>
```
Exemplo:
```
docker-compose exec app composer install
```
2. Os geradoradores de projetos Laravel e Symfony se encontram instalados dentro do container app. Para criar um projeto Laravel base digite:<br>


2.1. Para excluir o que há originalmente:
```
docker-compose exec app rm -R public
```
2.2. Para instalar o projeto Laravel base:
```
docker-compose exec app laravel new .
```
2.3. Para instalar o projeto Symfony base:
```
docker-compose exec app symfony new .
```