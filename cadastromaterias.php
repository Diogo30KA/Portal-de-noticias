<?php
//conectar ao servidor e ao banco de dados
$conectar = mysql_connect("localhost","root","");
//conectar ao banco (sql)
$banco = mysql_select_db("portal");

//pesquisar para select

$sql_regiao       = "SELECT * FROM regiao";
$pesquisar_regiao = mysql_query($sql_regiao);

$sql_categorias       = "SELECT * FROM categorias";
$pesquisar_categorias = mysql_query($sql_categorias);

$sql_colunistas       = "SELECT * FROM colunistas";
$pesquisar_colunistas = mysql_query($sql_colunistas);

//se escolher opção GRAVAR
if(isset($_POST["gravar"]))
{
    //receber as variavies do html
    $codigo = $_POST["codigo"];
    $data = $_POST["data"];
    $hora = $_POST["hora"];
    $codregiao = $_POST["codregiao"];
    $codcategoria = $_POST["codcategoria"];
    $codcolunista = $_POST["codcolunista"];
    $chamada = $_POST["chamada"];
    $resumo = $_POST["resumo"];
    $materia = $_POST["materia"];
    $fotochamada = $_FILES["fotochamada"];
    $foto1 = $_FILES["foto1"];
    $foto2 = $_FILES["foto2"];

    $error = 0;

    if (!empty($fotochamada['name']))
   {
           // pode definir Largura maxima em pixels
           $largura = 1000;
           // pode definir Altura maxima em pixels
           $altura = 1030;
           // pode definir Tamanho maximo do arquivo em bytes
           $tamanho = 2000000;
   
           // Verifica se o arquivo anexado nao e uma imagem (extensoes)
           if(!preg_match("/^image\/(jpg|jpeg|png|gif|bmp)$/",$fotochamada['type'])){
               $error[1] = "NAO � uma imagem...";
               }
   
           // capturar as dimensoes da imagem
           $dimensoes = getimagesize($fotochamada['tmp_name']);
   
   
           // Verifica se a largura da imagem maior que a largura permitida
           if($dimensoes[0] > $largura) {
               $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
           }
   
           // Verifica se a altura da imagem  maior que a altura permitida
           if($dimensoes[1] > $altura) {
               $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
           }
   
           // Verifica se o tamanho da imagem maior que o tamanho permitido
           if($foto1['size'] > $tamanho) {
                   $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
           }
   
   
           // Se nao houver nenhum erro na foto anexada
           if ($error == 0)
           {
               // Pega extensao da imagem
               preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i",$fotochamada['name'],$ext);
   
               // Gera um nome unico para a imagem
               $nome_fotochamada = md5(uniqid(time())).".".$ext[1];
   
               // Caminho de onde armazena a imagem (pasta criada para fotos)
               $caminho_fotochamada = "fotos/".$nome_fotochamada;
   
               // Faz o upload da imagem para seu respectivo caminho (pasta criada para fotos)
               move_uploaded_file($fotochamada['tmp_name'],$caminho_fotochamada );
           }

    }

    // Se a foto estiver sido selecionada
if (!empty($foto1['name']))
   {
		// pode definir Largura maxima em pixels
		$largura = 1000;
		// pode definir Altura maxima em pixels
		$altura = 1030;
		// pode definir Tamanho maximo do arquivo em bytes
		$tamanho = 2000000;

    	// Verifica se o arquivo anexado nao e uma imagem (extensoes)
    	if(!preg_match("/^image\/(jpg|jpeg|png|gif|bmp)$/",$foto1['type'])){
     	   $error[1] = "NAO � uma imagem...";
   	 	}

		// capturar as dimensoes da imagem
		$dimensoes = getimagesize($foto1['tmp_name']);


		// Verifica se a largura da imagem maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}

		// Verifica se a altura da imagem  maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}

		// Verifica se o tamanho da imagem maior que o tamanho permitido
		if($foto1['size'] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}


		// Se nao houver nenhum erro na foto anexada
		if ($error == 0)
        {
			// Pega extensao da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i",$foto1['name'],$ext);

        	// Gera um nome unico para a imagem
        	$nome_imagem1 = md5(uniqid(time())).".".$ext[1];

        	// Caminho de onde armazena a imagem (pasta criada para fotos)
        	$caminho_imagem1 = "fotos/".$nome_imagem1;

			// Faz o upload da imagem para seu respectivo caminho (pasta criada para fotos)
			move_uploaded_file($foto1['tmp_name'],$caminho_imagem1);
        }
      
   }

   if (!empty($foto2['name']))
   {
           // pode definir Largura maxima em pixels
           $largura = 1000;
           // pode definir Altura maxima em pixels
           $altura = 1030;
           // pode definir Tamanho maximo do arquivo em bytes
           $tamanho = 2000000;
   
           // Verifica se o arquivo anexado nao e uma imagem (extensoes)
           if(!preg_match("/^image\/(jpg|jpeg|png|gif|bmp)$/",$foto2['type'])){
               $error[1] = "NAO � uma imagem...";
               }
   
           // capturar as dimensoes da imagem
           $dimensoes = getimagesize($foto2['tmp_name']);
   
   
           // Verifica se a largura da imagem maior que a largura permitida
           if($dimensoes[0] > $largura) {
               $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
           }
   
           // Verifica se a altura da imagem  maior que a altura permitida
           if($dimensoes[1] > $altura) {
               $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
           }
   
           // Verifica se o tamanho da imagem maior que o tamanho permitido
           if($foto1['size'] > $tamanho) {
                   $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
           }
   
   
           // Se nao houver nenhum erro na foto anexada
           if ($error == 0)
           {
               // Pega extensao da imagem
               preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i",$foto2['name'],$ext);
   
               // Gera um nome unico para a imagem
               $nome_imagem2 = md5(uniqid(time())).".".$ext[1];
   
               // Caminho de onde armazena a imagem (pasta criada para fotos)
               $caminho_imagem2 = "fotos/".$nome_imagem2;
   
               // Faz o upload da imagem para seu respectivo caminho (pasta criada para fotos)
               move_uploaded_file($foto2['tmp_name'],$caminho_imagem2);
           }

    }

    //comandoMYSQL para gravar banco
    $sql = "insert into materias (codigo,data,hora,codregiao,codcategoria,codcolunista,chamada,resumo,materia,fotochamada,foto1,foto2) 
            values ('$codigo','$data','$hora','$codregiao','$codcategoria','$codcolunista','$chamada','$resumo','$materia','$caminho_fotochamada','$caminho_imagem1','$caminho_imagem2')";

    //executar o comando sql no banco dados
    $resultado = mysql_query($sql);

    //verificar se gravou (sem erros)
    if ($resultado)
    {
        echo "Dados gravados com sucesso!";
    }
    else
    {
        echo "ERRO ao gravar!";
    }

}

