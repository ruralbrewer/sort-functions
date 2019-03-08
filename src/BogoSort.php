<?php
declare(strict_types=1);

namespace SortFunctions;

class BogoSort implements Sorter
{
    public function sort(array $array): array
    {
        while (!$this->isSorted($array)) {
            shuffle($array);
        }

        return $array;
    }

    public function isSorted(array $array)
    {
        $last = count($array) - 1;

        for ($i = 0; $i < $last; $i++) {
            if ($array[$i] > $array[($i + 1)]) {
                return false;
            }
        }
        return true;
    }
}