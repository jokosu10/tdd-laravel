<?php

namespace App;

class Box
{
	protected $items = [];

	public function __construct($items = [])
	{
		$this->items = $items;
	}

	/**
	 * check if the specified items is in the box
	 */
	public function has($items)
	{
		return in_array($items, $this->items);
	}

	/**
	 * remove an item from the box, or null if the box is empty
	 */
	public function takeOne()
	{
		return array_shift($this->items);
	}

	/**
	 * retrive all items from the box that start with the specified letter
	 * @param string $letter
	 * @return array
	 */
	public function startsWith($letter)
	{
		return array_filter($this->items, function($item) use ($letter) {
			return stripos($item, $letter) === 0;
		});
	}
}
