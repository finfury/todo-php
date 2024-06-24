<?php
# Установка соединения с базой данных
require $_SERVER['DOCUMENT_ROOT'] . '/services/connect.php';

$_POST = json_decode(file_get_contents('php://input'), true);

$date = date('Y-m-d');
$title = $_POST["title"];
$color = $_POST["color"];

# Составление SQL запроса
$query = "INSERT INTO " . $categories . " (`Название`, `Цвет`, `Дата создания`) VALUES ('$title', '$color', '$date')";
$result = $mysqli->query($query);

# Проверка ответа от сервера
if (!$result) {
    echo "Что-то не так " . $mysqli->error;
}

# Обратный ответ
$data = [
    "title" => $title,
    "color" => $color,
    "date" => $date
];

# Установка заголовков ответа
header('Content-Type: application/json');
# Отправка ответа на клиент
echo json_encode($data);