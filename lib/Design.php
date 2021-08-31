<?php namespace Archidoc;

class Design {

	protected string $rule;

	protected array $properties = [];

	public function __construct(string $rule, array $properties) {
		$this->setRule($rule);
		$this->setProperties($properties);
	}

	public function setRule(string $rule): self {
		$this->rule = $rule;
		return $this;
	}

	public function rule(): string {
		return $this->rule;
	}

	public function setProperties(array $properties): self {
		foreach($properties as $name => $value)
			$this->setProperty($name, $value);
		return $this;
	}

	public function setProperty(string $name, $value): self {
		if(!Filter::validate($name))
			throw new Error('Invalid property name given', Error::INVALID_PROPERTY_NAME);
		$this->properties[Filter::sanitize($name)] = $value;
		return $this;
	}

	public function properties(): array {
		return $this->properties;
	}

	public function property(string $name): ?string {
		return $this->properties[$name] ?? null;
	}
}