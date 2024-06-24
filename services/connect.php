<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "todo";
    $tasks = "tasks";
    $categories = "lists";
    $users = "users";
    
    // Создание подключения к базе данных
    $mysql = new mysqli($host, $username, $password, $database);

    // Проверка на ошибки подключения
    if ($mysql->connect_error) {
        die("Ошибка подключения: " . $mysql->connect_error);
    }
?>