<?php

function errors($errors) {
	echo '<h4>The following error(s) occurred:</h4><p class="merror">';
		foreach ($errors as $msg) {
			echo " - $msg<br />\n";
		}
	echo '</p>';
}

function CheckMe ($variable) {
	if (is_array($variable)) {
		foreach ($variable AS $k => $v) {
			echo '[' . $k . '] ' . $v . '<br />';
		}
	} else {
		echo '<br />Check: ' . $variable . '<br />';
	}
}

function isMobile() { 
	// return TRUE;
	
	return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

function UnpackCode ($code) {
	$CodeArray = array();
			
	$UnpackedCode = str_split($code);
	
	$CheckA = 0;
	$CheckE = 0;
	$CheckI = 0;
	$CheckO = 0;
	$CheckU = 0;
	
	foreach ($UnpackedCode AS $k => $v) {
		if ($v=='a') {
			$CheckA++;
			$CodeArray['Aversion'] = 'Nature';
		} else if ($v=='e') {
			$CheckE++;
			$CodeArray['Aversion'] = 'Earth';
		} else if ($v=='i') {
			$CheckI++;
			$CodeArray['Aversion'] = 'Fire';
		} else if ($v=='o') {
			$CheckO++;
			$CodeArray['Aversion'] = 'Metal';
		} else if ($v=='u') {
			$CheckU++;
			$CodeArray['Aversion'] = 'Water';
		} else if ($v=='A') {
			$CheckA++;
			$CodeArray['Affinity'] = 'Nature';
		} else if ($v=='E') {
			$CheckE++;
			$CodeArray['Affinity'] = 'Earth';
		} else if ($v=='I') {
			$CheckI++;
			$CodeArray['Affinity'] = 'Fire';
		} else if ($v=='O') {
			$CheckO++;
			$CodeArray['Affinity'] = 'Metal';
		} else if ($v=='U') {
			$CheckU++;
			$CodeArray['Affinity'] = 'Water';
		}
	}
	
	if (($CheckA>1)||($CheckE>1)||($CheckI>1)||($CheckO>1)||($CheckU>1)) {
		$CodeArray['Affinity'] = 'Curse';
	}
	
	if (!isset($CodeArray['Affinity'])) {
		$CodeArray['Affinity'] = 'Non Magical';
	}
	
	if (!isset($CodeArray['Aversion'])) {
		switch ($CodeArray['Affinity']) {
			case 'Nature':
				$CodeArray['Aversion'] = 'Metal';
				break;
			case 'Earth':
				$CodeArray['Aversion'] = 'Nature';
				break;
			case 'Fire':
				$CodeArray['Aversion'] = 'Water';
				break;
			case 'Metal':
				$CodeArray['Aversion'] = 'Fire';
				break;
			case 'Water':
				$CodeArray['Aversion'] = 'Earth';
				break;
			case 'Curse':
				$CodeArray['Aversion'] = 'Curse';
				break;
			case 'Non Magical':
				$CodeArray['Aversion'] = 'Curse';
				break;
		}
	}
	
	return $CodeArray;
}

function UnpackItemCode ($code) {
	$CodeArray = array();
			
	$UnpackedCode = str_split($code);
	
	$CheckA = 0;
	$CheckE = 0;
	$CheckI = 0;
	$CheckO = 0;
	$CheckU = 0;
	
	foreach ($UnpackedCode AS $k => $v) {
		if ($v=='a') {
			$CheckA++;
			$CodeArray['Aversion'] = 'Nature';
		} else if ($v=='e') {
			$CheckE++;
			$CodeArray['Aversion'] = 'Earth';
		} else if ($v=='i') {
			$CheckI++;
			$CodeArray['Aversion'] = 'Fire';
		} else if ($v=='o') {
			$CheckO++;
			$CodeArray['Aversion'] = 'Metal';
		} else if ($v=='u') {
			$CheckU++;
			$CodeArray['Aversion'] = 'Water';
	// Begin Affinity		
		} else if ($v=='A') {
			$CheckA++;
			$CodeArray['Affinity'] = 'Nature';
		} else if ($v=='E') {
			$CheckE++;
			$CodeArray['Affinity'] = 'Earth';
		} else if ($v=='I') {
			$CheckI++;
			$CodeArray['Affinity'] = 'Fire';
		} else if ($v=='O') {
			$CheckO++;
			$CodeArray['Affinity'] = 'Metal';
		} else if ($v=='U') {
			$CheckU++;
			$CodeArray['Affinity'] = 'Water';
		}
	}

	if (!isset($CodeArray['Affinity'])) {
		if (!isset($CodeArray['Aversion'])) {
			$CodeArray['Affinity'] = 'Curiosity';
		} else {
			switch ($CodeArray['Aversion']) {
				case 'Nature':
					$CodeArray['Affinity'] = 'Instrument';
					break;
				case 'Earth':
					$CodeArray['Affinity'] = 'Armor';
					break;
				case 'Fire':
					$CodeArray['Affinity'] = 'Blade';
					break;
				case 'Metal':
					$CodeArray['Affinity'] = 'Household';
					break;
				case 'Water':
					$CodeArray['Affinity'] = 'Container';
					break;
				DEFAULT:
					$CodeArray['Affinity'] = 'Curiosity';
					break;
			}
		}
		
		if (($CheckA>1)||($CheckE>1)||($CheckI>1)||($CheckO>1)||($CheckU>1)) {
			$CodeArray['Curse/Haunt'] = 'Haunted';
		}
	} else {
		if (($CheckA>1)||($CheckE>1)||($CheckI>1)||($CheckO>1)||($CheckU>1)) {
			$CodeArray['Curse/Haunt'] = 'Cursed';
		}
	}
	
	if (!isset($CodeArray['Aversion'])) {
		switch ($CodeArray['Affinity']) {
			case 'Nature':
				$CodeArray['Aversion'] = 'Metal';
				break;
			case 'Earth':
				$CodeArray['Aversion'] = 'Nature';
				break;
			case 'Fire':
				$CodeArray['Aversion'] = 'Water';
				break;
			case 'Metal':
				$CodeArray['Aversion'] = 'Fire';
				break;
			case 'Water':
				$CodeArray['Aversion'] = 'Earth';
				break;
			case 'Curiosity':
				$CodeArray['Aversion'] = 'Fire';
				break;
		}
	}
	
	return $CodeArray;
}

function aan ($Phrase) {
	$aan = ' a ';
	if (
		($Phrase[0]=='A') ||
		($Phrase[0]=='a') ||
		($Phrase[0]=='E') ||
		($Phrase[0]=='e') ||
		($Phrase[0]=='I') ||
		($Phrase[0]=='i') ||
		($Phrase[0]=='O') ||
		($Phrase[0]=='o') ||
		($Phrase[0]=='U') ||
		($Phrase[0]=='u')
	) {
		$aan = ' an ';
	}
	return $aan;
}

function Description ($code, $gdbc) {
	
	$CodeArray = array();
	$CodeArray = UnpackCode ($code);
	$Description = '';
	$Area = '';
	$PartialArea = '';
	$Detail1 = '';
	$Detail2 = '';
	$AreaWeather = '';
	$DragonWeather = '';
	
	$UnpackedCode = str_split($code);

	$UpperCount = 0;
	$LowerCount = 0;
	$Number = 0;
	$EntryCount = -1;
	
	foreach ($UnpackedCode AS $k => $v) {
		if (ctype_upper($v)) {
			$UpperCount++;
		} else if (ctype_lower($v)) {
			$LowerCount++;
		} else {
			$Number = $Number + $v;
		}
		$EntryCount++;
	}
	
	if ($UpperCount > $LowerCount) {
		$areaIDSlot = $UnpackedCode[1];
		$areaIntroSlot = $UnpackedCode[$EntryCount];
		$Detail1IntroSlot = $UnpackedCode[0];
		$Detail1Slot = $UnpackedCode[3];
		$Detail2SelectionSlot = $UnpackedCode[1];
		$Detail2IntroSlot = $UnpackedCode[2];
		$Detail2Slot = $UnpackedCode[0];
		$DragonStatusSlot = $UnpackedCode[$EntryCount];
	} else if ($UpperCount < $LowerCount) {
		$areaIDSlot = $UnpackedCode[2];
		$areaIntroSlot = $UnpackedCode[1];
		$Detail1IntroSlot = $UnpackedCode[0];
		$Detail1Slot = $UnpackedCode[$EntryCount];
		$Detail2SelectionSlot = $UnpackedCode[3];
		$Detail2IntroSlot = $UnpackedCode[2];
		$Detail2Slot = $UnpackedCode[0];
		$DragonStatusSlot = $UnpackedCode[3];
	} else {
		$areaIDSlot = $UnpackedCode[$EntryCount];
		$areaIntroSlot = $UnpackedCode[0];
		$Detail1IntroSlot = $UnpackedCode[3];
		$Detail1Slot = $UnpackedCode[2];
		$Detail2SelectionSlot = $UnpackedCode[2];
		$Detail2IntroSlot = $UnpackedCode[1];
		$Detail2Slot = $UnpackedCode[3];
		$DragonStatusSlot = $UnpackedCode[1];
	}
	
	$AreaType = 'Ruins';
	if ($CodeArray['Affinity']=='Non Magical') {
		switch ($CodeArray['Aversion']) {
			case 'Earth':
				$AreaType = 'Grove';
				break;
			case 'Nature':
				$AreaType = 'Canyon';
				break;
			case 'Fire':
				$AreaType = 'Water';
				break;
			case 'Water':
				$AreaType = 'Cavern';
				break;
			case 'Metal':
				$AreaType = 'Volcanic';
				break;
			case 'Curse':
				$AreaType = 'Ruins';
				break;
			case 'Non Magical':
				$AreaType = 'Ruins';
				break;
		}
	} else {
		switch ($CodeArray['Affinity']) {
			case 'Earth':
				$AreaType = 'Cavern';
				break;
			case 'Nature':
				$AreaType = 'Grove';
				break;
			case 'Fire':
				$AreaType = 'Volcanic';
				break;
			case 'Water':
				$AreaType = 'Water';
				break;
			case 'Metal':
				$AreaType = 'Canyon';
				break;
			case 'Curse':
				$AreaType = 'Hellscape';
				break;
		}
	}
	
	// BEGIN AREA
	if (ctype_upper($areaIntroSlot)) {
		$SelectAreaIntroQ = "SELECT $AreaType AS intro
		FROM scene_InOut
		WHERE letter_id='A'
		LIMIT 1";
	} else if (ctype_lower($areaIntroSlot)) {
		$SelectAreaIntroQ = "SELECT $AreaType AS intro
		FROM scene_InOut
		WHERE letter_id='z'
		LIMIT 1";
	} else {
		$SelectAreaIntroQ = "SELECT $AreaType AS intro
		FROM scene_InOut
		WHERE letter_id='#'
		LIMIT 1";
	}
	$SelectAreaIntroR = @mysqli_query($gdbc, $SelectAreaIntroQ);
	$SelectAreaIntro = mysqli_fetch_array($SelectAreaIntroR, MYSQLI_ASSOC);
	$Area = $SelectAreaIntro['intro'];
	
	$row = strtoupper($areaIDSlot);
	if (is_numeric($row)) {
		$row = '#';
	}
	
	$SelectAreaTypeQ = "SELECT $AreaType AS type
		FROM scene_Habitat
		WHERE letter_id='$row'
		LIMIT 1";
	$SelectAreaTypeR = @mysqli_query($gdbc, $SelectAreaTypeQ);
	$SelectAreaType = mysqli_fetch_array($SelectAreaTypeR, MYSQLI_ASSOC);
	
	$aan = aan ($SelectAreaType['type']);
	
	$Area = $SelectAreaIntro['intro'] . $aan . $SelectAreaType['type'];
	$PartialArea = $aan . $SelectAreaType['type'];
	// END AREA
	
	// BEGIN DETAIL
	// DETAIL 1
	$SelectBasicDetailQ = "SELECT $AreaType AS table1
		FROM scene_Detail_Selection
		WHERE letter_id='n'
		LIMIT 1";
	$SelectBasicDetailR = @mysqli_query($gdbc, $SelectBasicDetailQ);
	$SelectBasicDetail = mysqli_fetch_array($SelectBasicDetailR, MYSQLI_ASSOC);	
	$DetailTable1 = $SelectBasicDetail['table1'];
	if (ctype_upper($Detail1IntroSlot)) {
		$SelectDetailInOutQ = "SELECT $DetailTable1 AS blah
		FROM scene_Detail_InOut
		WHERE letter_id='A'
		ORDER BY in_1_out_0 DESC";
	} else if (ctype_lower($Detail1IntroSlot)) {
		$SelectDetailInOutQ = "SELECT $DetailTable1 AS blah
		FROM scene_Detail_InOut
		WHERE letter_id='z'
		ORDER BY in_1_out_0 DESC";
	} else {
		$SelectDetailInOutQ = "SELECT $DetailTable1 AS blah
		FROM scene_Detail_InOut
		WHERE letter_id='#'
		ORDER BY in_1_out_0 DESC";
	}
	$SelectDetailInOutR = @mysqli_query($gdbc, $SelectDetailInOutQ);
	
	//CheckMe($SelectDetailInOutQ);
	
	$DetailInOut1 = array();
	while ($SelectDetailInOut = mysqli_fetch_array($SelectDetailInOutR, MYSQLI_ASSOC)) {
		$DetailInOut1[] = $SelectDetailInOut['blah'];
	}
	
	$row = strtoupper($Detail1Slot);
	if (is_numeric($row)) {
		$row = '#';
	}
	
	$SelectDetail1Q = "SELECT $DetailTable1 AS detail1
		FROM scene_Detail
		WHERE letter_id='$row'
		LIMIT 1";
	$SelectDetail1R = @mysqli_query($gdbc, $SelectDetail1Q);
	$SelectDetail1 = mysqli_fetch_array($SelectDetail1R, MYSQLI_ASSOC);
	
	$Detail1 = $DetailInOut1[0] . ' ' . $SelectDetail1['detail1'] . ' ' . $DetailInOut1[1];
	
	// DETAIL 2
	if (ctype_upper($Detail2IntroSlot)) {
		$SelectSecondaryDetailQ = "SELECT $AreaType AS table2
		FROM scene_Detail_Selection
		WHERE letter_id='A'
		LIMIT 1";
	} else if (ctype_lower($Detail2IntroSlot)) {
		$SelectSecondaryDetailQ = "SELECT $AreaType AS table2
		FROM scene_Detail_Selection
		WHERE letter_id='z'
		LIMIT 1";
	} else {
		$SelectSecondaryDetailQ = "SELECT $AreaType AS table2
		FROM scene_Detail_Selection
		WHERE letter_id='#'
		LIMIT 1";
	}
	$SelectSecondaryDetailR = @mysqli_query($gdbc, $SelectSecondaryDetailQ);
	$SelectSecondaryDetail = mysqli_fetch_array($SelectSecondaryDetailR, MYSQLI_ASSOC);
	$DetailTable2 = $SelectSecondaryDetail['table2'];
	if (ctype_upper($Detail2SelectionSlot)) {
		$SelectDetailInOutQ = "SELECT $DetailTable2 AS blah
		FROM scene_Detail_InOut
		WHERE letter_id='A'
		ORDER BY in_1_out_0 DESC";
	} else if (ctype_lower($Detail2SelectionSlot)) {
		$SelectDetailInOutQ = "SELECT $DetailTable2 AS blah
		FROM scene_Detail_InOut
		WHERE letter_id='z'
		ORDER BY in_1_out_0 DESC";
	} else {
		$SelectDetailInOutQ = "SELECT $DetailTable2 AS blah
		FROM scene_Detail_InOut
		WHERE letter_id='#'
		ORDER BY in_1_out_0 DESC";
	}
	$SelectDetailInOutR = @mysqli_query($gdbc, $SelectDetailInOutQ);
	
	$DetailInOut2 = array();
	while ($SelectDetailInOut = mysqli_fetch_array($SelectDetailInOutR, MYSQLI_ASSOC)) {
		$DetailInOut2[] = $SelectDetailInOut['blah'];
	}
	
	$row = strtoupper($Detail2Slot);
	if (is_numeric($row)) {
		$row = '#';
	}
	
	$SelectDetail2Q = "SELECT $DetailTable2 AS detail2
		FROM scene_Detail
		WHERE letter_id='$row'
		LIMIT 1";
	$SelectDetail2R = @mysqli_query($gdbc, $SelectDetail2Q);
	$SelectDetail2 = mysqli_fetch_array($SelectDetail2R, MYSQLI_ASSOC);
	
	$Detail2 = $DetailInOut2[0] . ' ' . $SelectDetail2['detail2'] . ' ' . $DetailInOut2[1];
	
	//END DETAIL
	
	// BEGIN WEATHER
	if ($Number > 9) {
		$Number = str_split($Number);
		$NewNumber = 0;
		foreach ($Number AS $k => $v) {
			$NewNumber = $NewNumber + $v;
		}
		$Number = $NewNumber;
	}
	
	if ($Number > 9) {
		$Number = str_split($Number);
		$NewNumber = 0;
		foreach ($Number AS $k => $v) {
			$NewNumber = $NewNumber + $v;
		}
		$Number = $NewNumber;
	}
	
	if ($Number == 0) {
		$Number = 10;
	}

	if (ctype_upper($DragonStatusSlot)) {
		$SelectWeatherQ = "SELECT A AS weatherType
		FROM scene_Weather
		WHERE table_id='$Number'
		LIMIT 1";
	} else if (ctype_lower($DragonStatusSlot)) {
		$SelectWeatherQ = "SELECT z AS weatherType
		FROM scene_Weather
		WHERE table_id='$Number'
		LIMIT 1";
	} else {
		$SelectWeatherQ = "SELECT num AS weatherType
		FROM scene_Weather
		WHERE table_id='$Number'
		LIMIT 1";
	}
	
	//CheckMe($SelectWeatherQ);
	$SelectWeatherR = @mysqli_query($gdbc, $SelectWeatherQ);
	$SelectWeather = mysqli_fetch_array($SelectWeatherR, MYSQLI_ASSOC);
	
	$AreaWeather = $SelectWeather['weatherType'] . ' ' . $PartialArea;
	$DragonWeather = $SelectWeather['weatherType'] . ' a pathway';

	// END WEATHER
	
	if ($UpperCount > $LowerCount) {
		$Description = ucfirst(trim($Area)) . '. ' . 
		ucfirst(trim($Detail1)) . '. ' . 
		ucfirst(trim($Detail2)) . '. ' .
		ucfirst(trim($DragonWeather)) . '. ';
		
	} else if ($UpperCount < $LowerCount) {
		$Description = ucfirst(trim($Detail1)) . '. ' . 
		ucfirst(trim($Detail2)) . '. ' .
		ucfirst(trim($AreaWeather)) . '. ';
		
	} else {
		$Description = ucfirst(trim($Area)) . '. ' . 
		ucfirst(trim($Detail1)) . '. ' . 
		ucfirst(trim($Detail2)) . '. ';
	}
	
	return $Description;
}

function AdventurerDescription ($code, $gdbc, $YouThey) {
	
	$Sentence1 = '';
	$Sentence2 = '';
	$Sentence3 = '';
	$Backpack = '';
	
	$CodeArray = array();
	$CodeArray = UnpackCode ($code);

	$UnpackedCode = str_split($code);

	$UpperCount = 0;
	$LowerCount = 0;
	$Number = 0;
	$EntryCount = -1;
	$UpperFirst = 0;
	
	foreach ($UnpackedCode AS $k => $v) {
		if (ctype_upper($v)) {
			$UpperCount++;
			
			if ($EntryCount == -1) {
				$UpperFirst = 1;
			}
		} else if (ctype_lower($v)) {
			$LowerCount++;
		} else {
			$Number = $Number + $v;
			if ($EntryCount == -1) {
				$UpperFirst = 2;
			}
		}
		$EntryCount++;
	}
	
	// MinNumber
	if ($Number > 9) {
		$Number = str_split($Number);
		$NewNumber = 0;
		foreach ($Number AS $k => $v) {
			$NewNumber = $NewNumber + $v;
		}
		$Number = $NewNumber;
	}
	
	if ($Number > 9) {
		$Number = str_split($Number);
		$NewNumber = 0;
		foreach ($Number AS $k => $v) {
			$NewNumber = $NewNumber + $v;
		}
		$Number = $NewNumber;
	}
	
	if ($Number == 0) {
		$Number = 10;
	}
		
	if ($UpperCount > $LowerCount) {
		//You are a [Bodytype: P2] [Race: P1] with [skintype: P3] skin. 

		$row = strtoupper($UnpackedCode[0]);
		if (is_numeric($row)) {
			$row = '#';
		}
		
		$SelectCharacterRaceQ = "SELECT races
			FROM characters
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectCharacterRaceR = @mysqli_query($gdbc, $SelectCharacterRaceQ);
		$SelectCharacterRace = mysqli_fetch_array($SelectCharacterRaceR, MYSQLI_ASSOC);
		
		
		$row = strtoupper($UnpackedCode[1]);
		if (is_numeric($row)) {
			$row = '#';
		}
		
		$SelectCharacterbodytypeQ = "SELECT bodytype
			FROM characters
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectCharacterbodytypeR = @mysqli_query($gdbc, $SelectCharacterbodytypeQ);
		$SelectCharacterbodytype = mysqli_fetch_array($SelectCharacterbodytypeR, MYSQLI_ASSOC);
		
		$aan = aan ($SelectCharacterbodytype['bodytype']);
		
		$row = strtoupper($UnpackedCode[2]);
		if (is_numeric($row)) {
			$row = '#';
		}
				
		$SelectCharacterTraitQ = "SELECT skin
			FROM characters
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectCharacterTraitR = @mysqli_query($gdbc, $SelectCharacterTraitQ);
		$SelectCharacterTrait = mysqli_fetch_array($SelectCharacterTraitR, MYSQLI_ASSOC);
		
		if ($YouThey=='They') {
			$Sentence1 = 'They are' . $aan . ' ' . $SelectCharacterbodytype['bodytype'] . ' ' . strtolower($SelectCharacterRace['races']) . ' with ' . $SelectCharacterTrait['skin'] . ' skin. ';
		} else {
			$Sentence1 = 'You are' . $aan . ' ' . $SelectCharacterbodytype['bodytype'] . ' ' . strtolower($SelectCharacterRace['races']) . ' with ' . $SelectCharacterTrait['skin'] . ' skin. ';
		}
	} else if ($UpperCount < $LowerCount) {
		//You have a [Bodytype: P4] figure for a [Race: P1] with [hairstyle: P5] [haircolor: P2] hair. 
		$row = strtoupper($UnpackedCode[0]);
		if (is_numeric($row)) {
			$row = '#';
		}
		
		$SelectCharacterRaceQ = "SELECT races
			FROM characters
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectCharacterRaceR = @mysqli_query($gdbc, $SelectCharacterRaceQ);
		$SelectCharacterRace = mysqli_fetch_array($SelectCharacterRaceR, MYSQLI_ASSOC);
		
		
		$row = strtoupper($UnpackedCode[3]);
		if (is_numeric($row)) {
			$row = '#';
		}
		
		$SelectCharacterbodytypeQ = "SELECT bodytype
			FROM characters
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectCharacterbodytypeR = @mysqli_query($gdbc, $SelectCharacterbodytypeQ);
		$SelectCharacterbodytype = mysqli_fetch_array($SelectCharacterbodytypeR, MYSQLI_ASSOC);
		
		$aan = aan ($SelectCharacterbodytype['bodytype']);
		
		
		$row = strtoupper($UnpackedCode[4]);
		if (is_numeric($row)) {
			$row = '#';
		}
				
		$SelectCharacterTrait1Q = "SELECT hairstyle
			FROM characters
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectCharacterTrait1R = @mysqli_query($gdbc, $SelectCharacterTrait1Q);
		$SelectCharacterTrait1 = mysqli_fetch_array($SelectCharacterTrait1R, MYSQLI_ASSOC);
		
		$row = strtoupper($UnpackedCode[1]);
		if (is_numeric($row)) {
			$row = '#';
		}
				
		$SelectCharacterTrait2Q = "SELECT hair_color
			FROM characters
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectCharacterTrait2R = @mysqli_query($gdbc, $SelectCharacterTrait2Q);
		$SelectCharacterTrait2 = mysqli_fetch_array($SelectCharacterTrait2R, MYSQLI_ASSOC);
		
		if ($YouThey=='They') {
			$Sentence1 = 'They have ' . $aan . ' ' . $SelectCharacterbodytype['bodytype'] . ' build as a ' . strtolower($SelectCharacterRace['races']) . ', with ' . $SelectCharacterTrait1['hairstyle'] . ' ' . $SelectCharacterTrait2['hair_color'] . ' hair. ';
		} else {
			$Sentence1 = 'You have ' . $aan . ' ' . $SelectCharacterbodytype['bodytype'] . ' build as a ' . strtolower($SelectCharacterRace['races']) . ', with ' . $SelectCharacterTrait1['hairstyle'] . ' ' . $SelectCharacterTrait2['hair_color'] . ' hair. ';
		}
	} else {
		//You're a [Race: P1] with [eyecolor: P4] eyes who is [Bodytype: P3] in stature. 

		$row = strtoupper($UnpackedCode[0]);
		if (is_numeric($row)) {
			$row = '#';
		}
		
		$SelectCharacterRaceQ = "SELECT races
			FROM characters
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectCharacterRaceR = @mysqli_query($gdbc, $SelectCharacterRaceQ);
		$SelectCharacterRace = mysqli_fetch_array($SelectCharacterRaceR, MYSQLI_ASSOC);
		
		
		$row = strtoupper($UnpackedCode[2]);
		if (is_numeric($row)) {
			$row = '#';
		}
		
		$SelectCharacterbodytypeQ = "SELECT bodytype
			FROM characters
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectCharacterbodytypeR = @mysqli_query($gdbc, $SelectCharacterbodytypeQ);
		$SelectCharacterbodytype = mysqli_fetch_array($SelectCharacterbodytypeR, MYSQLI_ASSOC);
		
		$aan = aan ($SelectCharacterbodytype['bodytype']);
		
		$row = strtoupper($UnpackedCode[3]);
		if (is_numeric($row)) {
			$row = '#';
		}
				
		$SelectCharacterTraitQ = "SELECT eye_color
			FROM characters
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectCharacterTraitR = @mysqli_query($gdbc, $SelectCharacterTraitQ);
		$SelectCharacterTrait = mysqli_fetch_array($SelectCharacterTraitR, MYSQLI_ASSOC);
		
		if ($YouThey=='They') {
				$Sentence1 = 'They\'re ' . $aan . ' ' . strtolower($SelectCharacterRace['races']) . ' with ' . $SelectCharacterTrait['eye_color'] . ' eyes who is ' . $SelectCharacterbodytype['bodytype'] . ' in stature. ';
		} else {
			$Sentence1 = 'You\'re ' . $aan . ' ' . strtolower($SelectCharacterRace['races']) . ' with ' . $SelectCharacterTrait['eye_color'] . ' eyes who is ' . $SelectCharacterbodytype['bodytype'] . ' in stature. ';
		}
	}
	
	if ($UpperFirst == 1) {
		// Your friends all say you are [nature: P4], and you hope they also think of you as [qualities: P5]
		$row = strtoupper($UnpackedCode[3]);
		if (is_numeric($row)) {
			$row = '#';
		}
		$SelectCharacterTrait1Q = "SELECT nature
			FROM characters
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectCharacterTrait1R = @mysqli_query($gdbc, $SelectCharacterTrait1Q);
		$SelectCharacterTrait1 = mysqli_fetch_array($SelectCharacterTrait1R, MYSQLI_ASSOC);
		
		$row = strtoupper($UnpackedCode[4]);
		if (is_numeric($row)) {
			$row = '#';
		}
		$SelectCharacterTrait2Q = "SELECT qualities
			FROM characters
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectCharacterTrait2R = @mysqli_query($gdbc, $SelectCharacterTrait2Q);
		$SelectCharacterTrait2 = mysqli_fetch_array($SelectCharacterTrait2R, MYSQLI_ASSOC);
		
		if ($YouThey=='They') {
				$Sentence2 = 'Their friends all say they are ' . $SelectCharacterTrait1['nature'] . ', and they hope others think of them as ' . $SelectCharacterTrait2['qualities'] . '. ';
		} else {
			$Sentence2 = 'Your friends all say you are ' . $SelectCharacterTrait1['nature'] . ', and you hope they also think of you as ' . $SelectCharacterTrait2['qualities'] . '. ';
		}
	} else if ($UpperFirst == 0) {
		// You are eager to leave behind your job as a [job: P3] and hope that your [nature: P2] nature is suited for adventure. 

		$row = strtoupper($UnpackedCode[2]);
		if (is_numeric($row)) {
			$row = '#';
		}
		$SelectCharacterTrait1Q = "SELECT job
			FROM characters
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectCharacterTrait1R = @mysqli_query($gdbc, $SelectCharacterTrait1Q);
		$SelectCharacterTrait1 = mysqli_fetch_array($SelectCharacterTrait1R, MYSQLI_ASSOC);
		
		$row = strtoupper($UnpackedCode[1]);
		if (is_numeric($row)) {
			$row = '#';
		}
		$SelectCharacterTrait2Q = "SELECT nature
			FROM characters
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectCharacterTrait2R = @mysqli_query($gdbc, $SelectCharacterTrait2Q);
		$SelectCharacterTrait2 = mysqli_fetch_array($SelectCharacterTrait2R, MYSQLI_ASSOC);
		
		if ($YouThey=='They') {
			
			$row = strtoupper($UnpackedCode[1]);
			if (is_numeric($row)) {
				$row = '#';
			}
			$SelectCharacterTrait2Q = "SELECT life_goal
				FROM characters
				WHERE letter_id='$row'
				LIMIT 1";
			$SelectCharacterTrait2R = @mysqli_query($gdbc, $SelectCharacterTrait2Q);
			$SelectCharacterTrait2 = mysqli_fetch_array($SelectCharacterTrait2R, MYSQLI_ASSOC);
				
			$Sentence2 = 'They work as a ' . $SelectCharacterTrait1['job'] . ' but one day hope to ' . $SelectCharacterTrait2['life_goal'] . '. ';
		} else {
			$Sentence2 = 'You are eager to leave behind your job as a ' . $SelectCharacterTrait1['job'] . ' and hope that your ' . $SelectCharacterTrait2['nature'] . ' personality is suited for travel. ';
		}
	} else {
		//Your family all knows you as [qualities: P3], and your dream to [LifeGoal: P5] sets you on the road.

		$row = strtoupper($UnpackedCode[2]);
		if (is_numeric($row)) {
			$row = '#';
		}
		$SelectCharacterTrait1Q = "SELECT qualities
			FROM characters
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectCharacterTrait1R = @mysqli_query($gdbc, $SelectCharacterTrait1Q);
		$SelectCharacterTrait1 = mysqli_fetch_array($SelectCharacterTrait1R, MYSQLI_ASSOC);
		
		$row = strtoupper($UnpackedCode[4]);
		if (is_numeric($row)) {
			$row = '#';
		}
		$SelectCharacterTrait2Q = "SELECT life_goal
			FROM characters
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectCharacterTrait2R = @mysqli_query($gdbc, $SelectCharacterTrait2Q);
		$SelectCharacterTrait2 = mysqli_fetch_array($SelectCharacterTrait2R, MYSQLI_ASSOC);
		
		if ($YouThey=='They') { 
			$Sentence2 = 'Their family thinks of them as ' . $SelectCharacterTrait1['qualities'] . ', and their dream is to ' . $SelectCharacterTrait2['life_goal'] . '. ';
		} else {
			$Sentence2 = 'Your family all knows you as ' . $SelectCharacterTrait1['qualities'] . ', and your dream to ' . $SelectCharacterTrait2['life_goal'] . ' sets you on the road. ';
		}
	}
	
	if ($Number % 2 == 0) {
		//Though your [Stat: P3] is lacking, you hold your [Stat2: P3] in high regard. Your best talent is in  [skill: P4]

		$row = strtoupper($UnpackedCode[2]);
		if (is_numeric($row)) {
			$row = '#';
		}
		$SelectCharacterTrait1Q = "SELECT stat, stat2
			FROM characters
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectCharacterTrait1R = @mysqli_query($gdbc, $SelectCharacterTrait1Q);
		$SelectCharacterTrait1 = mysqli_fetch_array($SelectCharacterTrait1R, MYSQLI_ASSOC);
		
		$row = strtoupper($UnpackedCode[3]);
		if (is_numeric($row)) {
			$row = '#';
		}
		$SelectCharacterTrait2Q = "SELECT skills
			FROM characters
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectCharacterTrait2R = @mysqli_query($gdbc, $SelectCharacterTrait2Q);
		$SelectCharacterTrait2 = mysqli_fetch_array($SelectCharacterTrait2R, MYSQLI_ASSOC);
		
		if ($YouThey=='They') { 
			$Sentence3 = 'Their ' . strtolower($SelectCharacterTrait1['stat']) . ' is lacking, but they are proud of their ' . strtolower($SelectCharacterTrait1['stat2']) . '. Their best talent is in ' . strtolower($SelectCharacterTrait2['skills']) . '. ';
		} else {
			$Sentence3 = 'Though your ' . strtolower($SelectCharacterTrait1['stat']) . ' is lacking, you hold your ' . strtolower($SelectCharacterTrait1['stat2']) . ' in high regard. Your best talent is in ' . strtolower($SelectCharacterTrait2['skills']) . '. ';
		}

	} else {
		//You have a talent for [skill: P2].  Your best stat is [Stat: P5] and you could stand to improve your [Stat2: P5]. 

			$row = strtoupper($UnpackedCode[1]);
		if (is_numeric($row)) {
			$row = '#';
		}
		$SelectCharacterTrait1Q = "SELECT stat, stat2
			FROM characters
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectCharacterTrait1R = @mysqli_query($gdbc, $SelectCharacterTrait1Q);
		$SelectCharacterTrait1 = mysqli_fetch_array($SelectCharacterTrait1R, MYSQLI_ASSOC);
		
		$row = strtoupper($UnpackedCode[4]);
		if (is_numeric($row)) {
			$row = '#';
		}
		$SelectCharacterTrait2Q = "SELECT skills
			FROM characters
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectCharacterTrait2R = @mysqli_query($gdbc, $SelectCharacterTrait2Q);
		$SelectCharacterTrait2 = mysqli_fetch_array($SelectCharacterTrait2R, MYSQLI_ASSOC);
		
		if ($YouThey=='They') {
			$Sentence3 = 'They have a talent for ' . strtolower($SelectCharacterTrait2['skills']) . '. Their best stat is ' . strtolower($SelectCharacterTrait1['stat2']) . ' and they could stand to improve their ' . strtolower($SelectCharacterTrait1['stat']) . '. ';
		} else {
			$Sentence3 = 'You have a talent for ' . strtolower($SelectCharacterTrait2['skills']) . '. Your best stat is ' . strtolower($SelectCharacterTrait1['stat2']) . ' and you could stand to improve your ' . strtolower($SelectCharacterTrait1['stat']) . '. ';
		}
	}

	if (isset($UnpackedCode[5])) {
		$row = strtoupper($UnpackedCode[5]);
		if (is_numeric($row)) {
			$row = '#';
		}
	} else {
		$row = strtoupper($UnpackedCode[4]);
		if (is_numeric($row)) {
			$row = '#';
		}
	}
	
	$SelectCharacterWeaponQ = "SELECT weapons
		FROM characters
		WHERE letter_id='$row'
		LIMIT 1";
	$SelectCharacterWeaponR = @mysqli_query($gdbc, $SelectCharacterWeaponQ);
	$SelectCharacterWeapon = mysqli_fetch_array($SelectCharacterWeaponR, MYSQLI_ASSOC);

	$SelectQualityQ = "SELECT metal
		FROM Quality
		WHERE table_id='$Number'
		LIMIT 1";
	$SelectQualityR = @mysqli_query($gdbc, $SelectQualityQ);
	$SelectQuality = mysqli_fetch_array($SelectQualityR, MYSQLI_ASSOC);

	$aan = aan($SelectQuality['metal']);
	
	if ($YouThey=='They') {
			$Backpack = 'Wields ' . $aan . ' ' . strtolower($SelectQuality['metal']) . ' ' . $SelectCharacterWeapon['weapons'] . '. Supplies: ';
	} else {
		$Backpack = 'You wield ' . $aan . ' ' . strtolower($SelectQuality['metal']) . ' ' . $SelectCharacterWeapon['weapons'] . '. Supplies: ';
	}
	
	$row = strtoupper($UnpackedCode[5]);
	$REVERSE = FALSE;
	
	for ($i=1; $i<=$Number; $i++) {	
		
		if ($row == '#') {
			$row = 'A';
		}
		
		$row++;
		
		if ($row == 'AA') {	
			$row = 'A';
		}
		
		if ($i==4) {
			$i=10;
		}

		if (is_numeric($row)) {
			$row = '#';
		}
		
		
		
		$SelectCharacterGearQ = "SELECT gear
		FROM characters
		WHERE letter_id='$row'
		LIMIT 1";
		$SelectCharacterGearR = @mysqli_query($gdbc, $SelectCharacterGearQ);
		$SelectCharacterGear = mysqli_fetch_array($SelectCharacterGearR, MYSQLI_ASSOC);
		
		$Backpack = $Backpack . $SelectCharacterGear['gear'] . ', ';
	}
	
	$Backpack = $Backpack . ' ' . $Number * 10 . ' gold pieces.';
	
	$Description = $Sentence1 . $Sentence2 . $Sentence3 . $Backpack;

	return $Description;
}

function BuildingDescription ($code, $gdbc, $type) {
	
	$Name = '';
	$Physical = '';
	$Location1 = '';
	$Location2 = '';
	
	$CodeArray = array();
	$CodeArray = UnpackCode ($code);

	$UnpackedCode = str_split($code);

	$UpperCount = 0;
	$LowerCount = 0;
	$Number = 0;
	$EntryCount = -1;
	$UpperFirst = 0;
	$Lastnum = 0;
	
	foreach ($UnpackedCode AS $k => $v) {
		if (ctype_upper($v)) {
			$UpperCount++;
			
			if ($EntryCount == -1) {
				$UpperFirst = 1;
			}
		} else if (ctype_lower($v)) {
			$LowerCount++;
		} else {
			$Number = $Number + $v;
			if ($EntryCount == -1) {
				$UpperFirst = 2;
			}
			$Lastnum = $v;
		}
		$EntryCount++;
	}
	
	// MinNumber
	if ($Number > 9) {
		$Number = str_split($Number);
		$NewNumber = 0;
		foreach ($Number AS $k => $v) {
			$NewNumber = $NewNumber + $v;
		}
		$Number = $NewNumber;
	}
	
	if ($Number > 9) {
		$Number = str_split($Number);
		$NewNumber = 0;
		foreach ($Number AS $k => $v) {
			$NewNumber = $NewNumber + $v;
		}
		$Number = $NewNumber;
	}
	
	if ($Number == 0) {
		$Number = 10;
	}
	
	// $CodeArray['Affinity']
	if ($CodeArray['Affinity'] == 'Non Magical') {
		$Affinity = 'NonMagical';	
	} else {
		$Affinity = $CodeArray['Affinity'];
	}
		
// Names
	if ($type == 'Inn') {
		if ($Affinity == 'Earth' || $Affinity == 'Metal') {
			$NameSelection = 'inn_earth_metal';
		} else if ($Affinity == 'Nature' || $Affinity == 'NonMagical') {
			$NameSelection = 'inn_nature_trailside';
		} else if ($Affinity == 'Fire' || $Affinity == 'Cursed') {
			$NameSelection = 'inn_fire_cursed';
		} else {
			$NameSelection = 'inn_water';
		}
		
		$row = strtoupper($UnpackedCode[0]);
		if (is_numeric($row)) {
			$row = '#';
		}
		
		$SelectnBuildingNameQ = "SELECT $NameSelection
			FROM buildings
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectnBuildingNameR = @mysqli_query($gdbc, $SelectnBuildingNameQ);
		$SelectnBuildingName = mysqli_fetch_array($SelectnBuildingNameR, MYSQLI_NUM);
		
		$Name = 'The ' . ucwords($SelectnBuildingName[0]);
		
		switch ($Number) {
			CASE 1:
				$Name = $Name . ' Inn';
				BREAK;
			CASE 2:
				$Name = $Name . ' Inn';
				BREAK;
			CASE 3:
				$Name = $Name . ' Tavern';
				BREAK;
			CASE 4:
				$Name = $Name . ' Tavern';
				BREAK;
			CASE 5:
				$Name = $Name . ' Lodge';
				BREAK;
			CASE 6:
				$Name = $Name . ' Lodge';
				BREAK;
			CASE 7:
				$Name = $Name . ' Roadhouse';
				BREAK;
			CASE 8:
				$Name = $Name . ' Roadhouse';
				BREAK;
			DEFAULT:
				$Name = $Name . ' Pub';
		}
		
	} else if ($type == 'Shop') {
		if ($UpperCount > $LowerCount) {
			$row = strtoupper($UnpackedCode[1]);
			if (is_numeric($row)) {
				$row = '#';
			}
			$SelectnBuildingNameQ = "SELECT shop_names
				FROM buildings
				WHERE letter_id='$row'
				LIMIT 1";
			$SelectnBuildingNameR = @mysqli_query($gdbc, $SelectnBuildingNameQ);
			$SelectnBuildingName = mysqli_fetch_array($SelectnBuildingNameR, MYSQLI_ASSOC);
			
			$row = strtoupper($UnpackedCode[0]);
			if (is_numeric($row)) {
				$row = '#';
			}
			$SelectnBuildingTypeQ = "SELECT shop_type
				FROM buildings
				WHERE letter_id='$row'
				LIMIT 1";
			$SelectnBuildingTypeR = @mysqli_query($gdbc, $SelectnBuildingTypeQ);
			$SelectnBuildingType = mysqli_fetch_array($SelectnBuildingTypeR, MYSQLI_ASSOC);
			
			$Name = ucwords ($SelectnBuildingName['shop_names'] . ' ' . $SelectnBuildingType['shop_type']);
		} else {	
			$SelectnTypeQ = "SELECT $Affinity
				FROM building_flavor
				WHERE flavor_id=3
				LIMIT 1";
			$SelectnTypeR = @mysqli_query($gdbc, $SelectnTypeQ);
			$SelectnType = mysqli_fetch_array($SelectnTypeR, MYSQLI_NUM);
			
			$row = strtoupper($UnpackedCode[2]);
			if (is_numeric($row)) {
				$row = '#';
			}
			$SelectnBuildingNameQ = "SELECT $SelectnType[0]
				FROM scene_Detail
				WHERE letter_id='$row'
				LIMIT 1";
			$SelectnBuildingNameR = @mysqli_query($gdbc, $SelectnBuildingNameQ);
			$SelectnBuildingName = mysqli_fetch_array($SelectnBuildingNameR, MYSQLI_NUM);
			
			$row = strtoupper($UnpackedCode[1]);
			if (is_numeric($row)) {
				$row = '#';
			}
			$SelectnBuildingStreetQ = "SELECT street_suffix
				FROM buildings
				WHERE letter_id='$row'
				LIMIT 1";
			$SelectnBuildingStreetR = @mysqli_query($gdbc, $SelectnBuildingStreetQ);
			$SelectnBuildingStreet = mysqli_fetch_array($SelectnBuildingStreetR, MYSQLI_ASSOC);
			
			$row = strtoupper($UnpackedCode[0]);
			if (is_numeric($row)) {
				$row = '#';
			}
			$SelectnBuildingTypeQ = "SELECT shop_type
				FROM buildings
				WHERE letter_id='$row'
				LIMIT 1";
			$SelectnBuildingTypeR = @mysqli_query($gdbc, $SelectnBuildingTypeQ);
			$SelectnBuildingType = mysqli_fetch_array($SelectnBuildingTypeR, MYSQLI_ASSOC);
			
			$Name = ucwords($SelectnBuildingName[0] . $SelectnBuildingStreet['street_suffix'] . ' ' . $SelectnBuildingType['shop_type']);
		}
	} else if ($type == 'Information') {
		$row = strtoupper($UnpackedCode[1]);
		if (is_numeric($row)) {
			$row = '#';
		}
		$SelectnInfoQ = "SELECT information
			FROM buildings
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectnInfoR = @mysqli_query($gdbc, $SelectnInfoQ);
		$SelectnInfo = mysqli_fetch_array($SelectnInfoR, MYSQLI_ASSOC);
		
		$row = strtoupper($UnpackedCode[0]);
		if (is_numeric($row)) {
			$row = '#';
		}
		$SelectnInfoTypeQ = "SELECT of
			FROM buildings
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectnInfoTypeR = @mysqli_query($gdbc, $SelectnInfoTypeQ);
		$SelectnInfoType = mysqli_fetch_array($SelectnInfoTypeR, MYSQLI_ASSOC);
		
		$Name = 'The ' . ucwords($SelectnInfo['information']) . ' of ' . ucwords($SelectnInfoType['of']);
	
	} else {
		$Name = '';
	}
	
	if ($type != 'Information') {
// Building Description
		if ($UpperFirst == 1) {
			 // A [MinNumOdd]: Single Storey  [MinNumEven]: Two-Story  [MinNumZero]: multi-story building of [building structure pos 3] [building material flavor pos 4] with several [window pos 5] windows.
			 
			if ($Number == 0) {
				$Physical = 'A single storey building of ';
			} else if ($Number % 2 == 0) {
				$Physical = 'A two-storey building of ';
			} else {
				$Physical = 'A multi-storey building of ';
			}
			
			$row = strtoupper($UnpackedCode[2]);
			if (is_numeric($row)) {
				$row = '#';
			}
			$SelectionStructureQ = "SELECT structure
				FROM buildings
				WHERE letter_id='$row'
				LIMIT 1";
			$SelectionStructureR = @mysqli_query($gdbc, $SelectionStructureQ);
			$SelectionStructure = mysqli_fetch_array($SelectionStructureR, MYSQLI_ASSOC);
			
			$SelectnTypeQ = "SELECT $Affinity
				FROM building_flavor
				WHERE flavor_id=1
				LIMIT 1";
			$SelectnTypeR = @mysqli_query($gdbc, $SelectnTypeQ);
			$SelectnType = mysqli_fetch_array($SelectnTypeR, MYSQLI_NUM);
			
			$row = strtoupper($UnpackedCode[3]);
			if (is_numeric($row)) {
				$row = '#';
			}
			$SelectionMaterialQ = "SELECT $SelectnType[0]
				FROM scene_Detail
				WHERE letter_id='$row'
				LIMIT 1";
			$SelectionMaterialR = @mysqli_query($gdbc, $SelectionMaterialQ);
			$SelectionMaterial = mysqli_fetch_array($SelectionMaterialR, MYSQLI_NUM);
			
			$Physical = $Physical . $SelectionStructure['structure'] . ' ' . $SelectionMaterial[0] . ' with several ';
			
			$row = strtoupper($UnpackedCode[4]);
			if (is_numeric($row)) {
				$row = '#';
			}
			$SelectionWindowsQ = "SELECT windows
				FROM buildings
				WHERE letter_id='$row'
				LIMIT 1";
			$SelectionWindowsR = @mysqli_query($gdbc, $SelectionWindowsQ);
			$SelectionWindows = mysqli_fetch_array($SelectionWindowsR, MYSQLI_ASSOC);
			
			$Physical = $Physical . $SelectionWindows['windows'] . ' windows. ';
			
		} else if ($UpperFirst == 0){
			// A [MinNumOdd]: square [MinNumEven]: tall  [MinNumZero]: sprawling building of [building structure pos 4] [building material flavor pos 5] with [yard pos 3] outside.
			
			if ($Number == 0) {
				$Physical = 'A square building of ';
			} else if ($Number % 2 == 0) {
				$Physical = 'A tall building of ';
			} else {
				$Physical = 'A sprawling building of ';
			}
			
			$row = strtoupper($UnpackedCode[3]);
			if (is_numeric($row)) {
				$row = '#';
			}
			$SelectionStructureQ = "SELECT structure
				FROM buildings
				WHERE letter_id='$row'
				LIMIT 1";
			$SelectionStructureR = @mysqli_query($gdbc, $SelectionStructureQ);
			$SelectionStructure = mysqli_fetch_array($SelectionStructureR, MYSQLI_ASSOC);
			
			$SelectnTypeQ = "SELECT $Affinity
				FROM building_flavor
				WHERE flavor_id=1
				LIMIT 1";
			$SelectnTypeR = @mysqli_query($gdbc, $SelectnTypeQ);
			$SelectnType = mysqli_fetch_array($SelectnTypeR, MYSQLI_NUM);
			
			$row = strtoupper($UnpackedCode[4]);
			if (is_numeric($row)) {
				$row = '#';
			}
			$SelectionMaterialQ = "SELECT $SelectnType[0]
				FROM scene_Detail
				WHERE letter_id='$row'
				LIMIT 1";
			$SelectionMaterialR = @mysqli_query($gdbc, $SelectionMaterialQ);
			$SelectionMaterial = mysqli_fetch_array($SelectionMaterialR, MYSQLI_NUM);
			
			$Physical = $Physical . $SelectionStructure['structure'] . ' ' . $SelectionMaterial[0] . ' with a ';
			
			$row = strtoupper($UnpackedCode[2]);
			if (is_numeric($row)) {
				$row = '#';
			}
			$SelectionYardQ = "SELECT yard
				FROM buildings
				WHERE letter_id='$row'
				LIMIT 1";
			$SelectionYardR = @mysqli_query($gdbc, $SelectionYardQ);
			$SelectionYard = mysqli_fetch_array($SelectionYardR, MYSQLI_ASSOC);
			
			$Physical = $Physical . $SelectionYard['yard'] . ' outside. ';
		} else {
			// The building is [MinNumOdd]: quaint  [MinNumEven]: imposing  [MinNumZero]: homely, made from [building structure pos 5] [building material flavor pos 3] and surrounded by [fence pos 4]. 
			
			if ($Number == 0) {
				$Physical = 'The building is quaint, made from ';
			} else if ($Number % 2 == 0) {
				$Physical = 'The building is imposing, made from ';
			} else {
				$Physical = 'The building is homely, made from ';
			}
			
			$row = strtoupper($UnpackedCode[4]);
			if (is_numeric($row)) {
				$row = '#';
			}
			$SelectionStructureQ = "SELECT structure
				FROM buildings
				WHERE letter_id='$row'
				LIMIT 1";
			$SelectionStructureR = @mysqli_query($gdbc, $SelectionStructureQ);
			$SelectionStructure = mysqli_fetch_array($SelectionStructureR, MYSQLI_ASSOC);
			
			$SelectnTypeQ = "SELECT $Affinity
				FROM building_flavor
				WHERE flavor_id=1
				LIMIT 1";
			$SelectnTypeR = @mysqli_query($gdbc, $SelectnTypeQ);
			$SelectnType = mysqli_fetch_array($SelectnTypeR, MYSQLI_NUM);
			
			$row = strtoupper($UnpackedCode[2]);
			if (is_numeric($row)) {
				$row = '#';
			}
			$SelectionMaterialQ = "SELECT $SelectnType[0]
				FROM scene_Detail
				WHERE letter_id='$row'
				LIMIT 1";
			$SelectionMaterialR = @mysqli_query($gdbc, $SelectionMaterialQ);
			$SelectionMaterial = mysqli_fetch_array($SelectionMaterialR, MYSQLI_NUM);
			
			$Physical = $Physical . $SelectionStructure['structure'] . ' ' . $SelectionMaterial[0] . ' and surrounded by ';
			
			$row = strtoupper($UnpackedCode[3]);
			if (is_numeric($row)) {
				$row = '#';
			}
			$SelectionFenceQ = "SELECT fence
				FROM buildings
				WHERE letter_id='$row'
				LIMIT 1";
			$SelectionFenceR = @mysqli_query($gdbc, $SelectionFenceQ);
			$SelectionFence = mysqli_fetch_array($SelectionFenceR, MYSQLI_ASSOC);
			
			$Physical = $Physical . $SelectionFence['fence'] . '. ';
		}
	} else {
// Campus Description
		if ($UpperFirst == 1) {
			 // A [MinNumOdd]: sprawling  [MinNumEven]: compact  [MinNumZero]: open campus with buildings of [building structure pos 3] [building material flavor pos 4] each with several [window pos 5] windows.

			if ($Number == 0) {
				$Physical = 'A sprawling campus with buildings of ';
			} else if ($Number % 2 == 0) {
				$Physical = 'A compact campus with buildings of ';
			} else {
				$Physical = 'An open campus with buildings of ';
			}
			
			$row = strtoupper($UnpackedCode[2]);
			if (is_numeric($row)) {
				$row = '#';
			}
			$SelectionStructureQ = "SELECT structure
				FROM buildings
				WHERE letter_id='$row'
				LIMIT 1";
			$SelectionStructureR = @mysqli_query($gdbc, $SelectionStructureQ);
			$SelectionStructure = mysqli_fetch_array($SelectionStructureR, MYSQLI_ASSOC);
			
			$SelectnTypeQ = "SELECT $Affinity
				FROM building_flavor
				WHERE flavor_id=1
				LIMIT 1";
			$SelectnTypeR = @mysqli_query($gdbc, $SelectnTypeQ);
			$SelectnType = mysqli_fetch_array($SelectnTypeR, MYSQLI_NUM);
			
			$row = strtoupper($UnpackedCode[3]);
			if (is_numeric($row)) {
				$row = '#';
			}
			$SelectionMaterialQ = "SELECT $SelectnType[0]
				FROM scene_Detail
				WHERE letter_id='$row'
				LIMIT 1";
			$SelectionMaterialR = @mysqli_query($gdbc, $SelectionMaterialQ);
			$SelectionMaterial = mysqli_fetch_array($SelectionMaterialR, MYSQLI_NUM);
			
			$Physical = $Physical . $SelectionStructure['structure'] . ' ' . $SelectionMaterial[0] . ' each with several ';
			
			$row = strtoupper($UnpackedCode[4]);
			if (is_numeric($row)) {
				$row = '#';
			}
			$SelectionWindowsQ = "SELECT windows
				FROM buildings
				WHERE letter_id='$row'
				LIMIT 1";
			$SelectionWindowsR = @mysqli_query($gdbc, $SelectionWindowsQ);
			$SelectionWindows = mysqli_fetch_array($SelectionWindowsR, MYSQLI_ASSOC);
			
			$Physical = $Physical . $SelectionWindows['windows'] . ' windows. ';
			
		} else if ($UpperFirst == 0){
			// The grounds consist of  [yard pos 3] with [MinNumOdd]: a single [MinNumEven]: several small [MinNumZero]: several large building(s) made from [building structure pos 4] [building material flavor pos 5].

			$row = strtoupper($UnpackedCode[2]);
			if (is_numeric($row)) {
				$row = '#';
			}
			$SelectionYardQ = "SELECT parks
				FROM buildings
				WHERE letter_id='$row'
				LIMIT 1";
			$SelectionYardR = @mysqli_query($gdbc, $SelectionYardQ);
			$SelectionYard = mysqli_fetch_array($SelectionYardR, MYSQLI_ASSOC);
			
			$Physical = 'The grounds consist of ' . $SelectionYard['parks'] . ' and ';
			
			if ($Number == 0) {
				$Physical = $Physical . 'a single building made from ';
			} else if ($Number % 2 == 0) {
				$Physical = $Physical . 'several small buildings made from ';
			} else {
				$Physical = $Physical . 'several large buildings made from ';
			}
			
			$row = strtoupper($UnpackedCode[3]);
			if (is_numeric($row)) {
				$row = '#';
			}
			$SelectionStructureQ = "SELECT structure
				FROM buildings
				WHERE letter_id='$row'
				LIMIT 1";
			$SelectionStructureR = @mysqli_query($gdbc, $SelectionStructureQ);
			$SelectionStructure = mysqli_fetch_array($SelectionStructureR, MYSQLI_ASSOC);
			
			$SelectnTypeQ = "SELECT $Affinity
				FROM building_flavor
				WHERE flavor_id=1
				LIMIT 1";
			$SelectnTypeR = @mysqli_query($gdbc, $SelectnTypeQ);
			$SelectnType = mysqli_fetch_array($SelectnTypeR, MYSQLI_NUM);
			
			$row = strtoupper($UnpackedCode[4]);
			if (is_numeric($row)) {
				$row = '#';
			}
			$SelectionMaterialQ = "SELECT $SelectnType[0]
				FROM scene_Detail
				WHERE letter_id='$row'
				LIMIT 1";
			$SelectionMaterialR = @mysqli_query($gdbc, $SelectionMaterialQ);
			$SelectionMaterial = mysqli_fetch_array($SelectionMaterialR, MYSQLI_NUM);
			
			$Physical = $Physical . $SelectionStructure['structure'] . ' ' . $SelectionMaterial[0] . '.';
		} else {
			// The main entrance is lined with  [fence pos 4] leading to [MinNumOdd]: a tower [MinNumEven]: an archway [MinNumZero]: the foyer of a(n) [building structure pos 5] [building material flavor pos 3] building.
 
			$row = strtoupper($UnpackedCode[2]);
			if (is_numeric($row)) {
				$row = '#';
			}
			$SelectionFenceQ = "SELECT fence
				FROM buildings
				WHERE letter_id='$row'
				LIMIT 1";
			$SelectionFenceR = @mysqli_query($gdbc, $SelectionFenceQ);
			$SelectionFence = mysqli_fetch_array($SelectionFenceR, MYSQLI_ASSOC);
			
			$Physical = 'The main entrance is lined with ' . $SelectionFence['fence'] . ' leading to ';
						
			$row = strtoupper($UnpackedCode[4]);
			if (is_numeric($row)) {
				$row = '#';
			}
			$SelectionStructureQ = "SELECT structure
				FROM buildings
				WHERE letter_id='$row'
				LIMIT 1";
			$SelectionStructureR = @mysqli_query($gdbc, $SelectionStructureQ);
			$SelectionStructure = mysqli_fetch_array($SelectionStructureR, MYSQLI_ASSOC);
			
			$SelectnTypeQ = "SELECT $Affinity
				FROM building_flavor
				WHERE flavor_id=1
				LIMIT 1";
			$SelectnTypeR = @mysqli_query($gdbc, $SelectnTypeQ);
			$SelectnType = mysqli_fetch_array($SelectnTypeR, MYSQLI_NUM);
			
			$row = strtoupper($UnpackedCode[2]);
			if (is_numeric($row)) {
				$row = '#';
			}
			$SelectionMaterialQ = "SELECT $SelectnType[0]
				FROM scene_Detail
				WHERE letter_id='$row'
				LIMIT 1";
			$SelectionMaterialR = @mysqli_query($gdbc, $SelectionMaterialQ);
			$SelectionMaterial = mysqli_fetch_array($SelectionMaterialR, MYSQLI_NUM);
			
			if ($Number == 0) {
				$Physical = $Physical . 'a tower of ';
			} else if ($Number % 2 == 0) {
				$Physical = $Physical . 'an archway of ';
			} else {
				$Physical = $Physical . 'the foyer of a building of ';
			}
			
			$Physical = $Physical . $SelectionStructure['structure'] . ' ' . $SelectionMaterial[0] . '.';
		}
	}

// Street Address
	$SelectnTypeQ = "SELECT $Affinity
		FROM building_flavor
		WHERE flavor_id=3
		LIMIT 1";
	$SelectnTypeR = @mysqli_query($gdbc, $SelectnTypeQ);
	$SelectnType = mysqli_fetch_array($SelectnTypeR, MYSQLI_NUM);
	
	$row = strtoupper($UnpackedCode[2]);
	if (is_numeric($row)) {
		$row = '#';
	}
	$SelectnBuildingNameQ = "SELECT $SelectnType[0]
		FROM scene_Detail
		WHERE letter_id='$row'
		LIMIT 1";
	$SelectnBuildingNameR = @mysqli_query($gdbc, $SelectnBuildingNameQ);
	$SelectnBuildingName = mysqli_fetch_array($SelectnBuildingNameR, MYSQLI_NUM);
	
	$row = strtoupper($UnpackedCode[1]);
	if (is_numeric($row)) {
		$row = '#';
	}
	$SelectnBuildingStreetQ = "SELECT street_suffix
		FROM buildings
		WHERE letter_id='$row'
		LIMIT 1";
	$SelectnBuildingStreetR = @mysqli_query($gdbc, $SelectnBuildingStreetQ);
	$SelectnBuildingStreet = mysqli_fetch_array($SelectnBuildingStreetR, MYSQLI_ASSOC);
	
	if ($UpperCount > $LowerCount) {
		$Location1 = 'Located at ' . $Number . $Lastnum . ' ' . ucwords($SelectnBuildingName[0] . $SelectnBuildingStreet['street_suffix']) . '. ';
	} else if ($UpperCount < $LowerCount) {
		$Location1 = 'Found on ' . $Lastnum . $Number . ' ' . ucwords($SelectnBuildingName[0] . $SelectnBuildingStreet['street_suffix']) . '. ';
	} else {
		$Location1 = 'Number ' . $Number . ' ' . ucwords($SelectnBuildingName[0] . $SelectnBuildingStreet['street_suffix']) . '. ';
	}
	
// Relative Location
	$row = strtoupper($UnpackedCode[5]);
	if (is_numeric($row)) {
		$row = '#';
	}
	$SelectionAdjacentQ = "SELECT adjacent
		FROM buildings
		WHERE letter_id='$row'
		LIMIT 1";
	$SelectionAdjacentR = @mysqli_query($gdbc, $SelectionAdjacentQ);
	$SelectionAdjacent = mysqli_fetch_array($SelectionAdjacentR, MYSQLI_ASSOC);

	if ($type == 'Inn') {
		$row = strtoupper($UnpackedCode[5]);
		if (is_numeric($row)) {
			$row = '#';
		}
		$SelectnInfoQ = "SELECT information
			FROM buildings
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectnInfoR = @mysqli_query($gdbc, $SelectnInfoQ);
		$SelectnInfo = mysqli_fetch_array($SelectnInfoR, MYSQLI_ASSOC);
		
		$row = strtoupper($UnpackedCode[4]);
		if (is_numeric($row)) {
			$row = '#';
		}
		$SelectnInfoTypeQ = "SELECT of
			FROM buildings
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectnInfoTypeR = @mysqli_query($gdbc, $SelectnInfoTypeQ);
		$SelectnInfoType = mysqli_fetch_array($SelectnInfoTypeR, MYSQLI_ASSOC);
		
		$Location2 = 'It is ' . $SelectionAdjacent['adjacent'] . ' The ' . ucwords($SelectnInfo['information']) . ' of ' . ucwords($SelectnInfoType['of']);
		
		$Description = $Name . '. ' . $Physical . $Location2;
		
	} else if ($type == 'Shop') {
		$row = strtoupper($UnpackedCode[0]);
		if (is_numeric($row)) {
			$row = '#';
		}
		$SelectnBuildingNameQ = "SELECT shop_names
			FROM buildings
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectnBuildingNameR = @mysqli_query($gdbc, $SelectnBuildingNameQ);
		$SelectnBuildingName = mysqli_fetch_array($SelectnBuildingNameR, MYSQLI_ASSOC);
		
		$row = strtoupper($UnpackedCode[1]);
		if (is_numeric($row)) {
			$row = '#';
		}
		$SelectnBuildingTypeQ = "SELECT shop_type
			FROM buildings
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectnBuildingTypeR = @mysqli_query($gdbc, $SelectnBuildingTypeQ);
		$SelectnBuildingType = mysqli_fetch_array($SelectnBuildingTypeR, MYSQLI_ASSOC);
		
		$Location2 = 'It stands ' . $SelectionAdjacent['adjacent'] . ' ' . ucwords ($SelectnBuildingName['shop_names'] . ' ' . $SelectnBuildingType['shop_type']);

		$Description = $Name . ', ' . $Location1 . $Physical . $Location2;
	} else if ($type == 'Information') {
		
		if ($Affinity == 'Earth' || $Affinity == 'Metal') {
			$NameSelection = 'inn_earth_metal';
		} else if ($Affinity == 'Nature' || $Affinity == 'NonMagical') {
			$NameSelection = 'inn_nature_trailside';
		} else if ($Affinity == 'Fire' || $Affinity == 'Cursed') {
			$NameSelection = 'inn_fire_cursed';
		} else {
			$NameSelection = 'inn_water';
		}
		
		$row = strtoupper($UnpackedCode[0]);
		if (is_numeric($row)) {
			$row = '#';
		}
		
		$SelectnBuildingNameQ = "SELECT $NameSelection
			FROM buildings
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectnBuildingNameR = @mysqli_query($gdbc, $SelectnBuildingNameQ);
		$SelectnBuildingName = mysqli_fetch_array($SelectnBuildingNameR, MYSQLI_NUM);
		
		$Location2 = ' ' . ucwords($SelectionAdjacent['adjacent']) . ' The ' . ucwords($SelectnBuildingName[0]);
				
		switch ($Number) {
			CASE 1:
				$Location2 = $Location2 . ' Inn';
				BREAK;
			CASE 2:
				$Location2 = $Location2 . ' Inn';
				BREAK;
			CASE 3:
				$Location2 = $Location2 . ' Tavern';
				BREAK;
			CASE 4:
				$Location2 = $Location2 . ' Tavern';
				BREAK;
			CASE 5:
				$Location2 = $Location2 . ' Lodge';
				BREAK;
			CASE 6:
				$Location2 = $Location2 . ' Lodge';
				BREAK;
			CASE 7:
				$Location2 = $Location2 . ' Roadhouse';
				BREAK;
			CASE 8:
				$Location2 = $Location2 . ' Roadhouse';
				BREAK;
			DEFAULT:
				$Location2 = $Location2 . ' Pub';
		}

		$Description = $Name . '. ' . $Physical . $Location2;
	} else {
		$row = strtoupper($UnpackedCode[5]);
		if (is_numeric($row)) {
			$row = '#';
		}
		$SelectionYardQ = "SELECT parks
			FROM buildings
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectionYardR = @mysqli_query($gdbc, $SelectionYardQ);
		$SelectionYard = mysqli_fetch_array($SelectionYardR, MYSQLI_ASSOC);
		
		$Location2 = 'The neighborhood is ' . $SelectionAdjacent['adjacent'] . ' ' . $SelectionYard['parks'] . '';
		
		$Description = $Location1 . $Physical . $Location2;
	}
	
	switch ($Lastnum) {
		CASE 1:
			$TownshipLocation  = 'on the north side';
			BREAK;
		CASE 2:
			$TownshipLocation  = 'on the south side';
			BREAK;
		CASE 3:
			$TownshipLocation  = 'on the east end';
			BREAK;
		CASE 4:
			$TownshipLocation  = 'on the west end';
			BREAK;
		CASE 5:
			$TownshipLocation  = 'in the center';
			BREAK;
		CASE 6:
			$TownshipLocation  = 'on the outskirts';
			BREAK;
		CASE 7:
			$TownshipLocation  = 'on the otherside';
			BREAK;
		CASE 8:
			$TownshipLocation  = 'in the rundown part';
			BREAK;
		CASE 9:
			$TownshipLocation  = 'in the upscale part';
			BREAK;
		DEFAULT:
			$TownshipLocation  = 'on the far end';
	}
	
	$Description = $Description . ', ' . $TownshipLocation . ' of town.';
	
	// if ($Lastnum % 2 == 0) {
		$row = strtoupper($UnpackedCode[3]);
		if (is_numeric($row)) {
			$row = '#';
		}
		$SelectionAtmosphereQ = "SELECT street_atmosphere
			FROM buildings
			WHERE letter_id='$row'
			LIMIT 1";
		$SelectionAtmosphereR = @mysqli_query($gdbc, $SelectionAtmosphereQ);
		$SelectionAtmosphere = mysqli_fetch_array($SelectionAtmosphereR, MYSQLI_ASSOC);
		
		$Description = $Description . ' ' . ucfirst($SelectionAtmosphere['street_atmosphere']) . '.';
	// } else {
			// ADD Scents/Sounds
	// }
	
	return $Description;
}

function ItemDescription ($code, $gdbc) {
	
	$CodeArray = array();
	$CodeArray = UnpackCode ($code);
	$Description = '';
	
	
	// $Area = '';
	// $PartialArea = '';
	// $Detail1 = '';
	// $Detail2 = '';
	// $AreaWeather = '';
	// $DragonWeather = '';
	
	$UnpackedCode = str_split($code);

	$UpperCount = 0;
	$LowerCount = 0;
	$Number = 0;
	$EntryCount = -1;
	
	//Check Order and Unpack
	foreach ($UnpackedCode AS $k => $v) {
		if (ctype_upper($v)) {
			$UpperCount++;
		} else if (ctype_lower($v)) {
			$LowerCount++;
		} else {
			$Number = $Number + $v;
		}
		$EntryCount++;
	}
	
	// Determine quality
	if ($Number > 9) {
		$Number = str_split($Number);
		$NewNumber = 0;
		foreach ($Number AS $k => $v) {
			$NewNumber = $NewNumber + $v;
		}
		$Number = NewNumber;
	}
	
	if ($Number > 9) {
		$Number = str_split($Number);
		$NewNumber = 0;
		foreach ($Number AS $k => $v) {
			$NewNumber = $NewNumber + $v;
		}
		$Number = NewNumber;
	}
	
	if ($Number == 0) {
		$Number = 10;
	}
	

	// Continued...
	if ($UpperCount > $LowerCount) {
		$areaIDSlot = $UnpackedCode[1];
		$areaIntroSlot = $UnpackedCode[$EntryCount];
		$Detail1IntroSlot = $UnpackedCode[0];
		$Detail1Slot = $UnpackedCode[3];
		$Detail2SelectionSlot = $UnpackedCode[1];
		$Detail2IntroSlot = $UnpackedCode[2];
		$Detail2Slot = $UnpackedCode[0];
		$DragonStatusSlot = $UnpackedCode[$EntryCount];
	} else if ($UpperCount < $LowerCount) {
		$areaIDSlot = $UnpackedCode[2];
		$areaIntroSlot = $UnpackedCode[1];
		$Detail1IntroSlot = $UnpackedCode[0];
		$Detail1Slot = $UnpackedCode[$EntryCount];
		$Detail2SelectionSlot = $UnpackedCode[3];
		$Detail2IntroSlot = $UnpackedCode[2];
		$Detail2Slot = $UnpackedCode[0];
		$DragonStatusSlot = $UnpackedCode[3];
	} else {
		$areaIDSlot = $UnpackedCode[$EntryCount];
		$areaIntroSlot = $UnpackedCode[0];
		$Detail1IntroSlot = $UnpackedCode[3];
		$Detail1Slot = $UnpackedCode[2];
		$Detail2SelectionSlot = $UnpackedCode[2];
		$Detail2IntroSlot = $UnpackedCode[1];
		$Detail2Slot = $UnpackedCode[3];
		$DragonStatusSlot = $UnpackedCode[1];
	}
	
	$ItemType = 'Ruins';
	if ($CodeArray['Affinity']=='Non Magical') {
		switch ($CodeArray['Aversion']) {
			case 'Earth':
				$AreaType = 'Grove';
				break;
			case 'Nature':
				$AreaType = 'Canyon';
				break;
			case 'Fire':
				$AreaType = 'Water';
				break;
			case 'Water':
				$AreaType = 'Cavern';
				break;
			case 'Metal':
				$AreaType = 'Volcanic';
				break;
			case 'Curse':
				$AreaType = 'Ruins';
				break;
			case 'Non Magical':
				$AreaType = 'Ruins';
				break;
		}
	} else {
		switch ($CodeArray['Affinity']) {
			case 'Earth':
				$AreaType = 'Cavern';
				break;
			case 'Nature':
				$AreaType = 'Grove';
				break;
			case 'Fire':
				$AreaType = 'Volcanic';
				break;
			case 'Water':
				$AreaType = 'Water';
				break;
			case 'Metal':
				$AreaType = 'Canyon';
				break;
			case 'Curse':
				$AreaType = 'Hellscape';
				break;
		}
	}
	
	// BEGIN AREA
	if (ctype_upper($areaIntroSlot)) {
		$SelectAreaIntroQ = "SELECT $AreaType AS intro
		FROM zori_table_Habitat_InOut
		WHERE letter_id='A' AND in_1_out_0=2
		LIMIT 1";
	} else if (ctype_lower($areaIntroSlot)) {
		$SelectAreaIntroQ = "SELECT $AreaType AS intro
		FROM zori_table_Habitat_InOut
		WHERE letter_id='z' AND in_1_out_0=2
		LIMIT 1";
	} else {
		$SelectAreaIntroQ = "SELECT $AreaType AS intro
		FROM zori_table_Habitat_InOut
		WHERE letter_id='#' AND in_1_out_0=2
		LIMIT 1";
	}
	$SelectAreaIntroR = @mysqli_query($gdbc, $SelectAreaIntroQ);
	$SelectAreaIntro = mysqli_fetch_array($SelectAreaIntroR, MYSQLI_ASSOC);
	$Area = $SelectAreaIntro['intro'];
	
	$row = strtoupper($areaIDSlot);
	if (is_numeric($row)) {
		$row = '#';
	}
	
	$SelectAreaTypeQ = "SELECT $AreaType AS type
		FROM zori_table_Habitat
		WHERE letter_id='$row'
		LIMIT 1";
	$SelectAreaTypeR = @mysqli_query($gdbc, $SelectAreaTypeQ);
	$SelectAreaType = mysqli_fetch_array($SelectAreaTypeR, MYSQLI_ASSOC);
	
	$aan = aan ($SelectAreaType['type']);
	
	$Area = $SelectAreaIntro['intro'] . $aan . $SelectAreaType['type'];
	$PartialArea = $aan . $SelectAreaType['type'];
	// END AREA
	
	// BEGIN DETAIL
	// DETAIL 1
	$SelectBasicDetailQ = "SELECT $AreaType AS table1
		FROM zori_table_Detail_Selection
		WHERE letter_id='n'
		LIMIT 1";
	$SelectBasicDetailR = @mysqli_query($gdbc, $SelectBasicDetailQ);
	$SelectBasicDetail = mysqli_fetch_array($SelectBasicDetailR, MYSQLI_ASSOC);	
	$DetailTable1 = $SelectBasicDetail['table1'];
	if (ctype_upper($Detail1IntroSlot)) {
		$SelectDetailInOutQ = "SELECT $DetailTable1 AS blah
		FROM zori_table_Detail_InOut
		WHERE letter_id='A'
		ORDER BY in_1_out_0 DESC";
	} else if (ctype_lower($Detail1IntroSlot)) {
		$SelectDetailInOutQ = "SELECT $DetailTable1 AS blah
		FROM zori_table_Detail_InOut
		WHERE letter_id='z'
		ORDER BY in_1_out_0 DESC";
	} else {
		$SelectDetailInOutQ = "SELECT $DetailTable1 AS blah
		FROM zori_table_Detail_InOut
		WHERE letter_id='#'
		ORDER BY in_1_out_0 DESC";
	}
	$SelectDetailInOutR = @mysqli_query($gdbc, $SelectDetailInOutQ);
	
	$DetailInOut1 = array();
	while ($SelectDetailInOut = mysqli_fetch_array($SelectDetailInOutR, MYSQLI_ASSOC)) {
		$DetailInOut1[] = $SelectDetailInOut['blah'];
	}
	
	$row = strtoupper($Detail1Slot);
	if (is_numeric($row)) {
		$row = '#';
	}
	
	$SelectDetail1Q = "SELECT $DetailTable1 AS detail1
		FROM zori_table_Detail
		WHERE letter_id='$row'
		LIMIT 1";
	$SelectDetail1R = @mysqli_query($gdbc, $SelectDetail1Q);
	$SelectDetail1 = mysqli_fetch_array($SelectDetail1R, MYSQLI_ASSOC);
	
	$Detail1 = $DetailInOut1[0] . ' ' . $SelectDetail1['detail1'] . ' ' . $DetailInOut1[1];
	
	// DETAIL 2
	if (ctype_upper($Detail2IntroSlot)) {
		$SelectSecondaryDetailQ = "SELECT $AreaType AS table2
		FROM zori_table_Detail_Selection
		WHERE letter_id='A'
		LIMIT 1";
	} else if (ctype_lower($Detail2IntroSlot)) {
		$SelectSecondaryDetailQ = "SELECT $AreaType AS table2
		FROM zori_table_Detail_Selection
		WHERE letter_id='z'
		LIMIT 1";
	} else {
		$SelectSecondaryDetailQ = "SELECT $AreaType AS table2
		FROM zori_table_Detail_Selection
		WHERE letter_id='#'
		LIMIT 1";
	}
	$SelectSecondaryDetailR = @mysqli_query($gdbc, $SelectSecondaryDetailQ);
	$SelectSecondaryDetail = mysqli_fetch_array($SelectSecondaryDetailR, MYSQLI_ASSOC);
	$DetailTable2 = $SelectSecondaryDetail['table2'];
	if (ctype_upper($Detail2SelectionSlot)) {
		$SelectDetailInOutQ = "SELECT $DetailTable2 AS blah
		FROM zori_table_Detail_InOut
		WHERE letter_id='A'
		ORDER BY in_1_out_0 DESC";
	} else if (ctype_lower($Detail2SelectionSlot)) {
		$SelectDetailInOutQ = "SELECT $DetailTable2 AS blah
		FROM zori_table_Detail_InOut
		WHERE letter_id='z'
		ORDER BY in_1_out_0 DESC";
	} else {
		$SelectDetailInOutQ = "SELECT $DetailTable2 AS blah
		FROM zori_table_Detail_InOut
		WHERE letter_id='#'
		ORDER BY in_1_out_0 DESC";
	}
	$SelectDetailInOutR = @mysqli_query($gdbc, $SelectDetailInOutQ);
	
	$DetailInOut2 = array();
	while ($SelectDetailInOut = mysqli_fetch_array($SelectDetailInOutR, MYSQLI_ASSOC)) {
		$DetailInOut2[] = $SelectDetailInOut['blah'];
	}
	
	$row = strtoupper($Detail2Slot);
	if (is_numeric($row)) {
		$row = '#';
	}
	
	$SelectDetail2Q = "SELECT $DetailTable2 AS detail2
		FROM zori_table_Detail
		WHERE letter_id='$row'
		LIMIT 1";
	$SelectDetail2R = @mysqli_query($gdbc, $SelectDetail2Q);
	$SelectDetail2 = mysqli_fetch_array($SelectDetail2R, MYSQLI_ASSOC);
	
	$Detail2 = $DetailInOut2[0] . ' ' . $SelectDetail2['detail2'] . ' ' . $DetailInOut2[1];
	
	//END DETAIL
	
	// BEGIN WEATHER
	// if ($Number > 9) {
		// $Number = str_split($Number);
		// $NewNumber = 0;
		// foreach ($Number AS $k => $v) {
			// $NewNumber = $NewNumber + $v;
		// }
		// $Number = NewNumber;
	// }
	
	// if ($Number > 9) {
		// $Number = str_split($Number);
		// $NewNumber = 0;
		// foreach ($Number AS $k => $v) {
			// $NewNumber = $NewNumber + $v;
		// }
		// $Number = NewNumber;
	// }
	
	// if ($Number == 0) {
		// $Number = 10;
	// }

	if (ctype_upper($DragonStatusSlot)) {
		$SelectWeatherQ = "SELECT A AS weatherType
		FROM zori_table_Weather
		WHERE table_id='$Number'
		LIMIT 1";
	} else if (ctype_lower($DragonStatusSlot)) {
		$SelectWeatherQ = "SELECT z AS weatherType
		FROM zori_table_Weather
		WHERE table_id='$Number'
		LIMIT 1";
	} else {
		$SelectWeatherQ = "SELECT num AS weatherType
		FROM zori_table_Weather
		WHERE table_id='$Number'
		LIMIT 1";
	}
	
	//CheckMe($SelectWeatherQ);
	$SelectWeatherR = @mysqli_query($gdbc, $SelectWeatherQ);
	$SelectWeather = mysqli_fetch_array($SelectWeatherR, MYSQLI_ASSOC);
	
	$AreaWeather = $SelectWeather['weatherType'] . ' ' . $PartialArea;
	$DragonWeather = $SelectWeather['weatherType'] . ' this dragon';

	// END WEATHER
	
	if ($UpperCount > $LowerCount) {
		$Description = ucfirst(trim($Area)) . '. ' . 
		ucfirst(trim($Detail1)) . '. ' . 
		ucfirst(trim($Detail2)) . '. ' .
		ucfirst(trim($DragonWeather)) . '. ';
		
	} else if ($UpperCount < $LowerCount) {
		$Description = ucfirst(trim($Detail1)) . '. ' . 
		ucfirst(trim($Detail2)) . '. ' .
		ucfirst(trim($AreaWeather)) . '. ';
		
	} else {
		$Description = ucfirst(trim($Area)) . '. ' . 
		ucfirst(trim($Detail1)) . '. ' . 
		ucfirst(trim($Detail2)) . '. ';
	}
	
	return $Description;
}

function GenerateString () {
	$CapNum = rand (1,3);
	if ($CapNum == 1) {
		$value = rand (0,9);
	} else {
		$Alphabet = array_combine(range(1,26), range('a', 'z'));
		
		$letter = rand (1,26);
		
		if ($CapNum == 2) {
			$value = strtolower ($Alphabet[$letter]);
		} else {
			$value = strtoupper ($Alphabet[$letter]);
		}
	}
	
	return $value;
}

function GenerateAlpha () {
	$CapNum = rand (1,2);

	$Alphabet = array_combine(range(1,26), range('a', 'z'));
	
	$letter = rand (1,26);
	
	if ($CapNum == 2) {
		$value = strtolower ($Alphabet[$letter]);
	} else {
		$value = strtoupper ($Alphabet[$letter]);
	}

	return $value;
}
?>
