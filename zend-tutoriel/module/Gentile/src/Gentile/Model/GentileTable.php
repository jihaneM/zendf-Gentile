<?php
namespace Gentile\Model;

use Zend\Db\TableGateway\TableGateway;

class GentileTable
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
	public function getGentile($id)
	{
		$id  = (int) $id;
		$rowset = $this->tableGateway->select(array('id_gentile' => $id));
		$row = $rowset->current();
		if (!$row) {
			throw new \Exception("Could not find row $id");
		}
		return $row;
	}

	public function saveGentile(Gentile $gentile)
	{
		$data = array(
				
				
				'nom_gentile' => $gentile->nom_gentile,
				'auteur'  => $gentile->auteur,
		);

		$id = (int) $gentile->id_gentile;
		if ($id == 0) {
			$this->tableGateway->insert($data);
		} else {
			if ($this->getGentile($id)) {
				$this->tableGateway->update($data, array('id_gentile' => $id));
			} else {
				throw new \Exception('Gentile id_gentile does not exist');
			}
		}
	}

	public function deleteGentile($id)
	{
		$this->tableGateway->delete(array('id_gentile' => (int) $id));
	}
}