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

<html>
<meta charset="utf-8">
<head>
<title>Portal de Noticias </title>
</head>
<body>
<div id="pesquisa">
<h1><center> Portal de Noticias </center></h1>

<!-------- filtro de pesquisa REGIAO ----------->

<h2>Pesquisar: </h2>
<form name="form_regiao" method="post" action="portal_noticias.php">
<b>Regiao: </b><select name="codregiao" id="codregiao">
<option value=0 selected="selected">Regiao ...</option>
<?php
if(mysql_num_rows($pesquisar_regiao) == 0)
{
   echo '<h1>Sua busca por regiao não retornou resultados ... </h1>';
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
<input type="submit" name="pesq_regiao" id="pesq_regiao" value="Pesquisar">

<b>Categorias: </b><select name="codcategoria" id="codcategoria">
<option value=0 selected="selected">Categoria ...</option>
<?php
if(mysql_num_rows($pesquisar_categorias) == 0)
{
   echo '<h1>Sua busca por categorias não retornou resultados ... </h1>';
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
<input type="submit" name="pesq_categoria" id="pesq_categoria" value="Pesquisar">

<b>Colunista: </b><select name="codcolunista" id="codcolunista">
<option value=0 selected="selected">Colunista ...</option>
<?php
if(mysql_num_rows($pesquisar_colunistas) == 0)
{
   echo '<h1>Sua busca por colunistas não retornou resultados ... </h1>';
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
<input type="submit" name="pesq_colunista" id="pesq_colunista" value="Pesquisar">
</form>
<hr>
<div id="resultados">
<!-------- Mostrar o resultado da pesquisa ----------->
<?php

    if ($vazio == 0)
    {
     $sql_materias = "select fotochamada, data, hora, chamada
                      from materias
                      ORDER BY codigo LIMIT 4";

     $seleciona_materias = mysql_query($sql_materias);
     ?>
     <table border=0>
     <tr>
     <th><b>Noticias em Destaque: </b></th>
     </tr>
     <?php
     echo '<tr>';
 	 while($res = mysql_fetch_array($seleciona_materias))
			{
              echo '<td><a href="materiacompleta.php">'.utf8_encode('<img src="'.$res['fotochamada'].'"  height="150" width="250" />').'</a><br>';
              echo $res['data'].' - '. $res['hora'].'<br>';
              echo utf8_encode($res['chamada']).'</td>';
			}
     echo '</tr>';
    }
    else
    {
  	 echo "<b>Noticias pesquisadas: </b>"."<br><br>";
  	 echo '<tr>';
 	 while($res = mysql_fetch_array($seleciona_materias))
			{
              echo '<td><a href="materiacompleta.php">'.utf8_encode('<img src="'.$res['fotochamada'].'"  height="150" width="250" />').'</a><br>';
              echo $res['data'].' - '. $res['hora'].'<br>'.utf8_encode($res['chamada']).'<br></td>';
			}
     echo '</tr>';
    }
?>



</div>
</body>
</html>
