# 🏎️ Grid Start Shop - Sistema de Autenticação Segura

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)

## 🏁 Sobre o Projeto
O **Grid Start Shop** é um projeto full-stack desenvolvido como parte de um teste técnico. O objetivo principal foi criar o fluxo completo de um e-commerce focado em artigos de Fórmula 1, demonstrando domínio na integração entre **Frontend (UI/UX)** e **Backend (PHP/MySQL)**.

O destaque técnico deste repositório é a implementação de um sistema de **autenticação de usuários seguro e otimizado**, aplicando boas práticas de mercado para proteção de dados e gerenciamento de sessões.

---

## ⚙️ Especificações Técnicas (Funcionalidades)
- **🔒 Segurança de Dados:** Criptografia nativa de senhas utilizando `password_hash()` e validação via `password_verify()`.
- **🛡️ Prevenção contra SQL Injection:** Uso exclusivo de *Prepared Statements* (`bind_param` e `bind_result`) nas consultas ao banco de dados.
- **🛂 Controle de Sessão:** Sistema de login com bloqueio de rotas. O acesso ao `dashboard.php` é restrito apenas a usuários com credenciais válidas na `$_SESSION`.
- **🎨 UI/UX Imersiva:** Interface construída com Bootstrap 5, responsiva e com identidade visual forte (backgrounds com overlays transparentes temáticos da F1).
- **🔄 Fluxo de Navegação Lógico:** Redirecionamento inteligente entre a vitrine, tela de login, painel do usuário e logout.

---

## 🛠️ Motorização (Tecnologias Utilizadas)
- **Frontend:** HTML5, CSS3, Bootstrap 5, FontAwesome.
- **Backend:** PHP 8+ (Procedural).
- **Banco de Dados:** MySQL.
- **Servidor Local:** Apache (XAMPP).

---

## 🚦 Dando a Largada (Como rodar localmente)

### 1. Pré-requisitos
Certifique-se de ter o [XAMPP](https://www.apachefriends.org/pt_br/index.html) (ou WAMP/Laragon) instalado na sua máquina com os serviços **Apache** e **MySQL** em execução.

### 2. Configurando o Paddock (Banco de Dados)
Acesse o seu `phpMyAdmin` ou MySQL Workbench e execute o script abaixo para criar o banco e a tabela de usuários:

```sql
CREATE DATABASE loja_teste;

USE loja_teste;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);
```

### 3. Clonando e Executando
1. Clone este repositório dentro da pasta pública do seu servidor local (ex: `htdocs` no XAMPP).
2. Verifique o arquivo `backend/conexao.php` e ajuste a variável `$senha` caso o seu MySQL local possua senha (o padrão é vazio `''` no XAMPP).
3. Abra o seu navegador e acesse:
   `http://localhost/nome-da-sua-pasta/Frontend/index.html`

---

## 📂 Telemetria (Estrutura do Projeto)
A arquitetura foi dividida logicamente para separar a camada de apresentação das regras de negócio:

```text
📦 grid-start-shop
 ┣ 📂 Frontend
 ┃ ┣ 📂 imagens       # Assets, logos e backgrounds (Senna, F1 cars)
 ┃ ┗ 📜 index.html    # Vitrine principal e landing page
 ┗ 📂 Backend
   ┣ 📜 conexao.php   # Ponte de comunicação com o MySQL
   ┣ 📜 cadastro.php  # Lógica de registro e hash de senhas
   ┣ 📜 login.php     # Validação de credenciais e início de sessão
   ┣ 📜 dashboard.php # Rota protegida (Painel VIP do cliente)
   ┗ 📜 logout.php    # Encerramento seguro da sessão
```

## 👨‍💻 O Piloto
Desenvolvido com ☕ e velocidade por Gabriel Aparecido.
Fique à vontade para entrar em contato ou dar uma olhada no meu [LinkedIn]: https://www.linkedin.com/in/gabriel-aparecido-/.