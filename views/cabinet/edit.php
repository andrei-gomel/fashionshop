<?php include ROOT . '/views/layouts/header.php'; ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 padding-right">

                    <? if ($result): ?>
                    <p>Данные отредактированы!</p>
                    <? else: ?>
                    <? if(isset($errors) && is_array($errors)): ?>
                        <ul style = "list-style-type:disc">
                            <? foreach ($errors as $error): ?>
                                <li>- <? echo $error; ?></li>
                            <? endforeach; ?>
                        </ul>
                    <? endif; ?>

                    <div class="signup-form"><!-- sign up form -->
                        <h2>Редактирование данных</h2>
                        <form action="#" method="POST">
                            <input type="text" name="name" placeholder="Имя" value="<?=$name?>">
                            <input type="password" name="password" placeholder="Пароль" value="<?=$password?>">
                            <!--<input type="submit" value="Регистрация!" name="submit" class="btn btn-default">-->
                            <button type="submit" name="submit" class="btn btn-default">Сохранить</button>
                        </form>
                    </div><!-- /sign up form -->
                    <? endif; ?>
                    <br><br><br><br><br><br><br><br><br><br><br>
                </div>

            </div>

        </div>


    </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>