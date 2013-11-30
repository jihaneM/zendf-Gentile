<?php
namespace Gentile\Model;

use Zend\Db\TableGateway\TableGateway;

class TropheTable
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
	public function getTrophe($id)
	{
		$id  = (int) $id;
		$rowset = $this->tableGateway->select(array('id_trophe' => $id));
		$row = $rowset->current();
		if (!$row) {
			throw new \Exception("Could not find row $id");
		}
		return $row;
	}

	public function saveTrophe(Trophe $trophe)
	{
		$data = array(

			
				'date' => $trophe->date,
				'type_trophe'  => $trophe->type_trophe,
		);

		$id = (int) $trophe->id_trophe;
		if ($id == 0) {
			$this->tableGateway->insert($data);
		} else {
			if ($this->getGentile($id)) {
				$this->tableGateway->update($data, array('id_trophe' => $id));
			} else {
				throw new \Exception('Trophe id_trophe does not exist');
			}
		}
	}

	public function deleteTrophe($id)
	{
		$this->tableGateway->delete(array('id_trophe' => (int) $id));
	}
}