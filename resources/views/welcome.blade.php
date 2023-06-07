{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Document</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<form action="/form" method="get">--}}
{{--    @csrf--}}
{{--    <input type="text" name="filter[category_id]">--}}
{{--    <input type="number" name="filter[min_price]">--}}
{{--    <input type="number" name="filter[max_price]">--}}
{{--    <input type="text" name="filter[properties]">--}}

{{--    <button>Submit</button>--}}
{{--</form>--}}
{{--</body>--}}
{{--</html>--}}

<?php

//function wordSpace($str, $word)
//{
//    $arr = explode(' ', $str);
//    $word1 = 0;
//    $res = [];
//
//    $word1 = array_reverse(array_keys($arr, $word));
//    if (!count($word1)) {
//        return null;
//    }
//    $word2 = $word1[0];
//
//    for ($i = 1; $i < count($word1); $i++) {
//        $res[] = $word2 - $word1[$i] - 1;
//        $word2 = $word1[$i];
//    }
//    return min($res);
//}
//
//dump(wordSpace('привет я кстати вчера купил машинку кстати красную кстати в кредит', 'кстати'))

//function maxProduct(array $nums, int $k)
//{
//    sort($nums);
//
//    while ($k) {
//        $min = min($nums);
//        for ($i = 0; $i < count($nums); $i++) {
//            if ($min == $nums[$i] && $k) {
//                $nums[$i]++;
//                $k--;
//            }
//        }
//    }
//    return array_reduce($nums, fn($acc, $n) => $acc * $n, 1) % (1e9 + 7);
//}
//
//dump(maxProduct([24, 5, 64, 53, 26, 38], 54));

//function minPartitions($n)
//{
//    $max = 0;
//
//    for ($i = 0; $i < strlen($n); $i++) {
//        if ($n[$i] > $max) {
//            $max = $n[$i];
//        }
//    }
//    return $max;
//}
//
//dump($minPartitions(32));

//function scramble($str1, $str2): bool
//{
//    $str1 = str_split($str1);
//    $str2 = str_split($str2);
//
//    $arr1 = array_count_values($str1);
//    $arr2 = array_count_values($str2);
//
//    foreach ($arr2 as $key => $item) {
//        if (isset($arr1[$key]) && $arr1[$key] !== $arr2[$key]) {
//            return false;
//        }
//    }
//    return true;
//}
//
//dump(scramble('cedewaraaossoqqyt', 'codewars'));

//function pigIt(string $str)
//{
//    $arr = explode(' ', $str);
//    $i = [
//        '?',
//        '!',
//    ];
//
//    foreach ($arr as $key => $item) {
//        if (isset($i[$key]) && in_array($i[$key], $i)) {
//            $a = str_split($item);
//            $a[count($a) + 1] = $a[0];
//            $a[count($a) + 2] = 'a';
//            $a[count($a) + 3] = 'y';
//            unset($a[0]);
//
//            $arr[$key] = implode('', $a);
//        }
//    }
//    return implode(' ', $arr);
//}
//
//dump(pigIt('Hello world !'));

//function strSplit(string $str)
//{
//    $str = str_replace(' ', '', $str);
//
//    $arr = str_split($str, 2);
//
//    if (empty($arr)) {
//        return $arr;
//    };
//
//    foreach ($arr as $key => $item) {
//        $a = str_split($item);
//        if (array_sum(array_count_values($a)) < 2) {
//            $a[count($a) - 1] .= '_';
//            $arr[$key] = implode('', $a);
//        }
//    }
//    return $arr;
//}
//
//dump(strSplit(" "));

//function longestConsec($starr, $k): string
//{
//    $newStr = '';
//    $str = '';
////    usort($starr, fn($a,$b) => strlen($a) < strlen($b));
//    $n = strlen(implode('',$starr));
//
//    if ($n = 0 || $k > $n || $k <= 0) {
//        return '';
//    }
//
//    for ($i = 0; $i < count($starr); $i++) {
//        $newStr = implode('', array_slice($starr, $i, $k));
//        dump($newStr);
//        if (strlen($newStr) > strlen($str)) {
//            $str = $newStr;
//        }
//    }
//    return $str;
//}
//
//dump(longestConsec(["zone", "abigail", "theta", "form", "libe", "zas"],2));


function multiTable($size)
{
    $arr = [];
    for ($i = 1; $i <= $size; $i++) {
        $a = [];
        for ($j = 1; $j <= $size; $j++) {
            $a[] = $i * $j;
        }
        $arr[] = $a;
    }

}

dump(multiTable(3));
//3
//1 * 1 = 1;
//1 * 2 = 2;
//1 * 3 = 3;
