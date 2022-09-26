<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bioskop extends CI_Controller
{

	private $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('bioskop_model');
	}

	public function index()
	{
		$data['films'] = $this->bioskop_model->get_latest_movie();
		$this->load->view('beranda', $data);
	}

	public function pesan_tiket()
	{
		$id_film = $this->input->get('id');
		$data['film'] = $this->bioskop_model->get_film_by_id($id_film);
		$data['jadwal'] = $this->bioskop_model->get_jadwal();
		$this->load->view('pesan_tiket', $data);
	}

	// need to filter seat
	public function pilih_kursi()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->session->id_film = $this->input->post('id_film');
			$this->session->tanggal_nonton = $this->input->post('tanggal_nonton');
			$this->session->id_jadwal = $this->input->post('id_jadwal');
		}

		$data['film'] = $this->bioskop_model->get_film_by_id($this->session->id_film);
		$data['jadwal'] = $this->bioskop_model->get_jadwal_by_id($this->session->id_jadwal);
		$data['booked'] = $this->bioskop_model->booked_seat($this->session->id_film,$this->session->tanggal_nonton,$this->session->id_jadwal);

		$this->load->view('pilihan_kursi', $data);
	}

	public function add_book()
	{

		if ($this->input->server('REQUEST_METHOD') === 'POST') {

			$film_id = $this->input->post('film_id');
			$film = $this->bioskop_model->get_film_by_id($film_id);

			$data_save = [
				'id_film' => $film->id_film,
				'film_judul' => $film->judul,
				'tanggal' => $this->input->post('tanggal'),
				'kursi' => $this->input->post('kursi'),
			];
		}

	}

	public function konfirmasi_bayar()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$this->session->data_kursi = $this->input->post('kursi');
		} 
		$data['total'] = count($this->session->data_kursi) * 60000;
		$data['film'] = $this->bioskop_model->get_film_by_id($this->session->id_film);

		$this->load->view('konfirmasi_bayar', $data);
	}

	public function cetak_tiket()
	{
		$this->load->view('cetak_tiket');
	}
}
