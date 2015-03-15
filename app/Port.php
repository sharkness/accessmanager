<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Port extends Model {

	protected $fillable = [
            'name',
            'port_number',
            'notes',
            'mgmt_ip',
            'is_monitored',
            'is_active'
	];
    
    public function module()
    {
       return $this->belongsTo('App\Module');
    }
    
    public function nagiosHostData()
    {
        return $this->hasOne('App\NagiosHost', 'address', 'mgmt_ip');
    }

}
