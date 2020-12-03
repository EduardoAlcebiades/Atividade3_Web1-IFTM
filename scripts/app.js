var alunos = [];

$(document).ready(() => {
  $("#filtrar").keyup((ev) => filtrar(ev));

  alunos = $(".aluno");
});

function validar() {
  const nome = $("#nome")[0].value;
  const nascimento = $("#nascimento")[0].value;
  const ano_curso = $("#ano_curso")[0].value;
  const materia_preferida = $("#materia_preferida")[0].value;

  if (!nome) {
    alert("O nome é obrigatório");

    return false;
  }

  if (!nascimento) {
    alert("A data de nascimento é obrigatória");

    return false;
  }

  if (!ano_curso) {
    alert("O ano que cursa é obrigatório");

    return false;
  }

  if (!materia_preferida) {
    alert("A matéria preferida é obrigatório");

    return false;
  }

  return true;
}

function filtrar(ev) {
  const valor = ev.target.value.trim().toLowerCase();

  if (!valor) {
    for (var i = 0; i < alunos.length; i++) {
      alunos[i].hidden = false;
    }

    return;
  }

  for (var i = 0; i < alunos.length; i++) {
    const childrens = alunos[i].children;
    let hidden = true;

    for (var j = 0; j < 4; j++) {
      const value = childrens[j].innerHTML;

      if (value.toLowerCase().trim().indexOf(valor) > -1) {
        hidden = false;

        break;
      }
    }

    alunos[i].hidden = hidden;
  }
}
