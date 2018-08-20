<?php

//1
echo('1 задание' . '</br>');
$name = 'sergey';
$age = 36;

echo 'меня зовут:', $name, '<br>';
echo 'мне:', $age, 'лет', '<br>';
//echo '“' ,  , '|', '\' ;
print_r('"');


echo ' ! ';
echo ' | ';

print_r(' \\ ');
print_r(' / ');
print_r(" ’ ");
print_r(' " ');
echo(' \\ ');
echo('</br>');

//2
echo('2 задание' . '</br>');
$all_img = 80;
$img_car = 23;
$img_flm = 40;
$img_ris = $all_img - ($img_car + $img_flm);
echo 'рисунки красками:', $img_ris;
echo('</br>');
echo('</br>');

//dz-3
echo('3 задание' . '</br>');
$age = 33;
echo 'ваш возраст ', $age, '<br>';
if (17 < $age and 60 > $age) {
    echo('вам еще работать и работать');
} elseif ($age > 65) {
    echo('вам пора на пенсию');
} elseif ($age > 1 && $age < 17) {
    echo('вам еще рано работать');
} else {
    echo('Неизвестный возраст');
}

//dz-4
echo('</br>' . '</br>' . '4 задание' . '</br>');
echo('</br>');
$day = 3;
echo('день:' . $day . '</br>');
switch ($day) {
    case 1:
        echo 'рабочий день';
        break;
    case 2:
        echo 'рабочий день';
        break;
    case 3:
        echo 'рабочий день';
        break;
    case 4:
        echo 'рабочий день';
        break;
    case 5:
        echo 'рабочий день';
        break;
    case 6:
        echo 'Это выходной день';
        break;
    case 7:
        echo 'Это выходной день';
        break;
    default:
        echo 'Неизвестный день';
}

//dz-5
echo('5 задание' . '</br>');
echo('</br>');

$bmw = array(
    'model' => 'x5',
    'sped' => '140',
    'doors' => '5',
    'years' => '2003',
);
$nissan = array(
    'model' => 'march',
    'sped' => '210',
    'doors' => '5',
    'years' => '2008',
);
$opel = array(
    'model' => 'astra',
    'sped' => '180',
    'doors' => '4',
    'years' => '2018',
);
$cars = array(
    'bmw' => $bmw,
    'nissan' => $nissan,
    'opel' => $opel

);
foreach ($cars as $key => $value) {
    echo '<p>' . ' машина:' . $key . '</br> ' . $value['model'] . ' ' . $value['sped'] . ' ' . $value['doors'] . ' ' . $value['years'] . '</p>';
}

//dz-6
echo('таблица умножения' . '</br>');
echo('<table>');
for ($x = 1; $x <= 10; $x++) {
    echo '<tr>';
    for ($y = 1; $y <= 10; $y++) {
        $b = $x * $y;
        echo '<td style="text-align:center;">';
        if (($x % 2 == 0) && ($y % 2 == 0)) {
            echo '(' . $b . ')';
        } elseif (($x % 2 == 1) && ($y % 2 == 1)) {
            echo '[' . $b . ']';
        } else {
            echo ' ' . $b . ' ';
        }
        echo '</td>';

    }
    echo '</tr>';

}


echo('</table>');


?>