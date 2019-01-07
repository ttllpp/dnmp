<?php
$redis = new \Redis();
$redis->connect('my-redis', 6379, 1);
$redis->set('test', 'test');
$test = $redis->get('test');
if ($test != 'test') {
	echo "redis error\r\n";
} else {
	echo "redis success\r\n";
}
$redis->close();

$m = new \Memcached();
$m->addServer('my-memcached', 11211);
$m->set('test', 'test', 60);
$resultCode = $m->getResultCode();
if($resultCode == \Memcached::RES_SUCCESS ){
	echo "memcached success\r\n";
} else {
	echo "memcached error\r\n";
}

$link = mysqli_connect("my-mysql", "developer", "root", "mydb");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

mysqli_close($link);