<?php

namespace App\QueryFilters;

use Closure;
class Market extends Filters
{
	protected function applyFilter($builder)
	{
		return $builder->whereIn("market_id",request($this->filterName()));
	}
}
