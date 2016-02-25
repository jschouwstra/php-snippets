<?php
function Connect(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "movie-theatre";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
function showSeats($seats){
    echo "<div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-6\">
                <p>
                ";
                    
                    $showSeats = $seats;
                    foreach($showSeats as $seat){
                        if($seat['seatAvailable'] == '1'){
                            echo "<span style=\"background-color:green; border:1px solid black; margin:2px; padding:4px; width: 4px;\">".$seat['seatNumber']."</span>";
                        }
                        elseif($seat['seatAvailable'] == '0'){
                            echo "<span style=\"background-color:red; border:1px solid black; margin:2px; padding:4px; width: 4px;\">".$seat['seatNumber']."</span>";
                        }
                        else{
                            echo "<span style=\"background-color:yellow; border:1px dashed black; margin:2px; padding:4px; width: 4px;\">".$seat['seatNumber']."</span>";
                        }
                    }
        echo "  </p>
                </div>
            </div>
        </div>";
}
function suggestSeats($seats,$visitors){
    //Declare temporary version of $visitors so the value won't change during "subtraction"
    $visitorsToProcess = $visitors;
    foreach($seats as &$val){
        //If available
        if($val['seatAvailable'] == 1){
            //If there's no gap, start making one now:
            if($gap<1){
                $gap = 1;
            }
            $gap++;
            //IF THERE ARE STILL VISITORS TO PROCESS, MARK THE SUGGESTED SEAT
            if($visitorsToProcess > 0) {
                $val['seatAvailable'] = 'x';

                //Subtract until there are no more visitors left.
                $visitorsToProcess--;
            }
        }
        //IF THERE ARE NO MORE VISITORS, EXIT LOOP
        if($visitorsToProcess == 0) {
            break;
        }
    }
    //echo "gap: ".$gap;
    //echo $visitors;
    //If the visitors fit in gap
    if($visitors<$gap){
        //echo $gap;
        $result = $seats;
    }
    //If the visitors can't fit in the gap of available seats.
    else{
        $result = null;
    }

    return $result;
}
function clearTableSeats(){
        $conn = Connect();
        $sql = "TRUNCATE TABLE seats";
        mysqli_query($conn,$sql);
}

function saveSeats($seats){
    clearTableSeats();    
    $conn = Connect();
    if($seats){
    foreach($seats as $seat){
        $seatAvailable = $seat['seatAvailable'];
        if($seatAvailable == 'x'){
            $seatAvailable = 0;
        }
        $seatNumber = $seat['seatNumber'];
        $sql = "INSERT INTO seats 
        (seatAvailable,seatNumber)
        VALUES 
        ($seatAvailable,$seatNumber)";

        $conn->query($sql);
    }
    $conn->close();
    }
}

function layoutAlert($alertType,$message) {
// $alertType "succes", "danger"    
echo "
<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-md-6\">
        <p>
        <div class=\"alert alert-".$alertType."\">".$message."</div>
        </p>
        </div
    </div>
</div> 
";
}

function layoutHeader($header,$content){

echo "
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-6\">
                <h2>".$header."</h2>
            </div>
        </div>        
        <div class=\"row\">
            <div class=\"col-md-6\">
                <p>".$content."</p>
            </div>
        </div>
    </div>   
";
}
?>