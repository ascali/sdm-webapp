<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

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
		$data['modules'] = 'dashboard';
		$data['content'] = 'master_data/dashboard/dashboard';
		$data['modals']  = 'master_data/dashboard/dashboard_modal';


		if ($stat=='Administrator') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pegawai') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pelatihan') {
			$this->load->view('index', $data);
		} else if ($stat=='Staff') {
			redirect('login/logout','refresh');
		} else {
			$this->session->sess_destroy();
			echo "<script> alert('Cek username dan password!'); </script>";
			redirect(base_url(),'refresh');
		}
	}

/*Start Dashboard*/
	// Halaman modul
	public function dashboard()
	{
		$ambil_akun = $this->M_global->ambil_user($this->session->userdata('username'));
		$data = array('username' => $ambil_akun);
		$stat = $this->session->userdata('level');
		$data['modules'] = 'dashboard';
		$data['content'] = 'master_data/dashboard/dashboard';
		$data['modals']  = 'master_data/dashboard/dashboard_modal';

		if ($stat=='Administrator') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pegawai') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pelatihan') {
			$this->load->view('index', $data);
		} else if ($stat=='Staff') {
			redirect('login/logout','refresh');
		} else {
			$this->session->sess_destroy();
			echo "<script> alert('Cek username dan password!'); </script>";
			redirect(base_url(),'refresh');
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

	public function dashboard_data2()
	{
		$query = "SELECT b.nama_bidang AS bidangs, COUNT(*) as count_peg FROM pegawai p
                    JOIN bidang b on p.id_bidang=b.id_bidang
                    GROUP BY bidangs ORDER BY bidangs ASC";
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
    		$datValJ = $val->bidangs;
    		$datVal = $val->count_peg;

    		$query = array('name' => $datValJ, 'y' => (int)$datVal);
			array_push($data_array['data'], $query);
    	}

    	header('Content-Type: application/json');
    	echo json_encode($data_array);
	}
/*End Dashboard*/

