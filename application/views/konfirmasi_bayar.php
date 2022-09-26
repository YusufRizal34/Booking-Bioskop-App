<?php $this->view('inc_header.php'); ?>

<h1 class="center_title">Pemesanan Tiket </h1>

<div class="container" style="padding: 180px 0">
	<div class="card" style="width: 18rem;">
	<ul class="list-group list-group-flush">
		<li class="list-group-item">
			<h3><?=$film->judul?></h3>
			Jadwal: <?=$this->session->tanggal_nonton?> - <?=$this->session->id_jadwal?>
		</li>
		<?php
		foreach($this->session->data_kursi as $kursi):
		?>
		<li class="list-group-item">
			<?=$kursi?>
				<a href="<?=site_url()?>/action/hapus_kursi?kursi=<?=$kursi?>"
						class="btn btn-primary">Hapus</a>
		</li>
		<?php endforeach; ?>
		<li class="list-group-item">
			<a href="<?=site_url()?>/kursi" class="btn btn-info">Edit</a>
			<br><br>
			<a href="<?=site_url('action/hapus_semua')?>" class="btn btn-danger">Hapus Semua</a>
			<br><br>
			Total: <?=$total?>,-
			<br><br>
			<form action="<?=site_url('action/bayar')?>" method="post">
			<input type="submit" value="Bayar" name="bayar" class="btn btn-primary">
			</form>
		</li>
	</ul>
	</div>

<?php $this->view('inc_footer.php'); ?>
