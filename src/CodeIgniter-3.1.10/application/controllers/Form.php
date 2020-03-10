<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Form extends CI_Controller
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

	public function formmanager()
	{
		$this->load->helpers('form');
		$this->load->model('model_form');
		$this->load->library('table');

		session_start();
		$id_utilisateur = $_SESSION['id'];

		$query = $this->model_form->get_form($id_utilisateur);
		$data = array('query' => $query);

		$this->load->view('userarea/formmanager', $data);
	}

	public function changestate()
	{
		$this->load->helpers('form');
		$this->load->library('form_validation');
		$this->load->library('table');
		$this->load->model('model_form');

		$this->form_validation->set_rules('cleform', 'cleform', 'required|trim');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('userarea/formmanager');
		}
		else
		{
			session_start();
			$id_utilisateur = $_SESSION['id'];

			$cleform = $this->input->post('cleform');

			if($this->model_form->update_state($cleform) == TRUE)
			{
				$query = $this->model_form->get_form($id_utilisateur);
				$data = array('query' => $query);

				$this->load->view('userarea/formmanager', $data);
			}
		}
	}

	public function formcreator()
	{
		$this->load->helpers('form');
		$this->load->model('model_form');
		session_start();
		$id_utilisateur = $_SESSION['id'];

		$caractere = array ("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","0","1","2","3","4","5","6","7","8","9");

		$cleform='';

		$res=false;
		while($res == FALSE)
		{
			for($i=1;$i<30;$i++)
			{
				$indice=array_rand($caractere);
				$moncaract=$caractere[$indice];
				$cleform=$cleform.$moncaract;
				$res=$this->model_form->verify_cleform($cleform);
			}

			$_SESSION['cleform'] = $cleform;
			$macleform['cleform'] = $cleform;

			$this->load->view('userarea/formcreator',$macleform);
		}
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('model_form');

		$this->form_validation->set_rules('cleform', 'cleform', 'required|trim');
		$this->form_validation->set_rules('titre', 'titre', 'required|trim');
		$this->form_validation->set_rules('description', 'description', 'required|trim');

		if ($this->form_validation->run() == FALSE)
		{
			session_start();
			$cleform = $_SESSION['cleform'];
			$macleform['cleform'] = $cleform;
			$this->load->view('userarea/formcreator', $macleform);
		}
		else
		{
			$cleform = $this->input->post('cleform');
			$titre = $this->input->post('titre');
			$description = $this->input->post('description');
			$etatformulaire = 1;

			session_start();
			$fu_id_utilisateur = $_SESSION['id'];
			$_SESSION['cleform'] = $cleform;

			$data = array('cleform'=>$cleform, 'fu_id_utilisateur'=>$fu_id_utilisateur ,'titre'=>$titre, 'description'=>$description, 'etatformulaire'=>$etatformulaire);

			if($this->model_form->create_form($data) == TRUE)
			{
				$this->load->view('userarea/initform');
			}
		}
	}

	public function get()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('model_form');

		$this->form_validation->set_rules('cleform', 'cleform', 'required|trim');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('main/home');
		}
		else
		{
			$cleform = $this->input->post('cleform');
			$query = $this->model_form->get_formulaire($cleform);
			$i=1;

			if ($query == FALSE)
			{
				$this->load->view('main/outdatedform');
			}
			elseif(isset($query))
			{
				$this->load->view('main/formanswer',$query);
			}
			else
			{
				$this->load->view('main/home');
			}
		}
	}

	public function send()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('model_form');

		$cleform = $this->input->post('cleform');
		$intitule = $this->input->post('intitule');
		$nbque = $this->input->post('nbque');
		$nbrep = $this->input->post('nbrep');
		$resultat = $this->input->post('resultat');


		$dataresultat['cleform'] = $cleform;
		for ($j = 1; $j <= $nbque; $j++)
		{
			$dataresultat['numquest'] = $j;
			for ($i = 2; $i < $nbrep; $i++)
			{
				$dataresultat['numreponse'] = $i;
				$dataresultat['resultat'] = $resultat[$i];
				if($this->model_form->send_formulaire($cleform, $nbrep, $dataresultat, $j, $i) == TRUE){}
				else
				{
					echo "Erreur insertion SQL";
					return false;
				}
			}
		}
		$this->load->view('main/answerisok');
	}

	public function result()
	{
		$this->load->view('userarea/statistique');
	}
}
?>
