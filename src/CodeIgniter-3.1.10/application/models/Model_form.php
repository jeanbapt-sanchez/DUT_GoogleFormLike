<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Model_form extends CI_Model
{
	public function get_form($id_utilisateur=NULL)
	{
		if (isset($id_utilisateur))
		{
			$sql = "SELECT cleform, titre, etatformulaire FROM Formulaire_Utilisateur WHERE fu_id_utilisateur = $id_utilisateur";
			$query = $this->db->query($sql);

			if ($query)
			{
				$ligne = $query->num_rows();
				if($ligne >= 0)
				{
					return $query;
				}
				else
				{
					return false;
				}
			}
			else
			{
				echo "Erreur requête SQL";
				return false;
			}
		}
		else
		{
			echo "Erreur id_utilisateur NULL";
			return false;
		}
	}

	public function update_state($cleform)
	{
		if (isset($cleform))
		{
			$sql = "SELECT etatformulaire FROM Formulaire_Utilisateur WHERE cleform = '$cleform'";
			$query = $this->db->query($sql);

			if ($query)
			{
				foreach ($query->row() as $etatactuelle){}

				if ($etatactuelle == 1)
				{
					$sql = "UPDATE Formulaire_Utilisateur SET etatformulaire = '0' WHERE cleform = '$cleform'";
					$query = $this->db->query($sql);
					return true;
				}
				else
				{
					$sql = "UPDATE Formulaire_Utilisateur SET etatformulaire = '1' WHERE cleform = '$cleform'";
					$query = $this->db->query($sql);
					return true;
				}
			}
			else
			{
				echo "Erreur requête SQL";
				return false;
			}
		}
		else
		{
			echo "Erreur données formulaire";
		}
	}

	public function create_form($data)
	{
		if($this->db->insert('Formulaire_Utilisateur', $data))
		{
			return true;
		}
	}

	public function create_question($dataquestion)
	{
		if($this->db->insert('Question', $dataquestion))
		{
			return true;
		}
	}

	public function create_reponse($numquest, $cleform, $reponse)
	{
		foreach ($reponse as $value)
		{
			$datareponse =(array('rep_cleform'=>$cleform, 'rep_numquest'=>$numquest, 'intitule_reponse'=>$value));
			if($this->db->insert('Reponse', $datareponse)){}
			else
			{
				echo "Erreur insertion SQL";
			}
		}
		return true;
	}

	public function verify_cleform($cleform){
		if (isset($cleform))
		{
			$sql = "SELECT cleform FROM Formulaire_Utilisateur WHERE cleform = '$cleform'";
			$query = $this->db->query($sql);

		if($query){
			$query->row();
			if(isset($query))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			echo "erreur sql";
			return false;
		}
		}

		else
		{
			echo "Erreur clé form";
			return false;
		}
	}

	public function get_formulaire($cleform)
	{
		if(isset($cleform))
		{
			$sql0 = "SELECT etatformulaire FROM Formulaire_Utilisateur WHERE cleform = '$cleform'";
			$query0 = $this->db->query($sql0);

			$sql1 = "SELECT titre,description FROM Formulaire_Utilisateur WHERE cleform = '$cleform'";
			$query1 = $this->db->query($sql1);

			$sql2 = "SELECT numquest,intitule,aide,type FROM Question WHERE cleform = '$cleform'";
			$query2 = $this->db->query($sql2);

			$sql3 = "SELECT rep_numquest, `rep_cleform`, intitule_reponse FROM `Reponse` WHERE `rep_cleform`= '$cleform'";
			$query3 = $this->db->query($sql3);

			if($query0 and $query1 and $query2 and $query3)
			{
				if ($query0->row() == FALSE)
				{
					echo "OUPS";
					return FALSE;
				}

				$query1 = $query1->row();
				$nbque = $query2->num_rows();

				$nbrep = $query3->num_rows();
				$query2 = $query2->result_object();
				$query3 = $query3->result_object();

				$data['nbque'] = $nbque;
				$data['nbrep'] = $nbrep;
				$data['cleform'] = $cleform;

				$i = 1;
				foreach ($query1 as $value[$i]) {$i++;}

				$data['titre'] = $value['1'];
				$data['description' ] = $value['2'];

				$x = 3;

				foreach ($query2 as $val[$i])
				{
					$value[$i] = $val[$i]->intitule;
					$i++;
				}

				for($j = 1; $j <= $nbque; $j++)
				{
					$data['intitule'.$j] = $value[$x];
					$x++;
				}

				foreach ($query2 as $val[$i])
				{
					$value[$i] = $val[$i]->aide;
					$i++;
				}

				for($j = 1; $j <= $nbque; $j++)
				{
					$data['aide'.$j] = $value[$x];
					$x++;
				}

				foreach ($query2 as $val[$i])
				{
					$value[$i] = $val[$i]->type;
					$i++;
				}

				for($j = 1; $j <= $nbque; $j++)
				{
					$data['type'.$j] = $value[$x];
					$x++;
				}

				foreach ($query3 as $val[$i])
				{
					$value[$i] = $val[$i]->rep_numquest;
					$i++;
				}

				for($j = 1; $j <= $nbrep; $j++)
				{
					$data['rep_numquest'.$j] = $value[$x];
					$x++;
				}

				foreach ($query3 as $val[$i])
				{
					$value[$i] = $val[$i]->intitule_reponse;
					$i++;
				}

				for($j = 1; $j <= $nbrep; $j++)
				{
					$data['intitule_reponse'.$j] = $value[$x];
					$x++;
				}

				return $data;
			}
			else
			{
				echo "problème requête";
				return false;
			}
		}
		else
		{
			echo "erreur cléform";
			return false;
		}
	}

	public function send_formulaire($cleform, $nbrep, $dataresultat, $jnumquest, $inumreponse)
	{
		$sql3 = "SELECT rep_numquest, `rep_cleform`, intitule_reponse FROM `Reponse` WHERE `rep_cleform`= '$cleform'";
		$query3 = $this->db->query($sql3);
		$query3 = $query3->result_object();

		if ($query3)
		{
			$i=1;
			$x = 1;
			foreach ($query3 as $val[$i])
			{
				$value[$i] = $val[$i]->rep_numquest;
				$i++;
			}
			for($j = 1; $j <= $nbrep; $j++)
			{
				$data['rep_numquest'.$j] = $value[$x];
				$x++;
			}

			if ( $data['rep_numquest'.$inumreponse] == $jnumquest)
			{
				if($this->db->insert('ResultatPublic', $dataresultat))
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				return true;
			}
		}
		else
		{
			echo "erreur sql";
			return false;
		}
	}
}
