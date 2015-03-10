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
    
    /**
     * A node has many modules
     */
    public function modules()
    {
       return $this->hasMany('App\Module');
    }
    

}
