<?php

namespace App\Services\FuzzyAlgorithm;

class Rule
{
    public static function addRules($f1, $f2, $tempObj)
    {
        if ($f1 >= $f2) {
            $tempObj["temp"] = $f2;
        } else {
            $tempObj["temp"]=$f1;
        }
        if ($tempObj["temp"] >= $tempObj["conclusion"]) {
            $tempObj["conclusion"] = $tempObj["temp"];
        }
        return $tempObj;
    }

    public static function determineSample($a, $b, $c, $d)
    {
        $s1 =
    }
}
