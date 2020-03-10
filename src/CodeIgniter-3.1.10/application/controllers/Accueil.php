<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller 
{
	public function index()
	{
		$this->load->helper('assets_helper');
		$this->load->view('accueil');
	}

	public function login()
	{
		$this->load->helper('assets_helper');
		$this->load->view('login');
	}
}