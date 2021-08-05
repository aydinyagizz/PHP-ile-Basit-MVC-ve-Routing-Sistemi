<?php 	


class Route 
{
	public static function parse_url(){
		$dirname= dirname($_SERVER['SCRIPT_NAME']); //hangi klasörde olduğumuz.

		$basename = basename($_SERVER['SCRIPT_NAME']);

		$request_uri = str_replace([$dirname,$basename], null,  $_SERVER['REQUEST_URI']);

		return $request_uri;
	}

	public static function run($url, $callback, $method='get'){


		$method = explode('|', strtoupper($method));
		if (in_array($_SERVER['REQUEST_METHOD'], $method)) {
			
			


			$patterns = [
				'{url}' => '([0-9a-zA-Z]+)',
			'{id}' => '([0-9]+)' //+; en az bir tane olacak.
		];

		$url = str_replace(array_keys($patterns), array_values($patterns), $url);

		$request_uri = self::parse_url();
		if (preg_match('@^'.$url.'$@', $request_uri, $parameters )) {

			unset($parameters['0']); //parameters'in ilk değerini siliyoruz. sadece ad soyad kalıyor.

			if (is_callable($callback)) { //gelen değer çağrılabilir bir fonksiyon ise 
				call_user_func_array($callback, $parameters);
			}

			$controller = explode('@', $callback); //@'den parçalıyoruz.

			$controllerFile =  __DIR__ . '/controller/' . strtolower($controller[0]) . '.php';//$controller[0] dosya adı olacak. uyeler.php'yi arıyacak controllerin içinde.

			$className = explode('/', $controller[0]);
			$className = end($className);


			if (file_exists($controllerFile)) { 
				require $controllerFile; //çağırma işlemi

				call_user_func_array([new $className, $controller[1]], $parameters);  //üyeler olan sınıfı başlatıyoruz. ilki sınıf ikincisi ise çalıştırmak istediğimiz method, diğeride varsada parametrelerimiz.
			}



		}
	}
}
}





?>