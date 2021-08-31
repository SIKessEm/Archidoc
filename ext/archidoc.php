<?php namespace SIKessEm\Archidoc;

function render(string $content): Render {

  return new Render($content);
}

function widget(string $tag, array $attributes): Widget {

  return new Widget($tag, $attributes);
}

function design(string $rule, array $properties): Design {

  return new Design($rule, $properties);
}

function action(string $event, callable $callback): Action {

  return new Action($event, $callback);
}