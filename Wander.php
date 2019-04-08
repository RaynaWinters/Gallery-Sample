<?php

include('Style/Header.php');


if (isset($_GET['found'])) {
	$view = $_GET['found'];
} else {
	$view = 'Adventurer';
}

echo '
<div id="DivBody" style="min-height:100px;">
	<div id="DivSectionResize" class="center" style="" >
		<a href="Wander.php">Adventurer</a> | 
		<a href="Wander.php?found=Folk">Folk</a> |
		<a href="Wander.php?found=Scene">Scene</a> |
		<a href="Wander.php?found=Tavern">Tavern</a> |
		<a href="Wander.php?found=Campus">Campus</a> |
		<a href="Wander.php?found=Home">Home</a> |
	</div>
	
	<div id="DivSectionBar">
		<div id="DivSectionTitle">
			' . $view . ' Generator
		</div>
	</div>
	<div id="DivSectionResize" class="center" style="" >';

$RNGCODE = FALSE;

	if (isset($_POST['RNG']) || isset($_GET['RNG'])) {
		$RNGCODE = TRUE;
		
		$valOne = GenerateString ();
		$valTwo = GenerateString ();
		$valThree = GenerateString ();
		$valFour = GenerateString ();
		$valFive = GenerateString ();
		$valSix = GenerateString ();
		
		$RngCode = $valOne . $valTwo . $valThree . $valFour . $valFive . $valSix;
	}
	
	if (isset($_POST['SubmitCode']) || $RNGCODE) {
		if (isset($_POST['SubmitCode'])) {
			$code = mysqli_real_escape_string($gdbc, trim(strip_tags($_POST['code'])));
		} else {
			$code = mysqli_real_escape_string($gdbc, trim(strip_tags($RngCode)));
		}
		$CodeArray = array();
		$CodeArray = UnpackCode($code);
				
		switch ($view) {
			CASE 'Adventurer':
				$Description = AdventurerDescription($code, $gdbc, 'You');
				BREAK;
			CASE 'Scene':
				$Description = Description($code, $gdbc);
				BREAK;
			CASE 'Tavern':
				$Description = BuildingDescription ($code, $gdbc, 'Inn');
				BREAK;
			CASE 'Store':
				$Description = BuildingDescription ($code, $gdbc, 'Shop');
				BREAK;
			CASE 'Campus':
				$Description = BuildingDescription ($code, $gdbc, 'Information');
				BREAK;
			CASE 'Home':
				$Description = BuildingDescription ($code, $gdbc, 'Residential');
				BREAK;
			CASE 'Folk':
				$Description = AdventurerDescription ($code, $gdbc, 'They');
				BREAK;
			DEFAULT:
				$Description = AdventurerDescription($code, $gdbc, 'You');
		}
		
		echo '
			
			<div class="center" 
				style="
				position:relative;
				width:650px;
				text-align: left;
				padding: 40px 30px 30px 30px;
				
				border:1px solid ' . $Accent_Foreground . ';
				border-radius: 5px;
				">
				
				<div
					style="
					position:absolute;
					color: ' . $Accent_Foreground . ';
					width:100px;
					top: 2px;
					right: 2px; 
					text-align: right;
					padding: 2px;
				">
					<b>' . $view . '<br /><i>' .  $code . '</i></b>
				</div>
				
				' . $Description . '
			</div>';
	} else {
		echo 'Generate a description for a basic ' . strtolower($view) . '.<br />';
	}
	
	
	echo '
	<form method="post" action="">
		<input type="submit" class="button" size="5" name="RNG" value="Generate ' . $view . '" />
	</form>
	<br /><br />
	If you have a previouly saved code, find the description again;
	<form method="post" action="">
		<input type="text" class="TextEntry" size="5" name="code" value="';
		if (isset($code)) {echo $code;}
		echo '" />
		<br /><input type="submit" class="button" size="5" name="SubmitCode" value="Recall Description" />
	</form>
	
	
	</div>
</div>';

//include('Style/Footer.php');

?>
