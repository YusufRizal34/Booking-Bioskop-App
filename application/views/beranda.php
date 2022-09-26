<?php $this->view('inc_header.php'); ?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="<?= base_url() ?>assets/images/jeremy-downes-797056-unsplash.png" class="d-block w-100">
		</div>
		<div class="carousel-item">
			<img src="<?= base_url() ?>assets/images/julien-andrieux-332817-unsplash.png" class="d-block w-100">
		</div>
		<div class="carousel-item">
			<img src="<?= base_url() ?>assets/images/karen-zhao-643916-unsplash.png" class="d-block w-100">
		</div>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>

<div class="container">
	<h1 class="center_title">Film Populer Pada Masanya </h1>

	<div class="row">
		<?php foreach ($films as $film){ ?>

			<div class="col-md-4 kotak_film">
				<div class="card" style="width: 18rem;">
					<img src="<?= base_url() ?>assets/images/<?= $film->foto ?>" class="card-img-top" alt="aladdin">
					<div class="card-body">
						<h5 class="card-title"><?= $film->judul ?></h5>
						<p class="card-text"><?= $film->sinopsis ?></p>
						<a href="<?= site_url() ?>/pesan_tiket?id=<?= $film->id_film ?>" class="btn btn-primary">Pesan Tiket</a>
					</div>
					<div class="card-footer text-muted"><?= $film->keterangan ?></div>
				</div>
			</div>

		<?php } ?>
	</div>
</div>
<?php $this->view('inc_footer.php'); ?>
