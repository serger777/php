<?require_once "../vendor/autoload.php";
use Intervention\Image\ImageManagerStatic as Image;
// open an image file
$img = Image::make('img/cotel_3.png');

$img = Image::make('img/cotel_3.png')->resize(320, 240)->insert('img/icon.png');
// now you are able to resize the instance

// finally we save the image as a new file
$img->save('img/bar.jpg');
$img->rotate(-45);
$img->save('img/bar2.jpg');
// create empty canvas with background color
$img2 = Image::canvas(320, 240, '#ddd');

// define polygon points
$points = array(
    40,  50,  // Point 1 (x, y)
    20,  240, // Point 2 (x, y)
    60,  60,  // Point 3 (x, y)
    240, 20,  // Point 4 (x, y)
    50,  40,  // Point 5 (x, y)
    10,  10   // Point 6 (x, y)
);

// draw a filled blue polygon with red border
$img2->polygon($points, function ($draw) {
    $draw->background('#0000ff');
    $draw->border(2, '#ff0000');

});
$img2->save('img/bar3.jpg');
?>
<img src="img/bar.jpg" >
<img src="img/bar2.jpg" >
<img src="img/bar3.jpg" >