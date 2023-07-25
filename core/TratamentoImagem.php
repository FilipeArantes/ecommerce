<?php

namespace core;

use core\responses\exceptions\AppError;

class TratamentoImagem
{
    public function tratarImagem(): string
    {
        $imagens = $_FILES;

        foreach ($imagens as $key => $imagem) {
            if ($imagem['size'] > (2 * 1024 * 1024)) {
                throw new AppError('Imagem ultrapassa 2MB');
            }

            $imagem[$key]['name'] = uniqid().$imagem['name'];
            $nomeImagem = basename($imagem[$key]['name']);
            $nomeTratado = str_replace(' ', '', $nomeImagem);
            $imagem[$key]['full_path'] = "../public/img/{$nomeTratado}";
            move_uploaded_file($imagem['tmp_name'], $imagem[$key]['full_path']);
        }

        return $nomeTratado;
    }

    public static function hasFile(array $file): bool
    {
        return count($file) > 0;
    }
}
