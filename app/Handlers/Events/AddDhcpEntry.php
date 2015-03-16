<?php namespace App\Handlers\Events;

use App\Events\PortWasActivated;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use Storage;

class AddDhcpEntry implements ShouldBeQueued {
    
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
	 * @param  PortWasActivated  $event
	 * @return void
	 */
	public function handle(PortWasActivated $event)
	{
            $newDhcpFile = Storage::put( $event->portName . '.class',
'class "' . $event->portName . '" {
	match if (option agent.subscriber-id="' . $event->portName . '");
    }
pool {
	# monitor: 100% 100% N "' . $event->portName . '"
	allow members of "' . $event->portName . '";
	filename "/tftp/filename";
	range ' . $event->portMgmtIp . ';
	deny dynamic bootp clients;
}
');
	}

}
