# Documentação Técnica — Sistema de Gestão de Alunos
 
## 1. Visão geral
 
Sistema de Gestão de Alunos desenvolvido em **HTML, PHP e PostgreSQL**, com controle de acesso por login. Este documento descreve **o que o sistema deve ser capaz de fazer** (requisitos funcionais) e **como o código implementa cada uma dessas capacidades**, arquivo por arquivo.
 
Para instruções de instalação e execução do projeto, consulte o `README.md`.
 
---
 
## 2. O que o sistema deve ser capaz de fazer
 
O sistema precisa cobrir o ciclo completo de gestão de alunos, sempre restrito a usuários autenticados:
 
1. **Autenticar usuários** — só quem tem login/senha válidos pode acessar as funcionalidades de gestão.
2. **Cadastrar alunos** — permitir inserir um novo aluno com seus dados no banco.
3. **Consultar aluno** — buscar e exibir os dados de um aluno específico.
4. **Gerar relatório de alunos** — listar todos os alunos cadastrados.
5. **Atualizar informações do aluno** — editar os dados de um aluno já existente.
6. **Excluir aluno** — remover um aluno do sistema.
7. **Encerrar sessão (logout)** — impedir uso indevido do sistema após o usuário sair.
8. **Bloquear acesso não autenticado** — qualquer tentativa de acessar as páginas do CRUD sem estar logado deve ser barrada e redirecionada para o login.
Regras de negócio:
- Os campos do aluno (`nome`, `turma`, `email`, `nasc`, `ativo`) são obrigatórios.
- O e-mail cadastrado na tabela de usuários deve ser único (não pode haver dois usuários com o mesmo e-mail).
- A consulta, atualização e exclusão de aluno são feitas sempre a partir do `id`.
---
 
## 3. Como o código implementa cada funcionalidade
 
### 3.1 Autenticação (pasta `login/`)
 
| Arquivo | Responsabilidade esperada |
|---|---|
| `login.php` | Exibe o formulário de login e valida as credenciais informadas contra o banco de dados. Em caso de sucesso, inicia a sessão (`session_start()`) do usuário. |
| `cadastrar.php` | Permite criar um novo usuário do sistema (login/senha). |
| `logout.php` | Destrói a sessão ativa (`session_destroy()`) e redireciona para a tela de login. |
| `verifica_user.php` | Funciona como "porteiro": verifica se existe uma sessão ativa antes de liberar o acesso às páginas do CRUD. É incluído (`include`/`require`) no início de cada página protegida. |
 
### 3.2 CRUD de alunos (pasta `app/`)
 
| Arquivo | Responsabilidade esperada |
|---|---|
| `create.php` | Recebe os dados enviados por um formulário (via `$_POST`: `nome`, `turma`, `email`, `nasc`, `ativo`) e executa o `INSERT` do novo aluno no PostgreSQL. |
| `select.php` | Executa um `SELECT` de todos os alunos e monta a listagem/relatório exibido ao usuário. |
| `select_w.php` | Executa um `SELECT ... WHERE id = :id` para localizar um aluno específico. |
| `update.php` | Recebe os dados alterados e executa um `UPDATE` no registro do aluno correspondente. |
| `delete.php` | Executa um `DELETE` do aluno com base no seu `id`. |
 
As queries desses arquivos usam *prepared statements* (`bindParam`) para evitar SQL Injection.
 
### 3.3 Conexão com o banco (`database/connect.php`)
 
Centraliza a abertura da conexão com o PostgreSQL via **PDO**, usada por todos os arquivos de `app/` e `login/`:
 
```php
$host   = "seu_host";
$dbname = "escola";
$user   = "usuario_do_banco";
$pass   = "senha_do_banco";
 
$conn = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
```
 
### 3.4 Funções auxiliares (`includes/functions.php`)
 
Reúne as funções reutilizadas pelo CRUD de alunos (inserir, listar, buscar por ID, atualizar e excluir), encapsulando o uso do PDO para não repetir código de acesso ao banco em cada arquivo de `app/`.
 
### 3.5 Layout comum (`includes/header.php` e `includes/footer.php`)
 
Cabeçalho e rodapé reaproveitados em todas as páginas, garantindo consistência visual e o menu de navegação do sistema.
 
---
 
## 4. Estrutura de dados manipulada
 
Banco de dados: `escola` (PostgreSQL).
 
### Tabela `alunos`
 
| Coluna | Tipo | Descrição | Chave |
|:---|:---:|:---:|---:|
| id | SERIAL | Identificador do aluno | PK |
| nome | VARCHAR(150) | Nome do aluno | |
| turma | VARCHAR(50) | Nome da turma | |
| email | VARCHAR(150) | E-mail | |
| nasc | DATE | Nascimento | |
| ativo | BOOLEAN | Ativo | |
 
### Tabela `usuarios`
 
| Coluna | Tipo | Descrição | Chave |
|:---|:---:|:---:|---:|
| id | SERIAL | Identificador do usuário | PK |
| email | VARCHAR(150) | E-mail do usuário | |
| senha | VARCHAR(255) | Senha do usuário | |
 
---
 
## 5. Fluxo geral do sistema
 
1. Usuário acessa o sistema → é redirecionado para `login/login.php` se não houver sessão ativa.
2. Após login válido, acessa `index.php`, o painel principal.
3. A partir do painel, pode acessar as ações do CRUD (`app/*.php`), cada uma protegida por `login/verifica_user.php`.
4. Ao finalizar, o usuário pode encerrar a sessão via `login/logout.php`.
---
 
## 6. Autor
 
Desenvolvido por [rafzsxl](https://github.com/rafzsxl)