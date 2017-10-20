<?php ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model(array('M_global'));
        $this->load->helper(array('form','html','url'));
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$session = $this->session->userdata('isLogin'); //ambil sesion, ada apa nggak
        if($session == FALSE) //Jika false balik ke hal login
        {
        	$this->load->view('module/login');
        }else //jika true ke dashboard
        {
            redirect('administrator');
        }
	}

    public function do_login()
    {
        $username = $this->input->post("username");
        $password = md5($this->input->post("password"));

        $check = $this->M_global->cek_user($username, $password); //melakukan persamaan data dengan database

        if (count($check) == '1') {
            foreach ($check as $check) {
                    $id         = $check['id_admin'];
                    $id_pegawai = $check['id_pegawai'];
                    $foto       = $check['foto'];
                    $level      = $check['level'];
                    $nama       = $check['nama'];
                    $username   = $check['username'];
                    $password   = $check['password'];
                    $created    = $check['created'];
                }

            $dataSession = array(
                                    'isLogin'   => TRUE, //set data telah login
                                    'id_admin'  => $id,
                                    'id_pegawai'=> $id_pegawai,
                                    'foto'=> $foto,
                                    'nama'      => $nama,
                                    'level'     => $level, //set session hak akses
                                    'username'  => $username,
                                    'password'  => $password,
                                    'created'   => $created
                                );
            $this->session->set_userdata($dataSession);

            if ($_SESSION['level'] == 'Administrator') {
            	echo "<script> alert('Berhasil Login Sebagai Administrator!'); </script>";
            	redirect('administrator','refresh');
            } elseif ($_SESSION['level'] == 'Operator Pegawai') {
                echo "<script> alert('Berhasil Login Sebagai Operator Pegawai!'); </script>";
                redirect('administrator','refresh');
            }elseif ($_SESSION['level'] == 'Operator Pelatihan') {
                echo "<script> alert('Berhasil Login Sebagai Operator Pelatihan!'); </script>";
                redirect('administrator','refresh');
            } elseif ($_SESSION['level'] == 'Staff') {
            	echo "<script> alert('Berhasil Login Sebagai Staff!'); </script>";
            	redirect('index','refresh');
            } else {
            	echo "<script> alert('error'); </script>";
            	redirect(base_url(),'refresh');
            }
        } elseif (count($check) == '0') {
            echo "<script> alert('User tidak ada dalam daftar')</script>";
            redirect(base_url(),'refresh');
        } else {
            echo "<script> alert('error'); </script>";
            redirect(base_url(),'refresh');
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url(),'refresh');
    }
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
