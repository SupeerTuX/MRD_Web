<?php
include 'db.php';

class User extends DB
{
    private $nombre;
    private $username;
    private $userRol;
    private $userRolName;



    public function userExists($user, $pass)
    {
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE user = :user');
        $query->execute(['user' => $user]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($query->rowCount() && password_verify($pass, $result['pass'])) {
            $this->userRol = $result['rol_id'];
            return true;
        } else {
            return false;
        }
    }

    public function setUser($user)
    {
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE user = :user');
        $query->execute(['user' => $user]);

        foreach ($query as $currentUser) {
            $this->usename = $currentUser['user'];
            $this->nombre = $currentUser['nombre'];
            $this->userRol = $currentUser['rol_id'];
        }
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getUserRol()
    {
        return $this->userRol;
    }

    public function setUserRol($userRol)
    {
        $this->userRol = $userRol;
    }

    public function getUserRolName()
    {
        return $this->userRolName;
    }

    public function setUserRolName()
    {
        if ($this->userRol != null) {
            $query = $this->connect()->prepare('SELECT rol FROM roles WHERE id = :id');
            $query->execute(['id' => $this->userRol]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $this->userRolName = $result['rol'];
        }
    }
}
