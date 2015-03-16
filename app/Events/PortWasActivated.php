<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class PortWasActivated extends Event {

	use SerializesModels;
    
    public $portId;
    public $portName;
    public $portMgmtIp;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($portId, $portName, $portMgmtIp)
	{
            $this->portId = $portId;
            $this->portName = $portName;
            $this->portMgmtIp = $portMgmtIp;
	}

}
