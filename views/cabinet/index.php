<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <h2>Кабинет пользователя</h2>
            <h4>Привет, <?=$user['name'] ?></h4>

            <ul>
                <li><a href="/cabinet/edit/">Редактировать данные</a></li>
                <li><a href="/cabinet/history/">Список заказов</a><li>
            </ul>
        </div>

    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>



</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>