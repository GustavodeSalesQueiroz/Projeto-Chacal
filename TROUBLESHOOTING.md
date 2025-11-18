# 🔧 Solução de Problemas - ERR_CONNECTION_REFUSED

## ❌ Erro: "A conexão com localhost foi recusada"

Este erro significa que o servidor PHP **não está rodando** ou está em **outra porta**.

---

## ✅ Solução Passo a Passo

### **1. Verifique se o PHP está instalado**

Abra o terminal (fora do VS Code) e digite:

```bash
php -v
```

**Você deve ver algo como:**
```
PHP 8.1.0 (cli) (built: Nov 24 2021 16:22:08) ( ZTS Visual C++ 2019 v16 x64 )
Copyright (c) The PHP Group
```

**Se não aparecer nada ou "comando não encontrado":**
- PHP não está instalado
- Instale em: https://www.php.net/downloads

---

### **2. Verifique se o servidor está rodando**

No VS Code:
1. Pressione **Ctrl + `** para abrir o terminal
2. Você deve ver algo como:
```
[Sat Nov 16 15:57:00 2025] PHP 8.1.0 Development Server started at http://localhost:8000
[Sat Nov 16 15:57:00 2025] Listening on http://localhost:8000
Press Ctrl-C to quit.
```

**Se não vir isso:**
- O servidor não foi iniciado
- Siga o passo 3 abaixo

---

### **3. Inicie o servidor corretamente**

No terminal do VS Code:

```bash
php -S localhost:8000
```

**Pressione Enter e aguarde.**

Você deve ver:
```
[Sat Nov 16 15:57:00 2025] PHP 8.1.0 Development Server started at http://localhost:8000
[Sat Nov 16 15:57:00 2025] Listening on http://localhost:8000
Press Ctrl-C to quit.
```

---

### **4. Acesse o navegador corretamente**

Certifique-se de que:
- ✅ Você está digitando: `http://localhost:8000/public/index.html`
- ❌ NÃO é: `https://localhost:8000` (sem o "public/index.html")
- ❌ NÃO é: `localhost:8000` (sem "http://")

---

## 🔴 Porta 8000 já está em uso

Se receber erro como:
```
Address already in use
```

**Use outra porta:**

```bash
php -S localhost:8001
```

Depois acesse: `http://localhost:8001/public/index.html`

---

## 🔍 Checklist de Verificação

- [ ] PHP está instalado? (`php -v`)
- [ ] Você está na pasta correta? (veja o terminal, deve mostrar o caminho)
- [ ] Você executou `php -S localhost:8000`?
- [ ] O terminal mostra "Listening on http://localhost:8000"?
- [ ] Você está acessando `http://localhost:8000/public/index.html`?
- [ ] Você não fechou o terminal?
- [ ] Você não pressionou Ctrl+C?

---

## 📝 Passo a Passo Completo (Do Zero)

### **1. Abra VS Code**

### **2. Abra a pasta `chacal_vscode`**
- File → Open Folder → selecione a pasta

### **3. Abra o terminal**
- Pressione **Ctrl + `**
- Ou: Terminal → New Terminal

### **4. Verifique o caminho**
O terminal deve mostrar algo como:
```
C:\Users\SeuNome\Desktop\chacal_vscode>
```
ou
```
/Users/SeuNome/Desktop/chacal_vscode$
```

Se não estiver na pasta correta, digite:
```bash
cd caminho/para/chacal_vscode
```

### **5. Inicie o servidor**
```bash
php -S localhost:8000
```

### **6. Aguarde a mensagem**
Você deve ver:
```
[Sat Nov 16 15:57:00 2025] PHP 8.1.0 Development Server started at http://localhost:8000
[Sat Nov 16 15:57:00 2025] Listening on http://localhost:8000
Press Ctrl-C to quit.
```

### **7. Abra o navegador**
- Chrome, Firefox, Edge, Safari, etc
- Digite: `http://localhost:8000/public/index.html`
- Pressione Enter

### **8. Pronto! 🎉**
Você deve ver a página inicial do Chacal

---

## 🆘 Ainda não funciona?

### **Teste a porta**

Abra um **novo terminal** (não feche o anterior) e digite:

**Windows:**
```bash
netstat -an | findstr 8000
```

**Mac/Linux:**
```bash
lsof -i :8000
```

Se aparecer algo, a porta está em uso. Use outra:
```bash
php -S localhost:8001
```

### **Teste o PHP**

Crie um arquivo `teste.php` na pasta com:
```php
<?php
echo "PHP está funcionando!";
?>
```

Acesse: `http://localhost:8000/teste.php`

Se vir a mensagem, PHP está ok.

### **Verifique a pasta**

Certifique-se de que a pasta tem:
```
chacal_vscode/
├── public/
│   └── index.html
├── api/
├── assets/
└── db.php
```

Se falta algo, extraiu errado. Extraia novamente.

---

## 💬 Mensagens de Erro Comuns

### **"Command not found: php"**
- PHP não está instalado
- Instale em: https://www.php.net/downloads

### **"Address already in use"**
- Outra aplicação está usando a porta 8000
- Use: `php -S localhost:8001`

### **"Permission denied"**
- Problema de permissões
- Tente: `sudo php -S localhost:8000` (Mac/Linux)

### **"No such file or directory"**
- Você não está na pasta correta
- Digite: `cd caminho/para/chacal_vscode`

---

## ✅ Se tudo funcionar

Você verá:
- ☕ Logo "Chacal" no topo
- 🛍️ Produtos em destaque
- 🛒 Ícone de carrinho
- 📱 Design responsivo

---

## 🎯 Próximas Ações

1. **Explore os produtos** - Clique em "Produtos"
2. **Adicione ao carrinho** - Clique em um produto
3. **Vá ao checkout** - Clique no carrinho
4. **Customize** - Edite `assets/css/style.css` para mudar cores

---

**Conseguiu resolver? Ótimo! 🎉**

**Ainda com dúvidas? Verifique se:**
- Terminal está aberto e mostra "Listening on http://localhost:8000"
- Você não pressionou Ctrl+C
- Você está acessando a URL correta
