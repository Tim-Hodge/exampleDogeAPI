<?php
	
	/**
	*	Function to get ticker data from VOS
	*	URL is hard coded - this is for example purposes only
	*	@param orderCurrency - The code for crypto you want data on
	*	@param paymentCurrency - The code for fiat you want conversion rates to
	*/
	function get_VOS_ticker($orderCurrency, $paymentCurrency){
		$url = "http://api.vaultofsatoshi.com/public/ticker?order_currency=$orderCurrency&payment_currency=$paymentCurrency";

		$result = get_JSON($url);
		$result = json_decode($result, true);

		return $result;
	}

	/**
	*	Helper function
	*	@return JSON encoded data from API
	*/
	function get_JSON($url){  
	    $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, "");
        $output = curl_exec($ch);      
        curl_close($ch);
        return $output;
	}

	function get_average_rate($results){
		return $results["data"]["average_price"]["value"];
	}

	function get_opening_rate($results){
		return $results["data"]["opening_price"]["value"];
	}

?>