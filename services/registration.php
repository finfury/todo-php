<?php
require $_SERVER['DOCUMENT_ROOT'] . '/services/connect.php';
$_POST = json_decode(file_get_contents('php://input'), true);

$name = $_POST["name"];
$surname = $_POST["surname"];
$address = $_POST["address"];
$email = $_POST["email"];
$password = $_POST["password"];

$hash = password_hash($password, PASSWORD_DEFAULT);
$password = '';

$query = "INSERT INTO " . $users . " (`name`, `surname`, `address`, `email`, `password`) VALUES ('$name', '$surname', '$address', '$email', '$hash')";
$result = $mysqli->query($query);

if (!$result) {
    echo "Что-то не так " . $mysqli->error;
}


$query = "SELECT * FROM " . $users . " WHERE `email` = '$email' ";
$result = $mysqli->query($query);

if (!$result) {
    echo "Что-то не так " . $mysqli->error;
}

$id = $result->fetch_assoc()["id"];

$data = [
    "id" => $id,
    "name" => $name,
    "surname" => $surname,
    "address" => $address,
    "email" => $email,
    "result" => true
];

header('Content-Type: application/json');
echo json_encode($data);
