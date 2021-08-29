<?php
define('DS',DIRECTORY_SEPARATOR);
define('ROOT',dirname(__DIR__));
define('APP',ROOT.DS."app");
define('CONFIG',APP.DS."config");
define('CORE',APP.DS."core");
define('MODELS',APP.DS."models");
define('VIEWS',APP.DS."views");
define('CONTROLLERS',APP.DS."controllers");

//config
define("DOMAIN_NAME","http://mvc.mo/");
define("USERNAME",'root');
define("DATABASE","portfolio");
define("PASSWORD","");
define("HOST","localhost");
define("DATABASE_TYPE","mysql");


require_once(ROOT.DS."vendor/autoload.php");

$app = new MVC\core\app();


