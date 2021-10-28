<?php 
namespace App\QueryFilters;
class Sort extends Filters
{
	protected function applyFilter($builder)
	{
		if (!in_array(request($this->filterName()), ["ASC","DESC"])) {
		return $builder->orderBy("name","ASC");
			
		}
		return $builder->orderBy("name",request($this->filterName()));
		
	}
}