-- =====================================================
-- CHACAL E-COMMERCE - Script de Criação do Banco
-- =====================================================
-- Copie e execute este script no MySQL Workbench

-- Criar banco de dados
CREATE DATABASE IF NOT EXISTS chacal_db;
USE chacal_db;

-- =====================================================
-- Tabela de Categorias
-- =====================================================
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    slug VARCHAR(100) UNIQUE NOT NULL,
    image VARCHAR(500),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- Tabela de Produtos
-- =====================================================
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    description TEXT,
    price INT NOT NULL COMMENT 'Preço em centavos',
    category_id INT NOT NULL,
    image VARCHAR(500),
    stock INT DEFAULT 0,
    slug VARCHAR(150) UNIQUE NOT NULL,
    featured TINYINT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE,
    INDEX idx_category (category_id),
    INDEX idx_featured (featured)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- Tabela de Usuários
-- =====================================================
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150),
    email VARCHAR(150) UNIQUE,
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- Tabela de Itens do Carrinho
-- =====================================================
CREATE TABLE IF NOT EXISTS cart_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    INDEX idx_user (user_id),
    UNIQUE KEY unique_user_product (user_id, product_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- Tabela de Pedidos
-- =====================================================
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    total_price INT NOT NULL COMMENT 'Preço em centavos',
    status VARCHAR(50) DEFAULT 'pending',
    shipping_address TEXT,
    billing_address TEXT,
    payment_method VARCHAR(100),
    tracking_number VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_user (user_id),
    INDEX idx_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- Tabela de Itens do Pedido
-- =====================================================
CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price_at_purchase INT NOT NULL COMMENT 'Preço em centavos',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE SET NULL,
    INDEX idx_order (order_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- INSERIR CATEGORIAS
-- =====================================================
INSERT INTO categories (name, description, slug, image) VALUES
('Chás Verdes', 'Chás verdes frescos e revitalizantes', 'cha-verde', 'https://images.unsplash.com/photo-1597318972826-8f18f80b8b4c?w=500&h=500&fit=crop'),
('Chás Pretos', 'Chás pretos robustos e encorpados', 'cha-preto', 'https://images.unsplash.com/photo-1597318972826-8f18f80b8b4c?w=500&h=500&fit=crop'),
('Chás Brancos', 'Chás brancos delicados e suaves', 'cha-branco', 'https://images.unsplash.com/photo-1597318972826-8f18f80b8b4c?w=500&h=500&fit=crop'),
('Chás Oolong', 'Chás oolong com sabor único e complexo', 'cha-oolong', 'https://images.unsplash.com/photo-1597318972826-8f18f80b8b4c?w=500&h=500&fit=crop'),
('Chás de Ervas', 'Chás de ervas naturais e aromáticos', 'cha-ervas', 'https://images.unsplash.com/photo-1597318972826-8f18f80b8b4c?w=500&h=500&fit=crop');

-- =====================================================
-- INSERIR PRODUTOS
-- =====================================================
INSERT INTO products (name, description, price, category_id, image, stock, slug, featured) VALUES
-- Chás Verdes (category_id = 1)
('Matcha Premium', 'Pó de chá verde matcha de alta qualidade, perfeito para cerimônias', 4500, 1, 'https://images.unsplash.com/photo-1597318972826-8f18f80b8b4c?w=500&h=500&fit=crop', 50, 'matcha-premium', 1),
('Sencha Japonês', 'Chá verde japonês com sabor fresco e vegetal', 3200, 1, 'https://images.unsplash.com/photo-1597318972826-8f18f80b8b4c?w=500&h=500&fit=crop', 40, 'sencha-japones', 1),
('Gyokuro Especial', 'Chá verde premium cultivado à sombra', 5500, 1, 'https://images.unsplash.com/photo-1597318972826-8f18f80b8b4c?w=500&h=500&fit=crop', 30, 'gyokuro-especial', 0),

-- Chás Pretos (category_id = 2)
('Assam Indiano', 'Chá preto robusto e malty da Índia', 2800, 2, 'https://images.unsplash.com/photo-1597318972826-8f18f80b8b4c?w=500&h=500&fit=crop', 60, 'assam-indiano', 1),
('Darjeeling Primeira Colheita', 'Chá preto delicado com notas florais', 4200, 2, 'https://images.unsplash.com/photo-1597318972826-8f18f80b8b4c?w=500&h=500&fit=crop', 35, 'darjeeling-primeira', 1),
('Keemun Chinês', 'Chá preto chinês com sabor frutado', 3800, 2, 'https://images.unsplash.com/photo-1597318972826-8f18f80b8b4c?w=500&h=500&fit=crop', 45, 'keemun-chines', 0),

-- Chás Brancos (category_id = 3)
('Silver Needle', 'Chá branco delicado com apenas brotos de prata', 5800, 3, 'https://images.unsplash.com/photo-1597318972826-8f18f80b8b4c?w=500&h=500&fit=crop', 25, 'silver-needle', 1),
('White Peony', 'Chá branco suave com notas florais', 4500, 3, 'https://images.unsplash.com/photo-1597318972826-8f18f80b8b4c?w=500&h=500&fit=crop', 40, 'white-peony', 0),

-- Chás Oolong (category_id = 4)
('Tie Guan Yin', 'Oolong chinês com aroma floral intenso', 6200, 4, 'https://images.unsplash.com/photo-1597318972826-8f18f80b8b4c?w=500&h=500&fit=crop', 20, 'tie-guan-yin', 1),
('Da Hong Pao', 'Oolong premium com sabor complexo', 7000, 4, 'https://images.unsplash.com/photo-1597318972826-8f18f80b8b4c?w=500&h=500&fit=crop', 15, 'da-hong-pao', 0),

-- Chás de Ervas (category_id = 5)
('Camomila Premium', 'Chá de camomila pura para relaxamento', 2200, 5, 'https://images.unsplash.com/photo-1597318972826-8f18f80b8b4c?w=500&h=500&fit=crop', 70, 'camomila-premium', 1),
('Menta Fresca', 'Chá de menta refrescante e natural', 1800, 5, 'https://images.unsplash.com/photo-1597318972826-8f18f80b8b4c?w=500&h=500&fit=crop', 80, 'menta-fresca', 0),
('Gengibre e Limão', 'Blend aquecedor com gengibre e limão', 2500, 5, 'https://images.unsplash.com/photo-1597318972826-8f18f80b8b4c?w=500&h=500&fit=crop', 55, 'gengibre-limao', 0);

-- =====================================================
-- Pronto! Banco de dados criado com sucesso
-- =====================================================
