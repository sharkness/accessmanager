<?php namespace App\Handlers\Events;

use App\Events\CardWasAddedToSwitch;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use App\Port;

class CreatePortsForCard implements ShouldBeQueued {
    
    use InteractsWithQueue;

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  CardWasAddedToSwitch  $event
	 * @return void
	 */
	public function handle(CardWasAddedToSwitch $event)
	{
        for ($portnumber = 1; $portnumber <= $event->modulePortCount ; $portnumber++)
            {
                $port = new Port;
                $port->module_id = $event->moduleId;
                $port->name = $event->moduleName . '-PORT' . $portnumber;
                $port->port_number = $portnumber;
                $port->mgmt_ip = '127.0.0.1'; 
                $port->save();
            }
	}

}
