<?php namespace SIKessEm\Archidoc;

class Widget {
	
	protected string $tag;

	protected array $attributes = [];

	public function __construct(string $tag, array $attributes) {
		$this->setTag($tag);
		$this->setAttributes($attributes);
	}

	public function setTag(string $tag) {
		if(!Filter::validate($tag))
			throw new Error("Invalid tag name given $tag", Error::INVALID_NAME);
		$this->tag = Filter::sanitize($tag);
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
		if(!Filter::validate($name))
			throw new Error("Invalid attribute name given $name". Error::INVALID_NAME);
		$this->attributes[Filter::sanitize($name)] = $value;
		return $this;
	}

	public function attributes(): array {
		return $this->attributes;
	}

	public function attribute(string $name): ?string {
		return $this->attributes[$name] ?? null;
	}
}