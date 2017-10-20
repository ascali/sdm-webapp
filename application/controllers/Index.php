<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_global');
		$this->load->helper(array('url','file','html','form'));
        $this->load->library(array('upload', 'Auth'));
		$this->auth->cek_auth(); //ngambil auth dari library
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$ambil_akun = $this->M_global->ambil_user($this->session->userdata('username'));
		$data = array('username' => $ambil_akun);
		$stat = $this->session->userdata('level');
		$data['modules']  = 'dashboard';
		$data['content']  = 'user_data/dashboard/dashboard';
		$data['modals']   = 'user_data/dashboard/dashboard_modal';


		if ($stat=='Staff') {
			$this->load->view('index_user', $data);	
		} else if ($stat=='Administrator') {
			redirect('login/logout','refresh');
		} else {
			$this->session->sess_destroy();
			echo "<script> alert('Cek username dan password!'); </script>";
			redirect(base_url(),'refresh');
		}
	}

    public function gantipass()
    {
    	$this->_validate_gantipass();
		$data = array(
				'password' => md5($this->input->post('passwords'))
			);

		$this->db->where('id_admin', $this->input->post('id_admin'));
		$this->db->update('admin', $data);
		echo json_encode(array('status' => TRUE));
    }

    public function _validate_gantipass()
    {
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('passwords') == '')
		{
			$data['inputerror'][] = 'passwords';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}
		
		if($this->input->post('confirmpassword') == '')
		{
			$data['inputerror'][] = 'confirmpassword';
			$data['error_string'][] = 'harus di isi sama dengan password';
			$data['status'] = FALSE;
		}
		
		if($this->input->post('confirmpassword') != $this->input->post('passwords'))
		{
			$data['inputerror'][] = 'confirmpassword';
			$data['error_string'][] = 'password konfirmasi tidak sama, harus di isi sama dengan password';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
    }

	public function dashboard_data()
	{
		$query = "SELECT sk.status_kepegawaian AS status_kom, COUNT(*) as count_peg FROM pegawai p
					JOIN status_kepegawaian sk on p.id_status=sk.id_status
					GROUP BY status_kom ORDER BY status_kom ASC";
    	$query = $this->db->query($query);
    	$query = $query->result();
    	if (isset($query)) {
    		$status = 'success';
    		$query = $query;
    	}else {
    		$status = 'error';
    		$query = 'error';
    	}

    	$data_array = array('status' => $status, 'data' => array());

    	foreach ($query as $val) {
    		$datValJ = $val->status_kom;
    		$datVal = $val->count_peg;

    		$query = array('name' => $datValJ, 'y' => (int)$datVal);
			array_push($data_array['data'], $query);
    	}

    	header('Content-Type: application/json');
    	echo json_encode($data_array);

	}

	public function berita()
	{
		$ambil_akun = $this->M_global->ambil_user($this->session->userdata('username'));
		$data = array('username' => $ambil_akun);
		$stat = $this->session->userdata('level');
		$data['modules']  = 'berita';
		$data['content']  = 'user_data/berita/berita';
		$data['modals']   = 'user_data/berita/berita_modal';


		if ($stat=='Staff') {
			$this->load->view('index_user', $data);	
		} else if ($stat=='Administrator') {
			redirect('login/logout','refresh');
		} else {
			$this->session->sess_destroy();
			echo "<script> alert('Cek username dan password!'); </script>";
			redirect(base_url(),'refresh');
		}
	}

	public function bidang_data()
	{
    	$this->db->order_by('id_bidang', 'desc');
    	$query = $this->db->get('bidang');
    	$query = $query->result();
    	if (isset($query)) {
    		$status = 'success';
    		$query = $query;
    	}else {
    		$status = 'error';
    		$query = 'error';
    	}
    	header('Content-Type: application/json');
    	echo json_encode(array('status' => $status, 'data' => $query));
	}

	public function berita_data()
	{
    	$this->db->order_by('id_berita', 'desc');
    	$query = $this->db->get('berita');
    	// $query = $this->db->query('SELECT * FROM users ORDER BY id_berita DESC');
    	$query = $query->result();
    	if (isset($query)) {
    		$status = 'success';
    		$query = $query;
    	}else {
    		$status = 'error';
    		$query = 'error';
    	}
    	header('Content-Type: application/json');
    	echo json_encode(array('status' => $status, 'data' => $query));
	}

	public function dashboard_berita_data()
	{
    	$this->db->order_by('id_berita', 'desc');
    	$this->db->limit(2);
    	$query = $this->db->get('berita');
    	// $query = $this->db->query('SELECT * FROM users ORDER BY id_berita DESC');
    	$query = $query->result();
    	if (isset($query)) {
    		$status = 'success';
    		$query = $query;
    	}else {
    		$status = 'error';
    		$query = 'error';
    	}
    	header('Content-Type: application/json');
    	echo json_encode(array('status' => $status, 'data' => $query));
	}

    public function berita_edit_data($id_berita)
    {
    	$this->db->from('berita');
			$this->db->where('id_berita',$id_berita);
			$query = $this->db->get();
			if (isset($query)) {
    		$status = 'success';
    		$query = $query;
    	}else {
    		$status = 'error';
    		$query = 'error';
    	}
    	$query = $query->row();
    	header('Content-Type: application/json');
    	echo json_encode(array('status' => $status, 'data' => $query));
    }
