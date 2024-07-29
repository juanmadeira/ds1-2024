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
  <body>
    <p class="echo">
      <?php
        echo "Seja bem-vindo, ".$_SESSION['userdata']['nome'];
      ?>
    <p>  
  <header class="d-flex text-center col-md-3 flex-lg-column"> 
    <img src="/style/img.png" width="150" height="150"> 
    <form action="pesquisar" method="post">
      <input type="text" name="pesquisa" id="pesquisa" placeholder="Pesquisar livros">
      <button type="submit" id="pesquisabtn"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
  </header>
  <main class="d-flex text-center flex-lg-column">
    <div class="div">
      <h1>Livros</h1>
      <table class="table table-striped">
      <h2>Disponíveis para aluguel</h2>
      <tr>
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
            if ($key == 'id') echo ("
              <td><form action='/alugar' method='post'>
                <input type='hidden' name='livroid' value=".$value.">
                <input type='submit' value='Alugar' class='btn btn-primary btn-table'>
              </form></td>
            "); else echo "<td>".$value."</td>";
          }
          echo "</tr>";
        }
      ?>
    </table>

    <table class="table table-striped">
      <h1 class="mt-5">Alugados</h1>
      
      <?php
      if (count($_SESSION['alugueis']) > 0) {
        echo('<tr>
        <td>Autores</td>
        <td>Título</td>
        <td>Ano</td>
        <td>Editora</td>
        </tr>');
        foreach ($_SESSION['alugueis'] as $key => $value) {
          echo "<tr>";
          foreach ($_SESSION['alugueis'][$key] as $key => $value) {
            if ($key != 'id' && $key != 'disponivel') echo "<td>".$value."</td>";
          }
          echo "</tr>";
        }
      }else {
        echo'Nenhum aluguel encontrado em seu nome, '.$_SESSION['userdata']['nome'];
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