<?php

namespace Src\Core\Api;

abstract class Resource {
	public static function collection( array $items ): array {
		$data = [];

		foreach ($items as $item) {
			if (is_null($item)) {
				$data[] = null;
			} else {
				$data[] = static::toArray($item);
			}
		}

		return $data;
	}

	abstract public static function toArray( array $item ): array;
}