# Página de Login na Prática

Sistema de login simples em PHP com autenticação via banco de dados MySQL.

## Funcionalidades

- Formulário de login com usuário e senha
- Verificação de credenciais no banco de dados
- Sessão para controle de acesso
- Página restrita (dashboard) protegida contra acesso não autorizado
- Mensagem de erro para credenciais inválidas

## Pré-requisitos

- XAMPP (Apache + MySQL) ou similar
- Navegador web

## Como usar

1. Coloque a pasta do projeto em `C:\xampp\htdocs\projphp\pagina_login_na_pratica\`

2. Inicie o Apache e o MySQL no XAMPP Control Panel

3. Acesse o phpMyAdmin e execute o SQL abaixo para criar o banco e a tabela:

```sql
CREATE DATABASE IF NOT EXISTS sistema_login;
USE sistema_login;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

INSERT INTO usuarios (usuario, senha) VALUES ('admin', '123');
```

4. Acesse no navegador:

```
http://localhost/projphp/pagina_login_na_pratica/login.php
```

5. Faça login com:
   - **Usuário:** admin
   - **Senha:** 123

## Estrutura do projeto

```
├── login.php            # Página de login (formulário)
├── verificar_login.php  # Lógica de verificação (consulta ao banco)
├── dashboard.php        # Página restrita (pós-login)
└── README.md
```

## Fluxo

```
login.php → verificar_login.php → dashboard.php (se acertar)
                                → login.php?erro=1 (se errar)
```
