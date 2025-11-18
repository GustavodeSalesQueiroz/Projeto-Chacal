# 🚀 Como Executar o Chacal E-commerce

## Passo 1: Descompactar o arquivo

1. Baixe o arquivo `chacal_vscode.zip`
2. Clique com botão direito → **Extrair tudo** (Windows) ou **Descompactar** (Mac/Linux)
3. Escolha uma pasta para extrair (ex: Desktop, Documentos, etc)

## Passo 2: Abrir no VS Code

### Opção A: Arrastar pasta
1. Abra o VS Code
2. Arraste a pasta `chacal_vscode` para dentro do VS Code

### Opção B: Abrir pelo VS Code
1. Abra o VS Code
2. Clique em **File** → **Open Folder**
3. Selecione a pasta `chacal_vscode`
4. Clique em **Select Folder**

### Opção C: Terminal
```bash
# Abra o terminal e navegue até a pasta
cd caminho/para/chacal_vscode

# Depois abra no VS Code
code .
```

## Passo 3: Abrir Terminal no VS Code

1. Pressione **Ctrl + `** (backtick, embaixo do ESC)
   - Ou clique em **Terminal** → **New Terminal**

2. Você verá um terminal aberto na parte inferior do VS Code

## Passo 4: Iniciar o Servidor PHP

No terminal que abriu, digite:

```bash
php -S localhost:8000
```

Você verá algo como:
```
[Sat Nov 16 15:57:00 2025] PHP 8.1.0 Development Server started at http://localhost:8000
[Sat Nov 16 15:57:00 2025] Listening on http://localhost:8000
Press Ctrl-C to quit.
```

## Passo 5: Acessar no Navegador

1. Abra seu navegador (Chrome, Firefox, Edge, Safari, etc)
2. Digite na barra de endereço:
   ```
   http://localhost:8000/public/index.html
   ```
3. Pressione **Enter**

## 🎉 Pronto!

Você verá a página inicial do Chacal E-commerce com:
- ☕ Logo e navegação
- 🛍️ Produtos em destaque
- 🛒 Carrinho funcional
- 📱 Design responsivo

## 🔄 Banco de Dados

Na primeira vez que você acessa, o sistema automaticamente:
1. Cria um arquivo `chacal.db` (banco de dados SQLite)
2. Cria todas as tabelas
3. Insere 13 produtos em 5 categorias

Você verá o arquivo `chacal.db` aparecer na pasta do projeto.

## ✨ Funcionalidades

### Explorar Produtos
1. Clique em **Produtos** na navegação
2. Veja todos os 13 chás
3. Filtre por categoria (lado esquerdo)

### Ver Detalhes
1. Clique em qualquer produto
2. Veja a descrição completa
3. Escolha a quantidade
4. Clique em **Adicionar ao Carrinho**

### Carrinho
1. Clique no ícone 🛒 no topo
2. Veja seus produtos
3. Aumente/diminua quantidade
4. Clique em **Ir para Checkout**

### Checkout
1. Preencha endereço de entrega
2. Preencha endereço de cobrança
3. Clique em **Confirmar Pedido**
4. Pronto! Pedido criado com sucesso

## 🛑 Parar o Servidor

No terminal do VS Code, pressione:
```
Ctrl + C
```

Você verá:
```
^C
[Sat Nov 16 15:57:00 2025] Shutting down...
```

## ❌ Problemas Comuns

### "Porta 8000 já está em uso"

Se receber erro de porta ocupada, use outra porta:
```bash
php -S localhost:8001
```

Depois acesse: `http://localhost:8001/public/index.html`

### "Arquivo não encontrado"

Certifique-se de que:
1. Extraiu a pasta corretamente
2. Abriu a pasta correta no VS Code
3. Está na pasta `chacal_vscode` quando executa o comando

### "Erro de conexão com API"

Certifique-se de que:
1. O servidor PHP está rodando (veja o terminal)
2. Não fechou o terminal
3. Está acessando `http://localhost:8000` (não HTTPS)

## 📁 Estrutura de Pastas

```
chacal_vscode/
├── public/              ← Páginas HTML
│   ├── index.html      ← Página inicial
│   ├── products.html   ← Catálogo
│   ├── product.html    ← Detalhes
│   ├── cart.html       ← Carrinho
│   └── checkout.html   ← Checkout
├── api/                 ← APIs REST
│   ├── products.php
│   ├── categories.php
│   ├── cart.php
│   └── orders.php
├── assets/              ← CSS e JavaScript
│   ├── css/style.css
│   └── js/app.js
├── db.php              ← Banco de dados
├── chacal.db           ← Arquivo do banco (criado automaticamente)
└── README.md
```

## 🎯 Próximos Passos

1. **Explorar o código** - Abra os arquivos para entender como funciona
2. **Customizar cores** - Edite `assets/css/style.css`
3. **Adicionar produtos** - Edite `db.php` na função `seedData()`
4. **Fazer push no GitHub** - Siga as instruções do GitHub

## 💡 Dicas

- Use **F12** para abrir o DevTools e debugar
- Abra o **Console** (F12 → Console) para ver erros de API
- Pressione **Ctrl + Shift + R** para limpar cache do navegador
- Delete `chacal.db` para recriar o banco do zero

## 📞 Suporte

Se tiver dúvidas:
1. Verifique se o PHP está instalado: `php -v`
2. Verifique se a porta está disponível: `netstat -an | grep 8000`
3. Tente outra porta: `php -S localhost:8001`

---

**Pronto para começar?** 🚀

Abra o terminal e execute:
```bash
php -S localhost:8000
```

Depois acesse: `http://localhost:8000/public/index.html`
