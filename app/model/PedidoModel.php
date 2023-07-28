<?php

namespace app\model;

use app\view\EmailScreen;
use core\services\Mail;
use library\crud\Crud;

class PedidoModel extends Crud
{
    public function checkout(string $table, array $params): string
    {
        $produtosInfo = [];
        foreach ($params as $key => $value) {
            $produto = [
                'nome' => $value['produto']['nome'],
                'preco' => $value['produto']['preco'],
                'quantidade' => $value['produto']['quantidade_comprada'],
            ];

            $produtosInfo[] = $produto;
        }

        foreach ($params as $key => $value) {
            $selectVerificacao = $this->_selectUnique('endereco', 'id_usuario', $value['endereco']['id_usuario']);
            if (!$selectVerificacao) {
                $endereco = $this->_insert('endereco', $value['endereco']);
                $value['produto']['id_endereco_entrega'] = $endereco;
            }
            if ($selectVerificacao) {
                $endereco = (array) $selectVerificacao;
                $value['produto']['id_endereco_entrega'] = $endereco['id'];
            }

            $produtoId = $value['produto']['id_produto'];
            $quantidadeComprada = $value['produto']['quantidade_comprada'];
            $produto = $this->_selectUnique('produto', 'id', $produtoId);
            $produtoArray = get_object_vars($produto);
            $novaQuantidadeEstoque = $produtoArray['quantidade_estoque'] - $quantidadeComprada;

            $teste = $this->_update('produto', ['quantidade_estoque' => $novaQuantidadeEstoque], 'id', $produtoId);

            $produtos = $this->_selectUnique('produto', 'id', $value['produto']['id_produto']);
            $value['produto']['dados'] = json_encode($produtos);
            unset($value['produto']['id_produto'], $value['produto']['email'], $value['produto']['nomeUser'], $value['produto']['preco'], $value['produto']['nome']);

            $this->_insert($table, $value['produto']);
        }
        foreach ($params as $key => $value) {
            $produtosCarrinho = $this->_select('carrinho', 'id_usuario', $value['produto']['id_usuario']);
        }

        foreach ($produtosCarrinho as $key => $value) {
            $this->_deleteCart('carrinho', 'id_carrinho', $value['id_carrinho'], 'id_produto', $value['id_produto']);
        }
        $corpoEmail = EmailScreen::htmlEmail($produtosInfo);
        $this->sendEmail($corpoEmail, $params[0]['produto']['email']);
        return "";
    }

    public function countPedidos(string $table): array
    {
        return $this->_selectCount($table);
    }

    public function showOrders(string $table, string $condition, string $value): array
    {
        return $this->_select($table, $condition, $value);
    }

    public function pedidosRecentes(string $table, string $secondTable, string $condition, string $secondCondition): array
    {
        $recentes = $this->_selectJoin($table, $secondTable, $condition, $secondCondition);
        foreach ($recentes as $key => &$value) {
            $teste = json_decode($value['dados']);
            $value['dados'] = (array) $teste;
        }

        return $recentes;
    }

    public function sumPedidos(string $table, string $column): array
    {
        return $this->_selectSum($table, $column);
    }

    private function sendEmail(string $mensagem, string $emailUsuario): void
    {
        $mail = new Mail('filharantes@gmail.com', $_ENV['SENHAEMAIL'], 'IpeShop');
        $mail->sendEmail($emailUsuario, 'IpeShop', $mensagem);
    }
}
