<!DOCTYPE html>
<html>
<head>
<head>
<link rel="stylesheet" href="<?= base_url("css/bootstrap.css");?>">
	<title>produtos</title>
	<title> Produtos vendidos </title>
</head>
<body>
<div class="container">
	<h1>Minhas Vendas</h1>
	<table class="table">
		<?php foreach($produtosVendidos  as $produto) : ?>
			<tr>
				<td><?php echo $produto['nome']; ?><td/>
				<td><?php echo dataMysqlParaPtBr($produto['data_de_entrega']); ?><td/>
			</tr>
		<?php endforeach ?>	
	</table>
</div>

</body>
</html>>