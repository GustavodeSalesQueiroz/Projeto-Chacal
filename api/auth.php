<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

require_once '../config.php';

// Verificar conexão
if (!$conn) {
    json_response(['success' => false, 'error' => 'Erro ao conectar ao banco de dados'], 500);
}

$method = $_SERVER['REQUEST_METHOD'];
$action = isset($_GET['action']) ? sanitize($_GET['action']) : '';


if ($method === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    if ($action === 'register') {
        // Cadastro
        $name = isset($data['name']) ? sanitize($data['name']) : '';
        $email = isset($data['email']) ? sanitize($data['email']) : '';
        $password = isset($data['password']) ? $data['password'] : '';
        $confirmPassword = isset($data['confirmPassword']) ? $data['confirmPassword'] : '';
        
        
        // Validações
        if (!$name || !$email || !$password) {
            json_response(['success' => false, 'error' => 'Todos os campos são obrigatórios'], 400);
        }
        
        if ($password !== $confirmPassword) {
            json_response(['success' => false, 'error' => 'As senhas não coincidem'], 400);
        }
        
        if (strlen($password) < 6) {
            json_response(['success' => false, 'error' => 'A senha deve ter no mínimo 6 caracteres'], 400);
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            json_response(['success' => false, 'error' => 'Email inválido'], 400);
        }
        
        // Verificar se email já existe
        if ($conn instanceof mysqli) {
            $check_stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
            $check_stmt->bind_param("s", $email);
            $check_stmt->execute();
            $check_result = $check_stmt->get_result();
            if ($check_result->num_rows > 0) {
                json_response(['success' => false, 'error' => 'Este email já está cadastrado'], 400);
            }
            $check_stmt->close();
        } else {
            $check_stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
            $check_stmt->execute([$email]);
            if ($check_stmt->fetch()) {
                json_response(['success' => false, 'error' => 'Este email já está cadastrado'], 400);
            }
        }
        
        // Criptografar senha
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Inserir usuário
        if ($conn instanceof mysqli) {
            $insert_stmt = $conn->prepare("INSERT INTO users (name, email, password, type_user) VALUES (?, ?, ?, 'user')");
            $insert_stmt->bind_param("sss", $name, $email, $hashedPassword);
            $success = $insert_stmt->execute();
            $user_id = $conn->insert_id;
            $insert_stmt->close();
        } else {
            $insert_stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $success = $insert_stmt->execute([$name, $email, $hashedPassword]);
            $user_id = $conn->lastInsertId();
        }
        
        if ($success) {
            
            json_response([
                'success' => true,
                'message' => 'Cadastro realizado com sucesso!',
                'user' => [
                    'id' => $user_id,
                    'name' => $name,
                    'email' => $email
                ]
            ]);
        } else {
            json_response(['success' => false, 'error' => 'Erro ao criar conta'], 500);
        }
    }
    elseif ($action === 'login') {
        // Login
        $email = isset($data['email']) ? sanitize($data['email']) : '';
        $password = isset($data['password']) ? $data['password'] : '';
        
        if (!$email || !$password) {
            json_response(['success' => false, 'error' => 'Email e senha são obrigatórios'], 400);
        }


        // Buscar usuário
        if ($conn instanceof mysqli) {
            $stmt = $conn->prepare("SELECT id, name, email, password FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            $stmt->close();
        } else {
            $stmt = $conn->prepare("SELECT id, name, email, password FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        if (!$user) {
            json_response(['success' => false, 'error' => 'Email ou senha incorretos'], 401);
        }
        
        // Verificar senha
        if (!password_verify($password, $user['password'])) {
            json_response(['success' => false, 'error' => 'Email ou senha incorretos'], 401);
        }
        
        json_response([
            'success' => true,
            'message' => 'Login realizado com sucesso!',
            'user' => [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email']
            ]
        ]);
    }
}
elseif ($method === 'GET') {
    if ($action === 'logout') {
        // Logout
        json_response(['success' => true, 'message' => 'Logout realizado com sucesso']);
    }
}
else {
    json_response(['success' => false, 'error' => 'Método não permitido'], 405);
}

    
//verificar se o usuário é admin
function isAdmin($userId) {
    global $conn;
    
    if ($conn instanceof mysqli) {
        $stmt = $conn->prepare("SELECT type_user FROM users WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
    } else {
        $stmt = $conn->prepare("SELECT type_user FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    return $user && isset($user['type_user']) && $user['type_user'] === 'admin';
}

?>
