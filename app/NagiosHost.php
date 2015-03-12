<?php namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class NagiosHost extends Model {

    protected $connection = 'mysql3';
    protected $table = 'nagios_hosts';
    protected $primaryKey = 'host_object_id';
 
    public function hoststatus()
    {
        return $this->hasOne('App\NagiosHoststatus', 'host_object_id', 'host_object_id');
    }
        
}