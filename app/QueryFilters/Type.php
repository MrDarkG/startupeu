<?php 
namespace App\QueryFilters;
class Type extends Filters
{
	protected function applyFilter($builder)
	{
		return $builder->where("type_id",request($this->filterName()));
	}
}