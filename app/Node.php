<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model {

    protected $fillable = [
        'name',
        'location',
        'mgmt_ip',
        'model_number',
        'notes',
        'host_object_id',
        'is_monitored'
    ];
    
    /**
     * A node has many modules
     */
    public function modules()
    {
       return $this->hasMany('App\Module');
    }
    
    public function ports()
    {
        return $this->hasManyThrough(Port::class, Module::class);
    }
    
    public function nagiosHostData()
    {
        return $this->hasOne('App\NagiosHost', 'address', 'mgmt_ip');
    }
    
}
