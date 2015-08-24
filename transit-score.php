


if (!defined('ABSPATH'))
				exit;
register_activation_hook(__FILE__, 'transit_score');
function  transit_score(){
	}




/*
$lat = "38.9111048";
$lon = "-77.042613";
$address = "Dupont Circle Washington,DC USA";
 */

add_shortcode( 'TansistScore', 'gettansistScore' );


 function gettansistScore($att) {
  $lat = $att['lat'];
  $lon = $att['lon'];
  $url ="http://transit.walkscore.com/transit/score/?lat=$lat&lon=$lon&city=Washington&state=DC&wsapikey=yourwalkscoreapikey";
  $str = @file_get_contents($url); 
  $score = json_decode($str);
$result = ' <div class="tansistScore">';
 $result.='  <img src="'.$score->logo_url.'">';
$result.=' <b style="text-align:center"> '.$score->transit_score .' </b>
</div>';




  return $result;

 } 




add_shortcode( 'WalkScore', 'getWalkScore' );

function getWalkScore($att) {

 $lat = $att['lat'];
  $lon = $att['lon'];
  
 $address = $att["address"];
  $address=urlencode($address);
  $url = "http://api.walkscore.com/score?format=json&address=$address";
  $url .= "&lat=$lat&lon=$lon&wsapikey=5825b4ee1dbf24496437cabd8415ee71";
  $str = @file_get_contents($url); 
$walkscore = json_decode($str); 
  return $walkscore->walkscore; 
 }




?>