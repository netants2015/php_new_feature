<?php
error_reporting(E_ALL);
// 箭头函数也称为"短闭包"，它允许较少冗长的单行函数。
class User {
    public $id;    
};
$users = [
    new User,
    new User,
    new User,
];

//以前的用法
array_map(function (User $user) { 
    return $user->id; 
}, $users);

// print_r($users);

//7.4的新用法
array_map(fn (User $user) => $user->id, $users);
// print_r($users);

// 类变量可以用类型提示:
class ClassType
{
    public string $name;       
}

// 简而言之:您将可以使用协变返回类型
class ParentType {}
class ChildType extends ParentType {}

class A
{
    public function covariantReturnTypes(): ParentType
    { /* … */ }
}

class B extends A
{
    public function covariantReturnTypes(): ChildType
    { /* … */ }
}

// 空合并分配运算符
$data['date'] ??= new DateTime();
// echo $data['date']->format('Y-m-d');

// 数组扩展运算符,请注意，这仅适用于带有数字键的数组。
$arrayA = [1, 2, 3];
$arrayB = [4, 5];
$result = [0, ...$arrayA, ...$arrayB, 6 ,7];
// print_r($result);

// 允许使用下划线在视觉上分隔数字值
$unformattedNumber = 107925284.88;
$formattedNumber = 107_925_284.88;
// echo $formattedNumber;

// 三元运算符弃用
// 1 ? 2 : 3 ? 4 : 5;//deprecated
// echo (1 ? 2 : 3) ? 4 : 5;//ok

// 串联优先
// echo "sum: " . $a + $b;//deprecated
// echo "sum: " . ($a + $b);//ok

// 无效的数组访问警告
$i = 1;
$i[0]; // Notice

// strip_tags 接受数组
// 过去只能剥离多个标签
$string = '<p>Test paragraph.</p><!-- Comment --> <a href="#fragment">Other text</a><h1>world</h1>';
// echo strip_tags($string, '<a><p>');
// 7.4还能使用数组
// echo strip_tags($string, ['a', 'p']);




