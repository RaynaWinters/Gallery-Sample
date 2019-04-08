<?php

if (isset($UplinkControl)) {
	$Text = '#000000';
	$Background_Color = '#19181c'; // ECE5CE
	$Primary_Foreground = '#3f3d47'; // F1D4AF

	$Header = '#3f3d47';
	$Header33 = '#323038';
	$Header66 = '#26252b';

	$Accent_Foreground = '#000000';
	$Logo = '/Images/IWillAlwaysLoveYou/Tile_Outline.png';
} else {
	$Text = '#774F38';
	$Background_Color = '#F1D4AF'; // ECE5CE
	$Primary_Foreground = '#ECE5CE'; // F1D4AF

	$Header = '#E08E79';
	$Header33 = '#e6a58b';
	$Header66 = '#ebbc9d';

	$Accent_Foreground = '#772244';
	$Logo = 'Images/Moth-Big-Transparent-Tilt.png';
}	
	
if (isset($_GET['Style'])) {
	if ($_GET['Style'] == 'Blue') {
		$Text = '#12142e';
		$Background_Color = '#b2dae1'; // ECE5CE
		$Primary_Foreground = '#d6efef'; // F1D4AF

		$Header = '#7d97cd';
		$Header33 = '#8eafd3';
		$Header66 = '#a0c7da';

		$Accent_Foreground = '#25305f';
		
		$Logo = 'Images/StarTilt-Small.png';
	} else if ($_GET['Style'] == 'Sepia') {
		$Text = '#0a1622';
		$Background_Color = '#aa7b71';
		$Primary_Foreground = '#efe4d9';

		$Header = '#772244';
		$Header33 = '#84384f';
		$Header66 = '#904e5a';

		$Accent_Foreground = '#0a1622';
		
		$Logo = 'Images/lantern.png';
	} else if ($_GET['Style'] == 'Pine') {
		$Text = '#0a1622';
		$Background_Color = '#9c775a';
		$Primary_Foreground = '#ede1c9';

		$Header = '#000000';
		$Header33 = '#26302f';
		$Header66 = '#4c6756';

		$Accent_Foreground = '#4c6756';
	} else if ($_GET['Style'] == 'TimeTravel') {
		$Text = '#04020a';
		$Background_Color = '#b6acbc';
		$Primary_Foreground = '#f7f2f9';

		$Header = '#04020a';
		$Header33 = '#4b2a55';
		$Header66 = '#95879d';

		$Accent_Foreground = '#ffefe0';
	}
} 

echo '<style>

.w3-container:after,.w3-container:before,.w3-panel:after,.w3-panel:before,.w3-row:after,.w3-row:before,.w3-row-padding:after,.w3-row-padding:before,

.w3-hide{display:none!important}.w3-show-block,.w3-show{display:block!important}.w3-show-inline-block{display:inline-block!important}

.w3-container,.w3-panel{padding:2px}.w3-panel{margin-top:2px;margin-bottom:2px}


