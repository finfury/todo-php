<?php
require $_SERVER['DOCUMENT_ROOT'] . '/services/connect.php';

$_POST = json_decode(file_get_contents('php://input'), true);

$date = date('Y-m-d');
$title = $_POST["title"];
$deadline = $_POST["deadline"];
$categoryId = $_POST["categoryId"];

if ($deadline == '') {
    $deadline = date('Y-m-d');
}

$query = "INSERT INTO " . $tasks ." (`Название`, `Категория`, `Выполнено`, `Дата создания`, `Дедлайн`) VALUES ('$title', '$categoryId', '0', '$date', '$deadline')";
$result = $mysqli->query($query);

if (!$result) {
    echo "Что-то не так " . $mysqli->error;
}

$data = [
    "title" => $title,
    "deadline" => $deadline,
    $categoryId => $categoryId,
    "date" => $date
];

header('Content-Type: application/json');
echo json_encode($data);
?>