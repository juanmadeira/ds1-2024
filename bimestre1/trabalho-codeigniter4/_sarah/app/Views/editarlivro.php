<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/style/img.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/style.css">
    <title>Editar livro</title>
  </head>
  <body>
    <header class="d-flex text-center col-md-3 flex-lg-column"> 
      <img src="/style/img.png" width="150" height="150"> 
    </header>
    <main class="d-flex text-center flex-lg-column">
      <div class="div">
        <h1>Editar Livro</h1>

        <p class="flashdata">
        <?php
          if (session()->get('InsertFeito')){
              echo "<strong>". session()->getFlashdata('InsertFeito') . "</strong>";
          }
        ?>
        </p>

        <form action="/editarlivro" method="post" class="d-flex text-center flex-lg-column">
          <?php
          echo("<label for='autores' class='mt-3'>Autores</label>
          <input type='text' name='autores' id='autores' class='form-control w-50 mt-1' value='".$livro['autores']."'>

          <label for='titulo' class='mt-3'>Título</label>
          <input type='text' name='titulo' id='titulo' class='form-control w-50 mt-1' value='".$livro['titulo']."'>

          <label for='ano' class='mt-3'>Ano</label>
          <input type='number' name='ano' id='ano' class='form-control w-50 mt-1' value='".$livro['ano']."'>

          <label for='editora' class='mt-3'>Editora</label>
          <input type='text' name='editora' id='editora' class='form-control w-50 mt-1' value='".$livro['autores']."'>

          <label for='disponivel' class='mt-3'>Cópias disponíveis</label>
          <input type='number' name='disponivel' id='disponivel' class='form-control w-50 mt-1' value='".$livro['disponivel']."'>

          <input type='hidden' name='livroid' value=".$livro['id'].">

          <input type='submit' value='Confirmar' class='mt-5 btn btn-primary'>");
          ?>
        </form>

        <form action="/home" method="get" class="d-flex text-center col-md-3 flex-lg-column"><input type="submit" class="mt-5 btn btn-primary" value="Voltar"></form>
      </div>
    </main>      
  </body>
</html>