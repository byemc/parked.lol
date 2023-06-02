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
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>example.org is parked, lol!</title>

<link rel="stylesheet" href="/styles/global.css">
</head>
<body>
<main>

<h1>example.org</h1>
<p>This site has been parked! Check back later for something awesome.</p>

</main>
<footer>
<div class="legal">
<div>
<p>This page has been parked with <a href="https://parked.lol" style="text-decoration: underline;">parked.lol</a>.</p>
</div>
</div>
</footer>
</body>
</html>

<?php

exit;

landing:

include('landing.html');
