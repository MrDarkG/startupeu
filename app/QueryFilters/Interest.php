<?php 

namespace App\QueryFilters;

use Closure;
class Interest extends Filters
{
	
	
	protected function applyFilter($builder)
	{
		return $builder->whereIn("interest_id",request($this->filterName()));
	}
}