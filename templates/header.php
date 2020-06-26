<header id="header">
	<div class="container">
		<div class="row" style="position: relative;">
			<div class="col-md-3" id="logoSimilar">
				<img src="img/logoSimilar.png" alt="">
			</div>
			<div class="col-md-9" id="logo2">
				<div id="headerParceiro">
					<div class="float-left">
						<img src="http://logos.bireme.org/img/<?php echo $arguments['lang']; ?>/bvs_color.svg" alt="">
					</div>
					<div class="float-left">
						<h3>
							<small><b><?php echo $texts['SIMILAR_DOCS']; ?></b></small> <br>
							<?php echo $texts['SITE_TITLE']; ?>
						</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<?php if ( 'similar' != $arguments['output'] ) : ?>
				<div class="headerSearch">
					<form action="">
						<div class="row">
							<div class="col-md-10 col-lg-11 inputBoxSearch">
								<input type="text" id="q" name="q" value="<?php echo $arguments['query']; ?>" placeholder="<?php echo $texts['SEARCH_SIMILAR']; ?>">
								<input type="hidden" id="lang" name="lang" value="<?php echo $arguments['lang']; ?>">
								<input type="hidden" id="theme" name="theme" value="<?php echo $arguments['theme']; ?>">
								<input type="hidden" id="db" name="db" value="<?php echo $arguments['db']; ?>">
								<a id="speakBtn" href="#"><i class="fas fa-microphone-alt"></i></a>
							</div>
							<div class="col-md-2 col-lg-1 btnBoxSearch">
								<button type="submit">
									<i class="fas fa-search"></i>
									<span class="textBTSearch"> <?php echo $texts['TO_SEARCH']; ?></span>
								</button>
							</div>
						</div>
					</form>
				</div>
				<?php endif; ?>
			</div>
			<div id="language">
				<a href="<?php echo get_site_url('pt'); ?>" class="<?php echo ( 'pt' ==  $arguments['lang'] ) ? 'active' : ''; ?>">português</a>
				<a href="<?php echo get_site_url('es'); ?>" class="<?php echo ( 'es' ==  $arguments['lang'] ) ? 'active' : ''; ?>">español</a>
				<a href="<?php echo get_site_url('en'); ?>" class="<?php echo ( 'en' ==  $arguments['lang'] ) ? 'active' : ''; ?>">english</a>
				<a href="<?php echo get_site_url('fr'); ?>" class="<?php echo ( 'fr' ==  $arguments['lang'] ) ? 'active' : ''; ?>">français</a>
			</div>
		</div>
	</div>
</header>