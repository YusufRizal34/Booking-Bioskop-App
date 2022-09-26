<?php


class test extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('bioskop_model');
	}

	public function latest()
	{
		echo "<pre>";
		var_dump($this->bioskop_model->get_latest_movie());
		echo "</pre>";
	}

	public function film()
	{
		$film_id = $_GET['id'];
		echo "<pre>";
		print_r($this->bioskop_model->get_film_by_id($film_id));
		echo "</pre>";
	}

	public function seat()
	{
		$data = $this->bioskop_model->get_seat();
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}

	public function booked_seat()
	{

		$film_id = $this->input->get('id');
		$date = $this->input->get('tanggal');
		$jadwal = $this->input->get('jadwal');


		$data = $this->bioskop_model->booked_seat($film_id, $date, $jadwal);
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}

	

}
