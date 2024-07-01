<?php
include 'config.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $tipo = $_POST["tipo"];
    $preco_compra = $_POST["preco_compra"];
    $preco_venda = $_POST["preco_venda"];
    $codigo_barras = $_POST["codigo_barras"];
    $quantidade_vendidos = $_POST["quantidade_vendidos"];
    $quantidade_estoque = $_POST["quantidade_estoque"];

    $sql = "UPDATE produtos SET nome='$nome', tipo='$tipo', preco_compra='$preco_compra', preco_venda='$preco_venda', 
            codigo_barras='$codigo_barras', quantidade_vendidos='$quantidade_vendidos', quantidade_estoque='$quantidade_estoque' 
            WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
} else {
    $sql = "SELECT * FROM produtos WHERE id='$id'";
    $result = $conn->query($sql);
    $produto = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Editar Produto</h1>
    <form action="update.php?id=<?php echo $id; ?>" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $produto['nome']; ?>" required>
        <label for="tipo">Tipo:</label>
        <select name="tipo" id="tipo" required>
            <option value="brinquedo" <?php if ($produto['tipo'] == 'brinquedo') echo 'selected'; ?>>Brinquedo</option>
            <option value="eletronico" <?php if ($produto['tipo'] == 'eletronico') echo 'selected'; ?>>Eletrônico</option>
            <option value="ferramenta" <?php if ($produto['tipo'] == 'ferramenta') echo 'selected'; ?>>Ferramenta</option>
            <option value="outros" <?php if ($produto['tipo'] == 'outros') echo 'selected'; ?>>Outros</option>
        </select>
        <label for="preco_compra">Preço de Compra:</label>
        <input type="number" step="0.01" name="preco_compra" id="preco_compra" value="<?php echo $produto['preco_compra']; ?>" required>
        <label for="preco_venda">Preço de Venda:</label>
        <input type="number" step="0.01" name="preco_venda" id="preco_venda" value="<?php echo $produto['preco_venda']; ?>" required>
        <label for="codigo_barras">Código de Barras:</label>
        <input type="text" name="codigo_barras" id="codigo_barras" value="<?php echo $produto['codigo_barras']; ?>" required>
        <label for="quantidade_vendidos">Quantidade Vendidos:</label>
        <input type="number" name="quantidade_vendidos" id="quantidade_vendidos" value="<?php echo $produto['quantidade_vendidos']; ?>" required>
        <label for="quantidade_estoque">Quantidade no Estoque:</label>
        <input type="number" name="quantidade_estoque" id="quantidade_estoque" value="<?php echo $produto['quantidade_estoque']; ?>" required>
        <button type="submit">Salvar</button>
        </form>
        <div class ='btns'>
            <a href="index.php">Voltar</a>
        </div>
</body>
</html>
