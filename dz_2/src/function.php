<?php
function task1($arr, $bool = false)
{
    if ($bool == false) {
        for ($i = 0; $i < count($arr); $i++) {
            echo "<p>" . $arr[$i] . "</p>";
        }
    } else {
        $str = implode(".", $arr);
        return $str;
    }


}


function task2($operator, $item)
{
    $arr = func_get_args();
    print_r($arr);
    print_r("<p>  выполняем соединяем массив вырезая $operator </p> ");
    print_r(eval('return ' . implode($operator, array_slice($arr, 1)) . ';'));

}


?>