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

function task3($a, $b)
{
    print_r("<p>вы ввели  $a и   $b   </p>");
    $z1 = is_int($a);
    $z2 = is_int($b);

    if ($z1 > 0 and $z2 > 0) {
        echo('таблица умножения' . '</br>');
        echo('<table>');
        for ($x = 1; $x <= $a; $x++) {
            echo '<tr>';
            for ($y = 1; $y <= $b; $y++) {
                $s = $x * $y;
                echo '<td style="text-align:center;">';
                if (($x % 2 == 0) && ($y % 2 == 0)) {
                    echo '(' . $s . ')';
                } elseif (($x % 2 == 1) && ($y % 2 == 1)) {
                    echo '[' . $s . ']';
                } else {
                    echo ' ' . $s . ' ';
                }
                echo '</td>';

            }
            echo '</tr>';

        }


        echo('</table>');
    } else {
        echo "числа не целые";
    }
}

function task4()
{
    $today = date("d-m-y H:i:s");
    echo $today . "</br>";
    echo date("d-m-y H:i:s", mktime(0, 0, 0, 02, 24, 2016));
}

function task5()
{
    $string = 'Карл у Клары украл Кораллы';
    $upcase = '/К/u';
    $result = preg_replace($upcase, '', $string);
    echo $result;
    echo "<br>";
    $string2 = 'Две бутылки лимонада';
    $upcase2 = '/Две/u';
    $result = preg_replace($upcase2, 'Три', $string2);
    echo $result;
    echo "<br>";


}

function build_fail()
{
    $build = fopen('test.txt', 'w');
    if ($build) {
        echo 'файл test.txt создан';
    }
    $fw = fopen("test.txt", "a");
    $mytext = "Hello again"; // Исходная строка
    $test = fwrite($fw, $mytext); // Запись в файл
    if ($test) {
        echo 'Данные в файл успешно занесены.';
    } else {
        echo 'Ошибка при записи в файл.';
    }
    fclose($fw); //Закрытие файла
}

function task6($file_name, $fail_text)
{
    $build = fopen("$file_name", 'w');
    if ($build) {
        print_r("файл $file_name создан");
    }
    $fw = fopen("$file_name", "a");
    $mytext = "$fail_text"; // Исходная строка
    $test = fwrite($fw, $mytext); // Запись в файл
    if ($test) {
        echo 'Данные в файл успешно занесены.';
    } else {
        echo 'Ошибка при записи в файл.';
    }

    fclose($fw); //Закрытие файла

    $readf = fopen("$file_name", "r");

    echo "</br> Файл содержит: " . fread($readf, 1024) . "</br";

}

?>