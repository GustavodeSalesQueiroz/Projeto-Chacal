# 🍵 Chacal E-commerce - HTML, CSS, JavaScript e PHP

Um e-commerce completo de chás premium desenvolvido com **HTML, CSS, JavaScript vanilla e PHP**, com **banco de dados SQLite integrado**. Roda direto no VS Code sem dependências externas!

## ✨ Características

✅ **Banco de dados SQLite** - Sem MySQL externo necessário
✅ **Criação automática de tabelas** - Ao abrir pela primeira vez
✅ **13 produtos de chá** - Pré-carregados automaticamente
✅ **5 categorias** - Chás Verdes, Pretos, Brancos, Oolong e Ervas
✅ **Sistema de carrinho** - Com localStorage
✅ **Checkout funcional** - Cálculo de frete automático
✅ **API REST em PHP** - 4 endpoints principais
✅ **Design responsivo** - Funciona em mobile, tablet e desktop
✅ **Sem dependências** - Apenas HTML, CSS, JavaScript e PHP

## 🚀 Como Rodar no VS Code

### 1. Abrir a pasta no VS Code

```bash
code chacal_vscode
```

### 2. Instalar extensão PHP Server (opcional, mas recomendado)

- Abra Extensions no VS Code (Ctrl+Shift+X)
- Procure por "PHP Server"
- Instale a extensão oficial

### 3. Iniciar o servidor PHP

**Opção A: Usando a extensão PHP Server**
- Clique com botão direito em qualquer arquivo `.php`
- Selecione "PHP Server: Serve project"
- Abrirá automaticamente no navegador

**Opção B: Usando terminal**
```bash
cd chacal_vscode
php -S localhost:8000
```

Depois acesse: `http://localhost:8000/public/index.html`

### 4. Pronto! 🎉

O banco de dados SQLite será criado automaticamente na primeira execução com todos os produtos e categorias.

## 📁 Estrutura do Projeto

```
chacal_vscode/
├── db.php                 # Classe Database (SQLite + Seed)
├── api/
│   ├── products.php      # API de produtos
│   ├── categories.php    # API de categorias
│   ├── cart.php         # API de carrinho
│   └── orders.php       # API de pedidos
├── public/
│   ├── index.html       # Página inicial
│   ├── products.html    # Catálogo
│   ├── product.html     # Detalhes do produto
│   ├── cart.html        # Carrinho
│   └── checkout.html    # Checkout
├── assets/
│   ├── css/
│   │   └── style.css   # Estilos CSS
│   └── js/
│       └── app.js      # JavaScript da aplicação
├── chacal.db           # Banco de dados SQLite (criado automaticamente)
└── README.md           # Este arquivo
```

## 🔌 APIs REST

### Produtos

```
GET /api/products.php?action=list              # Listar todos
GET /api/products.php?action=featured          # Produtos em destaque
GET /api/products.php?action=detail&slug=...   # Detalhes
GET /api/products.php?action=by_category&category_id=1
```

### Categorias

```
GET /api/categories.php?action=list            # Listar todas
GET /api/categories.php?action=detail&slug=... # Detalhes
```

### Carrinho

```
GET /api/cart.php?action=list                  # Listar itens
POST /api/cart.php?action=add                  # Adicionar item
POST /api/cart.php?action=update               # Atualizar quantidade
DELETE /api/cart.php?action=remove&id=1        # Remover item
DELETE /api/cart.php?action=clear              # Limpar carrinho
```

### Pedidos

```
GET /api/orders.php?action=list                # Listar pedidos
GET /api/orders.php?action=detail&id=1         # Detalhes do pedido
POST /api/orders.php?action=create             # Criar novo pedido
```

## 🎨 Customização

### Mudar cores

Edite as variáveis CSS em `assets/css/style.css`:

```css
:root {
    --primary-color: #8B4513;      /* Marrom principal */
    --primary-dark: #6B3410;       /* Marrom escuro */
    --accent-color: #DAA520;       /* Cor de destaque */
    /* ... */
}
```

### Adicionar novos produtos

Edite `db.php` na função `seedData()` e adicione um novo item ao array `$products`:

```php
['Nome do Chá', 'Descrição', 4500, 1, 'url-imagem', 50, 'slug', 1]
```

Depois delete o arquivo `chacal.db` para recriar o banco com os novos dados.

## 📱 Responsividade

O site funciona perfeitamente em:
- 📱 Mobile (< 768px)
- 📱 Tablet (768px - 1199px)
- 🖥️ Desktop (1200px+)

## 🔒 Segurança

- Validação de entrada com `sanitize()`
- Proteção contra SQL Injection (usando prepared statements do PDO)
- Headers CORS configurados
- Sem exposição de dados sensíveis

## 🚀 Próximos Passos

1. **Integração de Pagamento** - Adicionar Stripe ou PayPal
2. **Autenticação** - Sistema de login/registro
3. **Admin Panel** - Gerenciar produtos
4. **Email** - Confirmação de pedidos
5. **Busca** - Funcionalidade de busca

## 💡 Dicas

### Debugar API

Abra o DevTools (F12) → Console para ver erros de API

### Limpar banco de dados

Delete o arquivo `chacal.db` para recriar tudo do zero

### Mudar porta

Se a porta 8000 estiver em uso:
```bash
php -S localhost:8001
```

## 📝 Licença

MIT License - Sinta-se livre para usar e modificar!

## 👨‍💻 Desenvolvido com ❤️

Para Chacal E-commerce - Chás Premium do Mundo
