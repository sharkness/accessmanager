<?php namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model {

    protected $connection = 'mysql2';
    protected $table = 'SystemEvents';
    protected $primaryKey = 'ID';

}
