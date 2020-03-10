<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('assets');
	}

	public function index()
	{
		redirect(array('error', 'probleme'));
	}

	public function home()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->view('main/home');
	}
}
?>
