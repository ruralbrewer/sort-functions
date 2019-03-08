<?php
declare(strict_types=1);

namespace SortFunctions;

class MergeSort implements Sorter
{
    public function sort(array $array): array
    {
        if (count($array) == 1) {
            return $array;
        }

        $midpoint = intval(count($array) / 2);
        $left = array_slice($array, 0, $midpoint);
        $right = array_slice($array, $midpoint);

        $left = $this->sort($left);
        $right = $this->sort($right);

        return $this->merge($left, $right);
    }

    private function merge(array $left, array $right): array
    {
        $sorted = [];
        $rightCount = 0;

        for ($i = 0; $i < count($left); $i++) {
            if (!isset($right[$rightCount])) {
                break;
            }
            if ($left[$i] < $right[$rightCount]) {
                $sorted[] = $left[$i];
            } else {
                $sorted[] = $right[$rightCount];
                $rightCount++;
                $i--;
            }
        }

        $left = array_slice($left, $i);
        $sorted = array_merge($sorted, $left);

        $right = array_slice($right, $rightCount);
        $sorted = array_merge($sorted, $right);

        return $sorted;
    }
}