<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class MonitoringWasTurnedOn extends Event {

	use SerializesModels;
    
    public $portName;
    public $portMgmtIp;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($portName, $portMgmtIp)
	{
            $this->portName = $portName;
            $this->portMgmtIp = $portMgmtIp;
	}

}
