## Sistema Cadastro

Sistema de Cadastro/Pesquisa de Funcionários

## Ferramentas 

Neste projeto, foram utilizados:

* PHP 7
* HTML5
* CSS3
* Bootstrap v5
* Banco de Dados MySQL
* JS (Jquery, Ajax)
* LAMPP


## Para começar...

* Sobre o sistema
>    Os arquivos deverão ser baixados e inseridos direto em /opt/lampp/htdocs/ (no caso do LAMPP) ou /var/www/html (no caso de servidor dedicado). Sendo assim, o usuário irá acessar o projeto utilizando a url: http://localhost/
>    Dentro do diretório do localhost, deve ser criada a pasta mmtech/ onde todo o conteúdo do repositório será descarregado, ou seja, será acessado como http://localhost/mmtech/
>    Caso for necessário efetuar a troca de nome da pasta raíz, deve se alterar o arquivo /mmtech/autoload.php, na função carrega_const(), a variável $PASTA_PROJETO com o nome desejado.
>    O usuário de acesso do sistema é admin, e a senha 123456.


* Para o banco de dados
>    O script mmtech.sql deverá ser importado. Nele estão contidos todos os registros da tabela (dados e estrutura).
* Configuração do banco de dados
>    O banco de dados poderá ser configurado no script mmtech/src/db/classe_db.php. No __construct deve-se atentar aos respectivos nomes (server,user,pass,database), conforme exemplo abaixo:

    $this->server = 'localhost';
    $this->user = 'root';
    $this->pass = '';
    $this->database = 'mmtech';
    

## Como utilizar:

Administração: Ao logar no sistema através do link: http://localhost/mmtech/login.php (ou simplesmente clicando no botão ADMIN, localizado na parte superior direita do site), utilizando o login 'admin' e a senha '123456', o usuário poderá optar por cadastrar setores e/ou funcionarios, ou simplesmente visualizar a lista de registros salvos no banco de dados, navegando através do painel ao lado esquerdo (clicando em FUNCIONÁRIOS, ou SETORES).

Site de Buscas: Ao acessar o sistema através do link http://localhost/mmtech/, o usuário poderá pesquisar os funcionários cadastrados. A pesquisa pode ser realizada através de palavras que serão buscadas em 3 campos da tabela, sendo eles: nome, email e telefone.

O sistema possui validação em todos os campos, de todos os formulários, impedindo a busca de registros sem nenhuma palavra escrita e também o envio de formulários com campos em branco.
  
    
## Versão

1.0


## Autor

* **JEAN CARLO DOS SANTOS PANDOLFI JÚNIOR**



