<?php
require "src/function.php";
echo " <h2>ДЗ-1</h2> ";
echo " <h3>задача 1</h3> ";
$str = "Функция должна принимать массив строк и выводить каждую строку в отдельном
параграфе./
Если в функцию передан второй параметр true, то возвращать (через return)
результат в виде одной объединенной строки.";
$arrayStr = explode(".", $str);
print_r($arrayStr);

echo "<p>Разделим</p>";
task1($arrayStr);
echo "<br>";
echo "<p>и соеденим</p> ";
echo task1($arrayStr, true);


echo "<h3>задача 2</h3> ";

task2('*', 1, 2, 3, 5.2);


echo "<h3>задача 3</h3> ";

task3(4, 2);

echo "<h3>задача 4</h3> ";


task4();

echo "<h3>задача 5</h3> ";

task5();

echo "<h3>задача 6</h3> ";
//build_fail();
task6("test3.txt", "Hello again2");

?>