<?php 
header('Access-Control-Allow-Origin: *');
StartAPI('ADMIN', $exp_req[3] ?? null, $exp_req[4] ?? null); 
?>