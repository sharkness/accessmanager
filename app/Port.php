<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Port extends Model {

	protected $fillable = [
            'name',
            'port_number',
            'notes'  
	];
    
    public function module()
    {
       return $this->belongsTo('App\Module');
    }

}
