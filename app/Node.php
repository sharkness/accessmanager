<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model {

	protected $fillable = [
            'name',
            'location',
            'mgmt_ip',
            'model_number',
            'notes'  
	];

}
