<?php
include 'config.php';

$id = $_GET['id'];

$sql = "DELETE FROM produtos WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}
?>
