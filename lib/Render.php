<?php namespace SIKessEm\Archidoc;

class Render {

	public function __construct(protected string $content) {}
	
	protected string $tag = '';

	protected array $attributes = [];

	protected array $properties = [];

	protected array $events = [];

	public function is(Widget $widget): self {
		$this->tag = $widget->tag();
		$this->attributes = $widget->attributes();
		return $this;
	}

	public function has(Design $design) {
		$rule = $design->rule();
		foreach($this->$widget->properties() as $name => $value)
			$this->$properties[$rule][$name] = $value;
		return $this;
	}

	public function uses(Action $action) {
		$this->events[$action->event()][] = $action->callback();
	}
}