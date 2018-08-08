<?php

class telegram{
    
    
    
    
        static function sendMessage($chatID, $messaggio, $token, $html = false) {
            //echo "sending message to " . $chatID . "\n";


            $url = "https://api.telegram.org/" . $token . "/sendMessage?chat_id=" . $chatID;
            $url = $url . "&text=" . urlencode(utf8_encode( $messaggio) );
            
            if ( $html ){
                $url .= "&parse_mode=HTML";
            }
            
            $minha_curl = curl_init();

            curl_setopt($minha_curl , CURLOPT_URL, $url);
                        curl_setopt ($minha_curl, CURLOPT_HEADER, 0);

                        curl_setopt($minha_curl,CURLOPT_TIMEOUT, (9*60*60 ) );
                        curl_setopt($minha_curl,CURLOPT_CONNECTTIMEOUT, 0 );
                        curl_setopt($minha_curl, CURLOPT_FOLLOWLOCATION, 1);// allow redirects
                        curl_setopt($minha_curl, CURLOPT_RETURNTRANSFER,1);
                        curl_setopt($minha_curl, CURLOPT_FRESH_CONNECT,1);
                        curl_setopt($minha_curl, CURLOPT_SSL_VERIFYPEER,0 );
                        
                         
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

            if ( Util::request("debug") == "1"){
                     echo("<br>". $url . " <br> Final: " . $result );
            }
        }

        static function getUpdates($token ){
            
              $url = 'https://api.telegram.org/'.$token.'/getUpdates';
            
              return self::recebe_html($url);           
           
        }
        
        static function registraChats( $array ){
            
            for ( $i = 0; $i < count($array); $i++ ){
                $item = $array[$i];
                self::insereChatID($item["id"], $item["nome"]);
            }
            
        }
        
        static function getListaChats( $token ){
            
            
            $json_txt = self::getUpdates($token);
            $array =  (array)json_decode($json_txt );
            $saida = array();
                    
            $ar_obj = new ArrayList();
            
            if (array_key_exists("ok", $array)){
                
                $result = $array["result"];
                
                for ( $i = 0; $i < count($result); $i++ ){
                    
                    $item = (array) $result[$i];
                    
                    $message = (array) $item["message"];
                    
                    if (array_key_exists("chat", $message )){
                        $chat = (array)$message["chat"];
                        
                        if (! $ar_obj->contains( $chat["id"])){
                            $ar_obj->add(  $chat["id"]  );
                            $saida[count($saida)] = array("id"=>$chat["id"],"nome"=> trim($chat["first_name"] ." ". @$chat["last_name"]) );
                        }
                    }
                }
                
            }
            
            return $saida;
            
        }


	static function recebe_html  ($url_origem ){
		
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
                        curl_setopt($minha_curl, CURLOPT_SSL_VERIFYPEER,0 );
		
		
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
        
        
    
    
}