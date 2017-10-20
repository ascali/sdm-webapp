<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generate extends CI_Controller {

	function Generate()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('csv');
    }

    // for generate table
    public function report()
    {
    	$report = $this->input->post('datareport');
		$sqlBidPer = $this->db->query('SELECT p.*, b.*, l.*, pd.*, s.* FROM pegawai p
										INNER JOIN bidang b ON p.id_bidang=b.id_bidang 
										INNER JOIN level l ON p.id_level=l.id_level
										INNER JOIN pendidikan pd ON p.id_pendidikan=pd.id_pendidikan
										INNER JOIN status_kepegawaian s ON p.id_status=s.id_status
										ORDER BY p.nama ASC');

		$sqlPel = $this->db->query('SELECT pl.*, p.*, b.*, l.*, pd.*, s.* FROM pelatihan pl
									INNER JOIN pegawai p ON pl.id_pegawai=p.id_pegawai
									INNER JOIN bidang b ON p.id_bidang=b.id_bidang 
									INNER JOIN level l ON p.id_level=l.id_level
									INNER JOIN pendidikan pd ON p.id_pendidikan=pd.id_pendidikan
									INNER JOIN status_kepegawaian s ON p.id_status=s.id_status
									ORDER BY p.nama ASC');

		$sqlSer = $this->db->query('SELECT st.*, p.*, b.*, l.*, pd.*, s.* FROM sertifikasi st
									INNER JOIN pegawai p ON st.id_pegawai=p.id_pegawai
									INNER JOIN bidang b ON p.id_bidang=b.id_bidang 
									INNER JOIN level l ON p.id_level=l.id_level
									INNER JOIN pendidikan pd ON p.id_pendidikan=pd.id_pendidikan
									INNER JOIN status_kepegawaian s ON p.id_status=s.id_status
									ORDER BY p.nama ASC');

    	if ($report == 'bidang') {
    		
    		// echo "<script> jQuery.noConflict(); $('#modal_form_report').modal('show'); </script>";
    		$query['content'] = 'master_data/report/report_excel_bidang';
    		$query['modals'] = 'master_data/report/report_modal';
    		$query['modules'] = 'test';
    		$query['data1'] = $sqlBidPer->result_array(); 
			$this->load->view('index',$query);
    		// echo "<script> alert('Sukses Meng-Unduh Laporan Pegawai Per Bidang'); </script>";

    	} elseif ($report == 'perusahaan') {

    		$query['content'] = 'master_data/report/report_excel_perusahaan';
    		$query['modals'] = 'master_data/report/report_modal';
    		$query['modules'] = 'test';
    		$query['data2'] = $sqlBidPer->result_array(); 
			$this->load->view('index',$query);
    		// echo "<script> alert('Sukses Meng-Unduh Laporan Pegawai Per Perusahaan'); </script>";

    	} elseif ($report == 'pelatihan') {

    		$query['content'] = 'master_data/report/report_excel_pelatihan';
    		$query['modals'] = 'master_data/report/report_modal';
    		$query['modules'] = 'test';
    		$query['data_pel'] = $sqlPel->result_array();
    		$this->load->view('index',$query);
    		// echo "<script> alert('report pelatihan'); </script>";

    	} elseif ($report == 'sertifikasi') {

    		$query['content'] = 'master_data/report/report_excel_sertifikasi';
    		$query['modals'] = 'master_data/report/report_modal';
    		$query['modules'] = 'test';
    		$query['data_ser'] = $sqlSer->result_array();
    		$this->load->view('index',$query);
    		// echo "<script> alert('report sertifikasi'); </script>";
    	} else {
    		echo "Error";
    	}
    }

    // for generate excel
    public function report2()
    {
    	$report = $this->input->post('datareport2');
		$sqlBidPer = $this->db->query('SELECT p.*, b.*, l.*, pd.*, s.* FROM pegawai p
										INNER JOIN bidang b ON p.id_bidang=b.id_bidang 
										INNER JOIN level l ON p.id_level=l.id_level
										INNER JOIN pendidikan pd ON p.id_pendidikan=pd.id_pendidikan
										INNER JOIN status_kepegawaian s ON p.id_status=s.id_status
										ORDER BY p.nama ASC');

		$sqlPel = $this->db->query('SELECT pl.*, p.*, b.*, l.*, pd.*, s.* FROM pelatihan pl
									INNER JOIN pegawai p ON pl.id_pegawai=p.id_pegawai
									INNER JOIN bidang b ON p.id_bidang=b.id_bidang 
									INNER JOIN level l ON p.id_level=l.id_level
									INNER JOIN pendidikan pd ON p.id_pendidikan=pd.id_pendidikan
									INNER JOIN status_kepegawaian s ON p.id_status=s.id_status
									ORDER BY p.nama ASC');

		$sqlSer = $this->db->query('SELECT st.*, p.*, b.*, l.*, pd.*, s.* FROM sertifikasi st
									INNER JOIN pegawai p ON st.id_pegawai=p.id_pegawai
									INNER JOIN bidang b ON p.id_bidang=b.id_bidang 
									INNER JOIN level l ON p.id_level=l.id_level
									INNER JOIN pendidikan pd ON p.id_pendidikan=pd.id_pendidikan
									INNER JOIN status_kepegawaian s ON p.id_status=s.id_status
									ORDER BY p.nama ASC');

    	if ($report == 'bidang') {
    		

    		$query['data1'] = $sqlBidPer->result_array(); 
			$this->load->view('master_data/report/report_excel_bidang_excel',$query);
    		echo "<script> alert('Sukses Meng-Unduh Laporan Pegawai Per Bidang'); </script>";

    	} elseif ($report == 'perusahaan') {

    		$query['data2'] = $sqlBidPer->result_array(); 
			$this->load->view('master_data/report/report_excel_perusahaan_excel',$query);
    		echo "<script> alert('Sukses Meng-Unduh Laporan Pegawai Per Perusahaan'); </script>";

    	} elseif ($report == 'pelatihan') {

    		$query['data_pel'] = $sqlPel->result_array();
    		$this->load->view('master_data/report/report_excel_pelatihan_excel',$query);
    		echo "<script> alert('report pelatihan'); </script>";
    	} elseif ($report == 'sertifikasi') {

    		$query['data_ser'] = $sqlSer->result_array();
    		$this->load->view('master_data/report/report_excel_sertifikasi_excel',$query);
    		echo "<script> alert('report sertifikasi'); </script>";
    	} else {
    		echo "Error";
    	}
    }

    /*function ExportCSV()
	{
	    $this->load->dbutil();
	    $this->load->helper('file');
	    $this->load->helper('download');
	    $delimiter = ",";
	    $newline = "\r\n\t";
	    $enclosure = '"';
	    $filename = "filename_you_wish.csv";
	    $query = "SELECT * FROM pegawai";
	    $result = $this->db->query($query);
	    $data = $this->dbutil->csv_from_result($result, $delimiter, $newline, $enclosure);
	    force_download($filename, $data);
	}*/

	/*public function ExportUser()
	{ 
		 $sql = $this->db->get('pegawai');
		 header('Content-Type: text/csv; charset=utf-8');
		 header('Content-Disposition: attachment; filename=users_'.date('Y-m-d-H:i:s').'.csv');
		 $handle = fopen('php://output', 'w');
		 fputcsv($handle, array('Id', 'Name'));
		  
		 foreach($sql->result() as $row)
		 {
			 fputcsv($handle, array(
			 $row->id_pegawai,
			 $row->nama,
			 ));
		 }
		 fputcsv($handle, array());
		 fclose($handle);
		 
		 $headers = array(
		 'Content-Type' => 'text/csv',
		 );
	}*/

	// for generate pdf
    public function report3()
    {
    	$this->load->library('m_pdf');
    	$report = $this->input->post('datareport3');
		$sqlBidPer = $this->db->query('SELECT p.*, b.*, l.*, pd.*, s.* FROM pegawai p
										INNER JOIN bidang b ON p.id_bidang=b.id_bidang 
										INNER JOIN level l ON p.id_level=l.id_level
										INNER JOIN pendidikan pd ON p.id_pendidikan=pd.id_pendidikan
										INNER JOIN status_kepegawaian s ON p.id_status=s.id_status
										ORDER BY p.nama ASC');

		$sqlPel = $this->db->query('SELECT pl.*, p.*, b.*, l.*, pd.*, s.* FROM pelatihan pl
									INNER JOIN pegawai p ON pl.id_pegawai=p.id_pegawai
									INNER JOIN bidang b ON p.id_bidang=b.id_bidang 
									INNER JOIN level l ON p.id_level=l.id_level
									INNER JOIN pendidikan pd ON p.id_pendidikan=pd.id_pendidikan
									INNER JOIN status_kepegawaian s ON p.id_status=s.id_status
									ORDER BY p.nama ASC');

		$sqlSer = $this->db->query('SELECT st.*, p.*, b.*, l.*, pd.*, s.* FROM sertifikasi st
									INNER JOIN pegawai p ON st.id_pegawai=p.id_pegawai
									INNER JOIN bidang b ON p.id_bidang=b.id_bidang 
									INNER JOIN level l ON p.id_level=l.id_level
									INNER JOIN pendidikan pd ON p.id_pendidikan=pd.id_pendidikan
									INNER JOIN status_kepegawaian s ON p.id_status=s.id_status
									ORDER BY p.nama ASC');

    	if ($report == 'bidang') {
    		

    		$query['data1'] = $sqlBidPer->result_array(); 
			// $a = $this->load->view('master_data/report/report_excel_bidang_pdf',$query);
	 	
			$html=$this->load->view('master_data/report/report_excel_bidang_pdf',$query, true); //load the pdf_output.php by passing our data and get all data in $html varriable.
	 	 
			//this the the PDF filename that user will get to download
			$pdfFilePath ="Report_pdf_bidang_".date('Y-m-d')."_download.pdf";
	 
			
			//actually, you can pass mPDF parameter on this load() function
			$pdf = $this->m_pdf->load();
			//generate the PDF!
			$pdf->WriteHTML($html,2);
			//offer it to user via browser download! (The PDF won't be saved on your server HDD)
			$pdf->Output($pdfFilePath, "D");

    	} elseif ($report == 'perusahaan') {

    		$query['data2'] = $sqlBidPer->result_array();

			$html=$this->load->view('master_data/report/report_excel_perusahaan_pdf',$query, true); //load the pdf_output.php by passing our data and get all data in $html varriable.
	 	 
			//this the the PDF filename that user will get to download
			$pdfFilePath ="Report_pdf_perusahaan_".date('Y-m-d')."_download.pdf";
	 
			
			//actually, you can pass mPDF parameter on this load() function
			$pdf = $this->m_pdf->load();
			//generate the PDF!
			$pdf->WriteHTML($html,2);
			//offer it to user via browser download! (The PDF won't be saved on your server HDD)
			$pdf->Output($pdfFilePath, "D");

    	} elseif ($report == 'pelatihan') {

    		$query['data_pel'] = $sqlPel->result_array();
    		// $this->load->view('master_data/report/report_excel_pelatihan',$query);

			$html=$this->load->view('master_data/report/report_excel_pelatihan_pdf',$query, true); //load the pdf_output.php by passing our data and get all data in $html varriable.
	 	 
			//this the the PDF filename that user will get to download
			$pdfFilePath ="Report_pdf_pelatihan_".date('Y-m-d')."_download.pdf";
	 
			
			//actually, you can pass mPDF parameter on this load() function
			$pdf = $this->m_pdf->load();
			//generate the PDF!
			$pdf->WriteHTML($html,2);
			//offer it to user via browser download! (The PDF won't be saved on your server HDD)
			$pdf->Output($pdfFilePath, "D");

    	} elseif ($report == 'sertifikasi') {

    		$query['data_ser'] = $sqlSer->result_array();
			
			$html=$this->load->view('master_data/report/report_excel_sertifikasi_pdf',$query, true); //load the pdf_output.php by passing our data and get all data in $html varriable.
	 	 
			//this the the PDF filename that user will get to download
			$pdfFilePath ="Report_pdf_sertifikasi_".date('Y-m-d')."_download.pdf";
	 
			
			//actually, you can pass mPDF parameter on this load() function
			$pdf = $this->m_pdf->load();
			//generate the PDF!
			$pdf->WriteHTML($html,2);
			//offer it to user via browser download! (The PDF won't be saved on your server HDD)
			$pdf->Output($pdfFilePath, "D");
    	} else {
    		echo "Error";
    	}
    }
}

/* End of file Generate.php */
/* Location: ./application/controllers/Generate.php */
/*
SELECT p.*, b.*, l.*, pd.*, s.* FROM pegawai p
INNER JOIN bidang b ON p.id_bidang=b.id_bidang 
INNER JOIN level l ON p.id_level=l.id_level
INNER JOIN pendidikan pd ON p.id_pendidikan=pd.id_pendidikan
INNER JOIN status_kepegawaian s ON p.id_status=s.id_status
ORDER BY p.nama ASC
*/