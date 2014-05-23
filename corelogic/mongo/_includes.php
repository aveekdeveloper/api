<?php

//This is the memcache stub , which can be used in localhost for dvelopment purposes
class MemcacheStub
{
	//getter
	funtion get($var)
	{
		//Always return false
		return false;
	}
	
	//setter
	function set( $var, $result, $flag, $time)
	{
		//Do nothing
	}

}

// MongoDB
try{
	if($global_app_mode === 'DEVELOPMENT')
	{
		$connection = new MongoClient($global_mongo_url);
		$memcache = new MemcacheStub;
	}else
	{
		$connection = new Mongo($global_mongo_url);
		//try connecting to Memcache
		$memcache = new Memcache;
		$memcache->connect($global_memcache_url, 11211) or die ("Could not connect to memcache");
	}
	
}catch(MongoException $e)
{
  echo "Could not connect to database\n";
  echo "Mongo url : ".$global_mongo_url."\n";
  echo "Database : ".$global_dbname."\n";
  error_log( "Could not connect to database" );
  exit;
}

$db = $connection->$global_dbname; 

include_once('playground_functions_mongo.php');
include_once('userfunctions_mongo.php');
include_once('utilityFunctions.php');

?>
