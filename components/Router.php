<?php

class Router
{
    private $routes;

    public function __construct()
    {
        //$routesPath = ROOT.'/config/routes.php';
        $this->routes = include ROOT.'/config/routes.php';
    }

    private function getURI()
    {
        if(!empty($_SERVER['REQUEST_URI']))
        {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        //print_r($this->routes);

        //echo 'Это класс '.__CLASS__.' , а метод '.__METHOD__;

        // Получаем строку запроса
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path)
        {


            //  http://www.fashionshop.local/category/
            // $uriPattern = catalog/index

            if(preg_match("~$uriPattern~", $uri))
            {


                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                /*echo '<pre>';
                print_r($internalRoute);
                die;*/

                // Определяем какой контроллер и action обрабатывают запрос

                $segments = explode('/', $internalRoute);

                /*echo '<pre>';
                print_r($segments);
                die;*/

                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));

                //echo $controllerName.'<br>'.$actionName;
                $parameters = $segments;

                /*echo '<pre>';
                print_r($parameters);
                die;*/


                // Подключаем файл класса-контроллера
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                if (file_exists ($controllerFile))
                {
                    include_once($controllerFile);
                }

                // Создаем объект, вызываем метод(action)
                $controllerObject = new $controllerName;

                //$result = $controllerObject->$actionName($parameters);

                $result = call_user_func_array (array($controllerObject, $actionName), $parameters);

                if($result != null)
                {
                    break;
                }
            }
        }
    }

}
