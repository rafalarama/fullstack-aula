<?php
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $dados = json_decode(file_get_contents("php://input"));

    $a = dados->a;
    $b = dados->b;
    $c = dados-> c;

    $delta = ($b * $b) - (4 * $a * $c);

    echo json_encode(['delta' => $delta]);

} else {
    echo json_encode(['erro' => 'Método não suportado. Use o método POST']);
}
?>