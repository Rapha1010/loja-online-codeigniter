<html>
<head>
<link rel="stylesheet" href="<?= base_url("css/bootstrap.css");?>">
	<title>produtos</title>
</head>
<body>

<div class="container">

<h1>Cadastro de produtos</h1>

<?php
echo form_open("produtos/novo");

echo form_label("Nome","nome");
echo form_input(array(
	"id"=>"nome",
	"name"=>"nome",
	"class"=>"form-control",
	"maxlength"=>"255"));

echo form_label("Preço","preco");
echo form_input(array(
	"id"=>"preco",
	"name"=>"preco",
	"class"=>"form-control",
	"maxlength"=>"255"));

echo form_label("Descricao","descricao");
echo form_textarea(array(
	"id"=>"descricao",
	"name"=>"descricao",
	"class"=>"form-control",
	"maxlength"=>"255"));

echo form_button(array(
	"content"=>"Cadastrar Produtos",
	"class"=>"btn btn-primary",
	"type"=>"submit"));


echo form_close();

?>
</div>

</body>
</html>