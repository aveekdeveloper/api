<?php

// MongoDB details
//Live mode details
$global_mongo_url = getenv("MONGOLAB_URI");
$parsed_mongo_url = parse_url($global_mongo_url);
$global_dbname = str_replace("/", "", $parsed_mongo_url["path"]);

// Memcache details
//Live mode details
$global_memcache_url = 'tunnel.pagodabox.com';

//App mode
$global_app_mode = 'LIVE';

if (file_exists(dirname(__FILE__) . '/local.config.php')) {
  include dirname(__FILE__) . '/local.config.php';
}


?>