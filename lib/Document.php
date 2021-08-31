<?php namespace SIKessEm\Archidoc;

class Document {

	function __construct(string $title, protected string $type = 'html', protected string $charset = 'UTF-8', protected string $encoding = 'text/html') {

    $this->setTitle($title);
  }

  protected string $title;

  function setTitle(string $title): static {

    $this->title = $title;
    return $this;
  }

  function getTitle(): string {

    return $this->title;
  }

  function setBody(Render $body): static {

    $this->body = $body;
    return $this;
  }

  function getBody(): Render {

    return $this->body;
  }

	function __toString(): string {
		
		$render = "<!DOCTYPE $this->type>";

    $render .= "<head><meta charset='$this->charset'/><meta http-equiv='Content-Type' content='$this->encoding; charset=$this->charset'/><title>$this->title</title></head>";

    $render .= "<body>$this->body</body>";

    return $render;
	}
}