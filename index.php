<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./styles/null.css">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
    <title>To Do</title>
</head>

<body>
    <div class="wrapper">

        <?php @include("./components/menu/menu.php") ?>
        <?php @include("./components/modals/category-modal/category-modal.php") ?>

        <main class="main">
            <div class="welcome">
                <h2 class="welcome__title">Wellcome to To Do list</h2>
                <p class="welcome__text">A to-do app is a simple, user-friendly digital tool designed to help individuals and teams organize tasks and manage their daily activities efficiently. Users can create, edit, and prioritize tasks, set deadlines or reminders, categorize items, and track their progress, all within an intuitive and accessible interface. These apps are essential for improving productivity, reducing stress, and ensuring that important responsibilities are not forgotten.</p>
                <div class="welcome__button">
                    <?php @include("./components/button-green/button-green.php") ?>
                </div>
            </div>
        </main>
    </div>
    <script src="./script.js"></script>
</body>

<!-- <form class="form-lists">
    <div class="form-lists__title">Создание новой категории</div>
    <input type="text" class="form-lists__input" placeholder="Название категории">
    <input type="text" class="form-lists__input" placeholder="Цвет категории">
    <button data-for="category-modal" class="form-lists__button">Добавить</button>
</form> -->