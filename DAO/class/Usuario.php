<?php
    class Usuario {
        private $idusuario;
        private $deslogin;
        private $dessenha;
        private $dtcadastro;

        /**
         * @return mixed
         */
        public function getIdusuario()
        {
            return $this->idusuario;
        }

        /**
         * @param mixed $idusuario
         */
        public function setIdusuario($idusuario): void
        {
            $this->idusuario = $idusuario;
        }

        /**
         * @return mixed
         */
        public function getDeslogin()
        {
            return $this->deslogin;
        }

        /**
         * @return mixed
         */
        public function getDessenha()
        {
            return $this->dessenha;
        }

        /**
         * @param mixed $dessenha
         */
        public function setDessenha($dessenha): void
        {
            $this->dessenha = $dessenha;
        }

        /**
         * @param mixed $deslogin
         */
        public function setDeslogin($deslogin): void
        {
            $this->deslogin = $deslogin;
        }

        /**
         * @return mixed
         */
        public function getDtcadastro()
        {
            return $this->dtcadastro;
        }

        /**
         * @param mixed $dtcadastro
         */
        public function setDtcadastro($dtcadastro): void
        {
            $this->dtcadastro = $dtcadastro;
        }

        public function loadById($id){

            $sql = new Sql();

            $results = $sql->select("SELECT * FROM usuarios WHERE idusuario = :ID", array(

                ":ID"=>$id

            ));

            if(isset($results)){
                $row = $results[0];
                $this->setIdusuario($row['idusuario']);
                $this->setDeslogin($row['deslogin']);
                $this->setDessenha($row['dessenha']);
                $this->setDtcadastro(new DateTime($row['dtcadastro']));

            }
        }

        public static function getList(){
            $sql = new sql();
            return $sql->select("SELECT * FROM usuarios ORDER BY deslogin;");
        }

        public static function search($login){
            $sql = new sql();
            return $sql->select("SELECT * FROM usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin",
            array(':SEARCH'=>"%".$login ."%"));
        }

        public function login($login, $password){

            $sql = new Sql();

            $results = $sql->select("SELECT * FROM usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(

                ":LOGIN"=>$login,
                ":PASSWORD"=>$password,

            ));

            if (count($results) > 0) {
                $row = $results[0];

                $this->setIdusuario($row['idusuario']);
                $this->setDeslogin($row['deslogin']);
                $this->setDessenha($row['dessenha']);
                $this->setDtcadastro(new DateTime($row['dtcadastro']));
            }else{

                  throw new Exception("Login Invalido!");

            }

        }
        public function __toString()
        {
            return json_encode(array(
                "idusuario"=>$this->getIdusuario(),
                "deslogin"=>$this->getDeslogin(),
                "dessenha"=>$this->getDessenha(),
                "dtcadastro"=>$this->getDtcadastro()->format("d/m/y H:i:s")
            ));
        }
    }
?>