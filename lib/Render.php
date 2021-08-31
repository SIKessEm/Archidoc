<?php namespace SIKessEm\Archidoc;

class Render {

	public function __construct(protected ?string $content = null) {}
	
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
		foreach($design->properties() as $name => $value)
			$this->properties[$rule][$name] = $value;
		return $this;
	}

	public function uses(Action $action) {
		$this->events[$action->event()][] = $action->callback();
		return $this;
	}

	public function __toString(): string {
		
		$view = "<$this->tag";
		
		$style = '';
		foreach ($this->properties as $rule => $properties)
			foreach($properties as $prop_name => $prop_value)
				$style .= "$prop_name:$prop_value;";
		
		if(!empty($style))
			$this->attributes['style'] = $style;

		foreach($this->attributes as $attr_name => $attr_value)
			$view .= " $attr_name='$attr_value'";
		
		$view .= isset($this->content) ? ">$this->content</$this->tag>" : '/>';

		return $view;
	}
}