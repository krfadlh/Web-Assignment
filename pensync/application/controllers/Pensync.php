<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pensync extends CI_Controller {
	private $message;
	function __construct() {
		parent::__construct();
		$this->load->model('Pensync_M');
		$this->load->library('session');
	}
	function index() { //all
		$data['kontak_data'] = $this->Pensync_M->getAllUserContact();
		$data['admin_data'] = $this->Pensync_M->getAllAdminContact();
		if ($this->session->userdata('level') == 'admin'){
			$data['total_request'] = $this->Pensync_M->countMonthlyRequest();
		}
		$this->load->view('home', $data);
	}
	function room_info() { //all
		$data['room_data'] = $this->Pensync_M->getAllRoom();
		$data['kontak_data'] = $this->Pensync_M->getAllUserContact();
		$data['admin_data'] = $this->Pensync_M->getAllAdminContact();
		$this->load->view('room-info', $data);
	}
	function login() { //all
		$this->load->view('login');
	}
	function setting() { //all
		if ($this->session->has_userdata('logged_in')) {
			$this->load->view('setting');
		} else {
			redirect(base_url('index.php/Pensync'));
		}
	}
	function logout() { //all
		//$this->session->unset_userdata('userid', 'name', 'kontak', 'logged_in', 'level');
		$this->session->sess_destroy();
		redirect(base_url('index.php/Pensync'));
	}
	function login_auth() { //all
		$result = $this->Pensync_M->login();
		if ($result != false) {
			if ($_POST['level'] == 'user') {
				$session = array(
					'userid' => $result[0]->userid,
					'name' => $result[0]->name,
					'kontak' => $result[0]->kontak,
					'logged_in' => TRUE,
					'level' => 'user'
				);
			} else if ($_POST['level'] == 'admin') {
				$session = array(
					'baakid' => $result[0]->baakid,
					'name' => $result[0]->name,
					'kontak' => $result[0]->kontak,
					'logged_in' => TRUE,
					'level' => 'admin'
				);
			}
			$this->session->set_userdata($session);
			redirect(base_url('index.php/Pensync'));
		} else {
			$this->session->set_flashdata('error', 'Username/password yang anda masukkan salah!');
			redirect(base_url('index.php/Pensync/login'));
			# gagal
		}
	}
	function change_password_auth() {
		$password = $this->Pensync_M->getPassword();
		if ($password[0]->password == md5($_POST['old_password'])) {
			$this->Pensync_M->setPassword($_POST['new_password']);
			$this->session->set_flashdata('error', 'Ganti password anda berhasil!');
			redirect(base_url('index.php/Pensync/setting'));
		} else {
			$this->session->set_flashdata('error', 'Password yang anda masukkan salah!');
			redirect(base_url('index.php/Pensync/setting'));
		}
	}
	/* function change_all_password(){
		$result = $this->Pensync_M->getAllUser();
		foreach ($result as $user) {
			$this->Pensync_M->setAllPassword($user->userid, $user->password);
		}
	} */
	function lihat() { //all
		if (isset($_POST['tanggal'])) {
			$data['request_data'] = $this->Pensync_M->getRequestByDate(str_replace(',', ' ', $_POST['tanggal']));
			$data['tanggal'] = $_POST['tanggal'];
			$this->load->view('lihat', $data);
		} else {
			$this->load->view('lihat');
		}
	}
	function report($signal) { //admin only
		if ($this->session->has_userdata('logged_in') && $this->session->userdata('level') == 'admin') {
			$data['monthly_request'] = $this->Pensync_M->getMonthlyRequest($signal);
			$data['date'] = $this->Pensync_M->getDistinctDate($signal);
			$this->load->view('rekap_now', $data);
		} else {
			redirect(base_url('index.php/Pensync'));
		}
		
	}
	function pinjam() { //user only
		if ($this->session->has_userdata('logged_in') && $this->session->userdata('level') == 'user') {
			$data['room_data'] = $this->Pensync_M->getAllRoom();
			$data['event_type_data'] = $this->Pensync_M->getAllEventType();
			$this->load->view('insert_request', $data);
		} else {
			redirect(base_url('index.php/Pensync'));
		}
	}

	function addRequest() { //user only
		if ($this->session->has_userdata('logged_in') && $this->session->userdata('level') == 'user') {
			$request = $this->Pensync_M->getRequestByTime($_POST['tanggal'], $_POST['start-time'], $_POST['finish-time']);
			if ($request == false) {
				$status = $this->Pensync_M->insertRequest();
				$this->session->set_flashdata('message', 'seharusnya bisa insert');
			} else {
				if ($request->event_type < $_POST['event-type']) {
					# bisa ke replace
				} else {
					$this->session->set_flashdata('message', $request->event);
				}
			}
		} 
		redirect(base_url('index.php/Pensync/pinjam'));
	}
	function request_detail($reqid) {
		if (isset($reqid)) {
			if ($this->session->userdata('level') == 'admin') {
				$data['request'] = $this->Pensync_M->getRequestByID($reqid);
				$this->load->view('request_detail', $data);
			} else if ($this->session->userdata('level') == 'admin') {
				$data['request'] = $this->Pensync_M->getRequestByID($reqid);
				$data['status'] = $this->Pensync_M->getRequestByID($reqid)[0]->req_stats;
				$this->load->view('request_detail', $data);
			} else {
				redirect(base_url('index.php/Pensync'));
			}
		}
	}
}
