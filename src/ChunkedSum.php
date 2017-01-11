<?php

namespace ChunkedSum;

class ChunkedSum
{
	
	protected $collect;

	function __construct($collect)
	{
		$this->collect = $collect;
	}

	public function getSum($property, $chunked_count)
	{
		$chunked_sum = [];

		if (!array_key_exists($property, $this->collect)) {
			throw new Exception("property not in collect", 1);
		}

		if ($chunked_count < 0) {
			throw new Exception("chunked count must bigger than 0", 1);
		}

		$chunked_collect = array_chunk($this->collect[$property], $chunked_count);

		foreach ($chunked_collect as $key => $chunked_item) {
			$chunked_sum[] = array_sum($chunked_item);
		}

		return $chunked_sum;
	}
}