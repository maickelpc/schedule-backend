## Sobre o Projeto

Este projeto se trata de uma API Restful para atender demandas de agendamento de horários, onde os cliente terão acesso aos horários disponíveis, e poderão solicitar reuniões, e atualizados sobre as mesmas:

Para o funcionamento dessa API é necessário atender os requisitos abaixo:
 - PHP 7.3 ou superior, e as demais dependências do laravel, acessível na [documentação do laravel](https://laravel.com/docs/8.x#server-requirements)
 - PostgreSQL versão 11, ou superior

### Bibliotecas de terceiros utilizadas:

[1 - Laravel-permission](https://spatie.be/docs/laravel-permission/v3/introduction): Utilizado para gerenciar as permissões de acesso dos usuários.

[1 - JWT Auth](https://github.com/tymondesigns/jwt-auth): Utilizado para autenticação dos usuários na API.

## Configurações Iniciais

1 - Baixar o projeto Lar

2 - Criar o arquivo .env e configurar sessão de banco de dados (DB_) e email (MAIL_)

3 - Rodar o comando "php artisan key:generate" para gerar chave do sistema

4 - Rodar o comando "php artisan jwt:secret" para gerar chave dos tokens de acesso

5 - Rodar o comando "php artisan migrate --seed" para criar a base de dados e popular com os dados básicos

