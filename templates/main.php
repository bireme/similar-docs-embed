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
	<section id="barAcessibilidade">
		<div class="container">
			<div class="row">
				<div class="col-md-6" id="acessibilidadeTutorial">
					<a href="#main_container" tabindex="1" role="button">Conteúdo Principal <span class="hiddenMobile">1</span></a>
					<a href="#pesquisa" tabindex="2" role="button">Busca <span class="hiddenMobile">2</span></a>
					<a href="#footer" tabindex="3" role="button">Rodapé <span class="hiddenMobile">4</span></a>
				</div>
				<div class="col-md-6" id="acessibilidadeFontes">
					<a id="fontPlus" href="#!" tabindex="5" role="button" aria-hidden="true">+A</a>
					<a id="fontNormal" href="#!" tabindex="6" role="button" aria-hidden="true">A</a>
					<a id="fontLess" href="#!" tabindex="7" role="button" aria-hidden="true">-A</a>
					<a id="contraste" href="#!" tabindex="8" role="button" aria-hidden="true">
						<i class="fas fa-adjust"></i> Alto Contraste</a>
					<a href="https://politicas.bireme.org/accesibilidad/pt" role="button" id="accebilidade" tabindex="9" target="_blank"><i class="fas fa-wheelchair"></i></a>
				</div>
			</div>
		</div>
	</section>
	<!-- Topo -->
	<header id="header" class="d-print-none">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="titleMain" class="float-left">
						<div class="titleMain1">Portal Regional da BVS</div>
						<div class="titleMain2">Informação e Conhecimento para a Saúde</div>
					</div>
					<div class="lang">
						<ul>
							<li><a href="<?php echo get_url_lang('pt'); ?>" class="<?php echo ( 'pt' ==  $arguments['lang'] ) ? 'active' : ''; ?>">PT</a></li>
							<li><a href="<?php echo get_url_lang('es'); ?>" class="<?php echo ( 'es' ==  $arguments['lang'] ) ? 'active' : ''; ?>">ES</a></li>
							<li><a href="<?php echo get_url_lang('en'); ?>" class="<?php echo ( 'en' ==  $arguments['lang'] ) ? 'active' : ''; ?>">EN</a></li>
						</ul>
					</div>
					<div class="headerBt">
						<!-- <a href="" class="btnBlue">Descritor de Assunto</a> -->
						<!-- <a href="searchadvanced.php" class="btnBlue">Busca Avançada</a> -->
					</div>
					<div class="headerSearch" >
						<form action="">
							<div class="row">
								<!-- <div class="col-md-4 selectBoxSearch">
									<select class="formSelect">
										<option>Título, resumo, assunto</option>
										<option>Título</option>
										<option>Autor</option>
										<option>Descritor de assunto</option>
										<option>Resumo</option>
									</select>
								</div> -->
								<div class="col-md-10 inputBoxSearch">
									<input type="text" id="q" name="q" value="<?php echo $arguments['query']; ?>" placeholder="Buscar Similares">
									<input type="hidden" id="lang" name="lang" value="<?php echo $arguments['lang']; ?>">
									<input type="hidden" id="db" name="db" value="<?php echo $arguments['db']; ?>">
									<a id="speakBtn" href="#"><i class="fas fa-microphone-alt"></i></a>
								</div>
								<div class="col-md-2 btnBoxSearch">
									<button type="submit">
										<i class="fas fa-search"></i>
										<span class="textBTSearch"> BUSCAR</span>
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</header>
	<section>
		<div class="container">
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">HOME</a></li>
					<li class="breadcrumb-item active" aria-current="page">SIMILARES</li>
				</ol>
			</nav>
			<div class="row padding1" id="main_container">
				<!-- Centro -->
				<!-- Direita -->
				<div class="col-md-3 d-print-none">
					<div class="filter-db">
						<div class="titleBox2" data-toggle="collapse" data-target="#bases">Base de Dados</div>
						<select id="filter-db" name="filter-db" class="selectpicker" data-live-search="true" title="-">
							<option value="">-</option>
				            <?php foreach ($db_list as $key => $value) : $db_selected = explode(',', $arguments['db']); ?>
				            <option value="<?php echo $key; ?>" <?php if ( in_array($key, $db_selected) ) echo 'selected'; ?>><?php echo $value; ?></option>
				            <?php endforeach; ?>
				        </select>
						<!--
						<div class="box2 collapse show" id="bases">
					        <div class="boxCheck">
								<div class="inputCheck1">
									<input type="checkbox" id="check8" value="<?php echo $key; ?>" <?php if ( $key == $arguments['db'] ) echo 'selected'; ?>>
								</div>
								<label class="labelCheck1" for="check8"><?php echo $value; ?></label>
							</div>
					    </div>
						-->
					</div>
					<br>
					<div>
						<button type="submit" class="btnBlueM" id="btnFiltroD">Filtrar</button>
					</div>
				</div>
				<?php if ( $similarDocs ) : ?>
				<div class="col-md-9 d-print-block">
					<div class="box4">
						<div class="titleArt"><b>Similares de: </b><?php echo $encode($arguments['query']); ?></div>
					</div>
					<div class="box4">
						<?php foreach ($similarDocs as $similar) : ?>
						<div>
							<a href="<?php echo $encode($similar['url']); ?>" target="_blank"><?php echo $encode($similar['title']); ?></a><br>
							<!-- Base de Dados: <a href=""><b>LILACS</b></a> -->
						</div>
						<hr>
						<?php endforeach; ?>
						<div class="embed-button">
							<button type="button" class="btnBlueM" data-toggle="modal" data-target="#exampleModal">Embed Code</button>
						</div>
						<!--
						<nav aria-label="Navegação de página exemplo">
							<ul class="pagination justify-content-center">
								<li class="page-item disabled">
									<a class="page-link" href="#" tabindex="-1">Anterior</a>
								</li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item">
									<a class="page-link" href="#">Próximo</a>
								</li>
							</ul>
						</nav>
						-->
					</div>
				</div>
				<?php else : ?>
				<div class="col-md-9 d-print-block">
					<div class="box4">
						<div class="titleArt text-center">Nenhum similar encontrado</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<!-- Rodapé -->
	<footer id="footer" class="padding1 d-print-none">
		<div class="container">
			<hr><br>
			<div class="row">
				<div class="col-md-4">
					Powered by iAHx-2.10-117 Portal Regional da BVS
				</div>
				<div class="col-md-4 text-center">
					<a href="">Enviar um comentário</a> |
					<a href="">Comunicar um erro</a>
				</div>
				<div class="col-md-4 text-right">
					<a href="">Termos e condições de uso</a> |
					<a href="">Políticas de privacidade</a>
				</div>
			</div>
		</div>
	</footer>
	<!-- seta up -->
	<div id="to-top" class="to-top d-print-none">
		<span class="float-left">
			<i class="fas fa-arrow-up"></i>
		</span>
	</div>
	<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Incorporar Documentos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <input type="hidden" id="lang" name="lang" value="<?php echo $arguments['lang']; ?>">
              <input type="hidden" id="query" name="query" value="<?php echo $arguments['query']; ?>">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="embed-size">Size</label>
                  <select id="embed-size" name="embed-size" class="selectpicker">
                    <option value="small">Small</option>
                    <option value="medium">Medium</option>
                    <option value="large">Large</option>
                    <option value="custom">Custom</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="embed-db">Database</label>
                  <select id="embed-db" name="embed-db" class="selectpicker" data-live-search="true" title="-">
                  	<option value="">-</option>
                    <?php foreach ($db_list as $key => $value) : $db_selected = explode(',', $arguments['db']); ?>
                    <option value="<?php echo $key; ?>" <?php if ( in_array($key, $db_selected) ) echo 'selected'; ?>><?php echo $value; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-row custom-embed-size">
                <div class="form-group col-md-6">
                  <label for="embed-width">Width</label>
                  <input type="text" id="embed-width" name="embed-width" class="form-control" value="800">
                </div>
                <div class="form-group col-md-6">
                  <label for="embed-height">Height</label>
                  <input type="text" id="embed-height" name="embed-height" class="form-control" value="600">
                </div>
              </div>
              <hr />
              <div class="form-group">
                <label for="embed-code" class="col-form-label">Copie e cole este código no seu site.</label>
                <input type="text" id="embed-code" name="embed-code" class="form-control" rows="5" autocomplete="off" autocapitalize="none" placeholder="" aria-describedby="" aria-labelledby="paper-input-label-2" value='<iframe width="400" height="300" src="<?php echo $embed_url; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' readonly>
              </div>
              <div class="form-group text-center">
                <button type="button" id="embed-clipboard" class="btn btn-primary" onclick="copyHTML(); alert('Copied!');">Copy HTML</button>
              </div>
            </form>
          </div>
          <div class="modal-footer footer-info text-center">
            <small>Ao incorporar este código, você concorda com os <a href="http://politicas.bireme.org/terminos/pt/" target="_blank">Termos de Uso</a> e <a href="http://politicas.bireme.org/privacidad/pt/" target="_blank">Política de Privacidade</a></small>
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
          </div>
        </div>
      </div>
    </div>

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