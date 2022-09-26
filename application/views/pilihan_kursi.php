<?php $this->view('inc_header.php'); ?>

<h1 class="center_title"> Pilihan Kursi</h1>

<div class="container">
	<div class="" style="padding: 60px 0">
		<form action="<?=site_url()?>/konfirmasi_bayar" method="post">
			<table>
				<tr>
					<th width="150">Film</th>
					<td><?= $film->judul ?></td>
				</tr>
				<tr>
					<th>Jadwal</th>
					<td><?= $jadwal->jadwal ?></td>
				</tr>
				<tr>
					<th>Tempat Duduk</th>
					<td>
						<table style="text-align:center; height:100%; margin-bottom: 50px;">
						<tr>
							<th>&nbsp;</th>
							<?php for($i=1; $i<=4; $i++): ?>
								<th><?=$i?></th>
							<?php endfor; ?>
							<?php for($baris="A"; $baris<='E'; $baris++): ?>
								<tr>
									<th><?=$baris?></th>
									<?php for($kolom=1; $kolom<=5; $kolom++): ?>
										<td>
											<input type="checkbox" name="kursi[]"
												<?php 
													if ($this->session->data_kursi &&
														in_array($baris.$kolom, $this->session->data_kursi))
														{echo "checked"; }

													if (in_array($baris.$kolom, $booked)) { echo "disabled"; }
												?>
												value="<?=$baris.$kolom?>">
										</td>
									<?php endfor; ?>
								</tr>
							<?php endfor; ?>
						</table>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>Harga tiket per lembar Rp 60.0000</td>
				</tr>
				<tr>
					<th></th>
					<td><button class="btn btn-primary">Submit</button></td>
				</tr>
			</table>
		</form>

	</div>
</div>

<?php $this->view('inc_footer.php'); ?>r
