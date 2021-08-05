<pre>

<?php 

/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

/*
$dirname= dirname($_SERVER['SCRIPT_NAME']); //hangi klasörde olduğumuz.

$basename = basename($_SERVER['SCRIPT_NAME']);

$request_uri = str_replace([$dirname,$basename], null,  $_SERVER['REQUEST_URI']);

echo $request_uri;
*/


/*--------------------------------------------------*/


/*

$url = '/uye/tayfunerbilen';
preg_match('@^/uye/([0-9a-zA-Z]+)@', $url, $parameters);  //([0-9a-zA-Z]+); değeri dinamik olarak alıyoruz.

print_r($parameters);

*/

require __DIR__ . '/database.php';
require __DIR__ . '/model.php';
require __DIR__ . '/controller.php'; //include işlemi
require __DIR__ . '/route.php';


Route::run('/', function(){
	echo "merhaba dünya";
});



Route::run('/uyeler', 'uyeler@index'); /*üyeler adında bir class bir Controller çağırıyoruz ve onun içerisindeki index metodunu çağırıyotuz. Sınıf ismiyle method ismini @işareti ile ayırıyoruz.*/

Route::run('/uyeler', 'uyeler@post', 'post'); 

Route::run('/uye/{url}', 'uye@index');

Route::run('/profil/sifre-degistir', 'profile/changepassword@index');




 ?>

</pre>