<?php
namespace MyClass;

class User{
    
    private int $id;
    private string $userName;
    private string $mdp;
    private string $role;
    
    
    public function __construct($id, $userName , $mdp, $role){

        $this->id = $id;
        $this->userName = $userName;
        $this->mdp = $mdp;
        $this->role = $role;
    
    }

    public function createInDb() {
        $Co = new MyPdo('sqlite:data.db', null, null);
        $pdo = $Co->Connect();
        $query = $pdo->Prepare("INSERT INTO user VALUES(:id, :name, :mdp, :role);
        :id, :name, :mdp, :role");
        $query->execute([
            ':id' => $this->id,
            ':name' => $this->userName,
            ':mdp' => $this->mdp,
            ':role' => $this->role]);
        
    }

    

    public function getId(){
        return $this->id;
    }
    public function getUserName(){
        return $this->userName;
    }
    public function getMdp(){
        return $this->mdp;
    }
    public function getRole(){
        return $this->role;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setUserName($userName){
        $this->userName = $userName;
    }

    public function setMdp($mdp){
        $this->mdp = $mdp;
    }

    public function setRole($role){
        $this->role = $role;
    }


}
