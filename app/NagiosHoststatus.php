<?php namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class NagiosHoststatus extends Model {

    protected $connection = 'mysql3';
    protected $table = 'nagios_hoststatus';
    protected $primaryKey = 'host_object_id';
    
    public function hosts()
    {
        return $this->belongsTo('App\NagiosHost', 'host_object_id', 'host_object_id');
    }
    
        
}