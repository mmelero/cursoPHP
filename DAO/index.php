<?php

require_once("config.php");

//$sql = new Sql();
//$usuarios = $sql->select("SELECT * FROM usuarios");
//echo json_encode($usuarios);

//Retorna o usuario de acordo com id informado.
//$root = new Usuario();
//$root->loadById(9);
//echo $root;

//Retorna uma lista de usuarios
//echo json_encode(Usuario::getList());

//Retorna uma lista de usuarios com os caracteres informados para pesquisa.
//$search = Usuario::search("le");
//echo json_encode($search);

//Outra maneira de efetuar lista de usuarios com os caracteres informados para pesquisa, sem atribuir a uma variavel
//echo json_encode(Usuario::search("me"));

//$login = new Usuario();
//$login->login("mmelero","mar@196526");
//echo $login;

//Incluindo um login
//$aluno = new Usuario("aluno","@luno01");
//$aluno->insert();
//echo $aluno;

//Update do Usuario através do ID
//$usuario = new Usuario();
//$usuario->loadById(61);
//$usuario->update("zeSilva","123456");
//echo $usuario;

$usuario = new Usuario();
$usuario->loadById(61);
$usuario->delete();
echo $usuario;
?>