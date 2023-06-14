<?php

namespace app\traits;

trait EmailJaUsado
{
    protected function verificarEmail($email)
    {
        $email2 = serialize($email);
        $emailAspas = unserialize($email2);

        $sql = "SELECT COUNT(*)
        FROM usuario
        WHERE usuario.email = '$emailAspas'";

        $result = $this->db->query($sql);

        return $result->fetchColumn() > 0;
    }
}