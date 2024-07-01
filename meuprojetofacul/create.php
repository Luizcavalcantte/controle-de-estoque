<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Adicionar Produto</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Adicionar Produto</h1>
    <form action="create.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
        <label for="tipo">Tipo:</label>
        <select name="tipo" id="tipo" required>
            <option value="brinquedo">Brinquedo</option>
            <option value="eletronico">Eletrônico</option>
            <option value="ferramenta">Ferramenta</option>
            <option value="outros">Outros</option>
        </select>
        <label for="preco_compra">Preço de Compra:</label>
        <input type="number" step="0.01" name="preco_compra" id="preco_compra" required>
        <label for="preco_venda">Preço de Venda:</label>
        <input type="number" step="0.01" name="preco_venda" id="preco_venda" required>
        <label for="codigo_barras">Código de Barras:</label>
        <input type="text" name="codigo_barras" id="codigo_barras" required>
        <label for="quantidade_vendidos">Quantidade Vendidos:</label>
        <input type="number" name="quantidade_vendidos" id="quantidade_vendidos" required>
        <label for="quantidade_estoque">Quantidade no Estoque:</label>
        <input type="number" name="quantidade_estoque" id="quantidade_estoque" required>
        <button type="submit">Salvar</button>
    </form>
    <div class ='btns'>
        <a href="index.php">Voltar</a>
    </div>
</body>
</html>

<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $tipo = $_POST["tipo"];
    $preco_compra = $_POST["preco_compra"];
    $preco_venda = $_POST["preco_venda"];
    $codigo_barras = $_POST["codigo_barras"];
    $quantidade_vendidos = $_POST["quantidade_vendidos"];
    $quantidade_estoque = $_POST["quantidade_estoque"];

    $sql = "INSERT INTO produtos (nome, tipo, preco_compra, preco_venda, codigo_barras, quantidade_vendidos, quantidade_estoque)
            VALUES ('$nome', '$tipo', '$preco_compra', '$preco_venda', '$codigo_barras', '$quantidade_vendidos', '$quantidade_estoque')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>
