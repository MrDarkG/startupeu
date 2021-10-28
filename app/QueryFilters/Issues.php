<?php 
namespace App\QueryFilters;
class Issues extends Filters
{
	protected function applyFilter($builder)
	{
		return $builder->whereIn("issues_id",request($this->filterName()));
	}
}