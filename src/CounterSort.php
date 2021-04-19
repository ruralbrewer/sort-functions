<?php
declare(strict_types=1);

namespace SortFunctions;

class CounterSort implements Sorter
{
    private $range = 9;

    public function sort(array $array): array
    {
        $temp = array_fill(0, $this->range+1, 0);

        foreach ($array as $value) {
            $temp[$value] += 1;
        }

        $last = 0;

        foreach($temp as $key => $count) {
            $temp[$key] = $count + $last;
            $last = $temp[$key];
        }

        $sorted = [];

        foreach($array as $value) {
            $sorted[($temp[$value] - 1)] = $value;
            $temp[$value] -= 1;
        }

        return $sorted;
    }
}