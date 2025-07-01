<?php namespace App\Helpers;

class StringHelper {
    public static function singkatan(String $string) {
        $words = explode(' ', $string);
        $acronym = '';
        foreach ($words as $word) {
            $acronym .= strtoupper($word[0]);
        }
        return $acronym;
    }
}
