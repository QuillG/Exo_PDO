<?php
namespace MyClass;
Use PDO;

class MyPdo {

    private $dns;
    private $user;
    private $mdp ;


    public function __construct($dns, $user , $mdp)
    {
        $this->dns = $dns;
        $this->user = $user;
        $this->mdp = $mdp;
    }
       
    public function Connect() : ?PDO {
        return new PDO($this->dns, $this->user, $this->mdp,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ]);
    }
}