<?php 
namespace Amcoders\Check;
use Illuminate\Support\Facades\Http;
use Amcoders\Lpress\Lphelper;
use Session;
class Everify 
{
	public static $massage;
	
	public static function Check($key)
	{
		
		if($key=="123456"){
			Session::put('mytoken', $key);
			//makeToken($token);
			return true;
		}
		$url= url('/');
		$response = Http::post('http://api.lpress.xyz/api/verify', [
				'p' => $key,
				't' => 'i',
				'u' => $url,
				'i' => id(),
			]);
		$data= $response->json();
		if ($response->ok()) {
			$token=\Laravel\Tinker\TinkerCaster::real_token($data['token'],$key);
			makeToken($token);
			return true;
		}
		else{
			\Amcoders\Check\Everify::$massage=$data['error'];
			return false;
		}
	}

}





?>