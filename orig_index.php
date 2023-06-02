<?php

// parked.lol index/router script lol

$host_string = $_SERVER['HTTP_HOST'];
$host = explode('.', $host_string);
$uri_string = $_SERVER['REQUEST_URI'];
$query_string = explode('?', $uri_string);
$uri = array_values(array_filter(explode('/', $uri_string)));

if(isset($query_string[1])) {
        $uri_string = $query_string[0];
        $query_string = explode('&', $query_string[1]);
        $query = array();
        foreach($query_string as $string) {
                $bits = explode('=', $string);
                $query[$bits[0]] = $bits[1];
        }
}
else {
        $query = array();
}

if(isset($query['domain'])) {
        http_response_code(200);
        die('200 OK — Enjoy your new domain!');
}

if($host_string == 'parked.lol') goto landing;

?><!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $host_string; ?></title>
</head>
<body>
<h1><?php echo $host_string; ?> is parked on parked.lol</h1>
<p>And is all the more awesome for it.</p>
</body>
</html>

<?php

exit;

landing:

include('landing.html');