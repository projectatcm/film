<nav class="navbar navbar-default" style="box-shadow: none !important;">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<h1><a  href="index.php"><span>M</span>ovies <span>P</span>ro</a></h1>
	</div>
	<!-- navbar-header -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
			<li class="active"><a href="index.php">Home</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Genre <b class="caret"></b></a>
				<ul class="dropdown-menu multi-column columns-3">
					<li>
					<div class="col-sm-4">
						<ul class="multi-column-dropdown">
							<li><a href="genre.php">Action</a></li>
							<li><a href="genre.php">Biography</a></li>
							<li><a href="genre.php">Crime</a></li>
							<li><a href="genre.php">Family</a></li>
							<li><a href="horror.php">Horror</a></li>
							<li><a href="genre.php">Romance</a></li>
							<li><a href="genre.php">Sports</a></li>
							<li><a href="genre.php">War</a></li>
						</ul>
					</div>
					<div class="col-sm-4">
						<ul class="multi-column-dropdown">
							<li><a href="genre.php">Adventure</a></li>
							<li><a href="comedy.php">Comedy</a></li>
							<li><a href="genre.php">Documentary</a></li>
							<li><a href="genre.php">Fantasy</a></li>
							<li><a href="genre.php">Thriller</a></li>
						</ul>
					</div>
					<div class="col-sm-4">
						<ul class="multi-column-dropdown">
							<li><a href="genre.php">Animation</a></li>
							<li><a href="genre.php">Costume</a></li>
							<li><a href="genre.php">Drama</a></li>
							<li><a href="genre.php">History</a></li>
							<li><a href="genre.php">Musical</a></li>
							<li><a href="genre.php">Psychological</a></li>
						</ul>
					</div>
					<div class="clearfix"></div>
					</li>
				</ul>
			</li>

			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Languages <b class="caret"></b></a>
				<ul class="dropdown-menu multi-column columns-3">
					<li>

						<div class="col-sm-4">
							<ul class="multi-column-dropdown">
								<?php foreach ($allLanguages as $languages) {
									$id = $languages['id'];
									$language = $languages['language']
									?>
								<li><a href="languages.php?id=<?=$id?>"><?=$language?></a></li>
								<?php } ?>
							</ul>
						</div>

						<div class="clearfix"></div>
					</li>
				</ul>
			</li>
			<li><a href="list.php">A - z list</a></li>
			<li><a href="list.php">A - z list</a></li>
			<li><a href="contact.php">Contact</a></li>
		</ul>

	</div>
	<div class="clearfix"> </div>
</nav>
