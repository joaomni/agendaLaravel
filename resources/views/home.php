<?php
    include('../app/Http/Controllers/config.php');

    if(isset($_GET['delete'])){

        $id = $_GET['delete'];

        $sql = "DELETE FROM tb_person WHERE cd_person = $id";

        $query = $connect->query($sql);

        if(!$query){
           echo $connect->error;
        }else{
            echo "<script> location.href = 'http://127.0.0.1:8000/home' </script>";
        }

    }
?>
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
        
        <style>
            button{
                border: none;
                background: none;
                color: #339AF0;
            }
            button:hover{
                color: black;
            }
            button:focus{
                background: none;
            }
        </style>

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col l12 m12 s12">
                    <form method="get">
                        <label for="nome">Pesquisar:</label>
                        <input name="pesq" type="search" placeholder="Nome ou Circulo Social..">
                    </form>
                </div>
            </div>
            <table class="centered highlight">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>Circulo Social</th>
                        <th>Data de Cadastro</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>

                <?php

                    if(isset($_GET['pesq'])){

                        $texto = $_GET['pesq'];

                        $sql = "SELECT * FROM tb_person WHERE nm_person LIKE '$texto%' OR nm_circulo_social LIKE '$texto%'";

                        $query = $connect->query($sql);
    
                        while ($dados = $query->fetch_object()):
                            $codigo = $dados->cd_person;
                            $nome = $dados->nm_person;
                            $telefone = $dados->nr_phone;
                            $email = $dados->ds_email;
                            $social = $dados->nm_circulo_social;
                            $data = $dados->dt_register;
                    
                ?>
    
                    <form method="GET">
                        <tr>
                            <td> <?php echo substr($nome, 0, 7); ?> </td>
                            <td> <?php echo $telefone; ?> </td>
                            <td> <?php echo $email; ?> </td>
                            <td> <?php echo $social; ?> </td>
                            <td style="font-size: 10px;"> <?php echo $data; ?> </td>
                            <td><button name="edit" type="submit"><i class="fas fa-edit"></i></button></td>
                            <td><button name="delete" value="<?php echo $codigo; ?>" type="submit"><i class="fas fa-trash-alt"></i></button></td>
                        </tr>
                    </form>
    
                <?php
                        endwhile;
                    }

                    else{
                        $sql = "SELECT * FROM tb_person ORDER BY cd_person";

                        $query = $connect->query($sql);

                        while ($dados = $query->fetch_object()):
                            $codigo = $dados->cd_person;
                            $nome = $dados->nm_person;
                            $telefone = $dados->nr_phone;
                            $email = $dados->ds_email;
                            $social = $dados->nm_circulo_social;
                            $data = $dados->dt_register;
                
                ?>

                    <form method="GET">
                        <tr>
                            <td> <?php echo substr($nome, 0, 7); ?> </td>
                            <td> <?php echo $telefone; ?> </td>
                            <td> <?php echo $email; ?> </td>
                            <td> <?php echo $social; ?> </td>
                            <td style="font-size: 10px;"> <?php echo $data; ?> </td>
                            <td><button name="edit" type="submit"><i class="fas fa-edit"></i></button></td>
                            <td><button name="delete" value="<?php echo $codigo; ?>" type="submit"><i class="fas fa-trash-alt"></i></button></td>
                        </tr>
                    </form>

                <?php
                        endwhile;
                    }
                ?>
                
                </tbody>
            </table>
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
