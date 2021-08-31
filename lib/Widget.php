<?php namespace SIKessEm\Archidoc;

class Widget {
	
	protected string $tag;

	protected array $attributes = [];

	public function __construct(string $tag, array $attributes) {
		$this->setTag($tag);
		$this->setAttributes($attributes);
	}

	public function setTag(string $tag) {
		$this->valid_name($tag);
		$this->tag = $tag;
	}

	public function tag(): string {
		return $this->tag;
	}

	public function setAttributes(array $attributes): self {
		foreach($attributes as $name => $value)
			$this->setAttribute($name, $value);
		return $this;
	}

	public function setAttribute(string $name, string $value): self {
		$this->valid_name($name);
		$this->attributes[$name] = $value;
		return $this;
	}

	public function attributes(): array {
		return $this->attributes;
	}

	public function attribute(string $name): ?string {
		return $this->attributes[$name] ?? null;
	}

	protected function valid_name(string $name): void {
		if(empty($name)) 
			throw new Error('Empty name given', Error::EMPTY_VALUE);

		if(!preg_match('/^[a-zA-Z]+([\w-]+[a-zA-Z]+)*$/', $name))
			throw new Error("Invalid name ($name) given". Error::INVALID_VALUE);
	}
}