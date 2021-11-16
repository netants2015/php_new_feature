<?php
error_reporting(E_ALL);

// 联合类型|
// 请注意， void 永远不能成为联合类型的一部分，因为它表示"没有返回值"。此外，可以使用|null或使用现有的?表示法:
class Foo{};
class Bar{};
class Test{};
function foo(Foo|Bar $input): int|float {
    $result = 'string';
    return $result;

};
$input = new Test();
// foo($input);


// The nullsafe operator
$country =  null;
$session = new stdClass();
class User{
    public $name;
    public $age;
    public $country;
    public $session;
    public function getAddress(){
        return new Address();
    }
};
class Address {
    public $country = 'US';   
    
};

$session->user = new User();
//php7,The nullsafe operator
if ($session !== null) {
  $user = $session->user;
  if ($user !== null) {
    $address = $user->getAddress();
 
    if ($address !== null) {
      $country = $address->country;
    }
  }
}

//php8,Nullsafe运算符的写法优化
// 现在可以用新的 nullsafe 运算符链式调用，而不需要条件检查 null。 如果链条中的一个元素失败了，整个链条会中止并认定为 Null。
$country = $session?->user?->getAddress()?->country;
// echo $country;

// 构造器属性提升
// 在PHP7中，构造器的写法为：
class Point7 {
    public float $x;
    public float $y;
    public float $z;
    public function __construct(
      float $x = 0.0,
      float $y = 0.0,
      float $z = 0.0
    ) {
      $this->x = $x;
      $this->y = $y;
      $this->z = $z;
    }
  }

// 在PHP8中，构造器的写法为：
class Point8 {
    public function __construct(
      public float $x = 0.0,
      public float $y = 0.0,
      public float $z = 0.0,
    ) {}
  }
$point = new Point8(1.0, 2.0, 3.0);
// echo $point->z;

// Match表达式
//php7
switch (8.0) {
    case '8.0':
      $result = "Oh no!";
      break;
    case 8.0:
      $result = "This is what I expected";
      break;
  }
//   echo $result;

// php8
echo match (0) {
    '8.0' => "Oh no!",
    8.0 => "This is what I expected",
    default => "I don't know what to do<br>",
};

// 字符串与数字的比较逻辑
// php7
0 == 'foobar'; // true
//php8
0 == 'foobar'; // false

// 命名参数
// 命名参数允许您通过指定值名称将值传递给函数，这样您就不必按其顺序考虑在内，您还可以跳过可选参数！
function zoo(string $a, string $b, ?string $c = null, ?string $d = null) { 
    echo $a . '<br>';
    echo $b . '<br>';
    echo $c . '<br>';
    echo $d . '<br>';
 }

zoo(
    b: 'value b', 
    a: 'value a', 
    d: 'value d',
);

// 现在可以在对象上使用 ::class ，而不必使用get_class()。其工作方式与 get_class()相同
$foo = new Foo();
// var_dump($foo::class);

class Too
{
    public function __toString(): string
    {
        return 'foo';
    }
}

function bar(string|Stringable $stringable) {
    echo $stringable . '<br>';
 }

bar(new Too());
bar('abc');
//php8新增函数

$string = 'The lazy fox jumped over the fence';

if (str_starts_with($string, 'The')) {
    echo "The string starts with 'The'<br>\n";
}

if (str_ends_with($string, 'fence')) {
    echo "The string ends with 'fence'<br>\n";
}

if (str_contains($string, 'lazy')) {
    echo "The string 'lazy' was found in the string<br>\n";
}

var_dump(fdiv(4, 2)); // float(2)
var_dump(fdiv(1.0, 0.0)); // float(INF)

// get_resource_id()，资源ID
$resource = fopen('php://memory', 'r+');
var_dump(get_resource_id($resource));

trait Trait1 {
    abstract public function test(int $input): int;
}

class UsesTrait
{
    use Trait1;

    public function test(int $input): int
    {
        return $input;
    }
}

$userTrait = new UsesTrait();
var_dump($userTrait->test(1));

