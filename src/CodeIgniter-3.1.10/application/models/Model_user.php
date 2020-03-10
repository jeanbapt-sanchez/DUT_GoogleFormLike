<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_user extends CI_Model
{
	public function create_user($data)
	{
    	if($this->db->insert('Utilisateur', $data))
    	{
    		return true;
    	}
	}

	public function verify_user($pseudo_utilisateur, $mdp)
	{
		$sql = "SELECT mdp FROM Utilisateur WHERE pseudo_utilisateur = '$pseudo_utilisateur'";
		$query = $this->db->query($sql);

		if ($query)
		{
			foreach ($query->row() as $mdpbdd){}
			$mdp = hash('tiger192,3', $mdp);

			if ($mdpbdd == $mdp)
			{
				return true;
			}
			else
			{
				echo "Erreur d'authentification champs mal inscrit";
			}
		}
		else
		{
	    echo "Erreur requête SQL";
	    return false;
		}
	}

	public function get_id($pseudo_utilisateur)
	{
		$sql = "SELECT id_utilisateur FROM Utilisateur WHERE pseudo_utilisateur = '$pseudo_utilisateur'";
		$query = $this->db->query($sql);

		if ($query)
		{
			foreach ($query->row() as $idbdd){}
			return $idbdd;
		}
		else
		{
	    echo "Erreur requête SQL";
	    return false;
		}
	}
}
