<?php
header("Content-type: text/html; charset=utf-8");
include "conexao.php";

$target_dir="uploads/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$uploadOk=1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$nome=$_POST["produto"];
$nome=$_POST["preco"];

if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check!=false){
        echo "<br>é uma Imagem - ".$check["mime"];
        $uploadOk=1;
    } else {
        echo "<br>não é uma Imagem - ".$check["mime"];
        $uploadOk=0;
    }
}

if (file_exists($target_file)) {
    echo "<br>Arquivo já existe.";
    $uploadOk = 0;
}


if ($_FILES["fileToUpload"]["size"] >25000000) {
    echo "<br>Arquivo muito grande";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType!="jfif" ) {
    echo "<br>Sorry, apenas JPG, JPEG, PNG e GIF são permitidos.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "<br>Desculpe, Arquivo não upado.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<br>O arquivo <b>". basename( $_FILES["fileToUpload"]["name"]). "</b> foi transferido.";
$sql = "insert into tblprodutos (produto,preco,foto) values ('$produto','$preco','$target_file')";
$qry= mysqli_query($con,$sql);
    } else {
        echo "Desculpe, alg deu errado na transferência do arquivo.";
    }
}