<?php
declare(strict_types=1);

namespace SortFunctions;

interface Sorter
{
    public function sort(array $array): array;
}