# 🚀 Como Executar o Aroma & Sabor

## 📖 Sobre o Projeto

**Aroma & Sabor** é um e-commerce especializado em **chás premium de alta qualidade**, desenvolvido com **HTML, CSS, JavaScript vanilla e PHP**, com banco de dados **MySQL**.

### 👥 Criadores
- **Ryan Honorato** - Desenvolvedor  Frontend
- **Gustavo de Sales** - Desenvolvedor Full Stack
- **Eduardo de Sales** - Desenvolvedor Frontend

---

## Passo 1: Descompactar o arquivo

1. Baixe o arquivo `Aroma-Sabor.zip`
2. Clique com botão direito → **Extrair tudo** (Windows) ou **Descompactar** (Mac/Linux)
3. Escolha uma pasta para extrair (ex: Desktop, Documentos, etc)

---

## Passo 2: Configurar o MySQL

### Pré-requisitos
- MySQL Server instalado e rodando
- MySQL Workbench (opcional, mas recomendado)

### Executar o Script SQL

1. Abra o **MySQL Workbench**
2. Conecte-se ao seu servidor MySQL
3. Abra o arquivo `database.sql` do projeto
4. Execute o script (Ctrl + Enter ou clique em ⚡)

O script criará:
- ✅ Banco de dados `aromaesabor_db`
- ✅ Tabelas: users, categories, products, orders, cart_items
- ✅ 13 produtos de chá em 5 categorias
- ✅ Dados iniciais

### Verificar Credenciais

Abra o arquivo `config.php` e verifique:

```php
$host = "localhost";
$usuario = "root";
$senha = "12345678";  // Altere se necessário
$banco = "aromaesabor_db";
$porta = 3306;
```

Se suas credenciais forem diferentes, atualize-as aqui.

---

## Passo 3: Abrir no VS Code

### Opção A: Arrastar pasta
1. Abra o VS Code
2. Arraste a pasta `Aroma-Sabor` para dentro do VS Code

### Opção B: Abrir pelo VS Code
1. Abra o VS Code
2. Clique em **File** → **Open Folder**
3. Selecione a pasta `Aroma-Sabor`
4. Clique em **Select Folder**

### Opção C: Terminal
```bash
# Abra o terminal e navegue até a pasta
cd caminho/para/Aroma-Sabor

# Depois abra no VS Code
code .
```

---

## Passo 4: Abrir Terminal no VS Code

1. Pressione **Ctrl + `** (backtick, embaixo do ESC)
   - Ou clique em **Terminal** → **New Terminal**

2. Você verá um terminal aberto na parte inferior do VS Code

---

## Passo 5: Iniciar o Servidor PHP

No terminal que abriu, digite:

```bash
php -S localhost:8000
```

Você verá algo como:
```
[Tue Nov 26 12:00:00 2025] PHP 8.1.0 Development Server started at http://localhost:8000
[Tue Nov 26 12:00:00 2025] Listening on http://localhost:8000
Press Ctrl-C to quit.
```

---

## Passo 6: Acessar no Navegador

1. Abra seu navegador (Chrome, Firefox, Edge, Safari, etc)
2. Digite na barra de endereço:
   ```
   http://localhost:8000/public/index.html
   ```
3. Pressione **Enter**

---

## 🎉 Pronto!

Você verá a página inicial do Aroma & Sabor com:
- 🍵 Logo e navegação completa
- 🛍️ Produtos em destaque
- 🛒 Carrinho funcional
- 📱 Design responsivo
- 🔐 Sistema de autenticação

---

## ✨ Funcionalidades Principais

### 1. Explorar Produtos
1. Clique em **Produtos** na navegação
2. Veja todos os 13 chás premium
3. Filtre por categoria (lado esquerdo)
4. Veja detalhes de cada produto

### 2. Ver Detalhes do Produto
1. Clique em qualquer produto
2. Veja a descrição completa e imagem
3. Escolha a quantidade
4. Clique em **Adicionar ao Carrinho**

### 3. Gerenciar Carrinho
1. Clique no ícone 🛒 no topo
2. Veja seus produtos selecionados
3. Aumente/diminua quantidade
4. Remova itens se necessário
5. Clique em **Ir para Checkout**

### 4. Fazer Checkout
1. Faça login (ou crie uma conta)
2. Preencha endereço de entrega
3. Preencha endereço de cobrança
4. Revise o total (com frete calculado)
5. Clique em **Confirmar Pedido**
6. Pronto! Pedido criado com sucesso ✅

### 5. Ver Histórico de Pedidos
1. Faça login na sua conta
2. Clique em **Meus Pedidos**
3. Veja todos os seus pedidos anteriores
4. Clique em um pedido para ver detalhes

---

## 🛑 Parar o Servidor

No terminal do VS Code, pressione:
```
Ctrl + C
```

Você verá:
```
^C
[Tue Nov 26 12:00:00 2025] Shutting down...
```

---

## ❌ Problemas Comuns

### "Porta 8000 já está em uso"

Se receber erro de porta ocupada, use outra porta:
```bash
php -S localhost:8001
```

Depois acesse: `http://localhost:8001/public/index.html`

