<?php

/*define ('HOST','localhost');
define('DB_NAME','siteweb');
define('USER','root');
define('PASS','');

try{

    $db= new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo $e;

}


/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 04/04/2019
 * Time: 12:02
 */
class config {
    private static $instance = NULL;

    public static function getConnexion() {
        define ('HOST','localhost');
        define('DB_NAME','agenceimmobiliere');
        define('USER','root');
        define('PASS','');
        if (!isset(self::$instance)) {
            //$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            try{
                self::$instance = new    PDO("mysql:host=" . "localhost" . ";dbname=" . "siteweb", "root", PASS );

                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //ou bien comme ceci pour afficher les erreurs
                //self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        return self::$instance;
    }
}
?>
