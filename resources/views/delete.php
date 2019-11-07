<?php
    include('conexao.php');

    $codigo = $_GET['codigo'];

    $sql = "DELETE FROM tb_contato WHERE cd_contato = '".$codigo."'";
    $query = $mysqli->query($sql);
    header("location:index.php");
?>