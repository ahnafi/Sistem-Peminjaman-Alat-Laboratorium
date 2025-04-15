<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template_model extends CI_Model
{
	private $table = "tabel";
	private $primary = "key";

	public function getAll()
	{
	//		join
	//		return $this->db
	//            ->select("$this->table.*, users.username")
	//            ->from("$this->table")
	//            ->join($this->relation_user, "users.id_user = $this->table.id_user")
	//            ->get()
	//            ->result_array();
		return $this->db->get($this->table)->result_array();
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
