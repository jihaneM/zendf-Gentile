<?php
namespace Gentile\Model;

class Score
{
	public $id_zone;
	public $longitude;
	public $laltitude ;
	public $zone_min;
	public $zone_max;
	public $adress;
	public $code_postal;
	public $ville;
	public $pays;
	public $date;


	public function exchangeArray($data)
	{
		$this->id_zone     = (!empty($data['id_zone'])) ? $data['id_zone'] : null;
		$this->longitude = (!empty($data['longitude'])) ? $data['longitude'] : null;
		$this->laltitude = (!empty($data['laltitude'])) ? $data['laltitude'] : null;
		$this->zone_min = (!empty($data['zone_min'])) ? $data['zone_min'] : null;
		$this->zone_max= (!empty($data['zone_max'])) ? $data['zone_max'] : null;
		$this->adress = (!empty($data['adress'])) ? $data['adress'] : null;
		$this->code_postal = (!empty($data['zone_min'])) ? $data['code_postal'] : null;
		$this->ville = (!empty($data['ville'])) ? $data['ville'] : null;
		$this->pays = (!empty($data['pays'])) ? $data['pays'] : null;
		$this->date = (!empty($data['date'])) ? $data['date'] : null;
	}
}
