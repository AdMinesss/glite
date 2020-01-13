<?
function ava_cash($steam) {
	$ava_reserv = 'you_reserv_avatar'
	$key = 'you_steam_api_code';
	$str = substr("$steam", 8);
	$pieces = explode(":", $str);
	$account_id = (($pieces[1] * 2) + $pieces[0]);
	$steamid_64 = $account_id + 76561197960265728;
	$file = "path_to_the_cache_folder/{$steamid_64}.txt";
	if((!file_exists ($file)) OR (filesize($file) == '0')) {
		$apidata = @file_get_contents("https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=$key&steamids=$steamid_64/");
		$datax = (array) json_decode($apidata)->response->players[0];
		$avatarka = $datax['avatarfull'];
		if($avatarka == NULL){ 
			$avatarka = $ava_reserv; 
		}
				$fp = fopen($file, "w");
				fwrite($fp, $avatarka);
				fclose($fp);	
	}
   return  $file;
}

?>
