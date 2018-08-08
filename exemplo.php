<?php



$token = "bot0000000:AAAAAAA-CCfadafsdfasdfa"; //Token do BOT do telegram.
$chatid = "8888888888";   //Chat ID, obtido através do webhook do BOT.

sendMessage($chatid,"Olá Fulano, este é meu teste. Aqui quem envia é Rafael Rend via sistema. Seu nome eu vejo aqui corretamente.", $token);



function sendMessage($chatID, $messaggio, $token) {
    echo "sending message to " . $chatID . "\n";


    $url = "https://api.telegram.org/" . $token . "/sendMessage?chat_id=" . $chatID;
    $url = $url . "&text=" . urlencode(utf8_encode( $messaggio) );
    $minha_curl = curl_init();
    
    curl_setopt($minha_curl , CURLOPT_URL, $url);
		curl_setopt ($minha_curl, CURLOPT_HEADER, 0);
		
		curl_setopt($minha_curl,CURLOPT_TIMEOUT, (9*60*60 ) );
		curl_setopt($minha_curl,CURLOPT_CONNECTTIMEOUT, 0 );
		curl_setopt($minha_curl, CURLOPT_FOLLOWLOCATION, 1);// allow redirects
		curl_setopt($minha_curl, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($minha_curl, CURLOPT_FRESH_CONNECT,1);
    /* 
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
     * 
     */
    $result = curl_exec($minha_curl);
    curl_close($minha_curl);
    
    echo("<br>". $url . " <br> Final: " . $result );
}



	function recebe_html  ($url_origem,$arquivo_destino){
		
		//dl("php_curl.dll");
		
		$minha_curl = curl_init ($url_origem);

		curl_setopt($minha_curl , CURLOPT_URL, $url_origem);
		//$fs_arquivo = fopen ($arquivo_destino, "w");
		//curl_setopt ($minha_curl, CURLOPT_FILE, $fs_arquivo);
		curl_setopt ($minha_curl, CURLOPT_HEADER, 0);
		
		curl_setopt($minha_curl,CURLOPT_TIMEOUT, (9*60*60 ) );
		curl_setopt($minha_curl,CURLOPT_CONNECTTIMEOUT, 0 );
		curl_setopt($minha_curl, CURLOPT_FOLLOWLOCATION, 1);// allow redirects
		curl_setopt($minha_curl, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($minha_curl, CURLOPT_FRESH_CONNECT,1);
		
		
		//print_r( $minha_curl );die("<--");
		$result = curl_exec ($minha_curl) ;
		if ( $result  === false ){
			echo ("Erro:" . curl_error($minha_curl) );
		}
		//echo ("-->". $result  );
		curl_close ($minha_curl);
		//fclose ($fs_arquivo);
		
		return $result;
	}



?>