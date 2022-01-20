<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$bd = "bdproj2";

$con = mysqli_connect($servidor,$usuario,$senha,$bd);

if(!$con){
    echo "não conectou ao bd";
}

