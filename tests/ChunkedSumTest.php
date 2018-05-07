<?php 

namespace App;

use App\ChunkedSum;
use PHPUnit\Framework\TestCase;

class ChunkedSumTest extends TestCase
{
	private $collect = [
		['cost' => 1, 'revenue' => 11, 'sellprice' => 21],
		['cost' => 2, 'revenue' => 12, 'sellprice' => 22],
		['cost' => 3, 'revenue' => 13, 'sellprice' => 23],
		['cost' => 4, 'revenue' => 14, 'sellprice' => 24],
		['cost' => 5, 'revenue' => 15, 'sellprice' => 25],
		['cost' => 6, 'revenue' => 16, 'sellprice' => 26],
		['cost' => 7, 'revenue' => 17, 'sellprice' => 27],
		['cost' => 8, 'revenue' => 18, 'sellprice' => 28],
		['cost' => 9, 'revenue' => 19, 'sellprice' => 29],
		['cost' => 10, 'revenue' => 20, 'sellprice' => 30],
		['cost' => 11, 'revenue' => 21, 'sellprice' => 31],
	];

	public function test_revenue_property_chunked_by_4_should_get_sum_50_66_60()
	{
		$target = [50, 66, 60];

		$ChunkedSum = new ChunkedSum();
		$result = $ChunkedSum->getChunkedCollectSums($this->collect, "revenue", 4);

		$this->assertEquals($target, $result);
	}

	public function test_cost_property_chunked_by_3_should_get_sum_6_15_24_21()
	{
		$target = [6, 15, 24, 21];

		$ChunkedSum = new ChunkedSum();
		$result = $ChunkedSum->getChunkedCollectSums($this->collect, "cost", 3);

		$this->assertEquals($target, $result);
	}
}