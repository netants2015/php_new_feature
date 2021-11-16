<?php
//当计数不可数的对象时，PHP 7.3添加了警告。 is_countable函数可以帮助防止此警告。
// var_dump(is_countable([1, 2, 3])); // bool(true)

//array_key_first — 获取指定数组的第一个键值
$array = ['a' => 1, 'b' => 2, 'c' => 3];
$firstKey = array_key_first($array);
// var_dump($firstKey);

//array_key_last — 获取一个数组的最后一个键值
// var_dump(array_key_last($array)); 



