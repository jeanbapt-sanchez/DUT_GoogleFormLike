<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
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

	public function signup()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('model_user');

		$this->form_validation->set_rules('pseudo_utilisateur', 'pseudo_utilisateur', 'required|trim');
		$this->form_validation->set_rules('mdp', 'mdp', 'required|trim');
		$this->form_validation->set_rules('Cmdp', 'Cmdp', 'required|trim|matches[mdp]');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('signup/register');
		}
		else
		{
			$pseudo_utilisateur = $this->input->post('pseudo_utilisateur');
			$pseudo_utilisateur = ucfirst(strtoupper($pseudo_utilisateur));
			$mdp = $this->input->post('mdp');
			$mdp = hash('tiger192,3', $mdp);
			$Cmdp = $this->input->post('Cmdp');

			$data = array('pseudo_utilisateur'=>$pseudo_utilisateur,'mdp'=>$mdp);

			if($this->model_user->create_user($data) == TRUE)
			{
				$this->load->view('signup/registercomplete');
			}
		}
	}

	public function signin()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('model_user');

		$this->form_validation->set_rules('pseudo_utilisateur', 'pseudo_utilisateur', 'required|trim');
		$this->form_validation->set_rules('mdp', 'mdp', 'required|trim');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('signin/login');
		}
		else
		{
			$pseudo_utilisateur = $this->input->post('pseudo_utilisateur');
			$pseudo_utilisateur = ucfirst(strtoupper($pseudo_utilisateur));
			$mdp = $this->input->post('mdp');

			if($this->model_user->verify_user($pseudo_utilisateur, $mdp) == TRUE)
			{
				$id_utilisateur = $this->model_user->get_id($pseudo_utilisateur);

				session_start();
				$_SESSION['id'] = $id_utilisateur;
				$_SESSION['pseudo'] = $pseudo_utilisateur;

				$pseudo["pseudo_utilisateur"] = $_SESSION["pseudo"];

				$this->load->view('userarea/mainmenu', $pseudo);
			}
			else
			{
				$this->load->view('signin/login');
			}
		}
	}

	public function mainmenu()
	{
		session_start();
		$pseudo["pseudo_utilisateur"] = $_SESSION["pseudo"];
		$this->load->view('userarea/mainmenu', $pseudo);
	}

	public function result()
	{
		$this->load->helper('form');

		session_start();
		$id_utilisateur = $_SESSION['id'];

		$this->load->view('userarea/result');
	}
}
?>
