# 🗄️ Configuração do MySQL Workbench - Chacal E-commerce

## 📋 Pré-requisitos

1. **MySQL Server** instalado e rodando
2. **MySQL Workbench** instalado
3. **PHP** com suporte a MySQL (extensão `mysqli`)

---

## 🚀 Passo 1: Abrir MySQL Workbench

1. Abra o **MySQL Workbench**
2. Clique em **MySQL Connections** ou crie uma nova conexão
3. Conecte com suas credenciais (padrão: usuário `root`, sem senha)

---

## 🔧 Passo 2: Executar o Script SQL

### Opção A: Copiar e Colar (Recomendado)

1. Abra o arquivo `database.sql` (está na pasta do projeto)
2. Copie **TODO** o conteúdo
3. No MySQL Workbench, clique em **File** → **New Query Tab**
4. Cole o conteúdo
5. Pressione **Ctrl + Shift + Enter** para executar
6. Aguarde a mensagem de sucesso

### Opção B: Abrir Arquivo

1. No MySQL Workbench, clique em **File** → **Open SQL Script**
2. Selecione o arquivo `database.sql`
3. Pressione **Ctrl + Shift + Enter** para executar

---

## ✅ Verificar se Funcionou

Após executar o script, você deve ver:

```
CREATE DATABASE IF NOT EXISTS chacal_db - OK
USE chacal_db - OK
CREATE TABLE categories - OK
CREATE TABLE products - OK
CREATE TABLE users - OK
CREATE TABLE cart_items - OK
CREATE TABLE orders - OK
CREATE TABLE order_items - OK
INSERT INTO categories - OK (5 rows affected)
INSERT INTO products - OK (13 rows affected)
```

---

## 🔐 Configurar Credenciais no PHP

Abra o arquivo `config.php` e ajuste se necessário:

```php
define('DB_HOST', 'localhost');      // Host do MySQL
define('DB_USER', 'root');           // Seu usuário
define('DB_PASS', '');               // Sua senha
define('DB_NAME', 'chacal_db');      // Nome do banco
```

**Exemplos:**

Se você tem senha:
```php
define('DB_PASS', 'sua_senha_aqui');
```

Se usa porta diferente:
```php
define('DB_HOST', 'localhost:3307');
```

---

## 🧪 Testar a Conexão

1. Abra um navegador
2. Acesse: `http://localhost:8000/api/products.php?action=list`
3. Você deve ver um JSON com os 13 produtos

Se vir erro de conexão, verifique:
- MySQL Server está rodando?
- Credenciais estão corretas em `config.php`?
- Banco de dados foi criado?

---

## 📊 Ver Dados no MySQL Workbench

Para visualizar os dados no Workbench:

1. Na aba **Schemas**, clique em **chacal_db**
2. Expanda **Tables**
3. Clique com botão direito em uma tabela
4. Selecione **Select Rows**

---

## 🔄 Resetar o Banco (Se Necessário)

Se quiser deletar tudo e começar do zero:

1. No MySQL Workbench, abra uma nova query
2. Execute:
```sql
DROP DATABASE IF EXISTS chacal_db;
```

3. Depois execute o `database.sql` novamente

---

## 📝 Estrutura do Banco

```
chacal_db/
├── categories
│   ├── id (INT, PK)
│   ├── name (VARCHAR)
│   ├── description (TEXT)
│   ├── slug (VARCHAR, UNIQUE)
│   ├── image (VARCHAR)
│   └── timestamps
│
├── products
│   ├── id (INT, PK)
│   ├── name (VARCHAR)
│   ├── description (TEXT)
│   ├── price (INT - em centavos)
│   ├── category_id (INT, FK)
│   ├── image (VARCHAR)
│   ├── stock (INT)
│   ├── slug (VARCHAR, UNIQUE)
│   ├── featured (TINYINT)
│   └── timestamps
│
├── users
│   ├── id (INT, PK)
│   ├── name (VARCHAR)
│   ├── email (VARCHAR, UNIQUE)
│   ├── password (VARCHAR)
│   └── timestamps
│
├── cart_items
│   ├── id (INT, PK)
│   ├── user_id (INT, FK)
│   ├── product_id (INT, FK)
│   ├── quantity (INT)
│   └── timestamps
│
├── orders
│   ├── id (INT, PK)
│   ├── user_id (INT, FK)
│   ├── total_price (INT - em centavos)
│   ├── status (VARCHAR)
│   ├── shipping_address (TEXT)
│   ├── billing_address (TEXT)
│   ├── payment_method (VARCHAR)
│   ├── tracking_number (VARCHAR)
│   └── timestamps
│
└── order_items
    ├── id (INT, PK)
    ├── order_id (INT, FK)
    ├── product_id (INT, FK)
    ├── quantity (INT)
    ├── price_at_purchase (INT)
    └── created_at
```

---

## 🎯 Próximos Passos

1. ✅ Executar `database.sql` no MySQL Workbench
2. ✅ Verificar credenciais em `config.php`
3. ✅ Iniciar servidor PHP: `php -S localhost:8000`
4. ✅ Acessar: `http://localhost:8000/public/index.html`

---

## 🆘 Troubleshooting

### "Access denied for user 'root'@'localhost'"
- Verifique a senha em `config.php`
- Verifique se MySQL Server está rodando

### "Unknown database 'chacal_db'"
- Execute o script `database.sql` novamente
- Verifique se não há erros na execução

### "Table 'chacal_db.products' doesn't exist"
- Verifique se o script foi executado completamente
- Procure por mensagens de erro no Workbench

### "Connection refused"
- Verifique se MySQL Server está rodando
- Verifique a porta (padrão: 3306)

---

**Pronto! Seu banco de dados está configurado!** 🎉
