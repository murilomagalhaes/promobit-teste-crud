
# Descrição
Projeto criado como teste no processo seletivo para Dev PHP Jr na Promobit.

Repo orignial: 
[teste-cadastro-produtos](https://github.com/Promobit/teste-cadastro-produtos)

## Principais Techs Utilizadas
- PHP/Laravel
- Bootstrap 5
- MySQL

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
- `npm run prod` 

Agora será necessário criar um arquivo `.env ` de acordo com o `.env.example`, e então ajustar os parâmetros do banco de dados neste arquivo. Após o ajuste, basta executar `php artisan migrate` para criar a estrutura do banco, e `php artisan key:generate`.

# Acessando a Aplicação
Para acessar a aplicação, basta executar `php artisan serve` para subi-la usando o server nativo do php/laravel. E depois, acesse `http://localhost:8000/` no seu browser favorito.

# Credenciais
Ao acessar a aplicação, será necessário realizar a autenticação com as seguintes credenciais
- Email: admin@promobit.com
- Senha: admin

*Obs: Essas credenciais são criadas automáticamente durante a execução das migrations.*

# Relatório: Relevância de Tags
Para construir o relatório de relevância foi utilizado o Eloquent. Com a estrutura criada no projeto, a seguinte chamada resulta no relatório solicitado:

`TagModel::withCount('products')->orderBy('products_count', 'desc')->get();` 

*Obs: Neste caso, o orderBy 'asc' trará os menos relevantes (Com menos produtos atrelados), e 'desc' trará os mais relevantes.*

Sem utilizar o Eloquent, a seguinte Query em SQL traria o mesmo resultado.

```
select name as tag_name, count(product_id) as relevance
from tag 
left join product_tag on tag.id = product_tag.tag_id 
group by id order by relevance desc 
```

Dentro do sistema há a página `Relatórios > Relevancia de Tags`, acessível através do menu. Nesta página é exibido o resultado do relatório de acordo com o filtro informado. (Mais ou Menos Relevante)

<hr>


# Contato
- Nome: Murilo Magalhães Barreto
- Email: [murilomagalhaes@outlook.com](mailto:murilomagalhaes@outlook.com)
- Linkedin: [magalhaesmurilo](https://linkedin.com/in/magalhaesmurilo)


