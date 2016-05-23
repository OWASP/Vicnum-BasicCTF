<!DOCTYPE HTML PUBLIC
                 "-//W3C//DTD HTML 4.01 Transitional//EN"
                 "http://www.w3.org/TR/html401/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>Writing CTF results to database</title>

</head>
<body background="../images/ctech.png" text=navy>
<?php 
$ctfplayername = $_GET["ctfplayername"] ;
$username = $_GET["username"] ;
$password = $_GET["password"] ;
$sourceip = $_SERVER['REMOTE_ADDR'] ;
?>
<table  CELLPADDING="1" WIDTH="100%"> 
  <tr> 
    <td WIDTH="70%"><h2>Writing CTF results 
  </tr> 
</table> 
<hr size="3" color="#FF00FF"> 
<pre>
<?php
//echo "$sourceip,$username,$password";
//  Following is to prevent stored xss
$whitelist  = "/[^0-9a-zA-Z_@.]/";
if (preg_match($whitelist,$ctfplayername))  {
 print "<h2> non alpha character detected - player name changed to unknown <p>"; $ctfplayername = "unknown" ; }
   $connection = mysql_connect("localhost","root","vicnum");

   mysql_select_db("vicnum", $connection);

   $query = "SELECT sourceip FROM ctf1 WHERE sourceip  = '$sourceip'";
   $result = mysql_query($query) or die ("ERROR in $query" . " " . mysql_error());

  if ((mysql_num_rows($result) < 1) && ($username == "conor") && ($password == "offenserocks") ) {
//  if ((mysql_num_rows($result) < 1))  {

   $query = "INSERT INTO ctf1(ctfplayername,sourceip) VALUES(\"$ctfplayername\",\"$sourceip\")";
   $result = mysql_query($query) or die ("ERROR in $query" . " " . mysql_error());
	}

else {echo "<H2><b>Either you - $sourceip - have entered incorrect values for player's name or password or your IP address has already been used</b><p>Below find those that have solved the challenge.<p><hr size=\"3\" color=\"#FF00FF\"><p>"; }
   $result = mysql_query ("SELECT ctfplayername,sourceip,tod FROM
                          ctf1 order by tod limit 20", $connection);

   while ($row = mysql_fetch_array($result, MYSQL_NUM))
   {
     print "<h2>$row[0]\t has solved the challenge from $row[1] at $row[2] \n";
   }
?>
</body>
