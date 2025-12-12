#!/data/data/com.termux/files/usr/bin/php
<?php

/**
cat "/storage/emulated/0/Download/micro_bufkeyactions/v1/bufpane_the list rev1.txt" | php regex_replace.php "/\s*\"(.+?)\"/" "func ()\s{"$'\n'"\th.\1\n}" "-"
*/
if ($argc < 4) {
    echo "Usage: php regex_replace.php \"/\"<pattern>\"/\" <replacement> <subject_string>\n";
#    echo "Example: php regex_replace.php '/world/i' 'PHP CLI' 'Hello World'\n";
    echo "Example: cat bufpane_the\ list\ rev1.txt | php regex_replace.php \"/\s*\\\"(.*)/\" \$'\\n'\"\\1\" \"-\"\n";
   exit(1);
}

$pattern = $argv[1];
$replacement = $argv[2];

$convertedString = str_replace(array('\n', '\t', '\s'), array("\n", "    ", " "), $replacement);
//echo "repl:" . $convertedString;
$subject = $argv[3];

// Optional: read subject from stdin if the third argument is '-'
if ($subject === '-') {
    $subject = stream_get_contents(STDIN);
}
// og code
$lines = explode("\n", $subject);

// Optionally, remove any empty lines that might result from trailing newlines
// or multiple consecutive newlines.
$lines = array_filter($lines, 'trim'); 

//$result = preg_replace($pattern, $replacement, $subject);


//my code 
preg_match_all($pattern, $subject, $matches, PREG_OFFSET_CAPTURE);

/**
if ($result === null) {
    echo "Error: Invalid regex pattern or an error occurred during replacement.\n";
} else {*/
$i=0;

$hasCaptureGroups = preg_match_all('/\\\\(\d+)/', $convertedString, $captureGroupRefs,PREG_OFFSET_CAPTURE);//= (pref match all \\\d+).split("\\")

/**
for ($i = 0; $i < count($lines); $i++) {
    if ( $hasCaptureGroups ) {
        for($j = 0; $j < count($captureGroupRefs[0]); $j++) {
          /*if($j===0) {
             $rplc = str_replace( $captureGroupRefs[0][$j], $matches[0][0], $convertedString );
         //    echo "first rplc";
		  }else {
		//     echo $j."th rplc";
		     $rplc = str_replace( $captureGroupRefs[0][$j], $matches[0][$i], $rplc );
		  }
	    }
	 //  	echo $rplc ."\n";

	}else {
	//	echo $matches[0][$i]. "\n";
	//	print_r($captureGroupRefs);
	}
	
}*/

// print_r($captureGroupRefs);
$i=0;
foreach($lines as $line){
  print_r(
  replace_idxGroup_with_matchesZero($i++,$matches,$captureGroupRefs,$lines,$replacement));
}
// print_r($matches);
  // echo $result;


function replace_idxGroup_with_matchesZero($idx,$matches,$captureGroupRefs,$lns,$pattern) {
    $pattern = str_replace(array('\n', '\t', '\s'), array("\n", "    ", " "), $pattern);
    $rplc=$pattern;
 //  print_r($rplc);//[0]);
   // preg_match_all('/\\\\(\d+)/', $lns[$idx], $captureRefs);
  //  preg_match_all($pattern, $subject, $matches);
    for($j = 0; $j < count($matches)-1; $j++) {
   	  $rplc = str_replace($captureGroupRefs[0][$j][0], $matches[$j+1][$idx][0], $rplc);


/** echo "cg $j:". $captureGroupRefs[0][$j][0];
  echo "\n";
  echo "matches j idx:{";
  print_r($matches[$j+1][$idx]);
  */
  // $rplc);
	 // return $rplc;
	}
//	print_r($captureGroupRefs);
//		print_r($matches[$j][$idx]);

	return $rplc;
}
?>

