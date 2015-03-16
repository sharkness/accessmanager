<?php namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use App\Events\PortWasActivated;
use App\Handlers\Events\AddDhcpEntry;

use App\Events\PortWasDeactivated;
use App\Handlers\Events\DeleteDhcpEntry;

use App\Events\MonitoringWasTurnedOn;
use App\Handlers\Events\AddNagiosEntry;

use App\Events\MonitoringWasTurnedOff;
use App\Handlers\Events\DeleteNagiosEntry;

use App\Events\CardWasAddedToSwitch;
use App\Handlers\Events\CreatePortsForCard;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'event.name' => [
			'EventListener',
		],
        
        PortWasActivated::class => [
            AddDhcpEntry::class,
        ],
    
        PortWasDeactivated::class => [
            DeleteDhcpEntry::class,
        ],

        MonitoringWasTurnedOn::class => [
            AddNagiosEntry::class,
        ],
    
        MonitoringWasTurnedOff::class => [
            DeleteNagiosEntry::class,
        ],
    
        CardWasAddedToSwitch::class => [
            CreatePortsForCard::class,
        ],
    
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);

		//
	}

}
