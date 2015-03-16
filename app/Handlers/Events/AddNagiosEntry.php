<?php namespace App\Handlers\Events;

use App\Events\MonitoringWasTurnedOn;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use Storage;

class AddNagiosEntry implements ShouldBeQueued  {
    
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
	 * @param  MonitoringWasTurnedOn  $event
	 * @return void
	 */
	public function handle(MonitoringWasTurnedOn $event)
	{
        $newNagiosFile = Storage::put( $event->portName . '.cfg',
'define host{
        use                     generic-host            ; Name of host template to use
        host_name               ' . $event->portName . '
        alias                   ' . $event->portName . '
        address                 ' . $event->portMgmtIp . '

        }

define service{
	use			generic-service		; Inherit values from a template
	host_name		' . $event->portName . '
	service_description	PING
	check_command		check_ping!200.0,20%!600.0,60%
	normal_check_interval	2
	retry_check_interval	1
	}
');
	}

}
