<?php
require_once 'OperacaoMatematica.php';

class Calcular {
    public static function calcular(float $primeiroValor, float $segundoValor, string $operador): float {
        switch ($operador) {
            case '+':
                $operacao = new Adicao();
                break;
            case '-':
                $operacao = new Subtracao();
                break;
            case '*':
                $operacao = new Multiplicacao();
                break;
            case '/':
                $operacao = new Divisao();
                break;
            default:
                throw new Exception("Operador inválido: $operador");
        }

        return $operacao->calcular($primeiroValor, $segundoValor);
    }
}