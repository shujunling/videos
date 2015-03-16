<?php
/*
 * Created on 2015-1-22
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 	header("Content-type: text/html; charset=utf-8");
 	$url = $_GET["url"];
 	$url_array = (explode(".",$url));
 	$vid = $url_array[0];
 	$site = $url_array[1];
		
			$curl = curl_init();
			curl_setopt($curl,CURLOPT_URL,"http://vxml.56.com/json/$vid/?src=out");
			//html5   MP4  http://vxml.56.com/h5json/MTIyMTk1NDI2/?src=m&callback=json
			curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
			$output=curl_exec($curl);
			curl_close($curl);
			
			echo $output;
			$json_Array = json_decode($output,true);
			print_r($json_Array);
			$xml = "<?xml version='1.0' encoding='UTF-8'?>";
			$xml .= "<ckplayer>";
			$xml .= "<flashvars>{h->3}</flashvars>";
			$xml .= "<video>";
			$xml .= "<file><![CDATA[";
			$xml .= $json_Array['info']['rfiles']['0']['url']; 
			$xml .= "]]></file>";
			$xml .= "<size>";
			$xml .= $json_Array['info']['rfiles']['0']['filesize']; 
			$xml .= "</size>";
			$xml .= "<seconds>";
			$xml .= $json_Array['info']['rfiles']['0']['totaltime']; 
			$xml .= "</seconds>";
			$xml .= "</video>";
			$xml .= "</ckplayer>";
			echo $xml;

?>