//se escolher opção ALTERAR
if(isset($_POST["alterar"]))
{
    $codigo = $_POST["codigo"];
    $data = $_POST["data"];
    $hora = $_POST["hora"];
    $codregiao = $_POST["codregiao"];
    $codcategoria = $_POST["codcategoria"];
    $codcolunista = $_POST["codcolunista"];
    $chamada = $_POST["chamada"];
    $resumo = $_POST["resumo"];
    $materia = $_POST["materia"];
    $fotochamada = $_POST["fotochamada"];
    $foto1 = $_POST["foto1"];
    $foto2 = $_POST["foto2"];

    $sql = "update materias set chamada = '$chamada', resumo = '$resumo', materia = '$materia', fotochamada = '$fotochamada', foto1 = '$foto1', foto2 = '$foto2'
            where codigo = '$codigo'";

    $resultado = mysql_query($sql);

    if ($resultado)
    {
        echo "Dados alterados com sucesso!";
    }
    else
    {
        echo "ERRO ao alterar dados!";
    }
}

//se escolher opção EXCLUIR
if(isset($_POST["excluir"]))
{
    $codigo = $_POST["codigo"];
    $data = $_POST["data"];
    $hora = $_POST["hora"];
    $codregiao = $_POST["codregiao"];
    $codcategoria = $_POST["codcategoria"];
    $codcolunista = $_POST["codcolunista"];
    $chamada = $_POST["chamada"];
    $resumo = $_POST["resumo"];
    $materia = $_POST["materia"];
    $fotochamada = $_POST["fotochamada"];
    $foto1 = $_POST["foto1"];
    $foto2 = $_POST["foto2"];

    $sql = "delete from materias
            where codigo = '$codigo'";

    $resultado = mysql_query($sql);

    if ($resultado)
    {
        echo "Dados excluídos com sucesso!";
    }
    else
    {
        echo "ERRO ao excluir dados!";
    }
}

