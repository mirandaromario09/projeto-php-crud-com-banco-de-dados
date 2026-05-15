# Sistema de Login em PHP + MySQL

Um sistema de login completo com cadastro, edição e exclusão de usuários. Projeto desenvolvido para aprender os fundamentos do PHP com banco de dados.

## Funcionalidades

- Cadastro de usuário (nome, email, senha)
- Login com email e senha
- Dashboard protegida (só acessa se estiver logado)
- Editar dados da conta
- Excluir conta

## Tecnologias

- PHP com MySQL (mysqli procedural)
- MySQL
- HTML + CSS

## Como usar

1. Inicie o Apache e MySQL (XAMPP, WAMP, etc.)
2. Crie o banco de dados no phpMyAdmin:

```sql
CREATE DATABASE sistema_login;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(100) NOT NULL
);
```

3. Coloque a pasta do projeto no `htdocs` (ou www)
4. Acesse no navegador: `http://localhost/pagina_login_na_pratica/login.php`

## Estrutura

```
├── login.php                # Formulário de login
├── verificar_login.php      # Valida o login
├── cadastro.php             # Formulário de cadastro
├── verificar_cadastro.php   # Processa o cadastro
├── dashboard.php            # Página protegida (após login)
├── editar_cadastro.php      # Formulário de edição
├── verificar_edicao.php     # Processa a edição
├── excluir_cadastro.php     # Exclui a conta
└── style.css                # Estilo visual
```
