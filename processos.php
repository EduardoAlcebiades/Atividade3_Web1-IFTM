<?php
$id = $_POST["id"];
$nome = $_POST["nome"];
$nascimento = $_POST["nascimento"];
$ano_curso = $_POST["ano_curso"];
$materia_preferida = $_POST["materia_preferida"];

$conexao = new mysqli("localhost", "root", "vertrigo", "crud");

if ($id == 0) {
    $sql = $conexao->prepare("INSERT INTO cadastro(nome, nascimento, ano_curso, materia_preferida) VALUES (?, ?, ?, ?)");
    $sql->bind_param("ssss", $nome, $nascimento, $ano_curso, $materia_preferida);
} else {
    $sql = $conexao->prepare("UPDATE cadastro SET nome = ?, nascimento = ?, ano_curso = ?, materia_preferida = ? WHERE id = ? ");
    $sql->bind_param("ssssi", $nome, $nascimento, $ano_curso, $materia_preferida, $id);
}

$sql->execute();

mysqli_close($conexao);

header("location: index.php");
