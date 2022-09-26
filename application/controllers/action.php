<?php

class action extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('bioskop_model');
    }

    public function hapus_kursi()
    {
        $kursi = $this->input->get('kursi');
        $data_kursi = $this->session->data_kursi;
        unset($data_kursi[array_search($kursi, $data_kursi)]);
        $this->session->data_kursi = $data_kursi;
        redirect('/konfirmasi_bayar');
    }

    public function hapus_semua()
    {
        $this->session->sess_destroy();
        redirect('/');
    }

    public function bayar()
    {
        $data_kursi = $this->session->data_kursi;
        $id_film = $this->session->id_film;
        $tanggal = $this->session->tanggal_nonton;
        $id_jadwal = $this->session->id_jadwal;
        foreach($data_kursi as $kursi){
            $this->bioskop_model->add_pesanan($id_film, $tanggal, $id_jadwal, $kursi);
        }

        $file = $this->bioskop_model->get_film_by_id($id_film);

        $this->session->last_order = ['film'=>$film->judul, 'tanggal'=>$tanggal, 'jadwal'=>$this->bioskop_model->nama_jadwal($id_jadwal), 'kursi'=>$data_kursi];
        $this->session->unset_userdata(['data_kursi', 'id_film', 'tanggal_nonton', 'id_jadwal']);
        redirect('/cetak_tiket');
    }
}