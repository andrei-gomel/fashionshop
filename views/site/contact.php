<?php include ROOT . '/views/layouts/header.php'; ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 padding-right">

                    <? if ($result): ?>
                        <p>Сообщение отправлено! Мы ответим Вам на указанный email.</p>
                    <? else: ?>
                        <? if(isset($errors) && is_array($errors)): ?>
                            <ul style = "list-style-type:disc">
                                <? foreach ($errors as $error): ?>
                                    <li>- <? echo $error; ?></li>
                                <? endforeach; ?>
                            </ul>
                        <? endif; ?>

                        <div class="signup-form"><!-- sign up form -->
                            <h2>Обратная связь</h2>
                            <h5>Есть вопрос? Напишите нам.</h5><br>
                            <form action="#" method="POST">
                                <p>Ваш email</p>
                                <input type="email" name="userEmail" placeholder="E-mail" value="<?=$userEmail?>">
                                <p>Сообщение</p>
                                <input type="text" name="userText" placeholder="Сообщение" value="<?=$userText?>">
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