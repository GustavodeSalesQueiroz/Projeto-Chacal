# 🍵 Aroma & Sabor - E-commerce de Chás Premium

## Sobre o Projeto

**Aroma & Sabor** é um e-commerce especializado em **chás premium de alta qualidade**, desenvolvido como uma plataforma moderna e funcional para comercialização de chás selecionados do mundo todo. O projeto oferece uma experiência de compra completa, desde a navegação por categorias até o checkout seguro.

O site foi desenvolvido com tecnologias web clássicas (**HTML, CSS, JavaScript vanilla e PHP**), garantindo compatibilidade total, performance e facilidade de manutenção, sem dependências externas complexas.

### 👥 Criadores

- **Ryan Honorato** - Desenvolvedor Frontend
- **Gustavo de Sales** - Desenvolvedor Full Stack
- **Eduardo de Sales** - Desenvolvedor Frontend

---

## ✨ Características Principais

✅ **Banco de dados MySQL** - Armazenamento robusto de produtos, pedidos e usuários  
✅ **13 produtos de chá premium** - Pré-carregados em 5 categorias distintas  
✅ **5 categorias de chás** - Verdes, Pretos, Brancos, Oolong e Ervas Medicinais  
✅ **Sistema de carrinho completo** - Persistência com localStorage  
✅ **Checkout funcional** - Cálculo automático de frete e total  
✅ **Autenticação de usuários** - Login e registro com segurança  
✅ **Histórico de pedidos** - Acompanhamento de compras do usuário  
✅ **API REST em PHP** - 6 endpoints principais para toda a aplicação  
✅ **Design responsivo** - Funciona perfeitamente em mobile, tablet e desktop  
✅ **Sem dependências externas** - Apenas HTML, CSS, JavaScript e PHP puro  

---

## 🚀 Como Rodar no VS Code

### 1. Abrir a pasta no VS Code

```bash
code Aroma-Sabor
```

### 2. Configurar o MySQL

1. Abra o MySQL Workbench
2. Execute o arquivo `database.sql` para criar o banco de dados
3. Verifique as credenciais em `config.php` (padrão: root/12345678)

### 3. Instalar extensão PHP Server (opcional)

- Abra Extensions no VS Code (Ctrl+Shift+X)
- Procure por "PHP Server"
- Instale a extensão oficial

### 4. Iniciar o servidor PHP

**Opção A: Usando a extensão PHP Server**
- Clique com botão direito em qualquer arquivo `.php`
- Selecione "PHP Server: Serve project"
- Abrirá automaticamente no navegador

**Opção B: Usando terminal**
```bash
cd Aroma-Sabor
php -S localhost:8000
```

Depois acesse: `http://localhost:8000/public/index.html`

### 5. Pronto! 🎉

O banco de dados será criado automaticamente com todos os produtos e categorias.

---

## 📁 Estrutura do Projeto

```
Aroma-Sabor/
├── config.php                 # Configuração do banco de dados MySQL
├── database.sql              # Schema e seed do banco de dados
├── api/
│   ├── auth.php             # API de autenticação (login/registro)
│   ├── products.php         # API de produtos
│   ├── categories.php       # API de categorias
│   ├── cart.php            # API de carrinho
│   ├── orders.php          # API de pedidos
├── public/
│   ├── index.html          # Página inicial
│   ├── products.html       # Catálogo de produtos
│   ├── product.html        # Detalhes do produto
│   ├── cart.html           # Carrinho de compras
│   ├── checkout.html       # Checkout e finalização
│   ├── login.html          # Login/Registro
│   ├── pedidos.html        # Histórico de pedidos
│   └── faq.html            # Perguntas frequentes
├── assets/
│   ├── css/
│   │   └── style.css       # Estilos CSS completos
│   └── js/
│       └── app.js          # JavaScript da aplicação
├── icon/                    # Ícones e favicon
└── README.md               # Este arquivo
```

---

## 🔌 APIs REST

### Autenticação

```
POST /api/auth.php?action=register    # Registrar novo usuário
POST /api/auth.php?action=login       # Fazer login
GET /api/auth.php?action=logout       # Fazer logout
```

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
GET /api/orders.php?action=list                # Listar pedidos do usuário
GET /api/orders.php?action=detail&id=1         # Detalhes do pedido
POST /api/orders.php?action=create             # Criar novo pedido
```


---

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

---

## 📱 Responsividade

O site funciona perfeitamente em:
- 📱 Mobile (< 768px)
- 📱 Tablet (768px - 1199px)
- 🖥️ Desktop (1200px+)

---

## 🔒 Segurança

- ✅ Validação de entrada com `sanitize()`
- ✅ Proteção contra SQL Injection (usando prepared statements do MySQLi)
- ✅ Headers CORS configurados
- ✅ Senhas com hash bcrypt
- ✅ Sem exposição de dados sensíveis
- ✅ Autenticação baseada em sessão

---

## 🛠️ Tecnologias Utilizadas

- **Frontend:** HTML5, CSS3, JavaScript Vanilla
- **Backend:** PHP 7.4+
- **Banco de Dados:** MySQL 5.7+
- **Servidor:** PHP Built-in Server

---

## 📝 Documentação Adicional

- **[COMO_EXECUTAR.md](./COMO_EXECUTAR.md)** - Guia detalhado de execução
- **[MYSQL_SETUP.md](./MYSQL_SETUP.md)** - Configuração do MySQL

---

## 🚀 Próximos Passos

1. **Integração de Pagamento** - Adicionar Stripe ou PayPal
2. **Email Marketing** - Confirmação de pedidos por email
3. **Dashboard Avançado** - Relatórios de vendas
4. **Busca Avançada** - Filtros e busca por nome
5. **Reviews de Produtos** - Sistema de avaliações
6. **Wishlist** - Produtos favoritos

---

## 💡 Dicas Úteis

### Debugar API

Abra o DevTools (F12) → Console para ver erros de API

### Limpar banco de dados

Execute novamente o arquivo `database.sql` para recriar tudo do zero

### Mudar porta

Se a porta 8000 estiver em uso:
```bash
php -S localhost:8001
```
---


## 📝 Licença

MIT License - Sinta-se livre para usar e modificar!

---

## 👨‍💻 Desenvolvido com ❤️

**Aroma & Sabor** - Chás Premium do Mundo

Desenvolvido por **Ryan Honorato**, **Gustavo de Sales** e **Eduardo de Sales**

---

**Última atualização:** Novembro de 2025
