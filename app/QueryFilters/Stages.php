<?php
namespace App\QueryFilters;

class Stages extends Filters
{
    protected function applyFilter($builder)
    {
        return $builder->whereIn("stage_id",request($this->filterName()));
    }
}
