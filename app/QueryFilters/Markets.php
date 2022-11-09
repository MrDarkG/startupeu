<?php

namespace App\QueryFilters;

class Markets extends Filters
{
    protected function applyFilter($builder)
    {
        return $builder->whereIn("market_id",request($this->filterName()));
    }
}
