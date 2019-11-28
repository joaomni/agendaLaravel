<?php
    include('../app/Http/Controllers/config.php');

    if(isset($_GET['delete'])){

        $id = $_GET['delete'];

        $sql = "DELETE FROM tb_person WHERE cd_person = ".$id;

        $query = $connect->query($sql);

        if(!$query){
           echo $connect->error;
        }else{
            echo "<script> location.href = 'http://127.0.0.1:8000/home' </script>";
        }

    }

    if(isset($_GET['edit'])){

        $id = $_GET['edit'];
        $nome = $_GET['nome'];
        $email = $_GET['email'];
        $tel = $_GET['tel'];
        $social = $_GET['social'];

        $sql = "UPDATE tb_person SET nm_person = '$nome', nr_phone = '$tel', ds_email = '$email', nm_circulo_social = '$social' WHERE cd_person = ".$id;

        $query = $connect->query($sql);

        if(!$query){
           echo $connect->error;
        }else{
            echo "<script> location.href = 'http://127.0.0.1:8000/home' </script>";
        }

    }

    function verificarSocial($recebido, $option){
        $state = "";

        if($recebido == $option){
            $state = "selected";
        }

        return $state;
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
            body{
                background: #F1F1F1;
            }
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
            hr{
                border: 1px #A2A2A2 solid;
                border-radius: 50px;
                margin: 0;
                margin-top: 10px;
            }
            #box{
                border-radius: 10px;
                background: #FFFFFF;
                padding: 30px;
                margin-top: 10px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
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

                    <form id="box" method="GET">
                        <div class="field">
                            <label class="label">Nome:</label>
                            <div class="control">
                                <input class="input" name="nome" type="text" placeholder="Nome.." value="<?php echo $nome; ?>">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">E-mail:</label>
                            <div class="control">
                                <input class="input" name="email" type="email" placeholder="Email.." value="<?php echo $email; ?>">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Telefone:</label>
                            <div class="control">
                                <input class="input" type="tel" name="tel" placeholder="telefone" value="<?php echo $telefone; ?>">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Circulo Social</label>
                            <div class="control">
                                <div class="select">
                                <select name="social">
                                    <option <?php echo verificarSocial($social, 'Profissional'); ?>>Profissional</option>
                                    <option <?php echo verificarSocial($social, 'Acadêmico'); ?>>Acadêmico</option>
                                    <option <?php echo verificarSocial($social, 'Pessoal'); ?>>Pessoal</option>
                                    <option <?php echo verificarSocial($social, 'Estudante'); ?>>Estudante</option>
                                    <option <?php echo verificarSocial($social, 'Indefinido'); ?>>Indefinido</option>
                                </select>
                                </div>
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control">
                                <button type="submit" value="<?php echo $codigo; ?>" name="edit" class="button is-success">Salvar</button>
                            </div>
                            <div class="control">
                                <button type="submit" value="<?php echo $codigo; ?>" name="delete" class="button is-danger is-light">Excluir</button>
                            </div>
                        </div>
                    </form>

                    <hr></hr>
    
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

                    <form id="box" method="GET">
                        <div class="field">
                            <label class="label">Nome:</label>
                            <div class="control">
                                <input class="input" name="nome" type="text" placeholder="Nome.." value="<?php echo $nome; ?>">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">E-mail:</label>
                            <div class="control">
                                <input class="input" name="email" type="email" placeholder="Email.." value="<?php echo $email; ?>">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Telefone:</label>
                            <div class="control">
                                <input class="input" type="tel" name="tel" placeholder="telefone" value="<?php echo $telefone; ?>">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Circulo Social</label>
                            <div class="control">
                                <div class="select">
                                <select name="social">
                                    <option <?php echo verificarSocial($social, 'Profissional'); ?>>Profissional</option>
                                    <option <?php echo verificarSocial($social, 'Acadêmico'); ?>>Acadêmico</option>
                                    <option <?php echo verificarSocial($social, 'Pessoal'); ?>>Pessoal</option>
                                    <option <?php echo verificarSocial($social, 'Estudante'); ?>>Estudante</option>
                                    <option <?php echo verificarSocial($social, 'Indefinido'); ?>>Indefinido</option>
                                </select>
                                </div>
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control">
                                <button type="submit" value="<?php echo $codigo; ?>" name="edit" class="button is-success">Salvar</button>
                            </div>
                            <div class="control">
                                <button type="submit" value="<?php echo $codigo; ?>" name="delete" class="button is-danger is-light">Excluir</button>
                            </div>
                        </div>
                    </form>

                    <hr></hr>

                <?php
                        endwhile;
                    }
                ?>
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