/*Data Pegawai*/
	public function data_pegawai()
	{
		$ambil_akun = $this->M_global->ambil_user($this->session->userdata('username'));
		$data = array('username' => $ambil_akun);
		$stat = $this->session->userdata('level');
		$data['modules']  = 'data_pegawai';
		$data['content']  = 'user_data/data_pegawai/data_pegawai';
		$data['modals']   = 'user_data/data_pegawai/data_pegawai_modal';


		if ($stat=='Staff') {
			$this->load->view('index_user', $data);	
		} else if ($stat=='Administrator') {
			redirect('login/logout','refresh');
		} else {
			$this->session->sess_destroy();
			echo "<script> alert('Cek username dan password!'); </script>";
			redirect(base_url(),'refresh');
		}
	}

	public function data_pegawai_data_all()
	{
		// $id_pegawai = $this->session->userdata('id_pegawai');
    	$query = $this->db->query('SELECT p.*, b.*, l.*, pd.*, sk.* FROM pegawai p JOIN bidang b ON p.id_bidang = b.id_bidang JOIN level l ON p.id_level = l.id_level JOIN pendidikan pd ON p.id_pendidikan = pd.id_pendidikan JOIN status_kepegawaian sk ON p.id_status = sk.id_status ORDER BY p.id_pegawai DESC');
    	$query = $query->result();
    	if (isset($query)) {
    		$status = 'success';
    		$query = $query;
    	}else {
    		$status = 'error';
    		$query = 'error';
    	}
    	header('Content-Type: application/json');
    	echo json_encode(array('status' => $status, 'data' => $query));
	}

	public function data_pegawai_data()
	{
		$id_pegawai = $this->session->userdata('id_pegawai');
    	$query = $this->db->query('SELECT p.*, b.*, l.*, pd.*, sk.* FROM pegawai p JOIN bidang b ON p.id_bidang = b.id_bidang JOIN level l ON p.id_level = l.id_level JOIN pendidikan pd ON p.id_pendidikan = pd.id_pendidikan JOIN status_kepegawaian sk ON p.id_status = sk.id_status WHERE p.id_pegawai = "'.$id_pegawai.'" ');
    	$query = $query->result();
    	if (isset($query)) {
    		$status = 'success';
    		$query = $query;
    	}else {
    		$status = 'error';
    		$query = 'error';
    	}
    	header('Content-Type: application/json');
    	echo json_encode(array('status' => $status, 'data' => $query));
	}

	public function data_anak_data()
	{
		$id_pegawai = $this->session->userdata('id_pegawai');
    	$this->db->order_by('id_anak', 'desc');
    	$this->db->where('id_pegawai', $id_pegawai);
    	$query = $this->db->get('anak');
    	$query = $query->result();
    	if (isset($query)) {
    		$status = 'success';
    		$query = $query;
    	}else {
    		$status = 'error';
    		$query = 'error';
    	}
    	header('Content-Type: application/json');
    	echo json_encode(array('status' => $status, 'data' => $query));
	}

	public function data_keluarga_data()
	{
		$id_pegawai = $this->session->userdata('id_pegawai');
    	$query = $this->db->query('SELECT k.*, p.*, p.nama as nama_pegawai, k.tanggal_lahir as tanggal_lahir_k, k.tempat_lahir as tempat_lahir_k FROM keluarga k JOIN pegawai p ON k.id_pegawai = p.id_pegawai WHERE p.id_pegawai = "'.$id_pegawai.'"');
    	$query = $query->result();
    	if (isset($query)) {
    		$status = 'success';
    		$query = $query;
    	}else {
    		$status = 'error';
    		$query = 'error';
    	}
    	header('Content-Type: application/json');
    	echo json_encode(array('status' => $status, 'data' => $query));
	}

    public function data_pegawai_edit_data($id_pegawai)
    {
		$data = "SELECT p.*, b.*, l.*, pd.*, sk.* FROM pegawai p JOIN bidang b ON p.id_bidang = b.id_bidang JOIN level l ON p.id_level = l.id_level JOIN pendidikan pd ON p.id_pendidikan = pd.id_pendidikan JOIN status_kepegawaian sk ON p.id_status = sk.id_status WHERE p.id_pegawai = ".$id_pegawai."";
		$query = $this->db->query($data);
    	$query = $query->row();

		if (isset($query)) {
			$status = 'success';
			$query = $query;
    	}else {
    		$status = 'error';
    		$query = 'error';
    	}
    	header('Content-Type: application/json');
    	echo json_encode(array('status' => $status, 'data' => $query));
    }
	// Aksi Update
	public function pegawai_update_data()
	{
		$this->_validate_pegawai();
		$data = array(
				'nama' => $this->input->post('nama'),
				'nid' => $this->input->post('nid'),
				'alamat' => $this->input->post('alamat'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'no_telp' => $this->input->post('no_telp'),
				'email' => $this->input->post('email'),
				'no_rekening' => $this->input->post('no_rekening'),
				'npwp' => $this->input->post('npwp'),
				'agama' => $this->input->post('agama'),
				'status_perkawinan' => $this->input->post('status_perkawinan'),
				'updated' => date('Y-m-d H:i:s'),
			);

		if($this->input->post('remove_foto')) // if remove photo_user checked
		{
			if(file_exists('public/images/'.$this->input->post('remove_foto')) && $this->input->post('remove_foto'))
				unlink('public/images/'.$this->input->post('remove_foto'));
			$data['foto'] = '';
		}

		if(!empty($_FILES['foto']['name']))
		{
			$upload = $this->pegawai_do_upload();

			//delete file
			$pegawai = $this->M_global->pegawai_get_by_id($this->input->post('id_pegawai'));
			if(file_exists('public/images/'.$pegawai->foto) && $pegawai->foto)
				unlink('public/images/'.$pegawai->foto);

			$data['foto'] = $upload;
		}

		$this->db->where('id_pegawai', $this->input->post('id_pegawai'));
		$this->db->update('pegawai', $data);
		echo json_encode(array('status' => TRUE));
	}
	// Config upload
	private function pegawai_do_upload()
	{
		$config['upload_path']          = 'public/images/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 2048; //set max size allowed in Kilobyte
        $config['max_width']            = 99999; // set max width image allowed
        $config['max_height']           = 99999; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('foto')) //upload and validate
        {
            $data['inputerror'][] = 'foto';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}
    // Untuk Validasi
    private function _validate_pegawai()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('nama') == '')
		{
			$data['inputerror'][] = 'nama';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('alamat') == '')
		{
			$data['inputerror'][] = 'alamat';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('tempat_lahir') == '')
		{
			$data['inputerror'][] = 'tempat_lahir';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('tanggal_lahir') == '')
		{
			$data['inputerror'][] = 'tanggal_lahir';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('no_telp') == '')
		{
			$data['inputerror'][] = 'no_telp';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('email') == '')
		{
			$data['inputerror'][] = 'email';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('no_rekening') == '')
		{
			$data['inputerror'][] = 'no_rekening';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('npwp') == '')
		{
			$data['inputerror'][] = 'npwp';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('agama') == '')
		{
			$data['inputerror'][] = 'agama';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
	/*Keluarga*/
    public function data_keluarga_edit_data($id_pegawai)
    {
		$query = $this->db->query('SELECT *, tanggal_lahir as tanggal_lahir_k, tempat_lahir as tempat_lahir_k FROM keluarga WHERE id_pegawai = "'.$id_pegawai.'"');
		if (isset($query)) {
    		$status = 'success';
    		$query = $query;
    	}else {
    		$status = 'error';
    		$query = 'error';
    	}
    	$query = $query->row();
    	header('Content-Type: application/json');
    	echo json_encode(array('status' => $status, 'data' => $query));
    }

    public function keluarga_insert_data()
    {
    	$this->_validate_keluarga();
    	$data = array(
				'id_pegawai' => $this->input->post('id_pegawais'),
				'status' => $this->input->post('statuss'),
				'nama_pasangan' => $this->input->post('nama_pasangans'),
				'tempat_lahir' => $this->input->post('tempat_lahirs'),
				'tanggal_lahir' => $this->input->post('tanggal_lahirs'),
				'created' => date('Y-m-d H:i:s'),
				'updated' => date('Y-m-d H:i:s')
			);

		$dbInsert = $this->db->insert('keluarga', $data);
		echo json_encode(array('status' => TRUE));
    }

    public function keluarga_update_data()
    {
		$this->_validate_keluarga();
		$data = array(
				'id_pegawai' => $this->input->post('id_pegawais'),
				'status' => $this->input->post('statuss'),
				'nama_pasangan' => $this->input->post('nama_pasangans'),
				'tempat_lahir' => $this->input->post('tempat_lahirs'),
				'tanggal_lahir' => $this->input->post('tanggal_lahirs'),
				'updated' => date('Y-m-d H:i:s')
			);

		$this->db->where('id_pegawai', $this->input->post('id_pegawais'));
		$this->db->update('keluarga', $data);
		echo json_encode(array('status' => TRUE));
    }
   // Untuk Validasi
    private function _validate_keluarga()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('id_pegawais') == '')
		{
			$data['inputerror'][] = 'id_pegawais';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('statuss') == '')
		{
			$data['inputerror'][] = 'statuss';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('nama_pasangans') == '')
		{
			$data['inputerror'][] = 'nama_pasangans';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('tempat_lahirs') == '')
		{
			$data['inputerror'][] = 'tempat_lahirs';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('tanggal_lahirs') == '')
		{
			$data['inputerror'][] = 'tanggal_lahirs';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
	/*End Keluarga*/
/*Start Anak Done*/

	// Data JSON update
    public function anak_edit_data($id_anak)
    {
    	$this->db->from('anak');
		$this->db->where('id_anak',$id_anak);
		$query = $this->db->get();
		if (isset($query)) {
    		$status = 'success';
    		$query = $query;
    	}else {
    		$status = 'error';
    		$query = 'error';
    	}
    	$query = $query->row();
    	header('Content-Type: application/json');
    	echo json_encode(array('status' => $status, 'data' => $query));
    }
    // Aksi Insert
    public function anak_insert_data()
    {
    	$this->_validate_anak();
    	$data = array(
				'id_pegawai' => $this->input->post('id_pegawaia'),
				'anakke' => $this->input->post('anakke'),
				'nama_anak' => $this->input->post('nama_anak'),
				'tempat_lahir' => $this->input->post('tempat_lahir_a'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir_a'),
				'created' => date('Y-m-d H:i:s'),
				'updated' => date('Y-m-d H:i:s')
			);

		$dbInsert = $this->db->insert('anak', $data);
		echo json_encode(array('status' => TRUE));
    }
    // Aksi Update
    public function anak_update_data()
    {
		$this->_validate_anak();
		$data = array(
				// 'id_pegawai' => $this->input->post('id_pegawaia'),
				'anakke' => $this->input->post('anakke'),
				'nama_anak' => $this->input->post('nama_anak'),
				'tempat_lahir' => $this->input->post('tempat_lahir_a'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir_a'),
				'updated' => date('Y-m-d H:i:s')
			);

		$this->db->where('id_anak', $this->input->post('id_anak'));
		$this->db->update('anak', $data);
		echo json_encode(array('status' => TRUE));
    }
    // Aksi Delete
    public function anak_delete_data($id_anak)
    {
    	$this->db->where('id_anak', $id_anak);
    	$this->db->delete('anak');
    	echo json_encode(array("status" => TRUE));
    }
    // Untuk Validasi
    private function _validate_anak()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('anakke') == '')
		{
			$data['inputerror'][] = 'anakke';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('nama_anak') == '')
		{
			$data['inputerror'][] = 'nama_anak';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('tempat_lahir_a') == '')
		{
			$data['inputerror'][] = 'tempat_lahir_a';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('tanggal_lahir_a') == '')
		{
			$data['inputerror'][] = 'tanggal_lahir_a';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
	/*End Anak*/

/*Data Pegawai*/
/* Reuqest Pelatihan*/
	public function request_judul()
	{
		$ambil_akun = $this->M_global->ambil_user($this->session->userdata('username'));
		$data = array('username' => $ambil_akun);
		$stat = $this->session->userdata('level');
		$data['modules']  = 'request';
		$data['content']  = 'user_data/request/request';
		$data['modals']   = 'user_data/request/request_modal';
		
		if ($stat=='Staff') {
			$this->load->view('index_user', $data);	
		} else if ($stat=='Administrator') {
			redirect('login/logout','refresh');
		} else {
			$this->session->sess_destroy();
			echo "<script> alert('Cek username dan password!'); </script>";
			redirect(base_url(),'refresh');
		}
	}

	// Data JSON show
	public function request_data_all()
	{
		$id_pegawai = $this->session->userdata('id_pegawai');
    	$this->db->order_by('id_pelatihan', 'desc');
		$this->db->where(array('id_pegawai' => $id_pegawai));
    	$query = $this->db->get('pelatihan');
    	$query = $query->result();
    	if (isset($query)) {
    		$status = 'success';
    		$query = $query;
    	}else {
    		$status = 'error';
    		$query = 'error';
    	}
    	header('Content-Type: application/json');
    	echo json_encode(array('status' => $status, 'data' => $query));
	}

	public function pelatihan_realisasi_data()
	{
		$id_pegawai = $this->session->userdata('id_pegawai');
    	$query = $this->db->query('SELECT * FROM pelatihan WHERE status_pelatihan = "Realisasi Peserta" OR status_pelatihan = "Menunggu Approval" AND id_pegawai = "'.$id_pegawai.'" ORDER BY id_pelatihan DESC');
    	$query = $query->result();
    	if (isset($query)) {
    		$status = 'success';
    		$query = $query;
    	}else {
    		$status = 'error';
    		$query = 'error';
    	}
    	header('Content-Type: application/json');
    	echo json_encode(array('status' => $status, 'data' => $query));
	}

    public function peserta_pelatihan_realisasi_data_all($id_pelatihan)
    {
    	$id_pegawai = $this->session->userdata('id_pegawai');
		$query = $this->db->query('SELECT pp.*, pg.*, pg.id_pegawai AS id_peg, pl.*, bd.* FROM pelatihan_peserta pp
					JOIN pegawai pg ON pp.id_pegawai = pg.id_pegawai
					JOIN pelatihan pl ON pp.id_pelatihan = pl.id_pelatihan
					JOIN bidang bd ON pp.id_bidang = bd.id_bidang 
					WHERE pl.id_pelatihan = "'.$id_pelatihan.'"
					AND pl.status_pelatihan = "Realisasi Peserta"
					ORDER BY pp.id_peserta DESC');
		$query = $query->result();
    	if (isset($query)) {
    		$status = 'success';
    		$query = $query;
    	}else {
    		$status = 'error';
    		$query = 'error';
    	}
    	header('Content-Type: application/json');
    	echo json_encode(array('status' => $status, 'data' => $query));
    }

	public function request_data()
	{
		$id_pegawai = $this->session->userdata('id_pegawai');
    	$this->db->order_by('id_pelatihan', 'desc');
		$this->db->where(array('id_pegawai' => $id_pegawai, 'status_pelatihan' => 'Menunggu Approval'));
    	$query = $this->db->get('pelatihan');
    	$query = $query->result();
    	if (isset($query)) {
    		$status = 'success';
    		$query = $query;
    	}else {
    		$status = 'error';
    		$query = 'error';
    	}
    	header('Content-Type: application/json');
    	echo json_encode(array('status' => $status, 'data' => $query));
	}

	public function request_realisasi_data()
	{
		$rel = "Realisasi Peserta";
		$id_pegawai = $this->session->userdata('id_pegawai');
    	$query = $this->db->query('SELECT * FROM pelatihan WHERE status_pelatihan = "'.$rel.'" AND id_pegawai = "'.$id_pegawai.'" ORDER BY id_pelatihan DESC');
    	$query = $query->result();
    	if (isset($query)) {
    		$status = 'success';
    		$query = $query;
    	}else {
    		$status = 'error';
    		$query = 'error';
    	}
    	header('Content-Type: application/json');
    	echo json_encode(array('status' => $status, 'data' => $query));
	}

	public function request_realisasi_select_data()
	{
		$rel = "Realisasi Peserta";
		$id_pegawai = $this->session->userdata('id_pegawai');
    	$query = $this->db->query('SELECT * FROM pelatihan WHERE status_pelatihan = "'.$rel.'" AND id_pegawai = "'.$id_pegawai.'" ORDER BY id_pelatihan DESC');
    	$query = $query->result();
    	if (isset($query)) {
    		$status = 'success';
    		$query = $query;
    	}else {
    		$status = 'error';
    		$query = 'error';
    	}
    	header('Content-Type: application/json');
    	echo json_encode(array('status' => $status, 'data' => $query));
	}
	// Data JSON update
    public function request_edit_data($id_pelatihan)
    {
    	$this->db->from('pelatihan');
		$this->db->where('id_pelatihan',$id_pelatihan);
		$query = $this->db->get();
		if (isset($query)) {
    		$status = 'success';
    		$query = $query;
    	}else {
    		$status = 'error';
    		$query = 'error';
    	}
    	$query = $query->row();
    	header('Content-Type: application/json');
    	echo json_encode(array('status' => $status, 'data' => $query));
    }
    // Aksi Insert
    public function request_insert_data()
    {
		$id_pegawai = $this->session->userdata('id_pegawai');
    	$this->_validate_request();
    	$data = array(
				'id_pegawai' => $id_pegawai,
				'judul_pelatihan' => $this->input->post('judul_pelatihan'),
				'jumlah_peserta' => $this->input->post('jumlah_peserta'),
				'status_pelatihan' => 'Menunggu Approval',
				'jumlah_peserta_realisasi' => '0',
				'created' => date('Y-m-d H:i:s'),
				'updated' => date('Y-m-d H:i:s')
			);

		$dbInsert = $this->db->insert('pelatihan', $data);
		echo json_encode(array('status' => TRUE));
    }
    // Aksi Update
    public function request_update_data()
    {
		$id_pegawai = $this->session->userdata('id_pegawai');
		$this->_validate_request();
		$data = array(
				'id_pegawai' => $id_pegawai,
				'judul_pelatihan' => $this->input->post('judul_pelatihan'),
				'jumlah_peserta' => $this->input->post('jumlah_peserta'),
				'status_pelatihan' => 'Menunggu Approval',
				'updated' => date('Y-m-d H:i:s')
			);

		$this->db->where('id_pelatihan', $this->input->post('id_pelatihan'));
		$this->db->update('pelatihan', $data);
		echo json_encode(array('status' => TRUE));
    }
    // Aksi Delete
    public function request_delete_data($id_pelatihan)
    {
    	$this->db->where('id_pelatihan', $id_pelatihan);
    	$this->db->delete('pelatihan');
    	echo json_encode(array("status" => TRUE));
    }
    // Untuk Validasi
    private function _validate_request()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('judul_pelatihan') == '')
		{
			$data['inputerror'][] = 'judul_pelatihan';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('jumlah_peserta') == '')
		{
			$data['inputerror'][] = 'jumlah_peserta';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	public function save_peserta_pelatihan()
	{
    	$this->_validate_peserta_pelatihan();
    	$data = array(
				'id_pegawai' => $this->input->post('id_pegawai_pel'),
				'id_bidang' => $this->input->post('id_bidang_pel'),
				'id_pelatihan' => $this->input->post('id_pelatihan'),
				'history_pelatihan' => $this->input->post('history_pelatihan'),
				'created' => date('Y-m-d H:i:s'),
				'updated' => date('Y-m-d H:i:s')
			);

		$dbInsert = $this->db->insert('pelatihan_peserta', $data);
		echo json_encode(array('status' => TRUE));
    }

    public function update_peserta_pelatihan()
    {
		$this->_validate_peserta_pelatihan();
    	$data = array(
				'id_pegawai' => $this->input->post('id_pegawai_pel'),
				'id_bidang' => $this->input->post('id_bidang_pel'),
				'id_pelatihan' => $this->input->post('id_pelatihan'),
				'history_pelatihan' => $this->input->post('history_pelatihan'),
				'updated' => date('Y-m-d H:i:s')
			);
		$this->db->where('id_peserta', $this->input->post('id_peserta'));
		$this->db->update('pelatihan_peserta', $data);
		echo json_encode(array('status' => TRUE));
    }

/* Gaps */
	// Data JSON show
	
	// Data JSON update
    public function gaps_edit_data($id_pelatihan)
    {
    	$this->db->from('pelatihan');
			$this->db->where('id_pelatihan',$id_pelatihan);
			$query = $this->db->get();
			if (isset($query)) {
    		$status = 'success';
    		$query = $query;
    	}else {
    		$status = 'error';
    		$query = 'error';
    	}
    	$query = $query->row();
    	header('Content-Type: application/json');
    	echo json_encode(array('status' => $status, 'data' => $query));
    } 
	// Aksi Update
	public function gaps_update_data()
	{
		$data = array(
				'form_pelatihan' => $this->input->post('form_pelatihan'),
				'updated' => date('Y-m-d H:i:s'),
			);

		if($this->input->post('remove_gambar_gaps')) // if remove photo_user checked
		{
			if(file_exists('public/images/'.$this->input->post('remove_gambar_gaps')) && $this->input->post('remove_gambar_gaps'))
				unlink('public/images/'.$this->input->post('remove_gambar_gaps'));
			$data['form_pelatihan'] = '';
		}

		if(!empty($_FILES['form_pelatihan']['name']))
		{
			$upload = $this->gaps_do_upload();

			//delete file
			$gaps = $this->M_global->gaps_get_by_id($this->input->post('id_pelatihan'));
			if(file_exists('public/images/'.$gaps->form_pelatihan) && $gaps->form_pelatihan)
				unlink('public/images/'.$gaps->form_pelatihan);

			$data['form_pelatihan'] = $upload;
		}

		$this->db->where('id_pelatihan', $this->input->post('id_pelatihan'));
		$this->db->update('pelatihan', $data);
		echo json_encode(array('status' => TRUE));
	}
	// Config upload 
	private function gaps_do_upload()
	{
		$config['upload_path']          = 'public/images/';
        $config['allowed_types']        = 'pdf|doc|docx';
        $config['max_size']             = 99999; //set max size allowed in Kilobyte
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('form_pelatihan')) //upload and validate
        {
            $data['inputerror'][] = 'form_pelatihan';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}
/*End Gaps*/

    // Untuk Validasi
    private function _validate_peserta_pelatihan()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('id_pegawai_pel') == '')
		{
			$data['inputerror'][] = 'id_pegawai_pel';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('id_bidang_pel') == '')
		{
			$data['inputerror'][] = 'id_bidang_pel';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
/* End Reuqest Pelatihan*/

/* TNA*/
	public function tna()
	{
		$ambil_akun = $this->M_global->ambil_user($this->session->userdata('username'));
		$data = array('username' => $ambil_akun);
		$stat = $this->session->userdata('level');
		$data['modules']  = 'request';
		$data['content']  = 'user_data/tna/tna';
		$data['modals']   = 'user_data/request/request_modal';
		
		if ($stat=='Staff') {
			$this->load->view('index_user', $data);	
		} else if ($stat=='Administrator') {
			redirect('login/logout','refresh');
		} else {
			$this->session->sess_destroy();
			echo "<script> alert('Cek username dan password!'); </script>";
			redirect(base_url(),'refresh');
		}
	}
/* END TNA*/

/*sertifikasi*/
	public function sertifikasi()
	{
		$ambil_akun = $this->M_global->ambil_user($this->session->userdata('username'));
		$data = array('username' => $ambil_akun);
		$stat = $this->session->userdata('level');
		$data['modules']  = 'sertifikasi';
		$data['content']  = 'user_data/sertifikasi/sertifikasi';
		$data['modals']   = 'user_data/sertifikasi/sertifikasi_modal';
		
		if ($stat=='Staff') {
			$this->load->view('index_user', $data);	
		} else if ($stat=='Administrator') {
			redirect('login/logout','refresh');
		} else {
			$this->session->sess_destroy();
			echo "<script> alert('Cek username dan password!'); </script>";
			redirect(base_url(),'refresh');
		}
	}

	public function sertifikasi_data()
	{
		$id_pegawai = $this->session->userdata('id_pegawai');
    	$query = $this->db->query('SELECT s.*, p.*, l.*, b.* FROM sertifikasi s 
									JOIN pegawai p ON s.id_pegawai = p.id_pegawai
									JOIN level l ON s.id_level = l.id_level
									JOIN bidang b ON s.id_bidang = b.id_bidang
									WHERE p.id_pegawai = "'.$id_pegawai.'"
									ORDER BY s.id_sertifikasi DESC');
    	$query = $query->result();
    	if (isset($query)) {
    		$status = 'success';
    		$query = $query;
    	}else {
    		$status = 'error';
    		$query = 'error';
    	}
    	header('Content-Type: application/json');
    	echo json_encode(array('status' => $status, 'data' => $query));
	}
/*ENDsertifikasi*/

/*Start History*/
	public function history()
	{
		$ambil_akun = $this->M_global->ambil_user($this->session->userdata('username'));
		$data = array('username' => $ambil_akun);
		$stat = $this->session->userdata('level');
		$data['modules']  = 'history';
		$data['content']  = 'user_data/history/history';
		$data['modals']   = 'user_data/history/history_modal';
		
		if ($stat=='Staff') {
			$this->load->view('index_user', $data);	
		} else if ($stat=='Administrator') {
			redirect('login/logout','refresh');
		} else {
			$this->session->sess_destroy();
			echo "<script> alert('Cek username dan password!'); </script>";
			redirect(base_url(),'refresh');
		}
	}

	public function history_pelatihan_data()
	{
		$id_pegawai = $this->session->userdata('id_pegawai');
    	$query = $this->db->query('SELECT h.*, p.*, pl.*, s.* FROM history h JOIN pegawai p ON h.id_pegawai = p.id_pegawai LEFT JOIN pelatihan pl ON h.id_pelatihan = pl.id_pelatihan LEFT JOIN sertifikasi s ON h.id_sertifikasi = s.id_sertifikasi WHERE p.id_pegawai = "'.$id_pegawai.'"  ORDER BY s.status_sertifikasi ASC');
    	$query = $query->result();
    	if (isset($query)) {
    		$status = 'success';
    		$query = $query;
    	}else {
    		$status = 'error';
    		$query = 'error';
    	}
    	header('Content-Type: application/json');
    	echo json_encode(array('status' => $status, 'data' => $query));
	}

	public function history_sertifikasi_data()
	{

	}
/*End History*/
}

/* End of file Index.php */
/* Location: ./application/controllers/Index.php */