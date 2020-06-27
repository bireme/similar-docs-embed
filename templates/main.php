<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="autor" content=" BIREME|PAHO|WHO">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?php echo RELATIVE_PATH; ?>/img/favicon.ico">
	<title><?php echo $texts['SUBTITLE']; ?> | <?php echo $texts['SITE_TITLE']; ?></title>
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

	<?php include 'topAcessibility.php'; ?>
	<?php include 'header.php'; ?>

	<section>
		<div class="container">
			<div class="row" id="main_container">
				<div class="col-md-3 d-print-none">
					<div class="select-theme">
						<div class="titleBox2"><?php echo $texts['DISPLAY_AS']; ?></div>
						<select id="select-theme" name="select-theme" class="selectpicker" title="-">
				            <?php foreach ($themes as $key => $value) : $label = strtoupper($value); ?>
				            <option value="<?php echo $key; ?>" <?php if ( $arguments['theme'] == $key ) echo 'selected'; ?>><?php echo $texts[$label]; ?></option>
				            <?php endforeach; ?>
				        </select>
					</div>
					<div class="filter-db <?php if ( 'list' == $arguments['theme'] ) { echo 'hide'; } ?>">
						<div class="titleBox2"><?php echo $texts['DATABASE']; ?></div>
						<select id="filter-db" name="filter-db" class="selectpicker" data-live-search="true" data-actions-box="true" title="-" multiple <?php if ( 'list' == $arguments['theme'] ) echo 'disabled'; ?>>
				            <?php foreach ($db_list as $key => $value) : $db_selected = explode(',', $arguments['db']); ?>
				            <option value="<?php echo $key; ?>" <?php if ( in_array($key, $db_selected) ) echo 'selected'; ?>><?php echo $value; ?></option>
				            <?php endforeach; ?>
				        </select>
					</div>
					<div class="btn-filter">
						<button type="submit" class="btnBlueM" id="btnFiltroD"><?php echo $texts['APPLY']; ?></button>
					</div>
				</div>
				<?php if ( 'tabs' == $arguments['theme'] ) : ?>
				<div class="col-md-9 d-print-block">
					<div class="box1">
						<div class="titleArt"><b><?php echo $texts['SIMILAR_TO']; ?>: </b><?php echo $encode($arguments['query']); ?></div>
					</div>
					<div class="box1">
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
									<hr />
									<?php endforeach; ?>
								<?php else : ?>
								<div class="text-center"><?php echo $texts['NO_SIMILAR_FOUND']; ?></div>
								<?php endif; ?>
							</div>
							<?php endforeach; ?>
						</div>
						<br>
						<div class="embed-button">
							<button type="button" class="btnBlueM" data-toggle="modal" data-target="#modal"><?php echo $texts['EMBED_CODE']; ?></button>
						</div>
					</div>
				</div>
				<?php elseif ( $similarDocs ) : ?>
				<div class="col-md-9 d-print-block">
					<div class="box1">
						<div class="titleArt"><b><?php echo $texts['SIMILAR_TO']; ?>: </b><?php echo $encode($arguments['query']); ?></div>
					</div>
					<div class="box1">
						<?php foreach ($similarDocs as $similar) : ?>
						<div>
							<a href="<?php echo $encode($similar['url']); ?>" target="_blank"><?php echo $encode($similar['title']); ?></a><br>
							<!-- Base de Dados: <a href=""><b>LILACS</b></a> -->
						</div>
						<hr />
						<?php endforeach; ?>
						<div class="embed-button text-center">
							<button type="button" class="btnBlueM" data-toggle="modal" data-target="#modal"><?php echo $texts['EMBED_CODE']; ?></button>
						</div>
					</div>
				</div>
				<?php else : ?>
				<div class="col-md-9 d-print-block">
					<div class="box1">
						<div class="titleArt text-center"><?php echo $texts['NO_SIMILAR_FOUND']; ?></div>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<?php include 'footer.php' ?>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel"><?php echo $texts['EMBED_DOCS']; ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <input type="hidden" id="lang" name="lang" value="<?php echo $arguments['lang']; ?>">
              <input type="hidden" id="query" name="query" value="<?php echo $arguments['query']; ?>">
              <div class="form-row">
	            <div class="form-group col-md-12">
	              <label for="radio-theme-list" class="text-center"><?php echo $texts['TITLE']; ?></label>
                  <input type="text" id="embed-title" name="embed-title" class="form-control" placeholder="<?php echo $texts['SIMILAR_TO']; ?>: [...]" value="">
	            </div>
	          </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="embed-size"><?php echo $texts['SIZE']; ?></label>
                  <select id="embed-size" name="embed-size" class="selectpicker">
                    <option value="small"><?php echo $texts['SMALL']; ?></option>
                    <option value="medium"><?php echo $texts['MEDIUM']; ?></option>
                    <option value="large"><?php echo $texts['LARGE']; ?></option>
                    <option value="custom"><?php echo $texts['CUSTOM']; ?></option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="embed-db"><?php echo $texts['DATABASE']; ?></label>
                  <select id="embed-db" name="embed-db" class="selectpicker" data-live-search="true" data-actions-box="true" title="-" multiple <?php if ( 'list' == $arguments['theme'] ) echo 'disabled'; ?>>
                    <?php foreach ($db_list as $key => $value) : $db_selected = explode(',', $arguments['db']); ?>
                    <option value="<?php echo $key; ?>" <?php if ( in_array($key, $db_selected) ) echo 'selected'; ?>><?php echo $value; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-row custom-embed-size">
                <div class="form-group col-md-6">
                  <label for="embed-width"><?php echo $texts['WIDTH']; ?></label>
                  <input type="text" id="embed-width" name="embed-width" class="form-control" value="800">
                </div>
                <div class="form-group col-md-6">
                  <label for="embed-height"><?php echo $texts['HEIGHT']; ?></label>
                  <input type="text" id="embed-height" name="embed-height" class="form-control" value="600">
                </div>
              </div>
              <div class="row">
	            <div class="col-md-6 text-center">
	              <label for="radio-theme-list" class="text-center">
	                <?php echo $texts['DISPLAY_AS_LIST']; ?> <br>
	                <img src="<?php echo RELATIVE_PATH; ?>/img/lista.jpg" alt="" width="100"> <br>
	                <input type="radio" name="radio-theme" id="radio-theme-list" value="list" <?php if ( 'list' == $arguments['theme'] ) echo 'checked'; ?>>
	              </label>
	            </div>
	            <div class="col-md-6 text-center">
	              <label for="radio-theme-tabs" class="text-center">
	                <?php echo $texts['DISPLAY_AS_TABS']; ?> <br>
	                <img src="<?php echo RELATIVE_PATH; ?>/img/tabs.jpg" alt="" width="100"> <br>
	                <input type="radio" name="radio-theme" id="radio-theme-tabs" value="tabs" <?php if ( 'tabs' == $arguments['theme'] ) echo 'checked'; ?>>
	              </label>
	            </div>
	          </div>
              <hr />
              <div class="form-group">
                <label for="embed-code" class="col-form-label"><?php echo $texts['COPY_AND_PASTE']; ?></label>
                <input type="text" id="embed-code" name="embed-code" class="form-control" rows="5" autocomplete="off" autocapitalize="none" placeholder="" aria-describedby="" aria-labelledby="paper-input-label-2" value='<iframe width="400" height="300" src="<?php echo $embed_url; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' readonly>
              </div>
              <div class="form-group text-center">
                <button type="button" id="embed-clipboard" class="btn btn-primary" onclick="copyHTML();"><?php echo $texts['COPY_HTML']; ?></button>
              </div>
            </form>
          </div>
          <div class="modal-footer footer-info text-center">
            <small><?php echo $texts['FOOTER_1']; ?> <a href="http://politicas.bireme.org/terminos/pt/" target="_blank"><?php echo $texts['TERMS']; ?></a> <?php echo $texts['FOOTER_2']; ?> <a href="http://politicas.bireme.org/privacidad/pt/" target="_blank"><?php echo $texts['POLICY']; ?></a></small>
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