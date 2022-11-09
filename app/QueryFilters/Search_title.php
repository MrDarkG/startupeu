<?php

namespace App\QueryFilters;

class Search_title extends Filters
{
    protected function applyFilter($builder)
    {
        return $builder->where("title","like","%".request($this->filterName())."%");
    }
}
