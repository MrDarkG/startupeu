<?php

namespace App\QueryFilters;

class Ranges extends Filters
{
    protected function applyFilter($builder)
    {
        return $builder->whereIn("range_id",request($this->filterName()));
    }
}
