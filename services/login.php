<?php
require $_SERVER['DOCUMENT_ROOT'] . '/services/connect.php';
$_POST = json_decode(file_get_contents('php://input'), true);

$email = $_POST["email"];
$password = $_POST["password"];

$query = "SELECT * FROM " . $users . " WHERE `email` = '$email' ";
$result = $mysqli->query($query);

if (!$result) {
    echo "Что-то не так " . $mysqli->error;
    return;
}

$user = $result->fetch_assoc();

if (!$user || !$user["password"]) {
    $data = [ "result" => false ];
    header('Content-Type: application/json');
    echo json_encode($data);
    return;
}

$isTrusted = password_verify($password, $user["password"]);

$data = ["result" => $isTrusted];

if ($isTrusted) {
    $data = [
        "id" => $user["id"],
        "name" => $user["name"],
        "surname" => $user["surname"],
        "address" => $user["address"],
        "email" => $user["email"],
        "result" => true
    ];
};

header('Content-Type: application/json');
echo json_encode($data);