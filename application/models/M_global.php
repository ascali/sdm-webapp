<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_global extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->tbl = "admin";
	}

	function cek_user($username="",$password="")
	{
		// $query = $this->db->get_where($this->tbl,array('username' => $username, 'password' => $password));
		$sqlQuery= "SELECT a.*, p.* FROM admin a JOIN pegawai p on a.id_pegawai = p.id_pegawai WHERE username = '$username' AND password = '$password'";
		$query = $this->db->query($sqlQuery);
		$query = $query->result_array();
		return $query;
	}

	function ambil_user($username)
    {
        // $query = $this->db->get_where($this->tbl, array('username' => $username));
        $sqlQuery= "SELECT a.*, p.* FROM admin a JOIN pegawai p on a.id_pegawai = p.id_pegawai WHERE username = '$username'";
		$query = $this->db->query($sqlQuery);
        $query = $query->result_array();
        if($query){
            return $query[0];
        }
    }	
/*S Model Berita*/
    public function berita_get_by_id($id_berita)
	{
		$this->db->from('berita');
		$this->db->where('id_berita',$id_berita);
		$query = $this->db->get();

		return $query->row();
	}

	function berita_page($number,$offset){
		return $query = $this->db->get('berita',$number,$offset)->result();		
	}
 
/*E Model Berita*/

/*S Model Pegawai*/
    public function pegawai_get_by_id($id_pegawai)
	{
		$this->db->from('pegawai');
		$this->db->where('id_pegawai',$id_pegawai);
		$query = $this->db->get();

		return $query->row();
	}
/*E Model Pegawai*/

/*S Model Pegawai*/
    public function gaps_get_by_id($id_pelatihan)
	{
		$this->db->from('pelatihan');
		$this->db->where('id_pelatihan',$id_pelatihan);
		$query = $this->db->get();

		return $query->row();
	}
/*E Model Pegawai*/
}

/* End of file M_global.php */
/* Location: ./application/models/M_global.php */