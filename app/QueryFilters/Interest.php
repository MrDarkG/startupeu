<?php
namespace App\QueryFilters;

class Interest extends Filters
{
	protected function applyFilter($builder)
	{
		return $builder->whereIn("interest_id",request($this->filterName()));
	}
}
