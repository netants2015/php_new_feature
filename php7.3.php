<?php
//当计数不可数的对象时，PHP 7.3添加了警告。 is_countable函数可以帮助防止此警告。
// print_r(is_countable([1, 2, 3])); // bool(true)

//array_key_first — 获取指定数组的第一个键值
$array = ['a' => 1, 'b' => 2, 'c' => 3];
$firstKey = array_key_first($array);
// print_r($firstKey);

//array_key_last — 获取一个数组的最后一个键值
// print_r(array_key_last($array)); 

//灵活的Heredoc语法，不再像以前一样需要固定缩进
$query = <<<SQL
    SELECT * 
    FROM `table`
    WHERE `column` = true;
    SQL;
// echo $query;

//函数调用中的尾部逗号
// 数组已经可以实现的函数，现在也可以通过函数调用来实现。 注意，在函数定义中是不可能的！
$posts = 'andy';
$units = '2';
$compacted = compact(
    'posts',
    'units',
);
// print_r($compacted);

//list()及其速记的 [] 语法现在支持引用。
$array = [1, 2];
list($a, &$b) = $array;
$b = 3;
// print_r($array);

// 传递给 compact 的未定义变量将被通知，并且之前会被忽略。
$name = 'foo';
compact('name', 'age'); 

