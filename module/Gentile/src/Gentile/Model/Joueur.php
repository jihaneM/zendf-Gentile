<?php
namespace Gentile\Model;

class Joueur
{
	public $id_joueur;
	public $user;
	public $password;
	public $email;
	public $pays;

	public function exchangeArray($data)
	{
		$this->id_joueur = (!empty($data['id_joueur'])) ? $data['id_joueur'] : null;
		$this->user= (!empty($data['user'])) ? $data['user'] : null;
		$this->password= (!empty($data['password'])) ? $data['password'] : null;
		$this->email  = (!empty($data['email'])) ? $data['email'] : null;
		$this->pays = (!empty($data['pays'])) ? $data['pays'] : null;
	}
}