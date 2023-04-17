<?php
namespace MyClass;
Use PDO;

class Auth{

    private $pdo;

    public function __construct(){
        $this->pdo = new PDO('sqlite:data.db', null, null);
    }
    
    public function login($username, $password) : ?User{
        $stmt = $this->pdo->prepare('SELECT * FROM user WHERE username = :username and mdp = :password');
        $stmt->bindParam('username',  $username,  PDO::PARAM_STR);
        $stmt->bindValue('password',  $password,  PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch();
        if($result['username'] == $username){
            if (session_status() == 1 || session_status() == 0){
                session_start();
            }
            $_SESSION['id'] = $result['id'];
            return new User($result['id'], $result['username'], $result['mdp'], $result['role']);
            }
        else{
            return null;
            }

    }
    
    public function logout(){
        
    }

    public function isConnected(){
        if (isset($_SESSION['id'])){
            $id = $_SESSION['id'];
            $query = $this->pdo->prepare('SELECT * FROM user WHERE id = :id');
            $query->execute([':id' => $id]);
            $result = $query->fetch();
            if ($result != []){
                $user = new User($result['id'], $result['username'], $result['mdp'], $result['role']);
                return $user;     
            }
            ;
        return false;
        }
    }

    
    }

    
