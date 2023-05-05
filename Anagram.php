<?php

declare(strict_types=1);

class Anagram
{
    const PATTERN = '/\p{P}|\s/u';

    private function __construct()
    {
    }

    public static function check(string $firstString, string $secondString): bool
    {
        $firstString = self::normalize($firstString);
        $secondString = self::normalize($secondString);

        return self::countChars($firstString) === self::countChars($secondString);
    }

    private static function normalize(string $string): string
    {
        return preg_replace(self::PATTERN, '',  mb_strtolower($string));
    }

    private static function countChars(string $string): array
    {
        $charCounts = array_count_values(preg_split('//u', $string, 0, PREG_SPLIT_NO_EMPTY));
        ksort($charCounts);

        return $charCounts;
    }
}
