<?php

namespace Wsdl2PhpGenerator;

use Wsdl2PhpGenerator\PhpSource\PhpClass;

/**
 * 
 */
class EventDispatcher {

	protected $events;

	public function __contruct() {
		$this->events = array();
	}

	public function on($event, $callable) {
		if (empty($this->events[$event])) {
			$this->events[$event] = array();
		}
		$this->events[$event][] = $callable;
	}

	public function emit($event, $payload) {
		if (empty($this->events[$event])) {
			return;
		}
		foreach ($this->events[$event] as $callable) {
			call_user_func_array($callback, [$payload]);
		}
	}

}
