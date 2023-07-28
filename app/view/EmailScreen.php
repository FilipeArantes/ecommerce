<?php

namespace app\view;

class EmailScreen
{
    public static function htmlEmail(array $produtos): string
    {
        $produtosList = self::formatarListaProdutos($produtos);

        return "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
                    color: #333;
                }
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                }
                h1 {
                    color: #4400A5;
                }
                .produto-lista {
                    margin: 10px 0;
                    padding: 0;
                    list-style: none;
                }
                .produto-lista li {
                    border-bottom: 1px solid #ccc;
                    padding: 10px 0;
                }
                .produto-nome {
                    font-weight: bold;
                }
            </style>
        </head>

        <body>
        <div class='container'>
            <h1>Confirmação de Compra</h1>
            <p>Obrigado por sua compra! Abaixo está o resumo dos produtos adquiridos:</p>
            <ul class='produto-lista'>
                {$produtosList}
            </ul>
            <p>Seu pedido será processado em breve. Obrigado por escolher nossos produtos!</p>
        </div>
        </body>
        </html>
        ";
    }

    private static function formatarListaProdutos(array $produtos): string
    {
        $lista = '';

        foreach ($produtos as $produto) {
            $nome = $produto['nome'];
            $preco = $produto['preco'];
            $quantidade = $produto['quantidade'];

            $lista .= "<li><span class='produto-nome'>{$nome}</span> - Preço: R$ {$preco} - Quantidade: {$quantidade}</li>";
        }

        return $lista;
    }
}
