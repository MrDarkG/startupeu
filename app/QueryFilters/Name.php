<?php 
namespace App\QueryFilters;
class Name extends Filters
{
	protected function applyFilter($builder)
	{
		$search=request($this->filterName());
		return $builder->where("name",'like',"%$search%");
		
	}
}