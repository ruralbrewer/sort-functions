<?php
declare(strict_types=1);

namespace SortFunctions;

class RadixSort implements Sorter
{
    public function sort(array $array): array
    {
        $elementCount = count($array);
        $sorted = array_fill(0, $elementCount, null);
        $highestDigitCount = 2;
        $digitIteration = 1;

        while ($digitIteration <= $highestDigitCount) {

            $temp = array_fill(0, 10, 0);

            foreach ($array as $key => $value) {

                $digits = (string) $value;
                $digitCount = strlen($digits);

                // The first time through.
                if ($digitIteration === 1) {
                    $highestDigitCount = ($digitCount > $highestDigitCount) ? $digitCount : $highestDigitCount;
                }

                $digitIndex = $digitCount - $digitIteration;
                $digit = ($digitIndex >= 0) ? (int) $digits[$digitIndex] : 0;
                $temp[$digit] += 1;
            }

            // Calculate the highest index for each digit.
            $currentHighestIndex = 0;

            foreach ($temp as $key => $count) {
                $temp[$key] = $count + $currentHighestIndex;
                $currentHighestIndex = $temp[$key];
            }

            $i = $elementCount - 1;
            for ($i; $i >= 0; $i--) {

                $digits = (string) $array[$i];
                $digitCount = strlen($digits);

                $digitIndex = $digitCount - $digitIteration;
                $digit = ($digitIndex >= 0) ? (int) $digits[$digitIndex] : 0;

                $currentIndex = $temp[$digit] - 1;
                $sorted[$currentIndex] = $array[$i];
                $temp[$digit] -= 1;

            }

            $array = $sorted;

            $digitIteration++;
        }

        return $sorted;
    }
}