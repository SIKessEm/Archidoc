<?php namespace SIKessEm\Archidoc;

class Filter {

	static function satitize(string $id): string {
		
		return strtolower(trim($id));
	}

	static function validate(string $id): bool {
		
		return !empty($id) && preg_match('/^[^0-9[^a-zA-Z-]]+[\w-]*$/', $id);
	}
}