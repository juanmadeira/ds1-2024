<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('style/style.css');?>">
        <title>Formulário</title>
    </head>
    <body>
        <form class="row g-3">
            <div class="col-md-6">
                <label for="inputArist" class="form-label">Artista</label>
                <input type="artist" class="form-control" id="inputArtist" placeholder="Lupe de Lupe">
            </div>
            <div class="col-md-6">
                <label for="inputAlbum" class="form-label">Álbum</label>
                <input type="album" class="form-control" id="inputAlbum" placeholder="Quarup">
            </div>
            <div class="col-12">
                <label for="inputAlbumArtist" class="form-label">Artista do Álbum</label>
                <input type="text" class="form-control" id="inputAlbumArist" placeholder="Lupe de Lupe">
            </div>
            <div class="col-12">
                <label for="inputTrack" class="form-label">Faixa</label>
                <input type="text" class="form-control" id="inputTrack" placeholder="Eu Já Venci">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </body>
</html>