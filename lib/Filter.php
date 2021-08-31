<?php namespace SIKessEm\Archidoc;

class Filter {

	static function sanitize(string $id): string {
		
		return strtolower(trim($id));
	}

	static function validate(string $id): bool {
		
		return !empty($id) && (bool) preg_match('/^[a-zA-Z]+([\w-]+[a-zA-Z]+)*$/', $id);
	}
}