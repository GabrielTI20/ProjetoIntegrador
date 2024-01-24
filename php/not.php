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

    public function gerarNotaFiscalHTML() {
        $html = "<div style='display: flex; justify-content: center; align-items: center; height: 100vh;'>";
        $html .= "<div style='text-align: left; border: 1px solid #000; padding: 20px;'>";

        $html .= "<h1>Nota Fiscal</h1>";
        $html .= "<p><strong>Empresa:</strong> {$this->nomeEmpresa}</p>";
        $html .= "<p><strong>Data e Hora:</strong> {$this->dataHora}</p>";
        $html .= "<p><strong>Local:</strong> {$this->local}</p>";
        $html .= "<p><strong>Forma de Pagamento:</strong> {$this->formaPagamento}</p>";

        $html .= "<h2>Produtos:</h2>";
        $html .= "<ul>";
        foreach ($this->produtos as $produto) {
            $html .= "<li>{$produto['nome']}, Quantidade: {$produto['quantidade']}, Preço Unitário: {$produto['preco_unitario']}</li>";
        }
        $html .= "</ul>";

        $html .= "</div></div>";

        return $html;
    }
}

// Exemplo de uso
$notaFiscal = new NotaFiscal("Minha Empresa", "Cartão de Crédito", "Loja A");

// Adicionar produtos à nota fiscal
$notaFiscal->adicionarProduto("Produto 1", 2, 25);
$notaFiscal->adicionarProduto("Produto 2", 1, 50);

// Gerar e mostrar a nota fiscal na tela
echo $notaFiscal->gerarNotaFiscalHTML();

?>
