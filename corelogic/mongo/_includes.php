<?php


// MongoDB
try{
	if($global_app_mode === 'DEVELOPMENT')
	{
		$connection = new MongoClient($global_mongo_url);
	}else
	{
		$connection = new Mongo($global_mongo_url);
	}
	
}catch(MongoException $e)
{
  echo "Could not connect to database\n";
  echo "Mongo url : ".$global_mongo_url."\n";
  echo "Database : ".$global_dbname."\n";
  error_log( "Could not connect to database" );
  exit;
}

//try connecting to Memcache
$memcache = new Memcache;
$memcache->connect($global_memcache_url, 11211) or die ("Could not connect to memcache");


$db = $connection->$global_dbname; 

include_once('playground_functions_mongo.php');
include_once('userfunctions_mongo.php');
include_once('utilityFunctions.php');

?>
