<?php
/* Configuração do Banco de Dados MySQL */

$host = "localhost";
$usuario = "root";
$senha = "12345678"; // senha em branco
$banco = "chacal_db";
$porta = 3306;

// Criar conexão
try {
    $conn = new mysqli($host, $usuario, $senha, $banco, $porta);
    
    // Verificar conexão
    if ($conn->connect_error) {
        die(json_encode([
            'success' => false,
            'error' => 'Erro ao conectar ao MySQL: ' . $conn->connect_error
        ]));
    }
    
    // Criar banco de dados se não existir
    $sql = "CREATE DATABASE IF NOT EXISTS " . $banco;
    if (!$conn->query($sql)) {
        die(json_encode([
            'success' => false,
            'error' => 'Erro ao criar banco de dados: ' . $conn->error
        ]));
    }
    
    // Selecionar banco de dados
    $conn->select_db($banco);
    
    // Definir charset para UTF-8
    $conn->set_charset("utf8mb4");
    
} catch (Exception $e) {
    die(json_encode([
        'success' => false,
        'error' => 'Erro de conexão: ' . $e->getMessage()
    ]));
}

// Função para retornar JSON
function json_response($data, $status = 200) {
    header('Content-Type: application/json');
    http_response_code($status);
    echo json_encode($data);
    exit;
}

// Função para sanitizar entrada
function sanitize($data) {
    if (is_array($data)) {
        return array_map('sanitize', $data);
    }
    return htmlspecialchars(strip_tags(trim($data)));
}
?>