/*Start Users Done*/
	// Halaman modul
	public function users()
	{
		$ambil_akun = $this->M_global->ambil_user($this->session->userdata('username'));
		$data = array('username' => $ambil_akun);
		$stat = $this->session->userdata('level');
		$data['modules']  = 'users';
		$data['content']  = 'master_data/admin/admin';
		$data['modals']   = 'master_data/admin/admin_modal';

		if ($stat=='Administrator') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pegawai') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pelatihan') {
			$this->load->view('index', $data);
		} else if ($stat=='Staff') {
			redirect('login/logout','refresh');
		} else {
			$this->session->sess_destroy();
			echo "<script> alert('Cek username dan password!'); </script>";
			redirect(base_url(),'refresh');
		}
	}
	// Data JSON show
	public function users_data()
	{
    	$this->db->order_by('id_admin', 'desc');
    	$query = $this->db->get('admin');
    	// $query = $this->db->query('SELECT a.*, b.nama as nama_menu, c.nama as nama_submenu FROM admin a
    								// LEFT JOIN menu b ON(a.id_menu=b.id AND a.status_admin="menu")
    								// LEFT JOIN submenu c ON(a.id_menu=c.id AND a.status_admin="submenu") ORDER BY a.id DESC');
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
    public function users_edit_data($id_admin)
    {
    	$this->db->from('admin');
		$this->db->where('id_admin',$id_admin);
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
    public function users_insert_data()
    {

    	$this->_validate_admin();

    	$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'id_pegawai' => $this->input->post('id_pegawai'),
				'level' => $this->input->post('level'),
				'created' => date('Y-m-d H:i:s'),
				'updated' => date('Y-m-d H:i:s')
			);

		$dbInsert = $this->db->insert('admin', $data);
		echo json_encode(array('status' => TRUE));
    }
    // Aksi Update
    public function users_update_data()
    {
		// $this->_validate_admin();
		$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'id_pegawai' => $this->input->post('id_pegawai'),
				'level' => $this->input->post('level'),
				'updated' => date('Y-m-d H:i:s')
			);

		$this->db->where('id_admin', $this->input->post('id_admin'));
		$this->db->update('admin', $data);
		echo json_encode(array('status' => TRUE));
    }
    // Aksi Delete
    public function users_delete_data($id_admin)
    {
    	$this->db->where('id_admin', $id_admin);
    	$this->db->delete('admin');
    	echo json_encode(array("status" => TRUE));
    }
    // Untuk Validasi
    private function _validate_admin()
	{

		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

    	$un = $this->input->post('username');
		$ip = $this->input->post('id_pegawai');
		$lv = $this->input->post('level');

		$validIP = $this->db->query("SELECT * FROM admin WHERE id_pegawai = '$ip' AND username = '$un' AND level = '$lv'");
		$validUN = $this->db->query("SELECT * FROM admin WHERE username = '$un' AND level = '$lv'");
		$validLV = $this->db->query("SELECT * FROM admin WHERE username = '$un' AND level = '$lv' ");

		if($ip == '')
		{
			$data['inputerror'][] = 'id_pegawai';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}
		else if($validIP->num_rows() > 0)
		{
			$data['inputerror'][] = 'id_pegawai';
			$data['error_string'][] = 'data sudah ada';
			$data['status'] = FALSE;
		}
		else
		{
			$data['inputerror'][] = 'id_pegawai';
			$data['error_string'][] = 'tidak ada data yang sama, lanjutkan mengisi form';
			$data['status'] = FALSE;
		}

		if($this->input->post('username') == '')
		{
			$data['inputerror'][] = 'username';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}
		else if($validUN->num_rows() > 0)
		{
			$data['inputerror'][] = 'username';
			$data['error_string'][] = 'data sudah ada';
			$data['status'] = FALSE;
		}
		else
		{
			$data['inputerror'][] = 'username';
			$data['error_string'][] = 'tidak ada data yang sama, lanjutkan mengisi form';
			$data['status'] = TRUE;
		}

		if($validLV->num_rows() > 0)
		{
			$data['inputerror'][] = 'level';
			$data['error_string'][] = 'data sudah ada';
			$data['status'] = FALSE;
		}
		else
		{
			$data['inputerror'][] = 'level';
			$data['error_string'][] = 'tidak ada data yang sama, lanjutkan mengisi form';
			$data['status'] = TRUE;
		}

		if($this->input->post('password') == '')
		{
			$data['inputerror'][] = 'password';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('level') == '')
		{
			$data['inputerror'][] = 'level';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
/*End Users*/

/*Start Anak Done*/
	// Halaman modul
	public function anak()
	{
		$ambil_akun = $this->M_global->ambil_user($this->session->userdata('username'));
		$data = array('username' => $ambil_akun);
		$stat = $this->session->userdata('level');
		$data['modules']  = 'anak';
		$data['content']  = 'master_data/anak/anak';
		$data['modals']   = 'master_data/anak/anak_modal';

		if ($stat=='Administrator') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pegawai') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pelatihan') {
			$this->load->view('index', $data);
		} else if ($stat=='Staff') {
			redirect('login/logout','refresh');
		} else {
			$this->session->sess_destroy();
			echo "<script> alert('Cek username dan password!'); </script>";
			redirect(base_url(),'refresh');
		}
	}
	// Data JSON show
	public function anak_data()
	{
    	$this->db->order_by('id_anak', 'desc');
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
	public function data_anak_data($id_pegawai)
	{
		// $id_pegawai = $this->session->userdata('id_pegawai');
    	// $this->db->order_by('id_anak', 'desc');
    	// $this->db->where('id_pegawai', $id_pegawai);
    	// $query = $this->db->get('anak');
    	$query = $this->db->query('SELECT a.*, p.*, a.tempat_lahir as tempat_lahir_a, a.tanggal_lahir as tanggal_lahir_a FROM anak a JOIN pegawai p ON a.id_pegawai = p.id_pegawai WHERE p.id_pegawai = "'.$id_pegawai.'" ORDER BY a.id_anak DESC');
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

/*Start Berita Done*/
	// Halaman modul
	public function berita()
	{
		$ambil_akun = $this->M_global->ambil_user($this->session->userdata('username'));
		$data = array('username' => $ambil_akun);
		$stat = $this->session->userdata('level');
		$data['modules']  = 'berita';
		$data['content']  = 'master_data/berita/berita';
		$data['modals']   = 'master_data/berita/berita_modal';

		if ($stat=='Administrator') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pegawai') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pelatihan') {
			$this->load->view('index', $data);
		} else if ($stat=='Staff') {
			redirect('login/logout','refresh');
		} else {
			$this->session->sess_destroy();
			echo "<script> alert('Cek username dan password!'); </script>";
			redirect(base_url(),'refresh');
		}
	}
	// Data JSON show
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
	// Data JSON update
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
    // Aksi Insert
	public function berita_insert_data()
	{
		$this->_validate_berita();

		$data = array(
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),
				'created' => date('Y-m-d H:i:s'),
				'updated' => date('Y-m-d H:i:s'),
			);

		if(!empty($_FILES['gambar_berita']['name']))
		{
			$upload = $this->berita_do_upload();
			$data['gambar_berita'] = $upload;
		}

		$dbInsert = $this->db->insert('berita', $data);
		echo json_encode(array('status' => TRUE));
	}
	// Aksi Update
	public function berita_update_data()
	{
		$this->_validate_berita();
		$data = array(
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),
				'updated' => date('Y-m-d H:i:s'),
			);

		if($this->input->post('remove_gambar_berita')) // if remove photo_user checked
		{
			if(file_exists('public/images/'.$this->input->post('remove_gambar_berita')) && $this->input->post('remove_gambar_berita'))
				unlink('public/images/'.$this->input->post('remove_gambar_berita'));
			$data['gambar_berita'] = '';
		}

		if(!empty($_FILES['gambar_berita']['name']))
		{
			$upload = $this->berita_do_upload();

			//delete file
			$berita = $this->M_global->berita_get_by_id($this->input->post('id_berita'));
			if(file_exists('public/images/'.$berita->gambar_berita) && $berita->gambar_berita)
				unlink('public/images/'.$berita->gambar_berita);

			$data['gambar_berita'] = $upload;
		}

		$this->db->where('id_berita', $this->input->post('id_berita'));
		$this->db->update('berita', $data);
		echo json_encode(array('status' => TRUE));
	}
	// Aksi Delete
	public function berita_delete($id_berita)
	{
		//delete file
		$berita = $this->M_global->berita_get_by_id($id_berita);
		if(file_exists('public/images/'.$berita->gambar_berita) && $berita->gambar_berita)
			unlink('public/images/'.$berita->gambar_berita);

		$this->db->where('id_berita', $id_berita);
    	$this->db->delete('berita');
    	echo json_encode(array("status" => TRUE));
	}
	// Config upload
	private function berita_do_upload()
	{
		$config['upload_path']          = 'public/images/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 9999; //set max size allowed in Kilobyte
        $config['max_width']            = 9999; // set max width image allowed
        $config['max_height']           = 9999; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if(!$this->upload->do_upload('gambar_berita')) //upload and validate
        {
            $data['inputerror'][] = 'gambar_berita';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}
    // Untuk Validasi
    private function _validate_berita()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('judul') == '')
		{
			$data['inputerror'][] = 'judul';
			$data['error_string'][] = 'haurs di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('isi') == '')
		{
			$data['inputerror'][] = 'isi';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
/*End Berita*/

/*Start Bidang Done*/
	// Halaman modul
	public function bidang()
	{
		$ambil_akun = $this->M_global->ambil_user($this->session->userdata('username'));
		$data = array('username' => $ambil_akun);
		$stat = $this->session->userdata('level');
		$data['modules']  = 'bidang';
		$data['content']  = 'master_data/bidang/bidang';
		$data['modals']   = 'master_data/bidang/bidang_modal';

		if ($stat=='Administrator') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pegawai') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pelatihan') {
			$this->load->view('index', $data);
		} else if ($stat=='Staff') {
			redirect('login/logout','refresh');
		} else {
			$this->session->sess_destroy();
			echo "<script> alert('Cek username dan password!'); </script>";
			redirect(base_url(),'refresh');
		}
	}
	// Data JSON show
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
	// Data JSON update
    public function bidang_edit_data($id_bidang)
    {
    	$this->db->from('bidang');
		$this->db->where('id_bidang',$id_bidang);
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
    public function bidang_insert_data()
    {
    	$this->_validate_bidang();
    	$data = array(
				'nama_bidang' => $this->input->post('nama_bidang'),
				'created' => date('Y-m-d H:i:s'),
				'updated' => date('Y-m-d H:i:s')
			);

		$dbInsert = $this->db->insert('bidang', $data);
		echo json_encode(array('status' => TRUE));
    }
    // Aksi Update
    public function bidang_update_data()
    {
		$this->_validate_bidang();
		$data = array(
				'nama_bidang' => $this->input->post('nama_bidang'),
				'updated' => date('Y-m-d H:i:s')
			);

		$this->db->where('id_bidang', $this->input->post('id_bidang'));
		$this->db->update('bidang', $data);
		echo json_encode(array('status' => TRUE));
    }
    // Aksi Delete
    public function bidang_delete_data($id_bidang)
    {
    	$this->db->where('id_bidang', $id_bidang);
    	$this->db->delete('bidang');
    	echo json_encode(array("status" => TRUE));
    }
    // Untuk Validasi
    private function _validate_bidang()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('nama_bidang') == '')
		{
			$data['inputerror'][] = 'nama_bidang';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
/*End Bidang*/

/*Start Keluarga Done*/
	// Halaman modul
	public function Keluarga()
	{
		$ambil_akun = $this->M_global->ambil_user($this->session->userdata('username'));
		$data = array('username' => $ambil_akun);
		$stat = $this->session->userdata('level');
		$data['modules']  = 'keluarga';
		$data['content']  = 'master_data/keluarga/keluarga';
		$data['modals']   = 'master_data/keluarga/keluarga_modal';

		if ($stat=='Administrator') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pegawai') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pelatihan') {
			$this->load->view('index', $data);
		} else if ($stat=='Staff') {
			redirect('login/logout','refresh');
		} else {
			$this->session->sess_destroy();
			echo "<script> alert('Cek username dan password!'); </script>";
			redirect(base_url(),'refresh');
		}
	}
	// Data JSON show
	public function keluarga_data()
	{
    	$query = $this->db->query('SELECT k.*, p.*, p.nama as nama_pegawai, a.*, a.nama_anak as nama_anak, k.tanggal_lahir as tanggal_lahir_k, k.tempat_lahir as tempat_lahir_k  FROM keluarga k JOIN pegawai p ON k.id_pegawai = p.id_pegawai JOIN anak a ON k.id_anak = a.id_anak ORDER BY k.id_keluarga DESC;');
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
	public function data_keluarga_data($id_pegawai)
	{
		// $id_pegawai = $this->session->userdata('id_pegawai');
    	$query = $this->db->query('SELECT k.*, p.*, p.nama as nama_pegawai,  k.tanggal_lahir as tanggal_lahir_k, k.tempat_lahir as tempat_lahir_k  FROM keluarga k JOIN pegawai p ON k.id_pegawai = p.id_pegawai WHERE p.id_pegawai = "'.$id_pegawai.'"');
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

		// if($this->input->post('id_pegawais') == '')
		// {
		// 	$data['inputerror'][] = 'id_pegawais';
		// 	$data['error_string'][] = ' harus di isi';
		// 	$data['status'] = FALSE;
		// }

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

/*Start Level Done*/
	// Halaman modul
	public function level()
	{
		$ambil_akun = $this->M_global->ambil_user($this->session->userdata('username'));
		$data = array('username' => $ambil_akun);
		$stat = $this->session->userdata('level');
		$data['modules']  = 'level';
		$data['content']  = 'master_data/level/level';
		$data['modals']   = 'master_data/level/level_modal';

		if ($stat=='Administrator') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pegawai') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pelatihan') {
			$this->load->view('index', $data);
		} else if ($stat=='Staff') {
			redirect('login/logout','refresh');
		} else {
			$this->session->sess_destroy();
			echo "<script> alert('Cek username dan password!'); </script>";
			redirect(base_url(),'refresh');
		}
	}
	// Data JSON show
	public function level_data()
	{
    	$this->db->order_by('id_level', 'desc');
    	$query = $this->db->get('level');
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
    public function level_edit_data($id_level)
    {
    	$this->db->from('level');
		$this->db->where('id_level',$id_level);
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
    public function level_insert_data()
    {
    	$this->_validate_level();
    	$data = array(
				'level_jabatan' => $this->input->post('level_jabatan'),
				'created' => date('Y-m-d H:i:s'),
				'updated' => date('Y-m-d H:i:s')
			);

		$dbInsert = $this->db->insert('level', $data);
		echo json_encode(array('status' => TRUE));
    }
    // Aksi Update
    public function level_update_data()
    {
		$this->_validate_level();
		$data = array(
				'level_jabatan' => $this->input->post('level_jabatan'),
				'updated' => date('Y-m-d H:i:s')
			);

		$this->db->where('id_level', $this->input->post('id_level'));
		$this->db->update('level', $data);
		echo json_encode(array('status' => TRUE));
    }
    // Aksi Delete
    public function level_delete_data($id_level)
    {
    	$this->db->where('id_level', $id_level);
    	$this->db->delete('level');
    	echo json_encode(array("status" => TRUE));
    }
    // Untuk Validasi
    private function _validate_level()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('level_jabatan') == '')
		{
			$data['inputerror'][] = 'level_jabatan';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
/*End Bidang*/

/*Start Pegawai*/
	// Halaman modul
	public function pegawai()
	{
		$ambil_akun = $this->M_global->ambil_user($this->session->userdata('username'));
		$data = array('username' => $ambil_akun);
		$stat = $this->session->userdata('level');
		$data['modules']  = 'pegawai';
		$data['content']  = 'master_data/pegawai/pegawai';
		$data['modals']   = 'master_data/pegawai/pegawai_modal';

		if ($stat=='Administrator') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pegawai') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pelatihan') {
			$this->load->view('index', $data);
		} else if ($stat=='Staff') {
			redirect('login/logout','refresh');
		} else {
			$this->session->sess_destroy();
			echo "<script> alert('Cek username dan password!'); </script>";
			redirect(base_url(),'refresh');
		}
	}
		public function data_pegawai_data($id_pegawai)
	{
		// $id_pegawai = $this->session->userdata('id_pegawai');
    	$query = $this->db->query("SELECT p.*, b.*, l.*, pd.*, sk.* FROM pegawai p JOIN bidang b ON p.id_bidang = b.id_bidang JOIN level l ON p.id_level = l.id_level JOIN pendidikan pd ON p.id_pendidikan = pd.id_pendidikan JOIN status_kepegawaian sk ON p.id_status = sk.id_status WHERE p.id_pegawai = $id_pegawai");
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
	// Data JSON show
	public function pegawai_data()
	{
    	$query = $this->db->query('SELECT p.*, b.*, l.*, pd.* FROM pegawai p JOIN bidang b ON p.id_bidang = b.id_bidang JOIN level l ON p.id_level = l.id_level JOIN pendidikan pd ON p.id_pendidikan = pd.id_pendidikan ORDER BY p.id_pegawai DESC');
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
	public function data_all_pegawai_data()
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
	// Data JSON update
    public function pegawai_edit_data($id_pegawai)
    {
		$data = "SELECT p.*, b.*, l.*, pd.* FROM pegawai p JOIN bidang b ON p.id_bidang = b.id_bidang JOIN level l ON p.id_level = l.id_level JOIN pendidikan pd ON p.id_pendidikan = pd.id_pendidikan WHERE p.id_pegawai = ".$id_pegawai."";
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
    // Aksi Insert
	public function pegawai_insert_data()
	{
		$this->_validate_pegawai();

		$data = array(
				'nama' => $this->input->post('nama'),
				'nid' => $this->input->post('nid'),
				'id_status' => $this->input->post('id_status'),
				'grade' => $this->input->post('grade'),
				'skala' => $this->input->post('skala'),
				'devisi' => $this->input->post('devisi'),
				'shift' => $this->input->post('shift'),
				'id_bidang' => $this->input->post('id_bidang'),
				'id_level' => $this->input->post('id_level'),
				'id_pendidikan' => $this->input->post('id_pendidikan'),
				'alamat' => $this->input->post('alamat'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'tanggal_masuk' => $this->input->post('tanggal_masuk'),
				'tetap' => $this->input->post('tetap'),
				'no_telp' => $this->input->post('no_telp'),
				'email' => $this->input->post('email'),
				'no_rekening' => $this->input->post('no_rekening'),
				'npwp' => $this->input->post('npwp'),
				'cost_center' => $this->input->post('cost_center'),
				'agama' => $this->input->post('agama'),
				'record_pepelatihan' => '0',
				'status_perkawinan' => $this->input->post('status_perkawinan'),
				'created' => date('Y-m-d H:i:s'),
				'updated' => date('Y-m-d H:i:s'),
			);

		if(!empty($_FILES['foto']['name']))
		{
			$upload = $this->pegawai_do_upload();
			$data['foto'] = $upload;
		}

		$str = $this->input->post('nama');
		$namastr = preg_replace('/\s+/', '', $str);
		$namastrlower = strtolower($namastr);
		$namasubstr = substr($namastrlower,0,6);
		$passuser = substr(number_format(time() * rand(),0,'',''),0,3);
		$pass123456 = '12345678';

		$maxId = $this->db->query("SELECT max(id_pegawai) AS id_pegawai FROM pegawai");
		// $maxId = $maxId->result();
		// $this->db->select_max('id_pegawai');
		// $query = $this->db->get('pegawai');
		if ($maxId->num_rows() > 0) {
			$row = $maxId->row();
			$lastId = $row->id_pegawai;
			$lastId = $lastId + 1;
		}

    	$datas = array(
				'id_pegawai' => $lastId,
				'username' 	 => $namasubstr.$passuser,
				'password' 	 => md5($pass123456),
				'level' 	 => 'Staff',
				'created' 	 => date('Y-m-d H:i:s'),
				'updated' 	 => date('Y-m-d H:i:s')
			);

		$dbInserts = $this->db->insert('admin', $datas);

		$dbInsert = $this->db->insert('pegawai', $data);
		echo json_encode(array('status' => TRUE));
	}
	// Aksi Update
	public function pegawai_update_data()
	{
		// $this->_validate_pegawai();
		$data = array(
				'nama' => $this->input->post('nama'),
				'nid' => $this->input->post('nid'),
				'id_status' => $this->input->post('id_status'),
				'grade' => $this->input->post('grade'),
				'skala' => $this->input->post('skala'),
				'devisi' => $this->input->post('devisi'),
				'shift' => $this->input->post('shift'),
				'id_bidang' => $this->input->post('id_bidang'),
				'id_level' => $this->input->post('id_level'),
				'id_pendidikan' => $this->input->post('id_pendidikan'),
				'alamat' => $this->input->post('alamat'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'tanggal_masuk' => $this->input->post('tanggal_masuk'),
				'tetap' => $this->input->post('tetap'),
				'no_telp' => $this->input->post('no_telp'),
				'email' => $this->input->post('email'),
				'no_rekening' => $this->input->post('no_rekening'),
				'npwp' => $this->input->post('npwp'),
				'cost_center' => $this->input->post('cost_center'),
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
	// Aksi Delete
	public function pegawai_delete($id_pegawai)
	{
		//delete file
		$pegawai = $this->M_global->pegawai_get_by_id($id_pegawai);
		if(file_exists('public/images/'.$pegawai->foto) && $pegawai->foto)
			unlink('public/images/'.$pegawai->foto);

		$this->db->where('id_pegawai', $id_pegawai);
    	$this->db->delete('pegawai');
    	echo json_encode(array("status" => TRUE));
	}
	// Config upload
	private function pegawai_do_upload()
	{
		$config['upload_path']          = 'public/images/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 9999; //set max size allowed in Kilobyte
        $config['max_width']            = 9999; // set max width image allowed
        $config['max_height']           = 9999; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

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

		$nid = $this->input->post('nid');
		$validNID = $this->db->query("SELECT * FROM pegawai WHERE nid = '".$nid."'");

		if($this->input->post('nid') == '')
		{
			$data['inputerror'][] = 'nid';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}
		else if($validNID->num_rows() > 0)
		{
			$data['inputerror'][] = 'nid';
			$data['error_string'][] = 'data sudah ada';
			$data['stat2'] = '22';
			$data['status'] = FALSE;
		}
		else
		{
			$data['inputerror'][] = 'nid';
			$data['error_string'][] = 'tidak ada data NID Pegawai yang sama dengan NID '.$nid.', lanjutkan mengisi form';
			$data['status'] = TRUE;
		}

		if($this->input->post('nama') == '')
		{
			$data['inputerror'][] = 'nama';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('id_status') == '')
		{
			$data['inputerror'][] = 'id_status';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('grade') == '')
		{
			$data['inputerror'][] = 'grade';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('skala') == '')
		{
			$data['inputerror'][] = 'skala';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('devisi') == '')
		{
			$data['inputerror'][] = 'devisi';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('shift') == '')
		{
			$data['inputerror'][] = 'shift';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('id_bidang') == '')
		{
			$data['inputerror'][] = 'id_bidang';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('id_level') == '')
		{
			$data['inputerror'][] = 'id_level';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('id_pendidikan') == '')
		{
			$data['inputerror'][] = 'id_pendidikan';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}

		/*if($this->input->post('alamat') == '')
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
		}*/

		if($this->input->post('tanggal_masuk') == '')
		{
			$data['inputerror'][] = 'tanggal_masuk';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('cost_center') == '')
		{
			$data['inputerror'][] = 'cost_center';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}

		/*if($this->input->post('tetap') == '')
		{
			$data['inputerror'][] = 'tetap';
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
		}*/

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
/*End Pegawai*/

/*Start Pendidikan Done*/
	// Halaman modul
	public function pendidikan()
	{
		$ambil_akun = $this->M_global->ambil_user($this->session->userdata('username'));
		$data = array('username' => $ambil_akun);
		$stat = $this->session->userdata('level');
		$data['modules']  = 'pendidikan';
		$data['content']  = 'master_data/pendidikan/pendidikan';
		$data['modals']   = 'master_data/pendidikan/pendidikan_modal';

		if ($stat=='Administrator') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pegawai') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pelatihan') {
			$this->load->view('index', $data);
		} else if ($stat=='Staff') {
			redirect('login/logout','refresh');
		} else {
			$this->session->sess_destroy();
			echo "<script> alert('Cek username dan password!'); </script>";
			redirect(base_url(),'refresh');
		}
	}
	// Data JSON show
	public function pendidikan_data()
	{
    	$this->db->order_by('id_pendidikan', 'desc');
    	$query = $this->db->get('pendidikan');
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
    public function pendidikan_edit_data($id_pendidikan)
    {
    	$this->db->from('pendidikan');
		$this->db->where('id_pendidikan',$id_pendidikan);
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
    public function pendidikan_insert_data()
    {
    	$this->_validate_pendidikan();
    	$data = array(
				'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
				// 'tahun_lulus' => $this->input->post('tahun_lulus'),
				'created' => date('Y-m-d H:i:s'),
				'updated' => date('Y-m-d H:i:s')
			);

		$dbInsert = $this->db->insert('pendidikan', $data);
		echo json_encode(array('status' => TRUE));
    }
    // Aksi Update
    public function pendidikan_update_data()
    {
		$this->_validate_pendidikan();
		$data = array(
				'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
				// 'tahun_lulus' => $this->input->post('tahun_lulus'),
				'updated' => date('Y-m-d H:i:s')
			);

		$this->db->where('id_pendidikan', $this->input->post('id_pendidikan'));
		$this->db->update('pendidikan', $data);
		echo json_encode(array('status' => TRUE));
    }
    // Aksi Delete
    public function pendidikan_delete_data($id_pendidikan)
    {
    	$this->db->where('id_pendidikan', $id_pendidikan);
    	$this->db->delete('pendidikan');
    	echo json_encode(array("status" => TRUE));
    }
    // Untuk Validasi
    private function _validate_pendidikan()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('pendidikan_terakhir') == '')
		{
			$data['inputerror'][] = 'pendidikan_terakhir';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		// if($this->input->post('tahun_lulus') == '')
		// {
		// 	$data['inputerror'][] = 'tahun_lulus';
		// 	$data['error_string'][] = ' harus di isi';
		// 	$data['status'] = FALSE;
		// }

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
/*End Bidang*/


/*Start Pelatihan*/
	// Halaman modul
	public function pelatihan()
	{
		$ambil_akun = $this->M_global->ambil_user($this->session->userdata('username'));
		$data = array('username' => $ambil_akun);
		$stat = $this->session->userdata('level');

		$data['modules'] = 'pelatihan';
		$data['modals']  = 'master_data/pelatihan/pelatihan_modal';
		$data['content'] = 'master_data/pelatihan/pelatihan';

		if ($stat=='Administrator') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pegawai') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pelatihan') {
			$this->load->view('index', $data);
		} else if ($stat=='Staff') {
			redirect('login/logout','refresh');
		} else {
			$this->session->sess_destroy();
			echo "<script> alert('Cek username dan password!'); </script>";
			redirect(base_url(),'refresh');
		}
	}

	public function pelatihan_data_all()
	{
    	$query = $this->db->query('SELECT p.*, pg.* FROM pelatihan p JOIN pegawai pg ON p.id_pegawai = pg.id_pegawai ORDER BY id_pelatihan DESC');
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

	public function pelatihan_data()
	{
    	$query = $this->db->query('SELECT p.*, pg.* FROM pelatihan p JOIN pegawai pg ON p.id_pegawai = pg.id_pegawai WHERE status_pelatihan = "Menunggu Approval" ORDER BY id_pelatihan DESC');
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
    	$query = $this->db->query('SELECT p.*, pg.* FROM pelatihan p JOIN pegawai pg ON p.id_pegawai = pg.id_pegawai WHERE status_pelatihan = "Realisasi Peserta" ORDER BY id_pelatihan DESC');
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
    public function pelatihan_edit_data($id_pelatihan)
    {
    	$query = "SELECT pl.*, pg.* FROM pelatihan pl
					JOIN pegawai pg ON pl.id_pegawai = pg.id_pegawai
					WHERE pl.id_pelatihan = '".$id_pelatihan."' ";
		$query = $this->db->query($query);
  //   	$this->db->from('pelatihan');
		// $this->db->where('id_pelatihan',$id_pelatihan);
		// $query = $this->db->get();
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

    public function peserta_pelatihan_realisasi_data_all()
    {
    	$query = "SELECT pp.*, pg.*, pl.*, bd.*, pg.nid as nid FROM pelatihan_peserta pp
					JOIN pegawai pg ON pp.id_pegawai = pg.id_pegawai
					JOIN pelatihan pl ON pp.id_pelatihan = pl.id_pelatihan
					JOIN bidang bd ON pp.id_bidang = bd.id_bidang WHERE pl.status_pelatihan = 'Pelatihan Sukses dan Mendapatkan Sertifikat' ORDER BY pp.id_peserta DESC";
		$query = $this->db->query($query);
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

	public function pelatihan_insert_data()
	{
		$this->validasi_pelatihan();
		$data = array(
				'id_pegawai' => $this->input->post('id_pegawai'),
				'judul_pelatihan' => $this->input->post('judul_pelatihan'),
				'jumlah_peserta' => $this->input->post('jumlah_peserta'),
				'status_pelatihan' => 'Menunggu Approval',
				'jumlah_peserta_realisasi' => '0',
				'created' => date('Y-m-d H:i:s'),
				'updated' => date('Y-m-d H:i:s')
			);
		$this->db->insert('pelatihan', $data);
		echo json_encode(array('status' => TRUE));

	}

	public function pelatihan_update_data()
	{
		// $this->validasi_pelatihan();
		$data = array(
				'id_pegawai' => $this->input->post('id_pegawai'),
				'judul_pelatihan' => $this->input->post('judul_pelatihan'),
				'jumlah_peserta' => $this->input->post('jumlah_peserta'),
				'status_pelatihan' => 'Menunggu Approval',
				'jumlah_peserta_realisasi' => '0',
				'updated' => date('Y-m-d H:i:s')
			);
		$this->db->where('id_pelatihan', $this->input->post('id_pelatihan'));
		$this->db->update('pelatihan', $data);
		echo json_encode(array('status' => TRUE));
	}

	public function pelatihan_save_realisasi_data()
	{
		// $this->validasi_pelatihan();
		$data = array(
				// 'lembaga_pelatihan' => $this->input->post('lembaga_pelatihan'),
				// 'pelaksanaan_awal' => $this->input->post('pelaksanaan_awal'),
				// 'pelaksanaan_akhir' => $this->input->post('pelaksanaan_akhir'),
				'status_pelatihan' => 'Realisasi Peserta',
				'jumlah_peserta_realisasi' => $this->input->post('jumlah_peserta_realisasi'),
				'updated' => date('Y-m-d H:i:s')
			);
		$this->db->where('id_pelatihan', $this->input->post('id_pelatihan'));
		$this->db->update('pelatihan', $data);

		$data_peserta = array(
				'id_pegawai' => $this->input->post('id_pegawai'),
				'id_pelatihan' => $this->input->post('id_pelatihan'),
				'id_bidang' => $this->input->post('id_bidang')
			);
		$this->db->insert('pelatihan_peserta', $data_peserta);
		echo json_encode(array('status' => TRUE));
	}

	public function success_pelatihan_save_realisasi_data()
	{

		$data = array(
				'lembaga_pelatihan' => $this->input->post('lembaga_pelatihan'),
				'pelaksanaan_awal' => $this->input->post('pelaksanaan_awal'),
				'pelaksanaan_akhir' => $this->input->post('pelaksanaan_akhir'),
				'judul_pelatihan' => $this->input->post('judul_pelatihan'),
				// 'jumlah_peserta' => $this->input->post('jumlah_peserta'),
				'jumlah_peserta_realisasi' => $this->input->post('jumlah_peserta_realisasi'),
				'status_pelatihan' => 'Pelatihan Sukses dan Mendapatkan Sertifikat',
				'updated' => date('Y-m-d H:i:s')
			);
		$this->db->where('id_pelatihan', $this->input->post('id_pelatihan'));
		$this->db->update('pelatihan', $data);

		$maxid = $this->input->post('id_pelatihan');
		$id_peg = $this->input->post('id_pegawai');
		// $row = $this->db->query('SELECT MAX(id) AS maxid FROM sertifikasi')->row();
		// if ($row) {
		//     $maxid = $row->maxid;
		// }

		$dataH = array(
					'id_pelatihan' => $maxid,
					'id_pegawai' => $id_peg,
					'status_history' => 'Pelatihan',
					'created' => date('Y-m-d H:i:s'),
					'updated' => date('Y-m-d H:i:s')
				);
		$this->db->insert('history', $dataH);

		echo json_encode(array('status' => TRUE));
	}
    // Aksi Delete
    public function pelatihan_delete_data($id_pelatihan)
    {
    	$this->db->where('id_pelatihan', $id_pelatihan);
    	$this->db->delete('pelatihan');
    	echo json_encode(array("status" => TRUE));
    }
    // Untuk Validasi
    private function validasi_pelatihan()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('id_pegawai') == '')
		{
			$data['inputerror'][] = 'id_pegawai';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('judul_pelatihan') == '')
		{
			$data['inputerror'][] = 'judul_pelatihan';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
/*End Pelatihan*/

/*Start Sertifikasi*/
	public function sertifikasi()
	{
		$ambil_akun = $this->M_global->ambil_user($this->session->userdata('username'));
		$data = array('username' => $ambil_akun);
		$stat = $this->session->userdata('level');

		$data['modules'] = 'sertifikasi';
		$data['modals']  = 'master_data/sertifikasi/sertifikasi_modal';
		$data['content'] = 'master_data/sertifikasi/Sertifikasi';

		if ($stat=='Administrator') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pegawai') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pelatihan') {
			$this->load->view('index', $data);
		} else if ($stat=='Staff') {
			redirect('login/logout','refresh');
		} else {
			$this->session->sess_destroy();
			echo "<script> alert('Cek username dan password!'); </script>";
			redirect(base_url(),'refresh');
		}
	}

	public function sertifikasi_data()
	{
    	$query = $this->db->query('SELECT s.*, p.*, l.*, b.* FROM sertifikasi s
									JOIN pegawai p ON s.id_pegawai = p.id_pegawai
									JOIN level l ON s.id_level = l.id_level
									JOIN bidang b ON s.id_bidang = b.id_bidang
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
	// Data JSON update
    public function sertifikasi_edit_data($id_sertifikasi)
    {
    	$this->db->from('sertifikasi');
		$this->db->where('id_sertifikasi',$id_sertifikasi);
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

	public function sertifikasi_insert_data()
	{
		$this->validasi_sertifikasi();
		$data = array(
				'id_pegawai' => $this->input->post('id_pegawai'),
				'nama_sertifikasi' => $this->input->post('nama_sertifikasi'),
				'id_level' => $this->input->post('id_level'),
				'id_bidang' => $this->input->post('id_bidang'),
				'status_sertifikasi' => "Tersertifikasi",
				'lembaga_sertifikasi' => $this->input->post('lembaga_sertifikasi'),
				'tanggal_expaired_awal' => $this->input->post('tanggal_expaired_awal'),
				'tanggal_expired_akhir' => $this->input->post('tanggal_expired_akhir'),
				'created' => date('Y-m-d H:i:s'),
				'updated' => date('Y-m-d H:i:s')
			);
		$this->db->insert('sertifikasi', $data);

		$maxid = 0;
		$id_peg = $this->input->post('id_pegawai');
		$row = $this->db->query('SELECT MAX(id_sertifikasi) AS maxid FROM sertifikasi')->row();
		if ($row) {
		    $maxid = $row->maxid;
		}

		$dataH = array(
					'id_sertifikasi' =>	$maxid,
					'id_pegawai' => $id_peg,
					'status_history' => 'Sertifikasi',
					'created' => date('Y-m-d H:i:s'),
					'updated' => date('Y-m-d H:i:s')
				);
		$this->db->insert('history', $dataH);

		echo json_encode(array('status' => TRUE));

	}

	public function sertifikasi_update_data()
	{
		$this->validasi_sertifikasi();
		$data = array(
				'id_pegawai' => $this->input->post('id_pegawai'),
				'nama_sertifikasi' => $this->input->post('nama_sertifikasi'),
				'id_level' => $this->input->post('id_level'),
				'id_bidang' => $this->input->post('id_bidang'),
				'status_sertifikasi' => "Tersertifikasi",
				'lembaga_sertifikasi' => $this->input->post('lembaga_sertifikasi'),
				'tanggal_expaired_awal' => $this->input->post('tanggal_expaired_awal'),
				'tanggal_expired_akhir' => $this->input->post('tanggal_expired_akhir'),
				'updated' => date('Y-m-d H:i:s')
			);
		$this->db->where('id_sertifikasi', $this->input->post('id_sertifikasi'));
		$this->db->update('sertifikasi', $data);
		echo json_encode(array('status' => TRUE));
	}
    // Aksi Delete
    public function sertifikasi_delete_data($id_sertifikasi)
    {
    	$this->db->where('id_sertifikasi', $id_sertifikasi);
    	$this->db->delete('sertifikasi');
    	echo json_encode(array("status" => TRUE));
    }
    // Untuk Validasi
    private function validasi_sertifikasi()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('id_pegawai') == '')
		{
			$data['inputerror'][] = 'id_pegawai';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('nama_sertifikasi') == '')
		{
			$data['inputerror'][] = 'nama_sertifikasi';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('id_level') == '')
		{
			$data['inputerror'][] = 'id_level';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('id_bidang') == '')
		{
			$data['inputerror'][] = 'id_bidang';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('lembaga_sertifikasi') == '')
		{
			$data['inputerror'][] = 'lembaga_sertifikasi';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('tanggal_expaired_awal') == '')
		{
			$data['inputerror'][] = 'tanggal_expaired_awal';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('tanggal_expired_akhir') == '')
		{
			$data['inputerror'][] = 'tanggal_expired_akhir';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
/*End Sertifikasi

/*Start Status*/
	// Halaman modul
	public function status_kepegawaian()
	{
		$ambil_akun = $this->M_global->ambil_user($this->session->userdata('username'));
		$data = array('username' => $ambil_akun);
		$stat = $this->session->userdata('level');
		$data['modules']  = 'status';
		$data['content']  = 'master_data/status/status';
		$data['modals']   = 'master_data/status/status_modal';

		if ($stat=='Administrator' || $stat=='Operator Pegawai' || $stat=='Operator Pelatihan') {
			$this->load->view('index', $data);
		} elseif (condition) {
			# code...
		} elseif ($stat=='Operator Pelatihan') {
			# code...
		} else if ($stat=='Staff') {
			redirect('login/logout','refresh');
		} else {
			$this->session->sess_destroy();
			echo "<script> alert('Cek username dan password!'); </script>";
			redirect(base_url(),'refresh');
		}
	}
	// Data JSON show
	public function status_data()
	{
    	$this->db->order_by('id_status', 'desc');
    	$query = $this->db->get('status_kepegawaian');
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
    public function status_edit_data($id_status)
    {
    	$this->db->from('status_kepegawaian');
		$this->db->where('id_status',$id_status);
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
    public function status_insert_data()
    {
    	$this->_validate_status();
    	$data = array(
				'status_kepegawaian' => $this->input->post('status_kepegawaian'),
				'created' => date('Y-m-d H:i:s'),
				'updated' => date('Y-m-d H:i:s')
			);

		$dbInsert = $this->db->insert('status_kepegawaian', $data);
		echo json_encode(array('status' => TRUE));
    }
    // Aksi Update
    public function status_update_data()
    {
		$this->_validate_status();
		$data = array(
				'status_kepegawaian' => $this->input->post('status_kepegawaian'),
				'updated' => date('Y-m-d H:i:s')
			);

		$this->db->where('id_status', $this->input->post('id_status'));
		$this->db->update('status_kepegawaian', $data);
		echo json_encode(array('status' => TRUE));
    }
    // Aksi Delete
    public function status_delete_data($id_status)
    {
    	$this->db->where('id_status', $id_status);
    	$this->db->delete('status_kepegawaian');
    	echo json_encode(array("status" => TRUE));
    }
    // Untuk Validasi
    private function _validate_status()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('status_kepegawaian') == '')
		{
			$data['inputerror'][] = 'status_kepegawaian';
			$data['error_string'][] = ' harus di isi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
/*End Status*/

/*End Relasi Tabel*/

/*Start Report*/
	public function report()
	{
		$ambil_akun = $this->M_global->ambil_user($this->session->userdata('username'));
		$data = array('username' => $ambil_akun);
		$stat = $this->session->userdata('level');

		$data['modules']  = 'report';
		$data['content']  = 'master_data/report/report';
		$data['modals']   = 'master_data/report/report_modal';

		if ($stat=='Administrator' || $stat=='Operator Pegawai' || $stat=='Operator Pelatihan') {
			$this->load->view('index', $data);
		} elseif (condition) {
			# code...
		} elseif ($stat=='Operator Pelatihan') {
			# code...
		} else if ($stat=='Staff') {
			redirect('login/logout','refresh');
		} else {
			$this->session->sess_destroy();
			echo "<script> alert('Cek username dan password!'); </script>";
			redirect(base_url(),'refresh');
		}
	}

	public function print_excel_data()
	{
		$this->db->select('*');
		$this->db->from('tb_book');
		$this->db->order_by('id','desc');
		$getData = $this->db->get();
		if($getData->num_rows() > 0)
			return $getData->result_array();
		else
			return null;

		$query['data1'] = $this->buku_model->ToExcelAll();
		$this->load->view('excel_view',$query);
	}
/*End Report*/

/*Start Berita Done*/
	// Halaman modul
	public function prosedur()
	{
		$ambil_akun = $this->M_global->ambil_user($this->session->userdata('username'));
		$data = array('username' => $ambil_akun);
		$stat = $this->session->userdata('level');
		$data['modules']  = 'prosedur';
		$data['content']  = 'master_data/prosedur/prosedur';
		$data['modals']   = 'master_data/prosedur/prosedur_modal';

		if ($stat=='Administrator') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pegawai') {
			$this->load->view('index', $data);
		} elseif ($stat=='Operator Pelatihan') {
			$this->load->view('index', $data);
		} else if ($stat=='Staff') {
			redirect('login/logout','refresh');
		} else {
			$this->session->sess_destroy();
			echo "<script> alert('Cek username dan password!'); </script>";
			redirect(base_url(),'refresh');
		}
	}
	// Data JSON show
	public function prosedur_data()
	{
    	$this->db->order_by('id_prosedur', 'desc');
    	$query = $this->db->get('prosedur');
    	// $query = $this->db->query('SELECT * FROM users ORDER BY id_prosedur DESC');
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
    public function prosedur_edit_data($id_prosedur)
    {
    	$this->db->from('prosedur');
			$this->db->where('id_prosedur',$id_prosedur);
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
	public function prosedur_insert_data()
	{
		$this->_validate_prosedur();

		$data = array(
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),
				'created' => date('Y-m-d H:i:s'),
				'updated' => date('Y-m-d H:i:s'),
			);

		if(!empty($_FILES['gambar_prosedur']['name']))
		{
			$upload = $this->prosedur_do_upload();
			$data['gambar_prosedur'] = $upload;
		}

		$dbInsert = $this->db->insert('prosedur', $data);
		echo json_encode(array('status' => TRUE));
	}
	// Aksi Update
	public function prosedur_update_data()
	{
		$this->_validate_prosedur();
		$data = array(
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),
				'updated' => date('Y-m-d H:i:s'),
			);

		if($this->input->post('remove_gambar_prosedur')) // if remove photo_user checked
		{
			if(file_exists('public/images/'.$this->input->post('remove_gambar_prosedur')) && $this->input->post('remove_gambar_prosedur'))
				unlink('public/images/'.$this->input->post('remove_gambar_prosedur'));
			$data['gambar_prosedur'] = '';
		}

		if(!empty($_FILES['gambar_prosedur']['name']))
		{
			$upload = $this->prosedur_do_upload();

			//delete file
			$prosedur = $this->M_global->prosedur_get_by_id($this->input->post('id_prosedur'));
			if(file_exists('public/images/'.$prosedur->gambar_prosedur) && $prosedur->gambar_prosedur)
				unlink('public/images/'.$prosedur->gambar_prosedur);

			$data['gambar_prosedur'] = $upload;
		}

		$this->db->where('id_prosedur', $this->input->post('id_prosedur'));
		$this->db->update('prosedur', $data);
		echo json_encode(array('status' => TRUE));
	}
	// Aksi Delete
	public function prosedur_delete($id_prosedur)
	{
		//delete file
		$prosedur = $this->M_global->prosedur_get_by_id($id_prosedur);
		if(file_exists('public/images/'.$prosedur->gambar_prosedur) && $prosedur->gambar_prosedur)
			unlink('public/images/'.$prosedur->gambar_prosedur);

		$this->db->where('id_prosedur', $id_prosedur);
    	$this->db->delete('prosedur');
    	echo json_encode(array("status" => TRUE));
	}
	// Config upload
	private function prosedur_do_upload()
	{
		$config['upload_path']          = 'public/images/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 9999; //set max size allowed in Kilobyte
        $config['max_width']            = 9999; // set max width image allowed
        $config['max_height']           = 9999; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if(!$this->upload->do_upload('gambar_prosedur')) //upload and validate
        {
            $data['inputerror'][] = 'gambar_prosedur';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}
    // Untuk Validasi
    private function _validate_prosedur()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('judul') == '')
		{
			$data['inputerror'][] = 'judul';
			$data['error_string'][] = 'haurs di isi';
			$data['status'] = FALSE;
		}

		if($this->input->post('isi') == '')
		{
			$data['inputerror'][] = 'isi';
			$data['error_string'][] = 'harus di isi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
/*End Berita*/
}

/* End of file Administrator.php */
/* Location: ./application/controllers/Administrator.php */
