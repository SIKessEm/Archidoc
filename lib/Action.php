<?php namespace SIKessEm\Archidoc;

class Action {

	protected string $event;

	protected $callback;

	public function __construct(string $event, callable $callback) {
		$this->setEvent($event);
		$this->setCallback($callback);
	}

	public function setEvent(string $event): self {
		$this->event = $event;
		return $this;
	}

	public function event(): string {
		return $this->event;
	}

	public function setCallback(callable $callback): self {
		$this->callback = $callback;
		return $this;
	}

	public function callback(): callable {
		return $this->callback;
	}
}