
<?php
header('Content-type: application/json');

		test_function();
		function test_function(){
		//$return = $_POST;
	
		if(!empty($_GET['strAddr'])&&!empty($_GET['city'])&&!empty($_GET['state'])&&!empty($_GET['temperature']))
			{	
				$addrs=urlencode($_GET['strAddr']);
				$city=urlencode($_GET['city']);
				$state=urlencode($_GET['state']);
				$degree=$_GET['temperature'];
				//echo "https://maps.google.com/maps/api/geocode/xml?address=".$addrs.",".$city.",".$state."&key=AIzaSyAGmGeW3ReonNiDCXE5pEw3kNW52J9VntI";
				$GoogleXMLFile = @simplexml_load_file("https://maps.google.com/maps/api/geocode/xml?address=".$addrs.",".$city.",".$state."&key=AIzaSyDXJc-HfeU4ZVttzpruI8Q04ZZtzqv4-is") or die("<script>alert('Unable to get XML for Location');</script>");
				$LocArray=GetLocationfromXML($GoogleXMLFile);
				$ApiUrl="https://api.forecast.io/forecast/e0233df5fb8a3299a02c55c843c4d5dd/".$LocArray[0].",".$LocArray[1]."?units=".$degree."&exclude=flag";
				$JSON_File=file_get_contents($ApiUrl);
				$JSON_Obj=json_decode($JSON_File, true);
				//$return["json"] = json_decode($JSON_File, true);
				
				echo json_encode($JSON_Obj);
			}
		
		}
		function GetLocationfromXML($GoogleXMLFile)
	{
		if(strcmp($GoogleXMLFile->xpath("/GeocodeResponse/status")[0],"OK")==0)
		{
			
			$LatArr=Array();
			$LngArr=Array();
			$LatArr=$GoogleXMLFile->xpath("/GeocodeResponse/result/geometry/location/lat");
			$LngArr=$GoogleXMLFile->xpath("/GeocodeResponse/result/geometry/location/lng");
			$LocArray=Array(2);
			$LocArray[0]=$LatArr[0];
			$LocArray[1]=$LngArr[0];
			return $LocArray;
		}
		else
		{
			die  ("Invalid Location.\\nNo data available for the location.");
			
		}
	}
?>