<?php
header('Content-type: application/json');
$db = mysql_connect("localhost","","");
mysql_select_db("",$db);
function spec($text)
{
$text = str_replace("'","&#39;",$text);
$text = str_replace("‘","&#39;",$text);
$text = str_replace("’","&#39;",$text);
$text = str_replace("\n","<br>",$text);
return $text;
}
if(isset($_POST["text"]))
{
if($_POST["text"] != "")
{
$text = $_POST["text"];
$name = $_POST["name"];
$text = spec($text);
$text = str_replace(':D','<img src="emoti/smile.png" class="smil">',$text);
$text = str_replace(':d','<img src="emoti/smile.png" class="smil">',$text);
$text = str_replace(':-)','<img src="emoti/smil.png" class="smil">',$text);
$text = str_replace(':)','<img src="emoti/smil.png" class="smil">',$text);
$text = str_replace(':(','<img src="emoti/u.png" class="smil">',$text);
$text = str_replace(';(','<img src="emoti/cry.png" class="smil">',$text);
$text = str_replace(':P','<img src="emoti/p.png" class="smil">',$text);
$text = str_replace(':p','<img src="emoti/p.png" class="smil">',$text);
$text = str_replace('(inlove)','<img src="emoti/inlove.png" class="smil">',$text);
$text = str_replace('(INLOVE)','<img src="emoti/inlove.png" class="smil">',$text);
$text = str_replace(':o','<img src="emoti/o.png" class="smil">',$text);
$text = str_replace(':O','<img src="emoti/o.png" class="smil">',$text);
$text = str_replace(':*','<img src="emoti/kiss.png" class="smil">',$text);
$text = str_replace('(party)','<img src="emoti/u.png" class="smil">',$text);
$time = date("h:i");
mysql_query("INSERT INTO `user` (`user`,`text`,`time`) VALUE('$name','$text','$time')");
}
}
if(isset($_GET["ge"]))
{
$ip = $_SERVER['REMOTE_ADDR'];
$rs = mysql_query("SELECT * FROM `user` WHERE `chat` NOT LIKE '%".$ip."%'");
$arr = array();
while($row = mysql_fetch_assoc($rs)) {
$id = $row["id"];
$user = $row["user"];
$time = $row["time"];
$text = $row["text"];
$chat = $row["chat"].$ip;
$arr[] = array("name" => $user, "time" => $time, "text" => $text);
mysql_query("UPDATE `user` SET `chat`='$chat' WHERE `id`='$id'");
$rd = $id-20;
mysql_query("DELETE FROM `user` WHERE `id`='$rd'");
}
echo '{"members":'.json_encode($arr).'}';

}
?>
