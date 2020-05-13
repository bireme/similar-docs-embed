<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="autor" content=" BIREME|PAHO|WHO">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?php echo RELATIVE_PATH; ?>/img/favicon.ico">
	<title>Portal Regional da BVS - Similares</title>
	<link rel="stylesheet" href="<?php echo RELATIVE_PATH; ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo RELATIVE_PATH; ?>/css/style-embed.css">
</head>
<body>
	<div id="bvsFrameBoxTitle">
		<div class="container">
			<div id="bvsFrameTitle">
				<div id="bvsFrameLogo">
					<img src="http://logos.bireme.org/img/pt/bvs_color.svg" alt="">
				</div>
				<?php if ( $arguments['title'] ) : ?>
				<b><?php echo $arguments['title']; ?></b>
				<?php else : ?>
				<b>Similares de: </b><?php echo $encode($arguments['query']); ?>
				<?php endif; ?>
				<div class="clear"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div id="bvsFrameList">
		<div class="container">
			<div class="accordion" id="accordionExample">
				<?php foreach ($similarDB as $key => $value) : ?>
				<div class="card">
					<div class="card-header" id="heading-<?php echo strtolower($key); ?>">
						<h2 class="mb-0">
							<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-<?php echo strtolower($key); ?>" aria-expanded="true" aria-controls="collapse-<?php echo strtolower($key); ?>">
								<?php echo $db_list[$key]; ?>
							</button>
						</h2>
					</div>
					<div id="collapse-<?php echo strtolower($key); ?>" class="collapse" aria-labelledby="heading-<?php echo strtolower($key); ?>" data-parent="#accordionExample">
						<div class="card-body">
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
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<br>
			<div class="text-center"><img src="http://logos.bireme.org/img/pt/h_bir_color.svg" alt="" class="img-fluid"></div>
		</div>
		<div id="bvsFrameShare">
			<div class="container">
				<a href="<?php echo get_site_url($arguments['lang']); ?>&output=similar&title=<?php echo $arguments['title']; ?>" target="_blank"><img src="img/full.svg" alt=""></a>
				<a href="#" id="btShare"><img src="img/share.svg" alt=""></a>
			</div>
		</div>
		<div id="bvsFrameBoxShare">
			<div id="bvsFrameBoxContent">
				<p class="text-center"><b>Compartilhar</b></p>
				<!--
				<div class="text-center">
					<a href="" class="bvsFrameImg"><img src="img/link.svg" width="50" alt=""></a>
					<a href="" class="bvsFrameImg"><img src="img/facebook.svg" width="50" alt=""></a>
					<a href="" class="bvsFrameImg"><img src="img/twitter.svg" width="50" alt=""></a>
					<a href="" class="bvsFrameImg"><img src="img/whatsapp.svg" width="50" alt=""></a>
				</div>
				-->
				<script type="text/javascript">
	              var addthis_config = addthis_config||{};

	              var addthis_share = addthis_share||{};
	                  addthis_share.title = "Similares";
	                  addthis_share.url = "<?php echo get_site_url($arguments['lang']); ?>";
	            </script>
	            <div class="addthis_toolbox addthis_60x60_style" addthis:url="<?php echo get_site_url($arguments['lang']); ?>">
	                <a class="bvsFrameImg addthis_button_link"><img src="img/link.svg" width="50" alt=""></a>
	                <a class="bvsFrameImg addthis_button_facebook"><img src="img/facebook.svg" width="50" alt=""></a>
	                <a class="bvsFrameImg addthis_button_twitter"><img src="img/twitter.svg" width="50" alt=""></a>
	                <a class="bvsFrameImg addthis_button_whatsapp"><img src="img/whatsapp.svg" width="50" alt=""></a>
	                <!--a class="addthis_button_compact"></a-->
	            </div>
	            <script type="text/javascript" src="https://s7.addthis.com/js/300/addthis_widget.js#async=1"></script>
	            <script type="text/javascript">addthis.init();</script>
			</div>
		</div>
	</div>

	<script src="<?php echo RELATIVE_PATH; ?>/js/jquery-3.3.1.min.js"></script>
	<script src="<?php echo RELATIVE_PATH; ?>/js/bootstrap.min.js"></script>
	<script>
		$("#bvsFrameBoxShare").click(function(){
			$("#bvsFrameBoxShare").hide(300);
		});
		$("#btShare").click(function(){
			$("#bvsFrameBoxShare").show(300);
		});
	</script>

</body>
</html>