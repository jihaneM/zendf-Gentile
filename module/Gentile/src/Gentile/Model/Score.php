<?php
namespace Gentile\Model;

class Score
{
	public $id_score;
	public $id_joueur;
	public $nombredepoint;
	public $date_time;
	

	public function exchangeArray($data)
	{
		$this->id_score     = (!empty($data['id_score'])) ? $data['id_score'] : null;
		$this->id_joueur = (!empty($data['id_joueur'])) ? $data['id_joueur'] : null;
		$this->nombredepoint = (!empty($data['nombredepoint'])) ? $data['nombredepoint'] : null;
		$this->date_time = (!empty($data['date_time'])) ? $data['date_time'] : null;
		
	}
}
