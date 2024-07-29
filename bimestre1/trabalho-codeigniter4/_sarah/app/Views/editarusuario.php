<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/style/img.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/style.css">
    <title>Editar usuário</title>
  </head>
  <body>
    <header class="d-flex text-center col-md-3 flex-lg-column"> 
      <img src="/style/img.png" width="150" height="150"> 
    </header>
    <main class="d-flex text-center flex-lg-column">
      <div class="div">
        <h1>Editar Usuário</h1>

        <p class="flashdata">
        <?php
          if (session()->get('InsertFeito')){
              echo "<strong>". session()->getFlashdata('InsertFeito') . "</strong>";
          }
        ?>
        </p>

        <form action="/editarusuario" method="post" class="d-flex text-center flex-lg-column">
          <?php
          echo("<label for='nome' class='mt-3'>Nome</label>
          <input type='text' name='nome' id='nome' class='form-control w-50 mt-1' value='".$usuario['nome']."'>

          <label for='email' class='mt-3'>Email</label>
          <input type='email' name='email' id='email' class='form-control w-50 mt-1' value='".$usuario['email']."'>");


          if ($usuario['adm']) echo("<label for='adm' class='mt-3'>Administrador</label>
          <input type='checkbox' name='adm' id='adm' class='w-10 h-10 mt-1' checked>");
          else echo("<label for='adm' class='mt-3'>Administrador</label>
          <input type='checkbox' name='adm' id='adm' class='w-10 h-10 mt-1' >");
          

          echo("<input type='hidden' name='usuarioid' value=".$usuario['id'].">

          <input type='submit' value='Confirmar' class='mt-5 btn btn-primary'>");
          ?>
        </form>

        <form action="/home" method="get" class="d-flex text-center col-md-3 flex-lg-column"><input type="submit" class="mt-5 btn btn-primary" value="Voltar"></form>
      </div>
    </main>
  </body>
</html>