@font-face {
    font-family: ArchitectsDaughter;
    src: url(\'Style/Fonts/ArchitectsDaughter.ttf\'); 
}

.center {
	margin-left:auto;
	margin-right:auto;
	text-align:center;
}

a:link {
	color:' . $Accent_Foreground . ';
	text-decoration:underline;
	border:0px;
}     
a:visited {
	color:' . $Accent_Foreground . ';
	text-decoration:underline;
	border:0px;
} 
a:hover {
	color:' . $Header . ';
	text-decoration:underline;
	border:0px;
} 
a:active {
	color:' . $Header33 . ';
	text-decoration:none;
	border:0px;
} 

::-webkit-scrollbar {
	width: 12px;
}

::-webkit-scrollbar-track {
	//background-color: ' . $Header66 . ';
}
 
::-webkit-scrollbar-thumb {
	background-color: ' . $Header . ';
	border: 1px solid ' . $Header33 . ';
}
 
// ::-webkit-scrollbar-button {
	// height:
	// background-color: ' . $Header33 . ';
// }
 
::-webkit-scrollbar-corner {
	background-color: #000000;
}


.button {
	background-color: ' . $Background_Color . ';
	';
	if (isMobile()) {
		echo '
		height:75px;
		border-radius: 10px;
		font-size: 40px;
		padding: 10px 100px;
		border-top: 2px solid ' . $Header . ';
		border-bottom: 8px solid ' . $Header . ';
		border-left: 2px solid ' . $Header . ';
		border-right: 2px solid ' . $Header . ';
		';
	} else {
		echo '
		height:20px;
		border-radius: 4px;
		font-size: 12px;
		padding: 1px 9px;
		border-top: 1px solid ' . $Header . ';
		border-bottom: 3px solid ' . $Header . ';
		border-left: 1px solid ' . $Header . ';
		border-right: 1px solid ' . $Header . ';
	';
	}
	echo '
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	color: ' . $Text . ';
	//font-family: \'Lucida Grande\', Helvetica, Arial, Sans-Serif;
	text-decoration: none;
	vertical-align: middle;
	text-transform: capitalize;
	z-index:100;
}
.button:hover {
	background: ' . $Primary_Foreground . ';
	border-top: 1px solid ' . $Header33 . ';
	border-bottom: 3px solid ' . $Header33 . ';
	border-left: 1px solid ' . $Header33 . ';
	border-right: 1px solid ' . $Header33 . ';
	z-index:100;
}
.button:active {
	background: ' . $Header . ';
	border-top: 3px solid ' . $Background_Color . ';
	border-bottom: 1px solid ' . $Background_Color . ';
	border-left: 1px solid ' . $Background_Color . ';
	border-right: 1px solid ' . $Background_Color . ';
	z-index:100;
}

.SelectionBox {
	background-color: #' . $Header33 . ';
	border: 1px solid #' . $Header . ';
	border: 1px solid ' . $Header66 . ';
	';
	if (isMobile()) {
		echo '
		border-radius: 10px;
		font-size: 25px;
		padding: 10px 10px;';
	} else {
		echo '
		border-radius: 4px;
		font-size: 12px;
		padding: 1px 10px;';
	}
	echo '
	color: #' . $Text . ';
	text-align: left;
	text-decoration: none;
	display: inline-block;
	text-transform: capitalize;
	position: relative;
	z-index:6;
}

.TextEntry {
    background-color: #ffffff;
    border: 1px solid ' . $Header66 . ';
	';
	if (isMobile()) {
		echo '
		border-radius: 10px;
		font-size: 25px;
		padding: 10px 50px;';
	} else {
		echo '
		border-radius: 4px;
		font-size: 12px;
		padding: 2px 10px;';
	}
	echo '
    color: ' . $Text . ';
    //text-align: center;
    text-decoration: none;
    display: inline-block;
}

.TextEntryArea {
    background-color: #ffffff;
    border: 1px solid ' . $Header66 . ';
	';
	if (isMobile()) {
		echo '
		border-radius: 10px;
		font-size: 25px;
		padding: 10px 10px;';
	} else {
		echo '
		border-radius: 4px;
		font-size: 12px;
		padding: 2px 10px;';
	}
	echo '
    color: ' . $Text . ';
    //text-align: center;
    text-decoration: none;
    display: inline-block;
}

.RadioEntry input {
    display: none;
}

.RadioEntry span {
	height: 10px;
	width: 10px;
	background-color:' . $Background_Color . ';
	border: 1px solid ' . $Background_Color . ';
	border-radius: 8px;
	display: inline-block;
	position: relative;
}

[type=radio]:checked + span {
	background-color:' . $Accent_Foreground . ';
	border-radius: 8px;
	position: relative;
	top: 0px;
	left: 0;
}

.CheckboxEntry input {
    display: none;
}

.CheckboxEntry span {
	height: 10px;
	width: 10px;
	background-color:' . $Background_Color . ';
	border: 1px solid ' . $Text . ';
	border-radius: 3px;
	display: inline-block;
	position: relative;
	z-index:200;
}

[type=checkbox]:checked + span {
	background-color:' . $Accent_Foreground . ';
	border-radius: 3px;
	position: relative;
	top: 0px;
	left: 0;
}

.MainBody {
	background-color:' . $Background_Color . ';
	font-family: Verdana, Geneva, sans-serif;
	color:' . $Text . ';';
	
	if (isMobile()) {
		echo 'font-size:22px;';
	} else {
		echo 'font-size:14px;';
	}
	echo '
	margin:0;
	padding:0;
	//overflow-x:hidden;
}

#DivHeader {
	position:relative;
	top:0px;
	//border: 2px white solid;
	height:100px;
	margin-left:0px;
	margin-right:0px;
	min-width: 900px;
}

#DivHeaderImage {
	position:absolute;
	margin:0;
	padding:0;
	left:0px;
	top:0px;
	font-size:100px;
	z-index:21;
}

#DivHeaderTitle {
	position:relative;
	vertical-align: middle;
	height:100px;
	//width:600px;
	margin-left:130px;
	margin-right:0px;
	z-index:4;
	color:' . $Accent_Foreground . ';
	font-family: \'ArchitectsDaughter\', serif;
	';
	if (isMobile()) {
		echo 'font-size:70px;
		text-align: center;
		top:0px;';
	} else {
		echo 'font-size:55px;
		text-align: center;
		top:20px;';
	}
	echo 'font-weight:bold;
	//text-shadow: 2px 2px ' . $Header33 . ';
	//text-shadow: -1px 0 ' . $Header33 . ', 0 1px ' . $Header33 . ', 1px 0 ' . $Header33 . ', 0 -1px ' . $Header33 . ';
	letter-spacing: 7px;
	//border:1px solid black;
	z-index:5;
}

#Title {
	position:relative;
	vertical-align: middle;
	margin-left:0px;
	margin-right:0px;
	z-index:4;
	color:' . $Accent_Foreground . ';
	font-family: \'ArchitectsDaughter\', serif;
	';
	if (isMobile()) {
		echo 'font-size:50px;
		text-align: center;
		top:0px;';
	} else {
		echo 'font-size:35px;
		text-align: center;
		top:20px;';
	}
	echo 'font-weight:bold;
	//text-shadow: 2px 2px ' . $Header33 . ';
	//text-shadow: -1px 0 ' . $Header33 . ', 0 1px ' . $Header33 . ', 1px 0 ' . $Header33 . ', 0 -1px ' . $Header33 . ';
	letter-spacing: 2px;
	//border:1px solid black;
	z-index:5;
}

