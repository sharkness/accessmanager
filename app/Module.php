<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model {

    protected $fillable = [
        'name',
        'slot_number',
        'port_count',
        'notes',
    ];
    
    /**
     * A module belongs to a Node
     */
    public function node()
    {
       return $this->belongsTo('App\Node');
    }
    
    public function ports()
    {
        return $this->hasMany('App\Port');
    }

}
