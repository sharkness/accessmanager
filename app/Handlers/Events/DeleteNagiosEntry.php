<?php namespace App\Handlers\Events;

use App\Events\MonitoringWasTurnedOff;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use Storage;

class DeleteNagiosEntry implements ShouldBeQueued {
    
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
	 * @param  MonitoringWasTurnedOff  $event
	 * @return void
	 */
	public function handle(MonitoringWasTurnedOff $event)
	{
            $fileToDelete = $event->portName . '.cfg';
            $DeleteFile = Storage::delete( $fileToDelete );	
	}

}
