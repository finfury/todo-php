<?php
function getTaskList($date) {
    global $mysqli, $tasks, $categories;

    $response = '';
    $date = str_replace('-', '', $date);
    $query = "SELECT * FROM " . $tasks . " WHERE `Дедлайн` = $date AND `Выполнено` = 0";
    $result = $mysqli->query($query);


    if (!$result) {
        $response = "Что-то не так " . $mysqli->error;
        return ('<li>' . $response . '</li>');
    }

    $row = $result->fetch_assoc();
    if (!$row) {
        $response = 'Ничего нет, Гуляй';
        return ('<li>' . $response . '</li>');
    }

    while ($row) {
        $new_query = "SELECT Цвет FROM " . $categories . " WHERE id = $row[Категория]";
        $new_result = $mysqli->query($new_query);

        if (!$new_result) {
            $response = "Что-то не так " . $mysqli->error;
            return ('<li>' . $response . '</li>');
        }

        $color = $new_result->fetch_assoc();
        $class_icon = "";

        if ($row["Выполнено"]) {
            $class_icon = "done";
        }

        $response = $response . '
            <li class="event__item">
                <div class="event__item_category">
                    <svg style="fill: ' . $color["Цвет"] . ' " class="event__item_icon" " viewBox="0 0 15 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 20V2.22222C0 1.61111 0.209821 1.08796 0.629464 0.652778C1.04911 0.217593 1.55357 0 2.14286 0H12.8571C13.4464 0 13.9509 0.217593 14.3705 0.652778C14.7902 1.08796 15 1.61111 15 2.22222V20L7.5 16.6667L0 20ZM2.14286 16.6111L7.5 14.2222L12.8571 16.6111V2.22222H2.14286V16.6111Z" />
                    </svg>
                </div>
                <div class="event__item_title">
                    <p>' . $row["Название"] . '</p>
                </div>
                <div class="event__item_check ' . $class_icon . '">
                    <svg viewBox="0 0 17 13" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.7 12.025L0 6.325L1.425 4.9L5.7 9.175L14.875 0L16.3 1.425L5.7 12.025Z" />
                    </svg>
                </div>
            </li>
        ';
        $row = $result->fetch_assoc();
    }

    return $response;
}
?>

<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../styles/null.css">
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
    <title>Upcoming tasks</title>
</head>

<body>
    <div class="wrapper">

        <?php @include("../../components/menu/menu.php") ?>
        <?php @include("../../components/modals/task-modal/task-modal.php") ?>

        <main class="main">
            <div class="upcoming">
                <?php
                    $count = 0;
                    while ($count < 3) {
                        $date = date("d F", time() + 60 * 60 * 24 * $count);
                        $dateForDb = date('Y-m-d', time() + 60 * 60 * 24 * $count);
                        $event_list = getTaskList($dateForDb);

                        if ($count == 0) $date = 'Today, '. $date;
                        else if ($count == 1) $date = 'Tomorrow, ' . $date;


                        $event = '<div class="event">
                                    <div class="event__header">
                                        <div class="event__header_title">' . $date . '</div>
                                        <button data-for="task-modal" class="event__header_button">
                                            <svg class="event__header_icon" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.1 13.5H9.9V9.9H13.5V8.1H9.9V4.5H8.1V8.1H4.5V9.9H8.1V13.5ZM9 18C7.755 18 6.585 17.7638 5.49 17.2912C4.395 16.8187 3.4425 16.1775 2.6325 15.3675C1.8225 14.5575 1.18125 13.605 0.70875 12.51C0.23625 11.415 0 10.245 0 9C0 7.755 0.23625 6.585 0.70875 5.49C1.18125 4.395 1.8225 3.4425 2.6325 2.6325C3.4425 1.8225 4.395 1.18125 5.49 0.70875C6.585 0.23625 7.755 0 9 0C10.245 0 11.415 0.23625 12.51 0.70875C13.605 1.18125 14.5575 1.8225 15.3675 2.6325C16.1775 3.4425 16.8187 4.395 17.2912 5.49C17.7638 6.585 18 7.755 18 9C18 10.245 17.7638 11.415 17.2912 12.51C16.8187 13.605 16.1775 14.5575 15.3675 15.3675C14.5575 16.1775 13.605 16.8187 12.51 17.2912C11.415 17.7638 10.245 18 9 18ZM9 16.2C11.01 16.2 12.7125 15.5025 14.1075 14.1075C15.5025 12.7125 16.2 11.01 16.2 9C16.2 6.99 15.5025 5.2875 14.1075 3.8925C12.7125 2.4975 11.01 1.8 9 1.8C6.99 1.8 5.2875 2.4975 3.8925 3.8925C2.4975 5.2875 1.8 6.99 1.8 9C1.8 11.01 2.4975 12.7125 3.8925 14.1075C5.2875 15.5025 6.99 16.2 9 16.2Z" />
                                            </svg>
                                            <span>Add new task</span>
                                        </button>
                                    </div>
                                    <ul class="event__list"> ' . $event_list . '</ul>
                                </div>';
                        echo $event;
                        $count++;
                    }
                    ?>
            </div>
        </main>
    </div>
    <script src="../../script.js"></script>
</body>