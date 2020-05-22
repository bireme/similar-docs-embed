<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="autor" content=" BIREME|PAHO|WHO">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?php echo RELATIVE_PATH; ?>/img/favicon.ico">
	<title>Portal Regional da BVS</title>
	<link rel="stylesheet" href="<?php echo RELATIVE_PATH; ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="<?php echo RELATIVE_PATH; ?>/css/style.css">
	<link rel="stylesheet" href="<?php echo RELATIVE_PATH; ?>/css/acessibilidade.css">
	<link rel="stylesheet" href="<?php echo RELATIVE_PATH; ?>/css/slick.css">
	<link rel="stylesheet" href="<?php echo RELATIVE_PATH; ?>/css/slick-theme.css">	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,900" rel="stylesheet">
</head>
<body>

	<?php include 'topAcessibility.php'?>
	<?php include 'header.php' ?>

	<section>
		<div class="container">
			<div class="row padding1" id="main_container">
				<?php if ( 'tabs' == $arguments['theme'] ) : ?>
				<div class="col-md-12 d-print-block">
					<div class="box4">
						<?php if ( $arguments['title'] ) : ?>
						<div class="titleArt text-center"><?php echo $encode($arguments['title']); ?></div>
						<?php else : ?>
						<div class="titleArt"><b>Similares de: </b><?php echo $encode($arguments['query']); ?></div>
						<?php endif; ?>
					</div>
					<div class="box4">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<?php foreach ($databases as $key => $value) : reset($databases); ?>
							<li class="nav-item">
								<a class="nav-link <?php echo ( $key === key($databases) ) ? 'active' : ''; ?>" id="tab-<?php echo strtolower($key); ?>" data-toggle="tab" href="#<?php echo strtolower($key); ?>" role="tab" aria-controls="<?php echo strtolower($key); ?>" aria-selected="true"><?php echo $encode($value); ?></a>
							</li>
							<?php endforeach; ?>
						</ul>
						<br>
						<div class="tab-content" id="myTabContent">
							<?php foreach ($similarDB as $key => $value) : reset($similarDB); ?>
							<div class="tab-pane fade <?php echo ( $key === key($similarDB) ) ? 'active show' : ''; ?>" id="<?php echo strtolower($key); ?>" role="tabpanel" aria-labelledby="tab-<?php echo strtolower($key); ?>">
								<?php if ( $value ) : ?>
									<?php foreach ($value as $similar) : ?>
									<div>
										<a href="<?php echo $encode($similar['url']); ?>" target="_blank"><?php echo $encode($similar['title']); ?></a><br>
									</div>
									<hr>
									<?php endforeach; ?>
								<?php else : ?>
								<div class="text-center">Nenhum similar encontrado</div>
								<?php endif; ?>
							</div>
							<?php endforeach; ?>
						</div>
						<br>
						<div class="text-center">
							<img src="http://logos.bireme.org/img/<?php echo $arguments['lang']; ?>/h_bir_color.svg" alt="" class="img-fluid">
						</div>
					</div>
					<div class="text-center" id="logoSimilar">
						<a href=""><img src="img/similarInfo.png" width="200px" alt=""></a>
					</div>
				</div>
				<?php elseif ( $similarDocs ) : ?>
				<div class="col-md-12 d-print-block">
					<div class="box4">
						<?php if ( $arguments['title'] ) : ?>
						<div class="titleArt text-center"><?php echo $encode($arguments['title']); ?></div>
						<?php else : ?>
						<div class="titleArt"><b>Similares de: </b><?php echo $encode($arguments['query']); ?></div>
						<?php endif; ?>
					</div>
					<div class="box4">
						<?php foreach ($similarDocs as $similar) : ?>
						<div>
							<a href="<?php echo $encode($similar['url']); ?>" target="_blank"><?php echo $encode($similar['title']); ?></a><br>
							<!-- Base de Dados: <a href=""><b>LILACS</b></a> -->
						</div>
						<hr>
						<?php endforeach; ?>
						<br>
						<div class="text-center">
							<img src="http://logos.bireme.org/img/<?php echo $arguments['lang']; ?>/h_bir_color.svg" alt="" class="img-fluid">
						</div>
					</div>
					<div class="text-center" id="logoSimilar">
						<a href=""><img src="img/similarInfo.png" width="200px" alt=""></a>
					</div>
				</div>
				<?php else : ?>
				<div class="col-md-12 d-print-block">
					<div class="box4">
						<div class="titleArt text-center">Nenhum similar encontrado</div>
						<br>
						<div class="text-center">
							<img src="http://logos.bireme.org/img/<?php echo $arguments['lang']; ?>/h_bir_color.svg" alt="" class="img-fluid">
						</div>
					</div>
					<div class="text-center" id="logoSimilar">
						<a href=""><img src="img/similarInfo.png" width="200px" alt=""></a>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
	
	<?php include 'footer.php' ?>
	
	<script src="<?php echo RELATIVE_PATH; ?>/js/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="<?php echo RELATIVE_PATH; ?>/js/bootstrap.min.js"></script>
	<script src="<?php echo RELATIVE_PATH; ?>/js/cookie.js"></script>
	<script src="<?php echo RELATIVE_PATH; ?>/js/accessibility.js"></script>
	<script src="<?php echo RELATIVE_PATH; ?>/js/slick.js"></script>
	<script src="<?php echo RELATIVE_PATH; ?>/js/main.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
	<script src="<?php echo RELATIVE_PATH; ?>/js/main.js"></script>
	<script src="<?php echo RELATIVE_PATH; ?>/js/scripts.js"></script>

</body>
</html>