### "Erro ao conectar ao banco de dados"

Certifique-se de que:
1. ✅ MySQL Server está rodando
2. ✅ Executou o arquivo `database.sql`
3. ✅ Credenciais em `config.php` estão corretas
4. ✅ Banco de dados `aromaesabor_db` foi criado

### "Erro de conexão com API"

Certifique-se de que:
1. ✅ O servidor PHP está rodando (veja o terminal)
2. ✅ Não fechou o terminal
3. ✅ Está acessando `http://localhost:8000` (não HTTPS)
4. ✅ Abra DevTools (F12) → Console para ver erros

### "Erro ao criar pedido - Dados inválidos"

Certifique-se de que:
1. ✅ Você está logado
2. ✅ Tem produtos no carrinho
3. ✅ Preencheu todos os campos de endereço
4. ✅ A coluna `items` existe na tabela `orders`

---

## 📁 Estrutura de Pastas

```
Aroma-Sabor/
├── public/                  ← Páginas HTML
│   ├── index.html          ← Página inicial
│   ├── products.html       ← Catálogo de produtos
│   ├── product.html        ← Detalhes do produto
│   ├── cart.html           ← Carrinho de compras
│   ├── checkout.html       ← Checkout
│   ├── login.html          ← Login/Registro
│   ├── pedidos.html        ← Histórico de pedidos
│   └── faq.html            ← Perguntas frequentes
├── api/                     ← APIs REST
│   ├── auth.php            ← Autenticação
│   ├── products.php        ← Produtos
│   ├── categories.php      ← Categorias
│   ├── cart.php            ← Carrinho
│   ├── orders.php          ← Pedidos
├── assets/                  ← CSS e JavaScript
│   ├── css/
│   │   └── style.css       ← Estilos CSS
│   └── js/
│       └── app.js          ← JavaScript da aplicação
├── config.php              ← Configuração do MySQL
├── database.sql            ← Schema do banco de dados
└── README.md               ← Documentação principal
```

---

## 🎯 Próximos Passos

1. **Explorar o código** - Abra os arquivos para entender como funciona
2. **Customizar cores** - Edite `assets/css/style.css`
3. **Adicionar produtos** - Use o painel admin ou edite `database.sql`
4. **Fazer push no GitHub** - Siga as instruções do GitHub
5. **Integrar pagamento** - Adicione Stripe ou PayPal

---

## 💡 Dicas Úteis

- Use **F12** para abrir o DevTools e debugar
- Abra o **Console** (F12 → Console) para ver erros de API
- Pressione **Ctrl + Shift + R** para limpar cache do navegador
- Verifique o **Network** (F12 → Network) para ver requisições HTTP


---

## 📞 Suporte

Se tiver dúvidas:
1. Verifique se o PHP está instalado: `php -v`
2. Verifique se o MySQL está rodando
3. Abra DevTools (F12) para ver erros detalhados

---

## 📝 Documentação Adicional

- **[README.md](./README.md)** - Documentação completa do projeto
- **[MYSQL_SETUP.md](./MYSQL_SETUP.md)** - Guia de configuração do MySQL

---

## 👨‍💻 Desenvolvido com ❤️

**Aroma & Sabor** - Chás Premium do Mundo

Desenvolvido por:
- **Ryan Honorato**
- **Gustavo de Sales**
- **Eduardo de Sales**

---

**Pronto para começar?** 🚀

Abra o terminal e execute:
```bash
php -S localhost:8000
```

Depois acesse: `http://localhost:8000/public/index.html`

**Bom shopping!** 🍵
