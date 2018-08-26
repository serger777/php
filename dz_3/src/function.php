<?php
echo "<pre>";
function task1()
{
    $file = file_get_contents('data.xml');
    $xml = new SimpleXMLElement($file);
//   print_r($xml);

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

                    foreach ($value as $item => $value) {
                        echo "<br>", "<b>", (string)$a->attributes()->PartNumber, "</b>", "</br>";
                        print_r("" . "$item" . "=" . "$value" . "");


                    }


                }
            }
        }


    }

    echo $xml->DeliveryNotes;
    die();
}