<?php 

namespace ChunkedSum;

use PHPUnit\Framework\TestCase;

class ChunkedSumTest extends TestCase
{
	private $collect = [
		"cost" => [1,2,3,4,5,6,7,8,9,10,11],
		"revenue" => [11,12,13,14,15,16,17,18,19,20,21],
		"sellprice" => [21,22,23,24,25,26,27,28,29,30,31],
	];

	public function test_revenue_property_chunked_by_4_should_get_sum_50_66_60()
	{
		$target = [50, 66, 60];

		$ChunkedSum = new ChunkedSum($this->collect);
		$result = $ChunkedSum->getSum("revenue", 4);

		$this->assertEquals($target, $result);
	}

	public function test_cost_property_chunked_by_3_should_get_sum_6_15_24_21()
	{
		$target = [6, 15, 24, 21];

		$ChunkedSum = new ChunkedSum($this->collect);
		$result = $ChunkedSum->getSum("cost", 3);

		$this->assertEquals($target, $result);
	}
}