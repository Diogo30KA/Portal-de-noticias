<?php
$conectar = mysql_connect('localhost','root','');
$banco    = mysql_select_db('portal');

 //--- pesquisar regiao para select -------

$sql_regiao      = "SELECT codigo, nome FROM regiao ";
$pesquisar_regiao = mysql_query($sql_regiao);

 //--- pesquisar categorias para select -------

$sql_categorias       = "SELECT codigo, nome FROM categorias ";
$pesquisar_categorias = mysql_query($sql_categorias);

 //--- pesquisar colunistas para select -------

$sql_colunistas       = "SELECT codigo, nome FROM colunistas ";
$pesquisar_colunistas = mysql_query($sql_colunistas);

//---------------------------------------------------------------------------------------


if(!empty($_POST['pesq_regiao']))
{
    $regiao  = (empty($_POST['codregiao']))? 'null' : $_POST['codregiao'];

    if ($regiao <> '')
    {
     $sql_materias = "SELECT materias.fotochamada, materias.data, materias.hora, materias.chamada
                      FROM materias
                      WHERE materias.codregiao ='$regiao'";
     
     $seleciona_materias = mysql_query($sql_materias);
     $vazio = 1;
     }
}

if(!empty($_POST['pesq_categoria']))
{
    $categoria  = (empty($_POST['codcategoria']))? 'null' : $_POST['codcategoria'];

    if ($categoria <> '')
    {
     $sql_materias = "SELECT materias.fotochamada, materias.data, materias.hora, materias.chamada
                      FROM materias
                      WHERE materias.codcategoria ='$categoria'";

     $seleciona_materias = mysql_query($sql_materias);
     $vazio = 1;
     }
}

if(!empty($_POST['pesq_colunista']))
{
    $colunista  = (empty($_POST['codcolunista']))? 'null' : $_POST['codcolunista'];

    if ($colunista <> '')
    {
     $sql_materias = "SELECT materias.fotochamada, materias.data, materias.hora, materias.chamada
                      FROM materias
                      WHERE materias.codcolunista ='$colunista'";

     $seleciona_materias = mysql_query($sql_materias);
     $vazio = 1;
     }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Portal</title>
</head>
<body>
    <div id="superiorPortal">
        <div class="dropdown">
            <button class="dropbtn">Pesquisa...</button>
            <div class="dropdown-content">
                <!-- <a href="#">Política</a>
                <a href="#">Economia</a>
                <a href="#">Educação</a> -->
                <form name="form_regiao" method="post" action="portal_noticias.php">
                <br>
                <b>Regiao: </b><select name="codregiao" id="codregiao">
                <option value=0 selected="selected">Regiao ...</option>
                <?php
                if(mysql_num_rows($pesquisar_regiao) == 0)
                {
                echo '<h1>Sua busca por regiao n�o retornou resultados ... </h1>';
                }
                else
                {
                while($resultado = mysql_fetch_array($pesquisar_regiao))
                {
                    echo '<option value="'.$resultado['codigo'].'">'.
                                utf8_encode($resultado['nome']).'</option>';
                }
                }
                ?>
                </select>
                <br>
                <input type="submit" name="pesq_regiao" id="pesq_regiao" value="Pesquisar">
                <br><br>
                <b>Categorias: </b><select name="codcategoria" id="codcategoria">
                <option value=0 selected="selected">Categoria ...</option>
                <?php
                if(mysql_num_rows($pesquisar_categorias) == 0)
                {
                echo '<h1>Sua busca por categorias n�o retornou resultados ... </h1>';
                }
                else
                {
                while($resultado = mysql_fetch_array($pesquisar_categorias))
                {
                    echo '<option value="'.$resultado['codigo'].'">'.
                                utf8_encode($resultado['nome']).'</option>';
                }
                }
                ?>
                </select>
                <br>
                <input type="submit" name="pesq_categoria" id="pesq_categoria" value="Pesquisar">
                <br><br>
                <b>Colunista: </b><select name="codcolunista" id="codcolunista">
                <option value=0 selected="selected">Colunista ...</option>
                <?php
                if(mysql_num_rows($pesquisar_colunistas) == 0)
                {
                echo '<h1>Sua busca por colunistas n�o retornou resultados ... </h1>';
                }
                else
                {
                while($resultado = mysql_fetch_array($pesquisar_colunistas))
                {
                    echo '<option value="'.$resultado['codigo'].'">'.
                                utf8_encode($resultado['nome']).'</option>';
                }
                }
                ?>
                </select>
                <br>
                <input type="submit" name="pesq_colunista" id="pesq_colunista" value="Pesquisar">
                
</form>
            </div>
        </div>
        <img src="logo1.png" width=180 height=100>
    </div>
</body>
</html>