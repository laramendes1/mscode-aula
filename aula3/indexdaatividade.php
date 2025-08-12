<?php
require_once 'Calcular.php';

function executarCalculo(float $primeiroValor, float $segundoValor, string $operador) {
    try {
        $resultado = Calcular::calcular($primeiroValor, $segundoValor, $operador);
        echo "Resultado: {$primeiroValor} {$operador} {$segundoValor} = {$resultado}\n";
    } catch (Exception $erro) {
        echo "Erro: " . $erro->getMessage() . "\n";
    }
}
