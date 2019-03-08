<?php
declare(strict_types=1);

namespace SortFunctions;

class InsertionSort implements Sorter
{
    public function sort(array $array): array
    {
        return $this->insertionSorter($array, 1);
    }

    function insertionSorter(array $array, int $index)
    {
        if ($index < count($array)) {
            $x =  $array[$index];
            $j =  ($index - 1);
            while (($j >= 0) && ($array[$j] > $x)) {
                $array[($j + 1)] = $array[$j];
                $j = ($j - 1);
            }
            $array[($j + 1)] = $x;
            return $this->insertionSorter($array, ($index + 1));
        }

        return $array;
    }
}