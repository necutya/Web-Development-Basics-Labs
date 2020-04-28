<?php
/*Block 1: Variables*/
//require('hello_world.php');
require_once('hello_world.php');
//include('hello_world1.php');
include_once('hello_world.php');


$variable = 21;
echo '$variable' . "<br>";
echo "$variable". "<br>";
$var1 = variable;
echo $$var1. "<br>";

echo '<hr>';

/*Block 2: equals*/
$var1 = null;
$var2 = 0;
echo ($var1 == $var2) . "<br>"; // true (1)
echo ($var1 === $var2) . "<br>"; // false ("")
echo ($var1 !== $var2) . "<br>"; // true (1)
echo '<hr>';


/*Block 3: arrays*/
$arr = array(21, "Artem", 33.3);
for ($i = 0; $i < count($arr); $i++) {
    echo $arr[$i] . " ";
}
echo '<br>';
foreach ($arr as $item) {
    echo $item . " ";
}
echo '<br>';
foreach (array_filter($arr, function ($item) { return  gettype($item) == "string";}) as $item)
    echo $item." ";


echo '<br>' .  '<hr>';


/*Block 4: associative arrays and if clauses*/
$arr1 = array('name' => 'Artem', 'surname' => 'Lebedev', 'group' => 'TI-81');
foreach ($arr1 as $key => $value):
    echo $key . '=>' . $value . "; ";
endforeach;

echo '<br>';
echo isset($arr1['name']) ? $arr1['name'] . "<br>" : "There is no key 'name'" . "<br>";
echo isset($arr1['second_name']) ? $arr1['second_name'] . "<br>" : "There is no key 'second_name'" . "<br>";
echo $arr1['name'] . "<br>" ?? 'There is no key \'name\'' . "<br>";
echo $arr1['second_name'] . "<br>" ?? 'There is no key \'second_name\'' . "<br>";
echo '<hr>';


/*Block 5: explode/implode*/
$str = "My name is Artem Lebedev";
$str_explode= explode(" ", $str);
echo $str."<br>";
echo $str_explode."=>";
var_dump($str_explode) ;
echo  "<br>".implode(".", $str_explode)."<br>";

echo '<hr>';


/*Block 6: const*/
define('COLORS',  [
    'red' => '#f44141',
    'blue' => '#4286f4',
    'green' => '#1ae01e',
    'purple' => '#f309f7',
    'orange' => '#ef7700',
]);
echo(COLORS['red']);
echo '<hr>';

/*Block 7: generators*/
function myrange($start, $limit, $step = 1) {
    if ($start <= $limit) {
        if ($step <= 0) {
            throw new LogicException('Step must be positive');
        }

        for ($i = $start; $i <= $limit; $i += $step) {
            echo "<br>".$i;
            yield $i;
        }
    } else {
        if ($step >= 0) {
            throw new LogicException('Step must be positive');
        }

        for ($i = $start; $i >= $limit; $i += $step) {
            echo "<br>".$i;

            yield $i;
        }
    }
}

$rng = myrange(10, 20, 2);

var_dump($rng);
$rng->next();
$rng->next();
echo '<hr>';

