<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Estoque de Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Lista de Produtos</h1>
    <div class ='btns'>
        <a href="create.php">Adicionar Produto</a>
    </div>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Preço de Compra</th>
            <th>Preço de Venda</th>
            <th>Código de Barras</th>
            <th>Quantidade Vendidos</th>
            <th>Quantidade no Estoque</th>
            <th>Ações</th>
        </tr>
        <?php
        include 'config.php';
        $sql = "SELECT * FROM produtos";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo $row['tipo']; ?></td>
            <td><?php echo $row['preco_compra']; ?></td>
            <td><?php echo $row['preco_venda']; ?></td>
            <td><?php echo $row['codigo_barras']; ?></td>
            <td><?php echo $row['quantidade_vendidos']; ?></td>
            <td><?php echo $row['quantidade_estoque']; ?></td>
            <td>
                <a href="update.php?id=<?php echo $row['id']; ?>">Editar</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>">Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
