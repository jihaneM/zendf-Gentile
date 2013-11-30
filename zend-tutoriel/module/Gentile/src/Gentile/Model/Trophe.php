<?php
namespace Gentile\Model;

class Trophe
{
	public $id_trophe;
	public $id_joueur;
	public $date ;
	public $type_trophe;
	


	public function exchangeArray($data)
	{
		$this->id_trophe    = (!empty($data['id_trophe'])) ? $data['id_trophe'] : null;
		$this->id_joueur    = (!empty($data['id_joueur'])) ? $data['id_joueur'] : null;
		$this->date     = (!empty($data['date'])) ? $data['date'] : null;
		$this->type_trophe    = (!empty($data['type_trophe'])) ? $data['type_trophe'] : null;
		

	}
}

