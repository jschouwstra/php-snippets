<html>
<head>
    <title></title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Bestel uw tickets</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Aantal tickets:</label> 
                    <form method="post">
                        <p><input name="visitors" type="text" value="<?php if(isset($_POST['visitors'])){echo $_POST['visitors'];}else{echo 0;}?>" class="form-control">
                        </p>
                        <p><input name="submitTicketOrder" type="submit" value="Reserveer Plaatsen" class="form-control"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php

if(isset($_POST['submitTicketOrder'])){
    $visitors = $_POST['visitors'];    
    if($visitors){
      error_reporting(E_ALL & ~E_NOTICE);
        $gap = 0;
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
        $seats = (suggestSeats($seats,$visitors));
        if(!$seats){
            echo "
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-md-6\">
                    <p>
                    <div class=\"alert alert-danger\">Sorry, niet genoeg zitplaatsen.</div>
                    </p>
                    </div
                </div>
            </div> 
            ";
        }else{
            showSeats($seats);
        
        ?>
     <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>
                <div class="form-group">
                    <label>Opslaan in database?</label> 
                    <form method="post">
                        <p><input name="submitSaveSeats" type="submit" value="Nu Opslaan" class="form-control"></p>
                    </form>
                </div>
                </p>
            </div>
        </div>
    </div>
        <?php
        if(isset($_POST['submitSaveSeats'])){
            saveSeats($seats); 
            echo "opslaan geklikt";
        }
    }

    }
    else{
        echo "
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-6\">
                <p>
                <div class=\"alert alert-danger\">Gelieve een aantal tickets in te voeren.</div>
                </p>
                </div
            </div>
        </div> 
        ";
    }
  
}


?>
</body>
</html>