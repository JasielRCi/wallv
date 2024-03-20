<?php

    include_once 'db.php';

    class User extends DB{
        private $usu ;
        private $contra;

        public function userExisit($usu,$contra){
            $md5pass = md5($contra);

            $query = $this->connect()->prepare('SELECT * FROM  iniciosesion where Nusuario = ' . $usu  . 'AND Contra = ' . $contra);
            $query->execute(['Nusuario' => $usu,'Contra'=> $md5pass]);

            if( $query->rowCount()){
                return true;
            }else{
                    return false;
            }
        }

        public function setUsu($usu){
            $query = $this->connect()->prepare('SELECT * FROM iniciosesion where Nusuario = :usu');
            $query->execute(['usu'=> $usu]);

            foreach ($query as $currentUsu){
                $this-> usu($currentUsu);
            }
        }
    }

