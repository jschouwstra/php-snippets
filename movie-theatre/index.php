<?php
error_reporting(E_ALL & ~E_NOTICE);
        $seats = array(
            array(
                'seatAvailable' => '0',
                'seatNumber' => '1'
            ),        
            array(
                'seatAvailable' => '0',
                'seatNumber' => '2'
            ),        
            array(
                'seatAvailable' => '1',
                'seatNumber' => '3'
            ),        
            array(
                'seatAvailable' => '1',
                'seatNumber' => '4'
            ),        
            array(
                'seatAvailable' => '1',
                'seatNumber' => '5'
            ),      
            array(
                'seatAvailable' => '0',
                'seatNumber' => '6'
            ),        
            array(
                'seatAvailable' => '0',
                'seatNumber' => '7'
            ),        
            array(
                'seatAvailable' => '1',
                'seatNumber' => '8'
            ),        
            array(
                'seatAvailable' => '1',
                'seatNumber' => '9'
            ),        
            array(
                'seatAvailable' => '1',
                'seatNumber' => '10'
            ),              
        );
        include "functions.php";
?>
<html>
<head>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
        layoutHeader("Bestel uw tickets","");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Aantal tickets:</label> 
                    <form name="TicketReservation" method="post">
                        <p><input name="visitors" type="text" value="<?php if(isset($_POST['visitors'])){echo $_POST['visitors'];}else{echo 0;}?>" class="form-control">
                        </p>
                        <p><input name="submitTicketOrder" type="submit" value="Reserveer Plaatsen" class="form-control"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    layoutHeader("Beschikbaarheid stoelen","Deze stoelen zijn nog beschikbaar.");
    showSeats($seats);
    if(isset($_POST['submitTicketOrder'])){
        $visitors = $_POST['visitors'];    
        if($visitors){
            $gap = 0;
            $seats = (suggestSeats($seats,$visitors));
            if(!$seats){
                layoutAlert("danger","Sorry, niet genoeg zitplaatsen.");
            }
            else{
                layoutHeader("Uw reservering","Deze stoelen worden u aangeboden.");
                showSeats($seats);
                layoutAlert("success","Opgeslagen in de database.");
                //The arrangements are being saved
                saveSeats($seats); 
            }
        }
        else{
            layoutAlert("danger","Gelieve een aantal tickets in te voeren.");
        }
      
    }
    ?>
</body>
</html>