<?php
require "../vendor/autoload.php";
// open an image file
$img = Image::make('img/cotel_3.png');

$img = Image::make('img/cotel_3.png')->resize(320, 240)->insert('img/icon.png');
// now you are able to resize the instance

// finally we save the image as a new file
$img->save('img/bar.jpg');
?>
<img src="img/bar.jpg" >