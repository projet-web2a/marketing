<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 21/04/2019
 * Time: 20:54
 */
include_once "C:/xampp/htdocs/monprojet/admin/config.php";

class User
{
    private $login;
    private $pwd;
    private $role;
    public $conn;

    public function __construct($login,$pwd)
    {
        $this->login=$login;
        $this->pwd=$pwd;
        //$c=new config();


    }
    function getLog()
    {
        return $this->login;
    }
    function getPWD()
    {
        return $this->pwd;

    }
    function getRole()
    {
        return $this->role;

    }

    public function Logedin($login,$pwd)
    {        $db = config::getConnexion();

        $req="select * from users where user_name='$login' and user_pass='$pwd' ";
        $rep=$db->query($req);
        return $rep->fetchAll();
    }

}

?>