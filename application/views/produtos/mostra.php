<!DOCTYPE html>
<html>
<head>
	<title>Produto</title>
<link rel="stylesheet" href="<?= base_url("css/bootstrap.css");?>">
</head>

</head>
<body>
	<div class="container">
	<h1><?=$produto['nome']?></h1> 
	<?=auto_typography(html_escape($produto['descricao']))?>
	Preço:<?=$produto['preco']?>

	<h2>Compre Agora mesmo!</h2>
	<?php
	echo form_open("vendas/nova");

	echo form_hidden("produto_id",$produto["id"]);

	echo form_label("Data de Entrega", "data_de_entrega");
	echo form_input(array(
		"name"=>"data_de_entrega",
		"class"=>"form-control",
		"id"=>"data_de_entrega",
		"maxlength"=>"255",
		"value"=>""
	));

	echo form_button(array(
		"class"=>"btn btn-primary",
		"content"=>"Comprar",
		"type"=>"submit"
	));
	?>


	</div>
</body>
</html>