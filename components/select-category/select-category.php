<li class="select">
    <h5 class="select__note">Укажите категорию</h5>
    <div class="select__item option" data-value="">
        <h4 class="option__title"></h4>
        <svg class="select__item_icon" viewBox="0 0 143 88" xmlns="http://www.w3.org/2000/svg">
            <path d="M71.3513 88L0 16.6486L16.6486 0L71.3513 54.7027L126.054 0L142.703 16.6486L71.3513 88Z" />
        </svg>
    </div>
    <ul class="option-list">
        <?php
        $query = "SELECT * FROM " . $categories;
        $result = $mysqli->query($query);

        if (!$result) {
            echo "Что-то не так " . $mysqli->error;
        };

        while ($row = $result->fetch_assoc()) {
            echo '
                <li class="option" data-value=" ' . $row["id"] . ' ">
                    <h4 class="option__title active">' . $row["Название"] . '</h4>
                    <svg style="fill:  ' . $row["Цвет"] . ' " class="option__icon" viewBox="0 0 15 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 20V2.22222C0 1.61111 0.209821 1.08796 0.629464 0.652778C1.04911 0.217593 1.55357 0 2.14286 0H12.8571C13.4464 0 13.9509 0.217593 14.3705 0.652778C14.7902 1.08796 15 1.61111 15 2.22222V20L7.5 16.6667L0 20ZM2.14286 16.6111L7.5 14.2222L12.8571 16.6111V2.22222H2.14286V16.6111Z" />
                    </svg>
                </li>
            ';
        }
        ?>
    </ul>
</li>