<?php
session_start();

header('Content-Type: application/json');
$response = ['success' => false, 'message' => '', 'session' => $_SESSION ?? []];
if (!isset($_SESSION['user_id'])) {
    $response['message'] = 'Usuario no autenticado';
    echo json_encode($response);
    exit;
}

if (!isset($_POST['id_evento'])) {
    $response['message'] = 'Faltan datos.';
    echo json_encode($response);
    exit;
}

$id_usuario = intval($_SESSION['user_id']);
$id_evento = intval($_POST['id_evento']);

$conexion = new mysqli("localhost", "volunt_user", "jdu2352h", "volunteam");
if ($conexion->connect_error) {
    $response['message'] = 'Error de conexión a la base de datos.';
    echo json_encode($response);
    exit;
}

$sql_cupos = $conexion->prepare("SELECT cupos FROM evento WHERE id_evento = ?");
$sql_cupos->bind_param("i", $id_evento);
$sql_cupos->execute();
$result_cupos = $sql_cupos->get_result();

if ($result_cupos->num_rows === 0) {
    $response['message'] = 'Evento no encontrado.';
    echo json_encode($response);
    exit;
}

$evento = $result_cupos->fetch_assoc();

if ($evento['cupos'] <= 0) {
    $response['message'] = 'No hay cupos disponibles para este evento.';
    echo json_encode($response);
    exit;
}

$sql_check = $conexion->prepare("SELECT * FROM usuario_evento WHERE id_usuario = ? AND id_evento = ?");
$sql_check->bind_param("ii", $id_usuario, $id_evento);
$sql_check->execute();
$result_check = $sql_check->get_result();

if ($result_check->num_rows > 0) {
    $response['message'] = 'Ya estás registrado en este evento.';
    echo json_encode($response);
    exit;
}


$sql = $conexion->prepare("INSERT INTO usuario_evento (id_usuario, id_evento) VALUES (?, ?)");
$sql->bind_param("ii", $id_usuario, $id_evento);

if ($sql->execute()) {
    $sql_update = $conexion->prepare("UPDATE evento SET cupos = cupos - 1 WHERE id_evento = ?");
    $sql_update->bind_param("i", $id_evento);
    $sql_update->execute();

    $sql_cupos->execute();
    $result_cupos = $sql_cupos->get_result();
    $evento_actualizado = $result_cupos->fetch_assoc();

    $response['success'] = true;
    $response['message'] = 'Registro exitoso.';
    $response['cupos_restantes'] = intval($evento_actualizado['cupos']);
} else {
    $response['message'] = 'No se pudo registrar: ' . $conexion->error;
}

echo json_encode($response);
$conexion->close();

