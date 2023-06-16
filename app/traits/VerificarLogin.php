<?php

namespace app\traits;

trait VerificarLogin
{
    public function __construct(
        protected $db = new \PDO('pgsql:host=localhost;port=5432;dbname=teste;user=postgres;password=@postgres')
    ) {
    }

    public function verificar($email)
    {
        $sql = "SELECT * FROM usuario WHERE email = '{$email}'";

        $consulta = $this->db->query($sql);
        $consulta->fetchAll(\PDO::FETCH_ASSOC);

        if ($consulta->rowCount() > 0) {
            return true;
        }

        return false;
    }

    public function pegarHash($email)
    {
        $sql = "SELECT senha FROM usuario WHERE email = '{$email}'";
        
        $consulta = $this->db->query($sql);
        return $consulta->fetchColumn();
    }
}
