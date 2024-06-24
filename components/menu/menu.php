<?php require $_SERVER['DOCUMENT_ROOT'] . './services/connect.php';

function getCountFromDB($query) {
    global $mysql;
    $result = $mysql->query($query);

    if (!$result) {
        echo "Что-то не так " . $mysql->error;
    }

    return $result->fetch_row()[0];
};
?>



<header class="menu">
    <?php @include __DIR__.'/../modals/category-modal/category-modal.php' ?>
    <div class="menu__header menu-margin-bottom">
        <div class="menu__header_title">Menu</div>
        <div class="menu__header_icon">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="menu__info menu-margin-bottom">
        <div class="menu__info_title">Tasks</div>
        <ul class="info-list">
            <li class="info-list__item">
                <a class="info-list__link info-list__background" href="../../pages/tasks/tasks.php">
                    <div class="info-list__item_icon">
                        <svg class="menu-icon" viewBox="0 0 15 10" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.9375 0C0.4125 0 0 0.4125 0 0.9375C0 1.4625 0.4125 1.875 0.9375 1.875C1.4625 1.875 1.875 1.4625 1.875 0.9375C1.875 0.4125 1.4625 0 0.9375 0ZM3.75 0V1.875H15V0H3.75ZM0.9375 3.75C0.4125 3.75 0 4.1625 0 4.6875C0 5.2125 0.4125 5.625 0.9375 5.625C1.4625 5.625 1.875 5.2125 1.875 4.6875C1.875 4.1625 1.4625 3.75 0.9375 3.75ZM3.75 3.75V5.625H15V3.75H3.75ZM0.9375 7.5C0.4125 7.5 0 7.9125 0 8.4375C0 8.9625 0.4125 9.375 0.9375 9.375C1.4625 9.375 1.875 8.9625 1.875 8.4375C1.875 7.9125 1.4625 7.5 0.9375 7.5ZM3.75 7.5V9.375H15V7.5H3.75Z" />
                        </svg>
                    </div>
                    <div class="info-list__item_text">All tasks</div>
                    <div class="info-list__item_count">
                        <?php
                        $query = "SELECT COUNT(*) FROM " . $tasks;
                        echo getCountFromDB($query);
                        ?>
                    </div>
                </a>
            </li>
            <li class="info-list__item">
                <a class="info-list__link info-list__background" href="../../pages/upcoming/upcoming.php">
                    <div class="info-list__item_icon">
                        <svg class="menu-icon" viewBox="0 0 12 15" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0.919128V3.47251L4.25566 7.72818L0 11.9838V14.5373L6.80906 7.72819L0 0.919128Z" />
                            <path d="M5.19094 0.919128V3.47251L9.4466 7.72818L5.19094 11.9838V14.5373L12 7.72819L5.19094 0.919128Z" />
                        </svg>
                    </div>
                    <div class="info-list__item_text">Upcoming</div>
                    <div class="info-list__item_count">
                        <?php
                        $query = "SELECT COUNT(*) FROM " . $tasks . " WHERE Выполнено = '0'";
                        echo getCountFromDB($query);
                        ?>

                    </div>
                </a>
            </li>
            <li class="info-list__item">
                <a class="info-list__link info-list__background" href="../../pages/done/done.php">
                    <div class="info-list__item_icon">
                        <svg class="menu-icon" viewBox="0 0 15 18" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.63514 17.027V10.3581L0 6.08108L3.75 0H11.25L15 6.08108L12.3649 10.3581V17.027L7.5 15.4054L2.63514 17.027ZM4.25676 14.777L7.5 13.7027L10.7432 14.777V12.1622H4.25676V14.777ZM4.66216 1.62162L1.90541 6.08108L4.66216 10.5405H10.3378L13.0946 6.08108L10.3378 1.62162H4.66216ZM6.64865 9.38513L3.77027 6.52703L4.92568 5.37162L6.64865 7.09459L10.0743 3.64865L11.2297 4.78378L6.64865 9.38513Z" />
                        </svg>
                    </div>
                    <div class="info-list__item_text">Done tasks</div>
                    <div class="info-list__item_count">
                        <?php
                        $query = "SELECT COUNT(*) FROM " . $tasks . " WHERE Выполнено = '1'";
                        echo getCountFromDB($query);
                        ?>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <div class="menu__info menu-margin-bottom">
        <div class="menu__info_title">Lists</div>
        <ul class="info-list">
            <?php
            $query_lists = "SELECT * FROM " . $categories;
            $result = $mysql->query($query_lists);


            if (!$result) {
                echo "Что-то не так " . $mysql->error;
            }

            while ($row = $result->fetch_assoc()) {
                $query_count = "SELECT COUNT(*) FROM " . $tasks . " WHERE Категория = $row[id] ";
                $count_elements = $mysql->query($query_count);

                if (!$count_elements) {
                    $count = 0;
                } else {
                    $count = $count_elements->fetch_row()[0];
                }

                echo '
                    <li class="info-list__item info-list__background">
                        <div class="info-list__item_icon">
                            <svg style="fill:' . $row["Цвет"] . ' " class="list-icon" viewBox="0 0 16 11" xmlns="http://www.w3.org/2000/svg">
                                <rect width="16" height="11" rx="5.5" />
                            </svg>
                        </div>
                        <div class="info-list__item_text">' . $row["Название"] . '</div>
                        <div class="info-list__item_count">' . $count . '</div>
                    </li>
                ';
            }
            ?>
            <li class="info-list__item info-list__background">
                <button type="button" data-for="category-modal" class="info-list__link add-list_btn">
                    <div class="info-list__item_icon">
                        <svg class="list-icon blue" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.1 13.5H9.9V9.9H13.5V8.1H9.9V4.5H8.1V8.1H4.5V9.9H8.1V13.5ZM9 18C7.755 18 6.585 17.7638 5.49 17.2912C4.395 16.8187 3.4425 16.1775 2.6325 15.3675C1.8225 14.5575 1.18125 13.605 0.70875 12.51C0.23625 11.415 0 10.245 0 9C0 7.755 0.23625 6.585 0.70875 5.49C1.18125 4.395 1.8225 3.4425 2.6325 2.6325C3.4425 1.8225 4.395 1.18125 5.49 0.70875C6.585 0.23625 7.755 0 9 0C10.245 0 11.415 0.23625 12.51 0.70875C13.605 1.18125 14.5575 1.8225 15.3675 2.6325C16.1775 3.4425 16.8187 4.395 17.2912 5.49C17.7638 6.585 18 7.755 18 9C18 10.245 17.7638 11.415 17.2912 12.51C16.8187 13.605 16.1775 14.5575 15.3675 15.3675C14.5575 16.1775 13.605 16.8187 12.51 17.2912C11.415 17.7638 10.245 18 9 18ZM9 16.2C11.01 16.2 12.7125 15.5025 14.1075 14.1075C15.5025 12.7125 16.2 11.01 16.2 9C16.2 6.99 15.5025 5.2875 14.1075 3.8925C12.7125 2.4975 11.01 1.8 9 1.8C6.99 1.8 5.2875 2.4975 3.8925 3.8925C2.4975 5.2875 1.8 6.99 1.8 9C1.8 11.01 2.4975 12.7125 3.8925 14.1075C5.2875 15.5025 6.99 16.2 9 16.2Z" />
                        </svg>
                    </div>
                    <div class="info-list__item_text">Add new list</div>
                </button>
            </li>
        </ul>
    </div>
    <div class="menu__actions">
        <a href="../../pages/authorization/authorization.php" class="login-btn logout">
            <svg class="login-btn_icon" viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.11111 19C1.53056 19 1.03356 18.7933 0.620139 18.3799C0.206713 17.9664 0 17.4694 0 16.8889V2.11111C0 1.53056 0.206713 1.03356 0.620139 0.620139C1.03356 0.206713 1.53056 0 2.11111 0H9.5V2.11111H2.11111V16.8889H9.5V19H2.11111ZM13.7222 14.7778L12.2708 13.2472L14.9625 10.5556H6.33333V8.44444H14.9625L12.2708 5.75278L13.7222 4.22222L19 9.5L13.7222 14.7778Z" />
            </svg>
            <span class="login-btn_text">Sign Out</span>
        </a>
    </div>
</header>