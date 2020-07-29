<?php 
header('Content-Type: application/json');
$login = $_POST['login'];
$pass = $_POST['pass'];
$b64auth = base64_encode($login ':' $pass)

 if (isset($_POST)) :
   
    $url = 'https://helpdesk.layer.core.dcg.com.br/v1/Mashup/API.svc/web/CheckCredentials';
    
	$options = array(
	    'http' => array(
	    	'header' => array( 
	            'Authorization: Basic ' $b64auth,
	            'Accept: application/json', 
	            'Content-Type: application/json'
	        ),
	        'method'  => 'POST',
	        'content' => ($data)
	    )
	);
	$context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $json = json_decode($result,JSON_PRETTY_PRINT);


	echo json_encode(array(
		'status' => true,
		'response' => $json
	));
endif;


?>
