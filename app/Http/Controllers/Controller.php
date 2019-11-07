<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    function registerPerson(){

        include('config.php');

        $nome = $_GET['nome'];
        $email = $_GET['email'];
        $telefone = $_GET['telefone'];
        $social = $_GET['social'];
        $data = date("Y-m-d H:i:s");

        $sql = "INSERT INTO tb_person VALUES (null, '$nome', '$telefone', '$email', '$social', '$data')";

        $query = $connect->query($sql);

        if(!$query){
           return $connect->error;
        }else{
            return "<script> location.href = 'http://127.0.0.1:8000/home' </script>";
        }

    }
}
