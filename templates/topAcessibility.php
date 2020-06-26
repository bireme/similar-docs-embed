<section id="barAcessibilidade">
	<div class="container">
		<div class="row">
			<div class="col-md-6" id="acessibilidadeTutorial">
				<a href="#main_container" tabindex="1" role="button"><?php echo $texts['MAIN_CONTENT']; ?> <span class="hiddenMobile">1</span></a>
				<!-- <a href="#pesquisa" tabindex="2" role="button"><?php echo $texts['SEARCH']; ?> <span class="hiddenMobile">2</span></a> -->
				<a href="#footer" tabindex="2" role="button"><?php echo $texts['FOOTER']; ?> <span class="hiddenMobile">2</span></a>
			</div>
			<div class="col-md-6" id="acessibilidadeFontes">
				<a id="fontPlus" href="#!" tabindex="5" role="button" aria-hidden="true">+A</a>
				<a id="fontNormal" href="#!" tabindex="6" role="button" aria-hidden="true">A</a>
				<a id="fontLess" href="#!" tabindex="7" role="button" aria-hidden="true">-A</a>
				<a id="contraste" href="#!" tabindex="8" role="button" aria-hidden="true">
					<i class="fas fa-adjust"></i> <?php echo $texts['CONTRAST']; ?></a>
				<a href="https://politicas.bireme.org/accesibilidad/<?php echo $arguments['lang']; ?>" role="button" id="accebilidade" tabindex="9" target="_blank"><i class="fas fa-wheelchair"></i></a>
			</div>
		</div>
	</div>
</section>