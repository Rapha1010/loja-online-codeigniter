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
	<?=html_escape(auto_typography($produto['descricao']))?>
	Preço:<?=$produto['preco']?>
	</div>
</body>
</html>