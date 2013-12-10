<?php
namespace Gentile\Model;

class Gentile
{
	public $id_gentile;
	public $id_joueur;
	public $id_zone;
	public $nom_gentile;
	public $auteur;

	public function exchangeArray($data)
	{
		$this->id_gentile  = (!empty($data['id_gentile'])) ? $data['id_gentile'] : null;
		$this->id_joueur  = (!empty($data['id_joueur'])) ? $data['id_joueur'] : null;
		$this->id_zone  = (!empty($data['id_zone'])) ? $data['id_zone'] : null;
		$this->nom_gentile = (!empty($data['nom_gentile'])) ? $data['nom_gentile'] : null;
		$this->auteur      = (!empty($data['auteur'])) ? $data['auteur'] : null;
	}
}



