<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/style/img.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/style.css">
    <title>Cadastrar-se</title>
  </head>
  <body>
    <header class="d-flex text-center col-md-3 flex-lg-column"> 
      <img src="/style/img.png" width="150" height="150"> 
    </header>
    <main class="d-flex text-center flex-lg-column">
      <div class="div">
        <h1>Cadastrar-se</h1>

        <p class="flashdata">
        <?php
          if (session()->get('InsertFeito')){
              echo "<strong>". session()->getFlashdata('InsertFeito') . "</strong>";
          }
        ?>
        </p>

        <form action="cadastro" method="post" class="d-flex text-center flex-lg-column">
          <label for="nome" class="mt-3">Nome</label>
          <input type="text" name="nome" id="nome" class="form-control w-50 mt-1">

        <label for="email" class="mt-3">Email</label>
        <input type="email" name="email" id="email" class="form-control w-50 mt-1">

        <label for="senha" class="mt-3">Senha</label>
        <input type="password" name="senha" id="senha" class="form-control w-50 mt-1">

        <label for="confirmasenha" class="mt-3">Confirmar senha</label>
        <input type="password" name="confirmasenha" id="confirmasenha" class="form-control w-50 mt-1">

        <input type="submit" value="Confirmar" class="mt-5 btn btn-primary">
        </form>
        
        <form action="/" class="d-flex text-center col-md-3 flex-lg-column"><input type="submit" value="Voltar" class="mt-5 btn btn-primary"></form>
      </div>
    </main>
  </body>
</html>