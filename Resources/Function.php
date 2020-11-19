<?php
    function CheckName($Connect){
		$Name = file_get_contents('http://names.drycodes.com/1?nameOptions=funnyWords&format=text');

		$result = mysqli_query($Connect, "SELECT * FROM urls WHERE Name='$Name'");
		$Count = $result->num_rows;

		if($Count==0) return $Name;
		else CheckName($Connect);
	}

	function GenerateCode($Connect){
        while(true){    
            $code = "";
            for($i=0;$i<8;$i++){
                $tab = array("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e");
                $code .= $tab[array_rand($tab)];
			}
			
            $count = mysqli_query($Connect, "SELECT COUNT(*) FROM urls WHERE Link='$code'");
            $count = $count->fetch_assoc();
            $count = $count['COUNT(*)'];
            if($count == 0) break;
            else continue;
        }
        return $code;
    }
?>