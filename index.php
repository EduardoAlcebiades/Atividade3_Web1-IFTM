<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="scripts/app.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
  <link rel="stylesheet" href="styles/custom.css" />

  <title>CRUD</title>
</head>

<?php
$conexao = new mysqli("localhost", "root", "vertrigo", "crud");

if (isset($_GET["id"])) {
  $id = $_GET["id"];

  $sql = $conexao->query("SELECT * FROM cadastro WHERE id = " . $id);
  $linha = $sql->fetch_assoc();

  $nome = $linha["nome"];
  $nascimento = $linha["nascimento"];
  $ano_curso = $linha["ano_curso"];
  $materia_preferida = $linha["materia_preferida"];
} else {
  $id = 0;
  $nome = "";
  $nascimento = "";
  $ano_curso = "";
  $materia_preferida = "";
}
?>

<body>
  <div class="container">
    <form action="processos.php" method="POST">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input class="form-control" id="nome" type="text" name="nome" value="<?= $nome ?>" />
      </div>
      <div class="form-group">
        <label for="nascimento">Data de nascimento:</label>
        <input class="form-control" id="nascimento" type="date" name="nascimento" value="<?= $nascimento ?>" />
      </div>
      <div class="form-group">
        <label for="ano_curso">Ano que cursa:</label>
        <input class="form-control" id="ano_curso" type="number" name="ano_curso" value="<?= $ano_curso ?>" />
      </div>
      <div class="form-group">
        <label for="materia_preferida">Matéria preferida:</label>
        <input class="form-control" id="materia_preferida" type="text" name="materia_preferida" value="<?= $materia_preferida ?>" />
      </div>
      <div class="buttons-container">
        <input id="id" type="hidden" name="id" value="<?= $id ?>">
        <div>
          <button type="reset" class="btn btn-primary">Limpar</button>
          <button type="submit" class="btn btn-success" onclick="return validar()">Salvar</button>
        </div>
        <a href="index.php">Novo</a>
      </div>
    </form>

    <section>
      <div class="form-group">
        <label for="filtrar">Filtrar</label>
        <input id="filtrar" class="form-control" type="text" name="filtrar">
      </div>

      <table>
        <thead>
          <tr>
            <td>Nome</td>
            <td>Data de nascimento</td>
            <td>Ano que cursa</td>
            <td>Matéria preferida</td>
            <td>Editar</td>
            <td>Excluir</td>
          </tr>
        </thead>
        <tbody>
          <?php
          $conexao = new mysqli("localhost", "root", "vertrigo", "crud");
          $tabela = $conexao->query("SELECT * FROM cadastro");

          $cont = 0;

          while ($linha = $tabela->fetch_assoc()) {
          ?>
            <tr class="aluno">
              <td><?= $linha["nome"]; ?></td>
              <td><?= $linha["nascimento"]; ?></td>
              <td><?= $linha["ano_curso"]; ?></td>
              <td><?= $linha["materia_preferida"]; ?></td>
              <td>
                <a href="index.php?id=<?= $linha["id"]; ?>">
                  Editar
                </a>
              </td>
              <td>
                <a href="excluir.php?id=<?= $linha["id"]; ?>" onclick="return confirm('Tem certeza que deseja excluir?')" class="danger">
                  Excluir
                </a>
              </td>
            </tr>

          <?php

            $cont += $cont;
          }

          mysqli_close($conexao);
          ?>
        </tbody>
      </table>
    </section>
  </div>
</body>

</html>