<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

require_once '../config.php';

$method = $_SERVER['REQUEST_METHOD'];
$action = isset($_GET['action']) ? sanitize($_GET['action']) : '';
$user_id = 1; // Usuário padrão para demonstração

if ($method === 'GET') {
    if ($action === 'list') {
        $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $orders = [];
        
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
        
        json_response(['success' => true, 'data' => $orders]);
        $stmt->close();
    }
    elseif ($action === 'detail') {
        $order_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        
        if ($order_id <= 0) {
            json_response(['success' => false, 'error' => 'ID do pedido é necessário'], 400);
        }
        
        // Obter detalhes do pedido
        $stmt = $conn->prepare("SELECT * FROM orders WHERE id = ? AND user_id = ?");
        $stmt->bind_param("ii", $order_id, $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $order = $result->fetch_assoc();
        
        $stmt->close();
        
        if (!$order) {
            json_response(['success' => false, 'error' => 'Pedido não encontrado'], 404);
        }
        
        // Obter itens do pedido
        $items_stmt = $conn->prepare("SELECT oi.*, p.name, p.image FROM order_items oi 
                      JOIN products p ON oi.product_id = p.id 
                      WHERE oi.order_id = ?");
        $items_stmt->bind_param("i", $order_id);
        $items_stmt->execute();
        $items_result = $items_stmt->get_result();
        $items = [];
        
        while ($row = $items_result->fetch_assoc()) {
            $items[] = $row;
        }
        
        $items_stmt->close();
        
        $order['items'] = $items;
        
        json_response(['success' => true, 'data' => $order]);
    }
}
elseif ($method === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    if ($action === 'create') {
        $total_price = isset($data['total_price']) ? (int)$data['total_price'] : 0;
        $shipping_address = isset($data['shipping_address']) ? sanitize($data['shipping_address']) : '';
        $billing_address = isset($data['billing_address']) ? sanitize($data['billing_address']) : '';
        
        if ($total_price <= 0 || !$shipping_address || !$billing_address) {
            json_response(['success' => false, 'error' => 'Dados inválidos'], 400);
        }
        
        // Criar pedido
        $status = 'pending';
        $insert_stmt = $conn->prepare("INSERT INTO orders (user_id, total_price, shipping_address, billing_address, status) 
                       VALUES (?, ?, ?, ?, ?)");
        $insert_stmt->bind_param("iisss", $user_id, $total_price, $shipping_address, $billing_address, $status);
        
        if ($insert_stmt->execute()) {
            $order_id = $conn->insert_id;
            
            // Obter itens do carrinho e adicionar ao pedido
            $cart_stmt = $conn->prepare("SELECT * FROM cart_items WHERE user_id = ?");
            $cart_stmt->bind_param("i", $user_id);
            $cart_stmt->execute();
            $cart_result = $cart_stmt->get_result();
            
            while ($cart_item = $cart_result->fetch_assoc()) {
                // Obter preço do produto
                $product_stmt = $conn->prepare("SELECT price FROM products WHERE id = ?");
                $product_stmt->bind_param("i", $cart_item['product_id']);
                $product_stmt->execute();
                $product_result = $product_stmt->get_result();
                $product = $product_result->fetch_assoc();
                
                // Inserir item no pedido
                $order_item_stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price_at_purchase) 
                                      VALUES (?, ?, ?, ?)");
                $order_item_stmt->bind_param("iiii", $order_id, $cart_item['product_id'], $cart_item['quantity'], $product['price']);
                $order_item_stmt->execute();
                $order_item_stmt->close();
                
                $product_stmt->close();
            }
            
            $cart_stmt->close();
            
            // Limpar carrinho
            $clear_stmt = $conn->prepare("DELETE FROM cart_items WHERE user_id = ?");
            $clear_stmt->bind_param("i", $user_id);
            $clear_stmt->execute();
            $clear_stmt->close();
            
            json_response(['success' => true, 'message' => 'Pedido criado com sucesso', 'order_id' => $order_id]);
        } else {
            json_response(['success' => false, 'error' => 'Erro ao criar pedido: ' . $conn->error], 500);
        }
        
        $insert_stmt->close();
    }
}
else {
    json_response(['success' => false, 'error' => 'Método não permitido'], 405);
}

$conn->close();
?>
