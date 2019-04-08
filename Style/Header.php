<?php
//session_save_path('Style/Sessions');
session_start();

echo '<!DOCTYPE html>
<html lang="en">
<head>
<!DOCTYPE html PUBLIC>
<!--

-->
<meta> 

<script>
function ShowHideToggle(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

<script>
function HideShowToggle(id) {
    var x = document.getElementById(id);
	
	x.className += " w3-hide";
	 
    
}
</script>

<script type="text/javascript">
    function changeImage(a, b) {
        document.getElementById("sampleSketch").src=a;
		document.getElementById("sampleFullColor").src=b;
    }
</script>

<script type="text/javascript">
	function changeOneImage(a) {
        document.getElementById("ArtImage").src=a;
    }
</script>

<script type="text/javascript">
	function changeTitle(a) {
        iframe.contentWindow.document.getElementById("Title").innerHTML=a;
    }
</script>

<script type="text/javascript">
	function changeFrame(a) {
        document.getElementById("LinkFrame").src=a;
    }
</script>

<script src="prefixfree.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
<script src="conic-gradient.js"></script>

<title>
Briar Lantern
</title>';

if (isset($_SESSION['curator_id'])) {
	$user = $_SESSION['curator_id'];
}

include ('Style/Functions.php');
include ('Style/CSS.php');
include ('Style/tags.php');

echo '<meta http-equiv="content-language" content="en-gb" />
<meta name="author" content="Rayna Winters" />
<meta name="copyright" content="Copyright &copy; Rayna Winters" />
<link rel="shortcut icon" href="favicon.ico?v=2" />
</head>
<body class="MainBody">';

if (!isset($gdbc)) {
	require_once('../Access/Gallery_Connect.php');
}

// Set Navigation 
$NavigationArray = array(
	"<a href=\"ArtGallery.php\">Gallery</a>",
	"<a href=\"http://briarlantern.com\">Updates</a>",
	"<a href=\"Commissions.php\">Commissions</a>",
	"<a href=\"Wander.php\">RNG</a>",
	);

echo '
<div class="center" id="DivHeader">
	<div id="DivHeaderImage">';
		


		echo '<img src="' . $Logo . '" height="130px" />';
		// echo '<img src="Images/lantern.png" height="130px" />';
		// echo '<img src="Images/Star.png" height="130px" />';
		
	echo '</div>
	
	<div id="DivHeaderTitle">
	 Briar Lantern
	</div>
	
	<div class="center" id="DivHeaderBar">
	</div>
	<div class="center" id="DivAccentBar">
	</div>
</div>
<div class="center" id="DivNavigationBar">
	<div id="DivNavigation">
		<p class="center" id="AccentText"> ';
		foreach ($NavigationArray AS $link) {
			echo $link . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		}
		echo '</p>
	</div>
</div>';

	if (isMobile()) {
		$NavigationArray[] = "<a href=\"https://www.twitch.tv/micadust\">Twitch</a>";
		$NavigationArray[] = "<a href=\"https://www.youtube.com/channel/UCXCJteyTHKuHAIfia3taNug\">Speedpaints</a>";
		$NavigationArray[] = "<a href=\"https://www.redbubble.com/people/Elyneara/shop?asc=u\">RedBubble</a>";
		$NavigationArray[] = "<a href=\"https://ko-fi.com/dustwrites\">Ko-fi</a>";
	}
?>
