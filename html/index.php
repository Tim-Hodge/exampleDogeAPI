<?php
	//require your API
	require 'vos_api.php';

	/**
	* Sloppy print function...
	*/
	function print_product($itemName, $USD, $averageRate, $openingRate){
		echo "<p>";
		echo "$itemName<br/>";
		echo "USD Price = \$$USD<br/>";
		echo "DOGE Avg. Conversion = " . round($USD / $averageRate) . "<br/>";
		echo "DOGE Opening Conversion = " . round($USD / $openingRate);
		echo "</p>";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Example Dynamic DOGE</title>
</head>

<body>
	<h1>The Example Doge Shop</h1>
	<h3>My products:</h3>
	<div id="Products">
		<?php
			//perform some call on API to get market data
			$marketData = get_VOS_ticker('DOGE', 'USD');

			//get info from the market data
			$averageRate = get_average_rate($marketData);
			$openingRate = get_opening_rate($marketData);

			//print out the prices of items here

			//item 1 - some nice glasses at $10
			print_product("Super cool dude glasses", 10, $averageRate, $openingRate);

			//item 2 - a rocket ship to the moooon
			print_product("MOON ROCKET", 5000000, $averageRate, $openingRate);
		?>
	</div>
</body>
</html>