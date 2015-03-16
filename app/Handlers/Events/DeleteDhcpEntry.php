<?php namespace App\Handlers\Events;

use App\Events\PortWasDeactivated;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use Storage;

class DeleteDhcpEntry implements ShouldBeQueued {
    
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
	 * @param  PortWasDeactivated  $event
	 * @return void
	 */
	public function handle(PortWasDeactivated $event)
	{
            $fileToDelete = $event->portName . '.class';
            if (Storage::exists($fileToDelete))
            {
                Storage::delete( $fileToDelete );
            }
	}

}