//se escolher opção PESQUISAR
if(isset($_POST["pesquisar"]))
{
    $sql = "select * from materias";
    $resultado = mysql_query($sql);

    //verifica o resultado da pesquisa (0 ou 1)
    if (mysql_num_rows($resultado) == 0)
    {
        echo "Sua pesquisa não retornou resultados... ";
    }
    else
    {
        echo "Resultado da Pesquisa das materias: "."<br>";
        //mostrar na tela os valores encontrados
        while($materias = mysql_fetch_array($resultado))
        {
            echo "Codigo: ".$materias['codigo']."<br>".
                 "Data: ".$materias['data']."<br>".
                 "Hora: ".$materias['hora']."<br>".
                 "Codregiao: ".$materias['codregiao']."<br>".
                 "Cod Categoria: ".$materias['codcategoria']."<br>".
                 "Cod Colunista: ".$materias['codcolunista']."<br>".
                 "Chamada: ".$materias['chamada']."<br>".
                 "Resumo: ".$materias['resumo']."<br>".
                 "Materia: ".$materias['materia']."<br>".
                 "Foto Chamada: ".$materias['fotochamada']."<br>".
                 "Foto1: ".$materias['foto1']."<br>".
                 "Foto2: ".$materias['foto2']."<br><br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro materias</title>
</head>
<body>
    <form name="formulario" method="post" action="cadastromaterias.php" enctype="multipart/form-data">
        <h1>Cadastro das Materias - Portal de Notícias

        </h1>
        Codigo: 
        <input type="text" name="codigo" id="codigo" size=30>
        <br><br>
        Data:
        <input type="date" name="data" id="data" size=30>
        <br><br>
        Hora:
        <input type="time" name="hora" id="hora" size=30>
        <br><br>
        Cod Regiao:
        <select name="codregiao" id="codregiao">
        <option value=0>Selecionar a regiao</option>
        <?php
        if(mysql_num_rows($pesquisar_regiao) <> 0)
        {
            while($regiao = mysql_fetch_array($pesquisar_regiao))
            {
                echo '<option value="'.$regiao['codigo'].'">'.
                                       $regiao['nome'].'</option>';
            }
        }
        ?>
        </select>
        <br><br>
        Cod Categoria:
        <select name="codcategoria" id="codcategoria">
        <option value=0>Selecionar a categoria</option>
        <?php
        if(mysql_num_rows($pesquisar_categorias) <> 0)
        {
            while($categorias = mysql_fetch_array($pesquisar_categorias))
            {
                echo '<option value="'.$categorias['codigo'].'">'.
                                       $categorias['nome'].'</option>';
            }
        }
        ?>
        </select>
        <br><br>
        Cod Colunista:
        <select name="codcolunista" id="codcolunista">
        <option value=0>Selecionar o colunista</option>
        <?php
        if(mysql_num_rows($pesquisar_colunistas) <> 0)
        {
            while($colunistas = mysql_fetch_array($pesquisar_colunistas))
            {
                echo '<option value="'.$colunistas['codigo'].'">'.
                                       $colunistas['nome'].'</option>';
            }
        }
        ?>
        </select>
        <br><br>
        Chamada: 
        <input type="text" name="chamada" id="chamada" size=30>
        <br><br>
        Resumo: 
        <input type="text" name="resumo" id="resumo" size=30>
        <br><br>
        Materia: 
        <input type="text" name="materia" id="materia" size=30>
        <br><br>
        Foto Chamada: 
        <input type="file" name="fotochamada" id="fotochamada" size=30>
        <br><br>
        Foto 1: 
        <input type="file" name="foto1" id="foto1" size=30>
        <br><br>
        Foto 2: 
        <input type="file" name="foto2" id="foto2" size=30>
        <br><br>

        <input type="submit" name="gravar" id="gravar" value="Gravar">
        <input type="submit" name="alterar" id="alterar" value="Alterar">
        <input type="submit" name="excluir" id="excluir" value="Excluir">
        <input type="submit" name="pesquisar" id="pesquisar" value="Pesquisar">
    </form>
</body>
</html>