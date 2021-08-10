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
		$this->valid_name($name);
		$this->properties[$name] = $value;
		return $this;
	}

	public function properties(): array {
		return $this->properties;
	}

	public function property(string $name): ?string {
		return $this->properties[$name] ?? null;
	}

	protected function valid_name(string $name): void {
		if(empty($tag)) 
			throw Error('Empty tag given', Error::EMPTY_VALUE);

		if(!preg_match('/^[^0-9[^a-zA-Z-]]+[\w-]*$/', $tag))
			throw Error("Invalid tag ($tag) given". Error::INVALID_VALUE);
	}
}