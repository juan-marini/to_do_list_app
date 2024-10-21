# To-Do List App
Este aplicativo foi desenvolvido para ajudar os usuários a organizarem suas tarefas de forma eficiente, permitindo o registro, listagem, edição e exclusão de tarefas com prazos específicos.

## Descrição do Projeto

O To-Do List App é uma aplicação web simples, construída com PHP e MySQL, que permite aos usuários gerenciar suas tarefas diárias. A aplicação foi desenvolvida com foco em funcionalidade e usabilidade, utilizando Bootstrap para um layout responsivo e intuitivo.

## Tecnologias Utilizadas

* PHP: Backend e interação com o banco de dados.
* MySQL: Para o armazenamento e gerenciamento de tarefas.
* Bootstrap 5: Para estilização e design responsivo.
* HTML/CSS: Estrutura e design da interface.
  
## Como Executar o Projeto

## Como Executar o Projeto

Siga os passos abaixo para clonar e executar o projeto:

1. **Clone este repositório na pasta `htdocs`:**
   - Acesse a pasta `htdocs` do seu servidor Apache. Por exemplo, se você estiver usando o XAMPP, a localização geralmente é:
     ```
     C:\xampp\htdocs\
     ```
   - Em seguida, clone o repositório:
     ```
     git clone https://github.com/juan-marini/to_do_list_app.git
     ```
2. Navegue até o diretório do projeto:
```
cd to_do_list_app
```
3. Certifique-se de ter um servidor Apache com PHP e MySQL rodando localmente (ex: XAMPP ou WAMP).
4. Inicie o Apache e o MySQL no painel de controle do XAMPP ou WAMP.
5. Abra o arquivo db/conn.php e configure as credenciais do MySQL:
  ````
  $host = 'localhost';
  $user = 'root'; 
  $password = ''; 
  $dbname = 'todolist';
  ````
6. Acesse o projeto no navegador:
  - Abra seu navegador e digite a seguinte URL:
    ``http://localhost/to_do_list_app/index.php``
7. O banco de dados e a tabela serão criados automaticamente ao acessar a aplicação pela primeira vez.

## Funcionalidades Implementadas
* Adicionar Tarefa: Os usuários podem adicionar uma nova tarefa com descrição e prazo.
* Listar Tarefas: Exibe todas as tarefas salvas no banco de dados.
* Editar Tarefa: Permite modificar uma tarefa existente.
* Excluir Tarefa: Remove uma tarefa da lista.
* Banco de Dados Automático: O banco de dados e a tabela de tarefas são criados automaticamente ao acessar o sistema pela primeira vez.

## Linha de Pensamento
Durante o desenvolvimento deste projeto, enfrentei alguns desafios, principalmente relacionados à divisão das responsabilidades no código e à manipulação do banco de dados.

Um dos problemas foi garantir que o banco de dados fosse criado automaticamente, para que o usuário não precisasse realizar essa configuração manualmente. Resolvi isso criando um script que executa a criação do banco de dados e das tabelas na primeira execução.

Outro desafio foi organizar as funções de CRUD (Create, Read, Update, Delete) em arquivos separados para manter o código mais limpo e fácil de manter. Usei funções específicas para cada operação, o que facilitou o gerenciamento das tarefas.

Essa abordagem me ajudou a organizar melhor o fluxo da aplicação e a garantir que cada parte do código fosse responsável por uma tarefa específica.

