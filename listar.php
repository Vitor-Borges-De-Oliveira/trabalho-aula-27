<?php 

include('conexao.php');

$sql = "select * from tblprodutos";
$qry = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    
<?php
include "menunav.php";
?>
<hr>

<div class="container">
    <table class="table table-primary">
        <tr>     
            <td>produto</td>
            <td>preço</td>
            <td>foto</td>
        </tr> 
        <?php while($linha=mysqli_fetch_assoc($qry)) { ?>
        <tr>     
            <td><?php $linha["produto"]; ?></td>
            <td><?php $linha["preco"]; ?></td>
            <td><img src="<?php $linha['foto']; ?>" width="160px" height="130px" alt=""></td>
        </tr>
        <?php } ?>
    </table>
</div>






<?php
include "rodape.php"
?>