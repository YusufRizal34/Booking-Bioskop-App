<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Bioskop_model extends CI_Model
{

	public function get_latest_movie()
	{
		$res = $this->db->order_by('tanggal_rilis', 'DESC')->get('film');
		return $res->result();
	}

	public function get_film_by_id($film_id)
	{
		$res = $this->db->where(array('id_film'=>$film_id))->get('film');
		return $res->row();
	}

	public function get_jadwal_by_id($jadwal)
	{
		$res = $this->db->where(array('id_jadwal'=>$jadwal))->get('jadwal');
		return $res->row();
	}
	

	public function get_seat()
	{
		$result = $this->db->order_by('nokur', 'asc')->get('kursi');
		return $result->result();
	}
	
	public function get_jadwal()
	{
		$res = $this->db->get('jadwal');
		return $res->result();
	}

	public function nama_jadwal($id_jadwal)
	{
		$res = $this->db->get_where('jadwal', ['id_jadwal'=>$id_jadwal])->row();
		return $res->jadwal;
	}

	public function booked_seat($id_film, $tanggal, $jadwal)
	{

		$conds = array(
			'id_film' => $id_film,
			'tanggal_nonton' => $tanggal,
			'id_jadwal' => $jadwal);
		$res = $this->db->get_where('pesanan', $conds);
		$booked = array();
		foreach ($res->result() as $pesan) {
			array_push($booked, $pesan->nokur);
		}
		return $booked;
	}

	public function add_pesanan($id_film, $tanggal, $jadwal, $no_kursi)
	{
		$data = ['id_film'=>$id_film, 'tanggal_nonton'=>$tanggal, 'id_jadwal'=>$jadwal, 'nokur'=>$no_kursi];
		$res= $this->db->insert('pesanan', $data);
		return $res;
	}
}
