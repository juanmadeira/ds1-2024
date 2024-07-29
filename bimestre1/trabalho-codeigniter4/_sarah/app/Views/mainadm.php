<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/style/img.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet"></link>
    <link rel="stylesheet" href="/style/style.css">
    <title>Home</title>
  </head>
  <body >
    <p class="echo">
      <?php
        if ($_SESSION['userdata']['nome'] == 'Megatron') echo "SEJA BEM-VINDO, LORDE MEGATRON";
        else echo "Seja bem-vindo, ".$_SESSION['userdata']['nome'];
      ?>
    </p>  
    <header class="d-flex text-center col-md-3 flex-lg-column"> 
      <img src="/style/img.png" width="150" height="150"> 
      <form action="pesquisar" method="post">
            <input type="text" name="pesquisa" id="pesquisa" placeholder="Pesquisar livros">
            <button type="submit" class='btn btn-secondary'><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
    </header>
    <main class="d-flex text-center flex-lg-column">
      <div class="div">
        <h1>Livros</h1>
        <table class="table table-striped">
        <tr>
          <td></td>
          <td></td>
          <td>Autores</td>
          <td>Título</td>
          <td><form action="sort" method='post'><input type="submit" value="Ano" class='btn btn-primary btn-table'></form></td>
          <td>Editora</td>
          <td>Cópias disponíveis</td>
        </tr>
          <?php
            foreach ($_SESSION['livros'] as $key => $value) {
              echo "<tr>";
              foreach ($_SESSION['livros'][$key] as $key => $value) {
                if ($key == 'id') {
                  echo 
                    ("<td ><form action='/editarlivro' method='get'>
                      <input type='hidden' name='livroid' value=".$value.">
                      <input type='submit' value='Editar' class='btn btn-primary btn-table'>
                    </form></td>");
                  echo 
                    ("<td ><form action='/removerlivro' method='post'>
                      <input type='hidden' name='livroid' value=".$value.">
                      <input type='submit' value='Remover' class='btn btn-primary btn-table'>
                    </form></td>");
                } else echo "<td>".$value."</td>";
              }
              echo "</tr>";
            }
          ?>
        </table>
        <form action="cadastrarlivro" method="get" class="d-flex">
          <input type="submit" value="Cadastrar livro" class="btn btn-primary btn-UI">
        </form>

        <h1 class='mt-5'>Usuários</h1>
          <table class="table table-striped">
          <tr>
            <td></td>
            <td></td>
            <td>Nome</td>
            <td>Email</td>
            <td>Adm</td>
          </tr>
          <?php
            foreach ($_SESSION['usuarios'] as $key => $value) {
              echo "<tr>";
              foreach ($_SESSION['usuarios'][$key] as $key => $value) {
                if ($key == 'id') {
                  echo 
                    ("<td><form action='/editarusuario' method='get'>
                      <input type='hidden' name='usuarioid' value=".$value.">
                      <input type='submit' value='Editar' class='btn btn-primary btn-table'>
                    </form></td>");
                  echo 
                    ("<td><form action='/removerusuario' method='post'>
                      <input type='hidden' name='usuarioid' value=".$value.">
                      <input type='submit' value='Remover' class='btn btn-primary btn-table'>
                    </form></td>");
                }
                if ($key != 'id' && $key != 'senha') echo "<td>".$value."</td>";
              }
              echo "</tr>";
            }
          ?>
        </table>
        <form action="/" method="get" class="d-flex">
          <input type="submit" value="Sair" class="mt-5 btn btn-primary btn-UI">
      </form>    
      </div>
    </main>
  </body>
</html>