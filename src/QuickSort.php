<?php
declare(strict_types=1);

namespace SortFunctions;

class QuickSort implements Sorter
{
    public function sort(array $array): array
    {
        $length = count($array);

        if ($length <= 1) {
            return $array;
        }
        else {
            $pivot = $array[0];
            $left = []; $right = [];

            for($i = 1; $i < $length; $i++) {
                if($array[$i] < $pivot) {
                    $left[] = $array[$i];
                }
                else {
                    $right[] = $array[$i];
                }
            }

            return array_merge($this->sort($left), [$pivot], $this->sort($right));
        }
    }
}