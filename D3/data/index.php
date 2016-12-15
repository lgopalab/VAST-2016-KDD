<?php
ini_set('memory_limit', '1024M');
function readCSV($csvFile){
	$file_handle = fopen($csvFile, 'r');
	while (!feof($file_handle) ) {
		$line_of_text[] = fgetcsv($file_handle, 20000);
	}
	fclose($file_handle);
	return $line_of_text;
}


$csvFile = 'bldg-MC2.csv';

$csv = readCSV($csvFile);

//Code for making different CSV's

for($i=1;$i<416;$i++)
{	
	$string = NULL;
	$string .= "date,value\n";
	for($j=1;$j<4033;$j++)
	{		
		if($csv[$j][$i]!="0")
		{
			$string .= $csv[$j][0].",".round($csv[$j][$i],2)."\n";
		}		
	}
	$filename = "Parameters/".str_replace(" ","_",str_replace(":","_",trim($csv[0][$i]))).".csv";
	$myfile = fopen($filename, "w");
	fwrite($myfile, $string);
	fclose($myfile);
}


/*
for($i=1;$i<416;$i++)
{
	echo "\"".str_replace(" ","_",str_replace(":","_",trim($csv[0][$i])))."\",";

}
*/


?>
