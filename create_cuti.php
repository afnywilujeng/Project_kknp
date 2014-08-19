<?php

header ("location:kalendar.php");
include("config.php");

 require_once 'xmlrpc.inc';
 
 $error = false;
 
 var_dump($host);
 var_dump($port);
 var_dump($password);
 var_dump($username);
 
 $name = $_POST['name'];
 $mobile_phone = $_POST['mobile_phone'];
 try {
    if (!$host)
       throw new Exception('config host tidak ditemukan');
    if (!$port)
       throw new Exception('config port tidak ditemukan');
    if (!$username)
       throw new Exception('config username tidak ditemukan');
    if (!$password)
       throw new Exception('config passwod tidak ditemukan');
 
 
    $client = new xmlrpc_client('http://' . $host . ':' . $port . '/xmlrpc/object');
    $sock   = new xmlrpc_client('http://' . $host . ':' . $port . '/xmlrpc/common');
 
    $sock_msg = new xmlrpcmsg('login');
    $sock_msg->addParam(new xmlrpcval($dbname, "string"));
    $sock_msg->addParam(new xmlrpcval($username, "string"));
    $sock_msg->addParam(new xmlrpcval($password, "string"));
    $sock_resp = $sock->send($sock_msg);
 
    if ($sock_resp->errno != 0)
       throw new Exception('Login Error');
 
    $sock_val = $sock_resp->value();
 
    $user_id = $sock_val->scalarval();
	

	
 
      $client = new xmlrpc_client('http://' . $host . ':' . $port . '/xmlrpc/object');
		 
		 $arrayVal = array(
			'name' =>new xmlrpcval($name, 'string') ,
			'mobile_phone' =>new xmlrpcval($mobile_phone, 'string')
		);
		
         
		 $msg = new xmlrpcmsg('execute');  
		 $msg->addParam(new xmlrpcval($dbname, "string"));
		 $msg->addParam(new xmlrpcval(1, "int"));
		 $msg->addParam(new xmlrpcval($password, "string"));       
		 $msg->addParam(new xmlrpcval("hr.employee", "string"));
		 $msg->addParam(new xmlrpcval("create", "string"));

         //$this->msg->addParam(new xmlrpcval($ids_read, "array"));
		 $msg->addParam(new xmlrpcval($arrayVal, "struct"));
         //$this->msg->addParam(new xmlrpcval($arrayVal, "struct"));

		 $resp = $client->send($msg);
         //$this->res = &$this->client->send($this->msg);
         
         if(!$resp->faultCode()) {
            throw new Exception('Login Error');
         }
         else {
            echo "Gagal!";
         }
		 
		 
		 	
} catch (Exception $e) {
    $error = $e->getMessage();
    //display last response on error
    if ($resp)
       var_dump($resp);
 
 }	
 


?>
