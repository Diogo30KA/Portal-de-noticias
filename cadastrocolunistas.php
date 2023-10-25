<?php
//conectar ao servidor e ao banco de dados
$conectar = mysql_connect("localhost","root","");
//conectar ao banco (sql)
$banco = mysql_select_db("portal");

//se escolher opção GRAVAR
if(isset($_POST["gravar"]))
{
    //receber as variavies do html
    $codigo = $_POST["codigo"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    //comandoMYSQL para gravar banco
    $sql = "insert into colunistas (codigo,nome,email,login,senha)
            values ('$codigo','$nome','$email','$login','$senha')";

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
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    $sql = "update colunistas set nome = '$nome', email = '$email', login = '$login', senha = '$senha'
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
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    $sql = "delete from colunistas
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
    $sql = "select * from colunistas";
    $resultado = mysql_query($sql);

    //verifica o resultado da pesquisa (0 ou 1)
    if (mysql_num_rows($resultado) == 0)
    {
        echo "Sua pesquisa não retornou resultados... ";
    }
    else
    {
        echo "Resultado da Pesquisa das colunistas: "."<br>";
        //mostrar na tela os valores encontrados
        while($colunistas = mysql_fetch_array($resultado))
        {
            echo "Codigo: ".$colunistas['codigo']."<br>".
                 "Nome: ".$colunistas['nome']."<br>".
                 "Email: ".$colunistas['email']."<br>".
                 "Login: ".$colunistas['login']."<br>".
                 "Senha: ".$colunistas['senha']."<br><br>";
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
    <title>Cadastro colunistas</title>
</head>
<body>
    <form name="formulario" method="post" action="cadastrocolunistas.php">
        <h1>Cadastro das Colunistas - Portal de Notícias

        </h1>
        Codigo: 
        <input type="text" name="codigo" id="codigo" size=30>
        <br><br>
        Nome:
        <input type="text" name="nome" id="nome" size=30>
        <br><br>
        Email:
        <input type="text" name="email" id="email" size=30>
        <br><br>
        Login:
        <input type="text" name="login" id="login" size=30>
        <br><br>
        Senha:
        <input type="text" name="senha" id="senha" size=30>
        <br><br>
        <input type="submit" name="gravar" id="gravar" value="Gravar">
        <input type="submit" name="alterar" id="alterar" value="Alterar">
        <input type="submit" name="excluir" id="excluir" value="Excluir">
        <input type="submit" name="pesquisar" id="pesquisar" value="Pesquisar">
    </form>
</body>
</html>