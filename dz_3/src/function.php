<?php
echo "<pre>";
function task1()
{
    $file = file_get_contents('data.xml');
    $xml = new SimpleXMLElement($file);
    foreach ($xml as $a) {
        if ($a->getName() == "Address") {
            print_r("<h3>" . $a->getName() . "</h3>");
            echo "<br>", "<b>", (string)$a->attributes()->Type, "</b>", "</br>";
            foreach ($a as $item => $value) {
                print_r("</br>" . "$item" . "=" . "$value" . "</br>");
            }
        } else {
            if ($a->getName() == "Items") {
                echo "<h3>product</h3>   ";
                foreach ($a as $item => $value) {
                    echo "<br>", "<b>", (string)$value->attributes()->PartNumber, "</b>", "</br>";
                    foreach ($value as $item2 => $value2) {
                        print_r("</br>" . "$item2" . "=" . "$value2" . "<br>");
                    }
                }
            }
        }
    }
    echo $xml->DeliveryNotes;
}

function task2()
{
    $catalog = array(
        "id" => 1,
        "name" => "fantasy",
        "book" => array(
            "bookID" => 1,
            "bookName" => "gore ot uma",
            "quantity" => 10
        ),
    );
    $json_item = json_encode($catalog);
    $fp = fopen('output.json', 'w');
    file_put_contents('output.json', $json_item);
    fclose($fp);
    echo 'файл схранен<br/></br>';
    $rand_json = rand(1, 6);
    if ($rand_json > 1) {
        $name = trim("gore ot uma");
        $new_name = trim("горе от ума");
        $file = file_get_contents('output.json');
        $catalog_dec = json_decode($file, true);
        foreach ($catalog_dec['book'] as $key => $value) {
            echo "$key: $value\n";
            if ($value == $name) {
                $catalog_dec['book'][$key] = $new_name;
                print_r($catalog_dec['book'][$key]);
            }

        };
        echo "поменяли $name на $new_name";
        file_put_contents('output.json', json_encode($catalog));
        file_put_contents('output2.json', json_encode($catalog_dec));
        unset($catalog_dec);
    } else {
        echo "ничего не меняли";
        $file = file_get_contents('output.json');
        $catalog_dec = json_decode($file, true);
        file_put_contents('output2.json', json_encode($catalog_dec));
        unset($catalog_dec);
    }
    $file_1 = file_get_contents('output.json');
    $file_2 = file_get_contents('output2.json');
    $dec_1 = json_decode($file_1, true);
    $dec_2 = json_decode($file_2, true);
//    print_r($dec_1);
//    print_r($dec_2);
    $result = array_diff_assoc($dec_1[book], $dec_2[book]);
    echo "<br><br>сравнили! <br>";
    print_r($result);
}

function task3()
{
    $arr = [];
    for ($i = 0; $i < 25; $i++) {
        $arr[$i] = $i;
    }
    $fpw = fopen('file.csv', 'w');
    fputcsv($fpw, $arr);
    fclose($fpw);

    $fpr = fopen('file.csv', 'r');
    $res = fgetcsv($fpr, 100, ',');

    $sum = 0;
    foreach ($res as $key => $value) {
        if ($value % 2 == 0) {
            $sum += $value;
        }
    }
    echo "сумма четных чисел =" . $sum;
    fclose($fpr);
}

function task4()
{
    $url = "https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json";
    $init_url = curl_init();
    curl_setopt($init_url, CURLOPT_URL, $url);
    curl_setopt($init_url, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($init_url);
    curl_close($init_url);
    $result1 = json_decode($result, true);
//    print_r($result1);
    echo "page_id : " . $result1['query']['pages']['15580374']['pageid'] . "<br>";
    echo "title : " . $result1['query']['pages']['15580374']['title'] . "<br>";

}
