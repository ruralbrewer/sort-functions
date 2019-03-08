<?php
declare(strict_types=1);

namespace SortFunctions;

class SelectionSort implements Sorter
{
    public function sort(array $array): array
    {
        $size = count($array);

        for ($j = 0; $j < ($size - 1); $j++) {

            $minimum = $j;

            for ($i = ($j + 1); $i < $size; $i++) {

                if ($array[$i] < $array[$minimum])
                {
                    $minimum = $i;
                }
            }

            if ($minimum != $j) {
                $array = $this->swap($array, $j, $minimum);
            }
        }

        return $array;
    }

    private function swap(array $array, int $index1, int $index2): array
    {
        $temp = $array[$index1];
        $array[$index1] = $array[$index2];
        $array[$index2] = $temp;

        return $array;
    }
}