# Sistema de Gestão de Alunos (CRUD PHP + Login)
 
Sistema web desenvolvido em **PHP** para gestão de alunos, com **CRUD completo** (Criar, Ler, Atualizar e Excluir) integrado a um **sistema de autenticação (login)**. Apenas usuários autenticados têm permissão para cadastrar, editar ou excluir registros de alunos.
 
## 📋 Sobre o projeto
 
Este projeto foi criado com o objetivo de praticar os conceitos fundamentais de desenvolvimento back-end com PHP, incluindo:
 
- Operações **CRUD** (Create, Read, Update, Delete)
- Autenticação de usuários (login/logout)
- Controle de acesso: somente usuários logados podem gerenciar os alunos
- Conexão e manipulação de banco de dados relacional (PostgreSQL, via PDO)
## ✨ Funcionalidades
 
- 🔐 **Login de usuário** — acesso restrito ao sistema
- 👨‍🎓 **Cadastro de alunos** — apenas para usuários autenticados
- 📄 **Listagem de alunos** cadastrados
- ✏️ **Edição** dos dados de um aluno
- 🗑️ **Exclusão** de um aluno
- 🚪 **Logout** e encerramento de sessão
## 🛠️ Tecnologias utilizadas
 
- PHP
- PostgreSQL
- PDO (PHP Data Objects) — acesso ao banco com *prepared statements*
- HTML5
## 📦 Pré-requisitos
 
Antes de começar, você precisa ter instalado:
 
- [PHP](https://www.php.net/) 7.4+ com a extensão `pdo_pgsql` habilitada
- [PostgreSQL](https://www.postgresql.org/) 12 ou superior
- Um servidor web (Apache, Nginx ou o servidor embutido do PHP)
- [Git](https://git-scm.com/)
## 🚀 Instalação
 
1. Clone o repositório:
```bash
   git clone https://github.com/rafzsxl/crud_php.git
```
 
2. Acesse a pasta do projeto:
```bash
   cd crud_php
```
 
3. Mova (ou copie) a pasta do projeto para o diretório do seu servidor local.
4. Crie o banco de dados no PostgreSQL:
```sql
   CREATE DATABASE escola;
```

4.1 Crie o usuário que será dono do banco escola:
```sql
   CREATE USER usuario WITH PASSWORD '1234';
```

4.2 Coloque o usuário que você criou como dono do banco escola:
```sql
   ALTER DATABASE escola OWNER TO usuario;
```

 
5. Crie as tabelas necessárias:
```sql
   CREATE TABLE alunos (
       id SERIAL PRIMARY KEY,
       nome VARCHAR(150) NOT NULL,
       turma VARCHAR(50) NOT NULL,
       email VARCHAR(150) NOT NULL,
       nasc DATE NOT NULL,
       ativo BOOLEAN NOT NULL
   );
 
   CREATE TABLE usuarios (
       id SERIAL PRIMARY KEY,
       email VARCHAR(150) NOT NULL UNIQUE,
       senha VARCHAR(255) NOT NULL
   );
```
 
6. Configure a conexão com o banco de dados no arquivo `database/connect.php`:
```php
   <?php
   $host   = "localhost";
   $dbname = "escola";
   $user   = "usuario";
   $pass   = "1234";
   try {
    $conexao = new PDO(
        "pgsql:host=$host;dbname=$dbname",
        $user,
        $pass
    );
    echo "Conexão realizada com sucesso!";
    return $conexao; //caso de erro ele apresenta a mensagem de erro
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

```
 
7. Inicie o servidor PHP embutido a partir da raiz do projeto:
```bash
   php -S localhost:8000
```
 
8. Acesse o sistema no navegador:
```
   http://localhost:8000/index.php
```
 
## 🔑 Acesso ao sistema
 
Para acessar as funcionalidades de cadastro de alunos, é necessário estar logado. O controle de acesso é feito pelo arquivo `login/verifica_user.php`, que valida a sessão antes de liberar as páginas do CRUD.
 
- Crie um novo usuário através de `login/cadastrar.php`.
- Faça login em `login/login.php`.
- Para sair do sistema, utilize `login/logout.php`.
## 📁 Estrutura do projeto
 
```
crud_php/
├── app/                  # CRUD de alunos
│   ├── create.php        # Cadastra um novo aluno
│   ├── select.php        # Lista os alunos cadastrados
│   ├── select_w.php      # Consulta de um aluno específico
│   ├── update.php        # Atualiza os dados de um aluno
│   └── delete.php        # Remove um aluno
├── database/
│   └── connect.php       # Conexão com o banco de dados
├── includes/
│   ├── header.php        # Cabeçalho das páginas
│   ├── footer.php        # Rodapé das páginas
│   └── functions.php     # Funções auxiliares
├── login/                # Autenticação
│   ├── login.php         # Formulário e processamento do login
│   ├── cadastrar.php     # Cadastro de novo usuário
│   ├── logout.php        # Encerra a sessão
│   └── verifica_user.php # Verifica se o usuário está autenticado
├── documentacao.md       # Documentação adicional do projeto
└── index.php             # Página inicial
```
 
## 🖥️ Como usar
 
1. Faça login com suas credenciais.
2. Após autenticado, você terá acesso ao painel de gestão de alunos.
3. Cadastre, edite, visualize ou exclua alunos conforme necessário.
4. Ao terminar, clique em **Sair** para encerrar a sessão.

## 👤 Autor
 
Desenvolvido por [rafzsxl](https://github.com/rafzsxl)
 
