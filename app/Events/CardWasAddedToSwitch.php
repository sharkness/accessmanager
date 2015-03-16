<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class CardWasAddedToSwitch extends Event {

	use SerializesModels;
    
    public $moduleId;
    public $moduleName;
    public $moduleSlotNumber;
    public $modulePortCount;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($moduleId, $moduleName, $moduleSlotNumber, $modulePortCount)
	{
            $this->moduleId = $moduleId;
            $this->moduleName = $moduleName;
            $this->moduleSlotNumber = $moduleSlotNumber;
            $this->modulePortCount = $modulePortCount;
	}

}
