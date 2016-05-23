
<html><head>
<title> CTF Friendly  </title>
<link rel="shortcut icon" href="/favicon.ico" />
<body background="../images/ctech.png"  text=navy>
 
<table  CELLPADDING="5" WIDTH="100%"> 
  <tr> 
    <td WIDTH="70%"><h2>Welcome to a friendly CTF</h2> 
<hr size="3" color="#FF00FF"></h2><br>
A client has been using a fake userid on a web site with poor security.
Our SoC has obtained a pcap of that individual accessing the site which you can download <a href="pcap1.pcap">here</a>.
To get on the leaderboard below you will need to enter the real first name of the user and the password they used in the results page.  
But first some rules.
</table> 
<p>
<hr size="3" color="#FF00FF"><br>
<b> Players that use automated tools or brute forcing techniques will be blacklisted (and it probably won't help).</b> <p>
<b> Players that attempt to DoS the game environment or another player will also be blacklisted. </b><p>
<b> Don't share your methodology or findings until the event has concluded.</b> <p>
<b> No SSH or console access to the challenge environment is allowed for this Challenge.</b> <p> 
<b> If you have solved the challenge then step away and do not abuse the results page - allow others to play.</b> <p>
<b> No social engineering or phishing of the game author is permitted.</b> <p>
<p>
<hr size="3" color="#FF00FF"></h2>
<?php
print "<H2><u>CTF1 Leaderboard</u></h2>\n" ;
   $connection = mysql_connect("localhost","root","vicnum");
   mysql_select_db("vicnum", $connection);
   $result = mysql_query ("SELECT ctfplayername,sourceip,tod FROM
                          ctf1 order by tod ", $connection);
                while ($row = mysql_fetch_array($result, MYSQL_NUM))
                {
                print "<H2>$row[0]\t completed the challenge from $row[1]\t at $row[2] \n";
                }
?>

<br>
<hr size="3" color="#FF00FF"></h2>

<body>
