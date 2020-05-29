<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="autor" content=" BIREME|PAHO|WHO">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?php echo RELATIVE_PATH; ?>/img/favicon.ico">
	<title><?php echo $texts['SUBTITLE']; ?> | <?php echo $texts['SITE_TITLE']; ?></title>
	<link rel="stylesheet" href="<?php echo RELATIVE_PATH; ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo RELATIVE_PATH; ?>/css/style-embed.css">
</head>
<body>
	<div id="bvsFrameBoxTitle">
		<div class="container">
			<div id="bvsFrameTitle">
				<div id="bvsFrameLogo">
					<img src="http://logos.bireme.org/img/<?php echo $arguments['lang']; ?>/bvs_color.svg" alt="">
				</div>
				<?php if ( $arguments['title'] ) : ?>
				<b><?php echo shortened_string($encode($arguments['title']), false); ?></b>
				<?php else : ?>
				<b><?php echo $texts['SIMILAR_TO']; ?>: </b><?php echo shortened_string($encode($arguments['query']), false); ?>
				<?php endif; ?>
				<div class="clear"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div id="bvsFrameList">
		<div class="container">
			<?php if ( $similarDocs ) : ?>
				<?php foreach ($similarDocs as $similar) : ?>
				<div>
					<a href="<?php echo $encode($similar['url']); ?>" target="_blank"><?php echo $encode($similar['title']); ?></a><br>
					<!-- Base de Dados: <a href=""><b>LILACS</b></a> -->
				</div>
				<hr>
				<?php endforeach; ?>
			<?php else : ?>
			<div class="text-center"><?php echo $texts['NO_SIMILAR_FOUND']; ?></div><hr>
			<?php endif; ?>
			<div class="text-center">
				<img src="http://logos.bireme.org/img/<?php echo $arguments['lang']; ?>/h_bir_color.svg" alt="" class="img-fluid">
			</div>
			<div class="text-center" id="logoSimilar">
				<a href=""><img src="img/similarInfo.png" width="200px" alt=""></a>
			</div>
		</div>
	</div>
	<div id="bvsFrameShare">
		<div class="container">
			<a href="<?php echo get_site_url($arguments['lang']); ?>&output=similar&title=<?php echo $arguments['title']; ?>" target="_blank"><img src="img/full.svg" alt=""></a>
			<a href="#" id="btShare"><img src="img/share.svg" alt=""></a>
		</div>
	</div>
	<div id="bvsFrameBoxShare">
		<div id="bvsFrameBoxContent">
			<p class="text-center"><b><?php echo $texts['SHARE']; ?></b></p>
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
                  addthis_share.title = "<?php echo $texts['SIMILAR']; ?>";
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

	<script src="<?php echo RELATIVE_PATH; ?>/js/jquery-3.3.1.min.js"></script>
	<script src="<?php echo RELATIVE_PATH; ?>/js/bootstrap.min.js"></script>
	<script>
		$("#bvsFrameBoxShare").click(function(){
			$("#bvsFrameBoxShare").hide(300);
		});

		$("#btShare").click(function(){
			$("#bvsFrameBoxShare").show(300);
		});

		$('span.show-all').on('click', function(e){
		    e.preventDefault();
		    $(this).hide();
		    $(this).next().show();
		});
	</script>

</body>
</html>