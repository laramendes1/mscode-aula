<?php

class CpfCnpj
{
    private string $documento;

    private function __construct(
        string $documento
    ) {
        $this->documento = $documento;
    }

    public static function cpfNaoConfiavel(string $input): self
{
    $digits = preg_replace('/\D+/', '', $input);
    $len = strlen($digits);

    if ($len === 14) {
        return new self($digits);
    }

    if ($len <= 11) {
        $cpf = str_pad($digits, 11, '0', STR_PAD_LEFT);
        return new self($cpf);
    }

    throw new \InvalidArgumentException(
        sprintf(
          'Entrada inválida: "%s" (removido = %d dígitos)',
          $input,
          $len
        )
    );
}

    public function getDocumento(): string
    {
        return $this->documento;
    }

    public function getDocumentoFormatado(): string
    {
        return $this->eCpf()
            ? preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $this->documento)
            : preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $this->documento);
    }

    public function eCpf(): bool
    {
        return strlen($this->documento) === 11;
    }

    public function eCnpj(): bool
    {
        return strlen($this->documento) === 14;
    }
}
