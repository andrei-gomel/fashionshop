<?php


class UserController
{
    public function actionRegister()
    {
        $name = '';
        $email = '';
        $password = '';

        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if(!User::checkName($name))
            {
                $errors[] = 'Имя не должно быть короче 3-х символов!';
            }

            if(!User::checkEmail($email))
            {
                $errors[] = 'Не корректный E-mail!';
            }

            if(!User::checkPassword($password))
            {
                $errors[] = 'Пароль не должен быть короче 6-ти символов!';
            }

            if(!User::checkEmailExists($email))
            {
                $errors[] = 'Такой E-mail уже используется!';
            }

            if ($errors == false)
            {
                $result = User::register($name, $email, $password);
            }
        }

        require_once (ROOT . '/views/user/register.php');

        return true;
    }

    /**
     * @return bool
     */
    public function actionLogin()
    {
        $email = '';
        $password = '';

        if (isset($_POST['submit']))
        {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkEmail($email))
            {
                $errors[] = 'Неправильный Email !';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов !';
            }

            //  Проверяем существует ли пользователь

            $userId = User::checkUserData($email, $password);

            if ($userId == false)
            {
                $errors[] = 'Неверные данные для входа в личный кабинет';
            } else {
                // Если пользователь существует то открываем для него сессию
                User::auth($userId);

                // Перенаправляем пользователя в личный кабинет
                header("Location: /cabinet/");
            }

        }

        require_once (ROOT . '/views/user/login.php');

        return true;

    }

    /**
     *
     */
    public function actionLogout()
    {
        unset($_SESSION['user']);
        session_destroy();

        header("Location: /");
    }
}