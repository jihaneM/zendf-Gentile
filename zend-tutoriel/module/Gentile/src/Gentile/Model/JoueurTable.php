<?php
namespace Gentile\Model;

use Zend\Db\TableGateway\TableGateway;


class JoueurTable
{
	protected $tableGateway;

	
	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}

	
	public function fetchAll()
	{
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}

	//
	public function getJoueur($id)
	{
		$id  = (int) $id;
		$rowset = $this->tableGateway->select(array('id_joueur' => $id));
		$row = $rowset->current();
		if (!$row) {
			throw new \Exception("Could not find row $id");
		}
		return $row;
	}

	
	public function saveJoueur(Joueur $joueur)
	{
		$data = array(
				'user' => $joueur->user,
				'password' => $joueur->password,
				'email'  => $joueur->email,
				'pays'  => $joueur->pays,
		);

		$id = (int) $joueur->id_joueur;
		if ($id == 0) {
			$this->tableGateway->insert($data);
		} else {
			if ($this->getJoueur($id)) {
				$this->tableGateway->update($data, array('id_joueur' => $id));
			} else {
				throw new \Exception('Joueur id_joueur does not exist');
			}
		}
	}

	
	public function deleteJoueur($id)
	{
		$this->tableGateway->delete(array('id_joueur' => (int) $id));
	}
}