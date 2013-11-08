<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>InstantlyChat</title>
<style>
html, body{
margin:0px;
padding:0px;
clear:both;
height:100%;
}
#body{
background:url(img/body.jpg);
width:100%;
min-height:100%;
height: auto !important;
height:100%;
background-size: cover; 
background-position: center center; 
box-shadow: 0px 3px 2px 0px rgba(220, 220, 220, 0.8);
}
#chat{
top:100px;
width:600px;
height:490px;
padding-top:10px;
margin:auto;
position:relative;
border-radius:5px;
background-color:rgba(255, 255, 255, .7);
}
#chat_top{
background-color:#FFF;
width:580px;
height:370px;
margin:auto;
padding-top:10px;
border-radius:5px;
overflow:auto;
}
#use{
width:555px;
height:auto;
margin:auto;
padding-top:5px;
padding-bottom:10px;
border-bottom:1px solid #f6f6f6;
}
#use_tit{
width:555px;
height:14px;
padding-bottom:10px
}
#use_name{
width:500px;
float:left;
height:14px;
font-size:14px;
font-weight:bold;
}
#use_dat{
width:50px;
text-align:right;
float:right;
height:14px;
font-size:14px;
color:#ccc;
font-weight:bold;
}
#use_b{
width:555px;
height:auto;
color:#777;
font-size:14px;
padding-top:5px;
padding-bottom:5px;
font-family:serif;
line-height:20px;
}
#chat_chat{
background:none;
border:none;
background-color:#FFF;
width:490px;
height:80px;
margin-top:10px;
margin-left:10px;
float:left;
padding:5px;
color:#2f3e46;
font-weight:bold;
border-radius:5px;
box-shadow: inset 2px 2px 1px #f2f2f2;
}
#chat_but{
width:70px;
height:90px;
background:none;
border:none;
background: #fefefe;
background-image: -webkit-gradient(linear, left top, left bottom, from(#fefefe), to(#f2f2f2));
background-image: -webkit-linear-gradient(#fefefe, #f2f2f2);
background-image:    -moz-linear-gradient(#fefefe, #f2f2f2);
background-image:     -ms-linear-gradient(#fefefe, #f2f2f2);
background-image:      -o-linear-gradient(#fefefe, #f2f2f2);
background-image:         linear-gradient(#fefefe, #f2f2f2);
color:#2f3e46;
float:right;
font-weight:bold;
margin-top:10px;
margin-right:10px;
border-radius:5px;
}
#chat_log{
background-color:#FFF;
width:580px;
height:90px;
margin-left:10px;
margin-top:10px;
position:absolute;
background-color:rgba(255, 255, 255, .7);
}
#chat_logi{
width:480px;
margin-top:30px;
height:30px;
float:left;
margin-left:10px;
background-color:#FFF;
border-radius:5px;
border:1px solid #999;	
}
#chat_logio{
width:60px;
margin-top:30px;
height:30px;
float:right;
margin-right:10px;
background-color:#999;
border-radius:5px;
color:#FFF;
font-weight:bold;
border:1px solid #999;	
}
</style>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script language="javascript">
$(document).ready(function(){
$("#chat_but").click(function(){
var text=$("#chat_chat").val();
var name=$("#name").val();
document.getElementById('chat_chat').value='';
$.ajax({
type:"POST",
url:"chat.php",
data:"text="+text+"&name="+name,
success:function(data){
$("#info").html(data);
}
});
return false;
});
});
</script>
</head>
<body>
<div id="body">
<div id="chat">
<div id="chat_top">

</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script language="javascript">
function chat()
{
$(document).ready(function(){
var url="chat.php?ge=1";
$.getJSON(url,function(json){
$.each(json.members,function(i,dat){
$("#chat_top").append(
'<div id="use"><div id="use_tit">'+
'<div id="use_name">'+dat.name+'</div>'+
'<div id="use_dat">'+dat.time+'</div></div>'+
'<div id="use_b">'+dat.text+'</div><audio src="http://pixto.mobi/sound.mp3" autoplay="autoplay"></audio></div>'
);
});
});
});
setTimeout(function(){
chat();
}, (Math.floor(Math.random()*1000)))
var objDiv = document.getElementById("chat_top");
objDiv.scrollTop = objDiv.scrollHeight;
}
chat();
</script>
<?php 
if(!isset($_POST["submit"]))
{
?>
<div id="chat_log">
<form method="post" action="">
<input type="text" id="chat_logi" name="nom" value="" placeholder="Enter your name">
<input type="submit" name="submit" id="chat_logio" value="Go">
</form>
</div>
<?php 
}
?>
<form id="mychat" name="form" method="post" action="">
<textarea id="chat_chat" placeholder="Type Message..."></textarea>
<input type="text" id="name" value="<?php echo $_POST["nom"]; ?>" name="name" style="visibility:hidden; position:absolute">
<input type="button" id="chat_but" value="Send">
</form>
</div>
</div>
</body>
</html>
