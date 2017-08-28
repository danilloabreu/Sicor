<?php

$path = $_SERVER['DOCUMENT_ROOT'];

require("$path/sicor/util/aleatorio.php");
require("$path/sicor/controller/php/conexao.php");
require("$path/sicor/externo/function_externo.php");


$nome="Danilo";
$telefone="(19)98138-1320";
$email="danilo@danilonet";
$codigo="32r103a";

//insereCliente($conexao, $nome, $telefone, $email, $codigo);

var_dump(checarCliente($conexao, $telefone, $codigo));

