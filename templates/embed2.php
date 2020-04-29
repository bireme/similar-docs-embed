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
			<div id="bvsFrameLogo">
				<img src="http://logos.bireme.org/img/pt/bvs_color.svg" alt="">
			</div>
			<div id="bvsFrameTitle">
				<b>Similares de: </b><?php echo $encode($arguments['query']); ?>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div id="bvsFrameList">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<?php foreach ($db_list as $key => $value) : reset($db_list); ?>
				<li class="nav-item">
					<a class="nav-link <?php echo ( $key === key($db_list) ) ? 'active' : ''; ?>" id="tab-<?php echo strtolower($key); ?>" data-toggle="tab" href="#<?php echo strtolower($key); ?>" role="tab" aria-controls="<?php echo strtolower($key); ?>" aria-selected="true"><?php echo $encode($value); ?></a>
				</li>
				<?php endforeach; ?>
			</ul>
			<div class="tab-content" id="myTabContent">
				<?php foreach ($similarDB as $key => $value) : reset($similarDB); ?>
				<div class="tab-pane fade <?php echo ( $key === key($similarDB) ) ? 'active show' : ''; ?>" id="<?php echo strtolower($key); ?>" role="tabpanel" aria-labelledby="tab-<?php echo strtolower($key); ?>">
					<?php foreach ($value as $similar) : ?>
						<div>
							<a href="<?php echo $encode($similar['url']); ?>"><?php echo $encode($similar['title']); ?></a><br>
						</div>
						<hr>
					<?php endforeach; ?>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<div id="bvsFrameShare">
		<div class="container">
			<a href="<?php echo get_url_lang($arguments['lang']); ?>" target="_blank"><img src="img/full.svg" alt=""></a>
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
                  addthis_share.url = "<?php echo get_url_lang($arguments['lang']); ?>";
            </script>
            <div class="addthis_toolbox addthis_60x60_style" addthis:url="<?php echo get_url_lang($arguments['lang']); ?>">
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