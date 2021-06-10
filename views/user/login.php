<?php include ROOT . '/views/layouts/header.php'; ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 padding-right">
                    <? if(isset($errors) && is_array($errors)): ?>
                        <ul>
                            <? foreach ($errors as $error): ?>
                                <li> - <? echo $error; ?></li>
                            <? endforeach; ?>
                        </ul>
                    <? endif; ?>

                    <div class="signup-form"><!-- sign up form -->
                        <h2>Вход в личный кабинет</h2>
                        <form action="#" method="POST">
                            <input type="email" name="email" placeholder="E-mail" value="<?=$email?>">
                            <input type="password" name="password" placeholder="Пароль" value="<?=$password?>">
                            <!--<input type="submit" value="Регистрация!" name="submit" class="btn btn-default">-->
                            <button type="submit" name="submit" class="btn btn-default">Войти</button>
                        </form>
                    </div><!-- /sign up form -->
                    <br><br><br><br><br><br><br><br><br>
                </div>

            </div>

        </div>


    </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>