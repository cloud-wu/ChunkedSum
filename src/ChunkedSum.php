<?php

namespace ChunkedSum;

class ChunkedSum
{
	/**
	 * split an array into chunks and get the list of sum of the each chunk
	 * @param  array  $source       the array source to work on
	 * @param         $key          the selected key
	 * @param  int    $chunkedCount the size of each chunk
	 * @return array                the list of sum of the each chunk
	 */
	public function getChunkedCollectSums(array $source, $key, int $size) : array
	{
		if ($size <= 0) {
			throw new RangeException("size should be bigger than zero.");
		}

		$chunkedSums = [];
		foreach (array_chunk($source, $size) as $chunkedCollect) {
			$chunkedSums[] = $this->getArraySumByKey($chunkedCollect, $key);
		}

		return $chunkedSums;
	}

	/**
	 * Calculate the sum of values which selected by key in an array
	 * @param  array $array    the input array
	 * @param        $key      the selected key
	 * @return int             sum
	 */
	private function getArraySumByKey($array, $key) : int
	{
		return array_reduce($array, function ($carry, $item) use ($key) {
			return $carry + $item[$key];
		});
	}
}