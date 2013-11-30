<?php
namespace Gentile\Model;

use Zend\Db\TableGateway\TableGateway;

class ScoreTable
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
	public function getScore($id)
	{
		$id  = (int) $id;
		$rowset = $this->tableGateway->select(array('id_score' => $id));
		$row = $rowset->current();
		if (!$row) {
			throw new \Exception("Could not find row $id");
		}
		return $row;
	}

	public function saveScore(Score $score)
	{
		$data = array(
				
				
				'nombredepoint' =>  $score->nombredepoint,
				'date_time' =>  $score->date_time,
		);

		$id = (int) $score->id_score;
		if ($id == 0) {
			$this->tableGateway->insert($data);
		} else {
			if ($this->getScore($id)) {
				$this->tableGateway->update($data, array('id_score' => $id));
			} else {
				throw new \Exception('Score id_score does not exist');
			}
		}
	}

	public function deleteScore($id)
	{
		$this->tableGateway->delete(array('id_score' => (int) $id));
	}
}