<?php
namespace App\QueryFilters;

class Countries extends Filters
{
	protected function applyFilter($builder)
	{
		return $builder->whereIn("country_id",request($this->filterName()));
	}
}
