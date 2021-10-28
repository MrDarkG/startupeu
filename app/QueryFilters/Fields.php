<?php 
namespace App\QueryFilters;
class Fields extends Filters
{
	protected function applyFilter($builder)
	{
		return $builder->whereIn("fields_id",request($this->filterName()));
		
	}
}