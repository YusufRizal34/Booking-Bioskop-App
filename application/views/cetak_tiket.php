<?php $this->view('inc_header.php'); ?>

<h1 class="center_title">Cetak Tiket Pesanan</h1>
<div class="container">
    <div class="row">
        <?php 
            //for ($i = 0; $i < 4; $i++) : 
            foreach($this->session->last_order['kursi'] as $kursi):
        ?>
            <div class="col-md-6" style="margin-bottom: 20px;">
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><h4>Tiket Bioskop Kampus UDINUS</h4></li>
                        <li class="list-group-item">
                            <?=$this->session->last_order['film']?> <br>
                            Jadwal: <?=$this->session->last_order['tanggal']?> -
                                    <?=$this->session->last_order['jadwal']?> <br>
                            Kursi: <?=$kursi?>
                        </li>
                    </ul>
                    <div class="card-footer text-muted">
                        TIket Bioskop Kampus UDINUS (TIKU) <br>
                        <?=$this->session->last_order['film']?> -
                        <?=$this->session->last_order['tanggal']?> -
                        <?=$this->session->last_order['jadwal']?> -
                        untuk disobek petugas
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php $this->view('inc_footer.php'); ?> 