#DivAccentBar {
	position:absolute;
	background-color:' . $Header. ';
	vertical-align: middle;
	top:0px;
	height:75px;
	width:100%;
	border:0;
	z-index:3;
}

#DivHeaderBar {
	position:absolute;
	background-color:' . $Header33 . ';
	vertical-align: middle;
	top:0px;
	height:100px;
	width:100%;
	border:0;
	z-index:1;
}

#DivNavigationBar { ';
	if (isMobile()) {
		echo 'position:relative;';
	} else {
		echo 'position:sticky;';
	}
	echo 'background-color:' . $Header66 . ';
	vertical-align: middle;
	top:0;
	height:25px;
	width:100%;
	border:0;
	z-index:20;
	min-width:900px;
}

#DivNavigation {
	position:absolute;
	bottom:0px;
	margin-left:130px;
	margin-right:0px;
	width: calc(100% - 132px);
	text-align: center;
	font-size:14px;
	//border:1px solid black;
	z-index:5;
}

#DivFooter {
	position:fixed;
	background-color:' . $Background_Color. ';
	margin-left:0px;
	margin-right:0px;
	width:100%;
	';
	if (isMobile()) {
		echo 'font-size:73px;
		height:110px;';
	} else {
		echo 'font-size:14px;
		height:25px;';
	}
	echo '
	min-width: 900px;
	padding:0;
	bottom:0px;
	left:0px;
	text-align: left;
	//border:1px solid black;
	z-index:25;
}

#FooterNavigation {
	position:fixed;
	background-color:' . $Background_Color. ';
	//height: calc(75% - 100px);
	
	';
	if (isMobile()) {
		echo 'font-size:73px;
		bottom:50px;';
	} else {
		echo 'font-size:14px;
		bottom:-50px;';
	}
	echo '
	//min-width: 900px;
	border-radius: 10px;
	//border:1px solid black;
	padding:10px;
	margin:50px;
	text-align: center;
	z-index:19;
}

#AccentText {
	position:relative;
	color: ' . $Accent_Foreground . ';
	font-family: \'ArchitectsDaughter\', sans-serif;
	font-weight:bold;
	margin:0;
	//padding:0;
	//border:1px solid black;
}



#DivBody {
	position:relative;
	background-color:' . $Primary_Foreground . ';
	padding:0px;
	margin:0px;
	top:20px;';
	if (isMobile()) {
		echo 'width:100%;';
	} else {
		echo 'width:98%;';
	}
	echo '
	margin-left:auto;
	margin-right:auto;
	min-width: 900px;
	min-height:200px;
}

#DivSectionTitle {
	position:absolute;
	vertical-align: middle;
	top:-31px;
	margin-left:40px;
	margin-right:0px;
	z-index:4;
	color:' . $Accent_Foreground . ';
	font-family: \'ArchitectsDaughter\', serif;
	font-size:25px;
	text-align: left;
	letter-spacing: 3px;
	//border:1px solid black;
}

#DivSectionBar {
	position:absolute;
	background-color:' . $Background_Color . ';
	vertical-align: middle;
	top:30px;
	height:5px;
	width:100%;
	border:0;
	z-index:0;
}

#DivSectionResize {
	position:relative;
	vertical-align: top;
	top:0px;
	padding:40px 3px 3px 3px;
	//border:1px solid black;
	z-index:2;
}
#DivSectionStatic {
	position:absolute;
	vertical-align: top;
	top:0px;
	padding:40px 3px 3px 3px;
	//border:1px solid black;
	z-index:2;
}

#ArtDisplay {
	position:fixed;
	vertical-align: middle;
	top:0px;
	height: 100%;
	left:0px;
	padding:0px;
	text-align:center;
	margin-left:0px;
	margin-right:0px;
	width:100%;
	border:0;
	z-index:24;	
}

#ArtDisplayFade {
	position:fixed;
	background-color:#000000;
	vertical-align: middle;
	top:0px;
	height: 100%;
	left:0px;
	padding:0px;
	text-align:center;
	margin-left:0px;
	margin-right:0px;
	width:100%;
	border:0;
	z-index:20;	
	opacity: 0.5;
	filter: alpha(opacity=50);
}

.MainLinkFrame {
	position:absolute;
	background-color: ' . $Primary_Foreground . ';
	//padding:5px;
	left:10%;
	top:10%;
	height:80%;
	width:80%;
	border: 1px solid ' . $Background_Color . ';
	border-radius: 8px;
	//overflow-x:hidden;
	z-index:21;	
}

.NoRotate {
	position: relative;
	text-shadow: 2px 1px #CCB5A3;
}

.Rotate {
	position: relative;
	left:-1px;
	text-shadow: -2px 1px #CCB5A3;
	-webkit-transform: rotate(270deg);
	-moz-transform: rotate(270deg);
	-o-transform: rotate(270deg);
}

</style>
';
?>
