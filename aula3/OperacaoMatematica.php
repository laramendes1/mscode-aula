<?php

interface OperacaoMatematica {
    public function calcular(float $primeiroValor, float $segundoValor): float;
}

class Adicao implements OperacaoMatematica {
    public function calcular(float $primeiroValor, float $segundoValor): float {
        return $primeiroValor + $segundoValor;
    }
}

class Subtracao implements OperacaoMatematica {
    public function calcular(float $primeiroValor, float $segundoValor): float {
        return $primeiroValor - $segundoValor;
    }
}

class Multiplicacao implements OperacaoMatematica {
    public function calcular(float $primeiroValor, float $segundoValor): float {
        return $primeiroValor * $segundoValor;
    }
}

class Divisao implements OperacaoMatematica {
    public function calcular(float $primeiroValor, float $segundoValor): float {
        if ($segundoValor == 0.0) {
            throw new Exception("Erro: Divisão por zero.");
        }
        return $primeiroValor / $segundoValor;
    }
}