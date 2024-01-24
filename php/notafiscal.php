<?php

class NotaFiscal {
    private $nomeEmpresa;
    private $formaPagamento;
    private $dataHora;
    private $local;
    private $produtos = array();

    public function __construct($nomeEmpresa, $formaPagamento, $local) {
        $this->nomeEmpresa = $nomeEmpresa;
        $this->formaPagamento = $formaPagamento;
        $this->dataHora = date('Y-m-d H:i:s'); // Data e hora atual
        $this->local = $local;
    }

    public function adicionarProduto($nomeProduto, $quantidade, $precoUnitario) {
        $produto = array(
            'nome' => $nomeProduto,
            'quantidade' => $quantidade,
            'preco_unitario' => $precoUnitario
        );

        $this->produtos[] = $produto;
    }

    public function gerarNotaFiscal() {
        // Imprimir informações da nota fiscal
        echo "Nota Fiscal\n";
        echo "Empresa: {$this->nomeEmpresa}\n";
        echo "Data e Hora: {$this->dataHora}\n";
        echo "Local: {$this->local}\n";
        echo "Forma de Pagamento: {$this->formaPagamento}\n";

        // Imprimir detalhes dos produtos
        echo "\nProdutos:\n";
        foreach ($this->produtos as $produto) {
            echo " - {$produto['nome']}, Quantidade: {$produto['quantidade']}, Preço Unitário: {$produto['preco_unitario']}\n";
        }
    }
}

// Exemplo de uso
$notaFiscal = new NotaFiscal("Minha Empresa", "Cartão de Crédito", "Loja A");

// Adicionar produtos à nota fiscal
$notaFiscal->adicionarProduto("Produto 1", 2, 25.00);
$notaFiscal->adicionarProduto("Produto 2", 1, 50.00);

// Gerar e imprimir a nota fiscal
$notaFiscal->gerarNotaFiscal();

?>
