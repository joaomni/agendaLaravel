<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel - Agenda</title>

        <!-- Bulma e estilo.css -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
        <link rel="stylesheet" href="../../public/css/estilo.css">

        <!-- Importa Google Icon Font e materialize.css -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Materialize - Para o navegador saber que o site é optimizado para dispositivos móveis -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col l12 m12 s12" id="teste">
                    <h1 class="title is-3">Agenda</h1>
                </div>
            </div>
            <div class="row">
                <div class="col l12 m12 s12">
                    <label for="nome">Nome:</label>
                    <input type="text">
                </div>
            </div>
            <div class="row">
                <div class="col l12 m12 s12">
                    <label for="telefone">Telefone:</label>
                    <input type="number">
                </div>
            </div>
            <div class="row">
                <div class="col l12 m12 s12">
                    <label for="e-mail">E-mail:</label>
                    <input type="email">
                </div>
            </div>
            <div class="row">
                <div class="col l12 m12 s12">
                    <label for="e-mail">Circulo social:</label>
                </div>
                <div class="col l12 m12 s12">
                    <div class="select">
                        <select>
                            <option>Profissional</option>
                            <option>Acadêmico</option>
                            <option>Pessoal</option>
                            <option selected>Indefinido</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col l12 m12 s12">
                    <button onclick="location.href='home'" class="button is-success is-light is-fullwidth">Cadastrar</button>
                </div>
            </div>
        </div>

        <!-- JavaScript no fim da body para optimizar o carregamento - Jquery e Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/comandos.js"></script>

        <!-- Materialize -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

        <!-- Font Awesome -->
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    </body>
</html>
