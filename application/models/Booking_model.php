<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking_model extends CI_Model
{
	private $table = "booking";
	private $primary = "id";

	public function getAll()
	{
		return $this->db
			->select("$this->table.*, users.name AS nama_user, alat.nama_alat")
			->from("$this->table")
			->join('users', "users.id = $this->table.user_id", 'left')
			->join('alat', "alat.id = $this->table.alat_id", 'left')
			->order_by("$this->table.id", 'DESC')
			->get()
			->result_array();
	}

	public function checkAccepted($alatId,$tanggal){
		// Cek jumlah booking yang sudah disetujui pada tanggal yang sama
		$this->db->select('COUNT(*) as total_booking');
		$this->db->where('alat_id', $alatId);
		$this->db->where('tanggal', $tanggal);
		$this->db->where('status', 'disetujui');
		return $this->db->get('booking')->row();
	}

	public function checkUserBooking($alatId,$userId)
	{
		$this->db->select('id');
		$this->db->from('booking');
		$this->db->where('user_id', $userId);
		$this->db->where('alat_id', $alatId);
		$this->db->where('status !=', 'ditolak');
		return $this->db->get()->row();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->table, [$this->primary => $id])->row();
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($id, $data)
	{
		return $this->db->update($this->table, $data, [$this->primary => $id]);
	}

	public function delete($id)
	{
		return $this->db->delete($this->table, [$this->primary => $id]);
	}
}
