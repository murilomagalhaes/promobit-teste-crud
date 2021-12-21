# Descrição

# Requisitos
- PHP \^7.4 | \^8.0
- Composer ^2.1
- NodeJS ^16.1 
- NPM ^8.1
- MySQL | MariaDB 

# Instalação
Clone o projeto em um diretório de sua preferência, entre nele, e execute os comandos abaixo:
- `composer install` 
- `npm install` 
- `npm run dev` 
- `php artisan key:generate`

Agora será necessário ajustar os parâmetros do banco de dados no arquivo `.env` da aplicação, e executar `php artisan migrate` para criar a estrutura do banco.

# Acessando a Aplicação
Para acessar a aplicação, basta executar `php artisan serve` para subi-la usando o server nativo do php/laravel. E depois, acesse `http://localhost:8000/` no seu browser favorito.

# Credenciais
Ao acessar a aplicação, será necessário realizar a autenticação com as seguintes credenciais
- Email: admin@promobit.com
- Senha: admin

*Obs: Essas credenciais são criadas automáticamente durante a execução das migrations.*




