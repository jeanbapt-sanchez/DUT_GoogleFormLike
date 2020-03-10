<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Question extends CI_Controller
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

  public function questioneditor($numquest=1)
  {
    $this->load->helper('form');

    $data['intitule'] = '';
    $data['aide'] = '';
    $data['type'] = '';
    $data['nbrep'] = 1;

    session_start();
    $_SESSION['numquest'] = $numquest;
    $data['numquest'] = $_SESSION['numquest'];
    $data['cleform'] = $_SESSION['cleform'];

    $this->load->view('userarea/questioneditor', $data);
  }

  public function maj()
  {
    $this->load->helper('form');

    $intitule = $this->input->post('intitule');
    $aide = $this->input->post('aide');
    $type = $this->input->post('type');
    $nbrep = $this->input->post('nbrep');

    $data['intitule'] = $intitule;
    $data['aide'] = $aide;

    session_start();
    $_SESSION['type'] = $type;
    $_SESSION['nbrep'] = $nbrep;
    $data['type'] = $_SESSION['type'];
    $data['nbrep'] = $_SESSION['nbrep'];

    $data['numquest'] = $_SESSION['numquest'];
    $data['cleform'] = $_SESSION['cleform'];

    $this->load->view('userarea/questioneditor', $data);
  }

	public function create()
	{
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->model('model_form');

    $intitule = $this->input->post('intitule');
    $aide = $this->input->post('aide');

    /*stockage des données formulaires*/
    /*données pour affichage des dependances*/
    $data['intitule'] = $intitule;
    $data['aide'] = $aide;

    session_start();
    $type = $_SESSION['type'];
    $nbrep = $_SESSION['nbrep'];
    $data['type'] = $type;
    $data['nbrep'] = $nbrep;

    $numquest = $_SESSION['numquest'];
    $cleform = $_SESSION['cleform'];
    $data['numquest'] = $_SESSION['numquest'];
    $data['cleform'] = $_SESSION['cleform'];

    switch ($type)
    {
      case 'empty':
          $this->load->view('userarea/questioneditor', $data);
          break;

      case 'ct':
          $this->form_validation->set_rules('ctlabel[]', 'ctlabel[]', 'required|trim');

          if ($this->form_validation->run() == FALSE)
          {
            $this->load->view('userarea/questioneditor', $data);
          }
          else
          {
            $ctlabel = $this->input->post('ctlabel[]');

            $dataquestion = array('numquest'=>$numquest, 'cleform'=>$cleform, 'intitule'=>$intitule, 'aide'=>$aide, 'type'=>$type);

            if($this->model_form->create_question($dataquestion) == TRUE)
            {
              $datareponse = array('numquest'=>$numquest, 'cleform'=>$cleform);

              if($this->model_form->create_reponse($numquest, $cleform, $ctlabel) == TRUE)
              {
                $_SESSION['numquest']++;
                 echo "$numquest";
                $data = array(
                  'numquest'=>$numquest,
                  'intitule'=>$intitule,
                  'aide'=>$aide,
                  'type'=>$type,
                  'nbrep'=>$nbrep
                );

                $this->load->view('userarea/questioneditor', $data);
              }
            }
          }
          break;

      case 'zdt':
          $this->form_validation->set_rules('zdtlabel[]', 'zdtlabel[]', 'required|trim');

          if ($this->form_validation->run() == FALSE)
          {
            $this->load->view('userarea/questioneditor', $data);
          }
          else
          {
            $zdtlabel = $this->input->post('zdtlabel[]');

            $dataquestion = array('numquest'=>$numquest, 'cleform'=>$cleform, 'intitule'=>$intitule, 'aide'=>$aide, 'type'=>$type);

            if($this->model_form->create_question($dataquestion) == TRUE)
            {
              $datareponse = array('numquest'=>$numquest, 'cleform'=>$cleform);

              if($this->model_form->create_reponse($numquest, $cleform, $zdtlabel) == TRUE)
              {
                $_SESSION['numquest']++;
                echo "$numquest";
                $data = array(
                  'numquest'=>$numquest,
                  'intitule'=>$intitule,
                  'aide'=>$aide,
                  'type'=>$type,
                  'nbrep'=>$nbrep
                );

                $this->load->view('userarea/questioneditor', $data);
              }
            }
          }
          break;

      case 'ld':
          $this->form_validation->set_rules('ldlabel[]', 'ldlabel[]', 'required|trim');

          if ($this->form_validation->run() == FALSE)
          {
            $this->load->view('userarea/questioneditor', $data);
          }
          else
          {
            $ldlabel = $this->input->post('ldlabel[]');

            $dataquestion = array('numquest'=>$numquest, 'cleform'=>$cleform, 'intitule'=>$intitule, 'aide'=>$aide, 'type'=>$type);

            if($this->model_form->create_question($dataquestion) == TRUE)
            {
              $datareponse = array('numquest'=>$numquest, 'cleform'=>$cleform);

              if($this->model_form->create_reponse($numquest, $cleform, $ldlabel) == TRUE)
              {
                $_SESSION['numquest']++;
                echo "$numquest";
                $data = array(
                  'numquest'=>$numquest,
                  'intitule'=>$intitule,
                  'aide'=>$aide,
                  'type'=>$type,
                  'nbrep'=>$nbrep
                );

                $this->load->view('userarea/questioneditor', $data);
              }
            }
          }
          break;

      case 'cac':
          $this->form_validation->set_rules('caclabel[]', 'caclabel[]', 'required|trim');

          if ($this->form_validation->run() == FALSE)
          {
            $this->load->view('userarea/questioneditor', $data);
          }
          else
          {
            $caclabel = $this->input->post('caclabel[]');

            $dataquestion = array('numquest'=>$numquest, 'cleform'=>$cleform, 'intitule'=>$intitule, 'aide'=>$aide, 'type'=>$type);

            if($this->model_form->create_question($dataquestion) == TRUE)
            {
              $datareponse = array('numquest'=>$numquest, 'cleform'=>$cleform);

              if($this->model_form->create_reponse($numquest, $cleform, $caclabel) == TRUE)
              {
                $_SESSION['numquest']++;
                echo "$numquest";
                $data = array(
                  'numquest'=>$numquest,
                  'intitule'=>$intitule,
                  'aide'=>$aide,
                  'type'=>$type,
                  'nbrep'=>$nbrep
                );

                $this->load->view('userarea/questioneditor', $data);
              }
            }
          }
          break;

      case 'br':
          $this->form_validation->set_rules('brlabel[]', 'brlabel[]', 'required|trim');

          if ($this->form_validation->run() == FALSE)
          {
            $this->load->view('userarea/questioneditor', $data);
          }
          else
          {
            $brlabel = $this->input->post('brlabel[]');

            $dataquestion = array('numquest'=>$numquest, 'cleform'=>$cleform, 'intitule'=>$intitule, 'aide'=>$aide, 'type'=>$type);

            if($this->model_form->create_question($dataquestion) == TRUE)
            {
              $datareponse = array('numquest'=>$numquest, 'cleform'=>$cleform);

              if($this->model_form->create_reponse($numquest, $cleform, $brlabel) == TRUE)
              {
                $_SESSION['numquest']++;
                echo "$numquest";
                $data = array(
                  'numquest'=>$numquest,
                  'intitule'=>$intitule,
                  'aide'=>$aide,
                  'type'=>$type,
                  'nbrep'=>$nbrep
                );

                $this->load->view('userarea/questioneditor', $data);
              }
            }
          }
          break;

      case 'da':
          $this->form_validation->set_rules('dalabel[]', 'dalabel[]', 'required|trim');

          if ($this->form_validation->run() == FALSE)
          {
            $this->load->view('userarea/questioneditor', $data);
          }
          else
          {
            $dalabel = $this->input->post('dalabel[]');

            $dataquestion = array('numquest'=>$numquest, 'cleform'=>$cleform, 'intitule'=>$intitule, 'aide'=>$aide, 'type'=>$type);

            if($this->model_form->create_question($dataquestion) == TRUE)
            {
              $datareponse = array('numquest'=>$numquest, 'cleform'=>$cleform);

              if($this->model_form->create_reponse($numquest, $cleform, $dalabel) == TRUE)
              {
                $_SESSION['numquest']++;
                echo "$numquest";
                $data = array(
                  'numquest'=>$numquest,
                  'intitule'=>$intitule,
                  'aide'=>$aide,
                  'type'=>$type,
                  'nbrep'=>$nbrep
                );

                $this->load->view('userarea/questioneditor', $data);
              }
            }
          }
          break;
    }
	}

  public function finish()
  {
    $this->load->view('userarea/formcomplete');
  }
}
?>
