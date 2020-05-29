<header id="header" class="d-print-none">
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-lg-1" id="logo">
				<a href="index.php"><img src="img/BVS.svg" alt="" class="img-fluid"></a>
			</div>
			<div class="col-md-10 col-lg-11">
				<div id="titleMain" class="float-left">
					<div class="titleMain1"><?php echo $texts['SITE_TITLE']; ?></div>
					<div class="titleMain2"><?php echo $texts['SUBTITLE']; ?></div>
				</div>
				<div class="lang">
					<ul>
						<li><a href="<?php echo get_site_url('pt'); ?>" class="<?php echo ( 'pt' ==  $arguments['lang'] ) ? 'active' : ''; ?>">português</a></li>
						<li><a href="<?php echo get_site_url('es'); ?>" class="<?php echo ( 'es' ==  $arguments['lang'] ) ? 'active' : ''; ?>">español</a></li>
						<li><a href="<?php echo get_site_url('en'); ?>" class="<?php echo ( 'en' ==  $arguments['lang'] ) ? 'active' : ''; ?>">english</a></li>
						<li><a href="<?php echo get_site_url('fr'); ?>" class="<?php echo ( 'fr' ==  $arguments['lang'] ) ? 'active' : ''; ?>">français</a></li>
					</ul>
				</div>
			</div>
			<?php if ( 'similar' != $arguments['output'] ) : ?>
			<div class="col-md-12">
				<br>
				<div class="headerSearch">
					<form action="">
						<div class="row">
							<div class="col-md-10 inputBoxSearch">
								<input type="text" id="q" name="q" value="<?php echo $arguments['query']; ?>" placeholder="<?php echo $texts['SEARCH_SIMILAR']; ?>">
								<input type="hidden" id="lang" name="lang" value="<?php echo $arguments['lang']; ?>">
								<input type="hidden" id="theme" name="theme" value="<?php echo $arguments['theme']; ?>">
								<input type="hidden" id="db" name="db" value="<?php echo $arguments['db']; ?>">
								<a id="speakBtn" href="#"><i class="fas fa-microphone-alt"></i></a>
							</div>
							<div class="col-md-2 btnBoxSearch">
								<button type="submit">
									<i class="fas fa-search"></i>
									<span class="textBTSearch"> <?php echo $texts['TO_SEARCH']; ?></span>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</header>