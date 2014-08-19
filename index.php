<?php
require_once 'xmlrpc.inc';

$host_post = $_GET['host_post'];
$port_post = $_GET['port_post'];

$host = "localhost";
$port = "8069";

if($host_post != NULL) {
	$host = $host_post;
}

if($port_post != NULL) {
	$port = $port_post;
}

?>

<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Dark Login Form</title>
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <form method="GET" action="" class="login">
    <p>
      <label for="Host">Host:</label>
      <input type="text" name="host_post" id="host_post" value="<?php echo $host?>">
    </p>

    <p>
      <label for="Port">Port:</label>
      <input type="text" name="port_post" id="port_post" value="<?php echo $port?>">
    </p>
	
	<p class="login-submit">
      <button type="submit" class="login-button">Login</button>
    </p>

  </form>
  </br>
  
  <?php
      $server = 'http://'.$host.':'.$port.'/xmlrpc/';
      $client = new xmlrpc_client($host.'/db');
      $resp = $client -> send("list");
      $val = $resp->value();
      echo $val;
  ?>
  	

	
  <form method="POST" action="login.php" class="login">	
  <input type=hidden name="host" id="host" value="<?php echo $host ?>">
  <input type=hidden name="port" id="port" value="<?php echo $port ?>">
    <p>
      <label for="login">Username:</label>
      <input type="text" name="username" id="username" value="admin">
    </p>

    <p>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" value="admin">
    </p>
	
  	<p class="login-submit">
        <button type="submit" class="login-button">Login</button>
    </p>

  </form>

  
</body>
</html>
