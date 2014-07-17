<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Administration</title>

<style>
    

    tr:nth-child(odd)  {    /* to color odd rows of a table */
background:#ccc;
}    

tr:nth-child(even)  {    /* to color odd rows of a table */
background:#99ffff;
}    

td {
    padding:5px;
}
    
</style>
</head>
   
<body>
    <h2 style="margin-bottom:0px;">Change Event Name</h2> 
    <form action="admin.php" method="POST">
        <input type="hidden" name="eventn" value="eventn">
        <table>
            <tr><td>Event Name:</td><td><input type="text" name="eventname" value="<?php 
            require ('connect_db.php');
            $query_event = "SELECT eventname FROM eventname";
            $event_result = mysqli_query($con, $query_event); 
    
            while($row3 = mysqli_fetch_array($event_result, MYSQLI_ASSOC)){
        
            $eventname = $row3['eventname'];

            echo $eventname;
            
            }
            ?>
            
            
            " size="50"></td></tr>    
            <tr><td colspan="2"><input type="submit" value="submit" name="Change"></td></tr>
        </table>
    </form>
 
<?php
    require ('connect_db.php');
    if (isset($_POST['eventname'])) {
        
        
        if ($_POST['eventname'] != ""){
            
            $query_event = "SELECT eventname FROM eventname";
            $event_result = mysqli_query($con, $query_event); 
    
            while($row3 = mysqli_fetch_array($event_result, MYSQLI_ASSOC)){
        
            $eventname = $row3['eventname'];

            $ename = $_POST['eventname'];

            //note don't name the table and column the same next time for better understanding 
            $query_newevent = "UPDATE eventname SET eventname='$ename'";
            mysqli_query($con, $query_newevent);
            echo "Event name is now: $ename";
            header("Location: admin.php");
            } 
        } else {           
                echo "You must enter an event name.";
               }                           
    } else {
        //echo "failed to update";
    }        
?> 
    



   <?php
    require ('connect_db.php');

    $query_max = "SELECT maxres FROM maxreservations";
            $max_result = mysqli_query($con, $query_max); 
    
            while($row4 = mysqli_fetch_array($max_result, MYSQLI_ASSOC)){
        
            $maxres = $row4['maxres'];

            $max = $maxres;         
          
            echo "<h2 style=\"margin-bottom:0px;\">Change Max Number of Reservations ($max)</h2>";
            
            
            }

   ?>


    <form action="admin.php" method="POST">
        <input type="hidden" name="maxr" value="maxr">
        <table>
            <tr><td>Reservations Max:</td><td><input type="text" name="maxres" value="" size="5"></td></tr>    
            <tr><td colspan="2"><input type="submit" value="submit" name="Change"></td></tr>
        </table>
    </form>    
    
   <?php
    require ('connect_db.php');
    if (isset($_POST['maxres'])) {
        
        
        if ($_POST['maxres'] != ""){
            
            $query_max = "SELECT maxres FROM maxreservations";
            $max_result = mysqli_query($con, $query_max); 
    
            while($row4 = mysqli_fetch_array($max_result, MYSQLI_ASSOC)){
        
            $maxres = $row4['maxres'];

            $max = $_POST['maxres'];

            //note don't name the table and column the same next time for better understanding 
            $query_maxres = "UPDATE maxreservations SET maxres='$max'";
            mysqli_query($con, $query_maxres);
            echo "Max reservations is now: $max";
            header("Location: reservations.php");
            } 
        } else {           
                echo "You must enter a max number.";
               }                           
    } else {
        //echo "failed to update";
    }        
?>  
        
    <form method="POST" action="admin.php">
        <input type="hidden" name="bydate" value="bydate">
            <h2 style="margin-bottom:0px;">View Reservations Made by Date</h2> 
        <table>    
            <tr><td>
                <select name="month">
                    <option>Month</option>
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
                </select></td></tr>
            <tr><td>
                <select name="date">
                    <option>Date</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>

                </select></td></tr>

            <tr>
              <td colspan="2" style="text-align:center;"><input type="submit" name="button" id="button" value="Submit" /></td>
              </tr> 
        </table>    

        
            </form> <br>
    
  
        
       
<?php

require ('connect_db.php');

if (isset($_POST['bydate'])){
    
    $month = $_POST['month'];
    $date = $_POST['date'];
    
    $query_date = "SELECT * FROM form WHERE month=\"$month\" AND date=\"$date\"";
    $date_result = mysqli_query($con, $query_date);
    
    if ($date_result) {
    
    echo "<h2 style=\"margin-bottom:0px;\">Reservations for $month $date</h2>";
    echo '<table width="100%">';
 
       
    while($row2 = mysqli_fetch_array($date_result, MYSQLI_ASSOC)){

    echo '<tr><td><form method="GET" action="admin.php"><input type="hidden" name="theid" value="'.$row2['formid'].'"><input type="submit" name="delete" value="Delete"> </form></td><td>'.$row2['formid'].'</td><td>'.$row2['firstname'].'</td><td>'. $row2['lastname'].'</td><td>'. $row2['phonenumber'].'</td><td>'. $row2['partysize'].'</td><td>'. $row2['partyname'].'</td><td>'. $row2['parkingpasses'].'</td><td>'. '<a href="mailto:'.$row2['email'].'">'.$row2['email'].'</a></td><td>'. $row2['month'].'</td><td>'. $row2['date'].'</td></tr>';
        }
    } else {
      echo 'cant get query';
}

echo '</table><a name="table"><br><br>';
    
}



/////////// display all
  
$query = 'SELECT * FROM form';
$result = mysqli_query($con, $query);

if ($result) {
    
    echo "<h2 style=\"margin-bottom:0px; display:inline;\">Current Reservations Made</h2>";
 //   echo '<span style="margin-bottom:0px; color:#000; margin-left:35px; font-weight:800;"><a href=\"admin.php\"><span style="margin-bottom:0px; color:red; margin-left:25px; font-weight:800;">Refresh List</span></a></span>';
    
    echo '<table width="100%">';
    
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

    echo '<tr><td><form method="GET" action="admin.php"><input type="hidden" name="theid" value="'.$row['formid'].'"><input type="submit" name="delete" value="Delete"> </form></td><td>'.$row['formid'].'</td><td>'.$row['firstname'].'</td><td>'. $row['lastname'].'</td><td>'. $row['phonenumber'].'</td><td>'. $row['partysize'].'</td><td>'. $row['partyname'].'</td><td>'. $row['parkingpasses'].'</td><td>'. '<a href="mailto:'.$row['email'].'">'.$row['email'].'</a></td><td>'. $row['month'].'</td><td>'. $row['date'].'</td></tr>';
    
  }
  } else {
    echo 'cant get query';
}

echo '</table><a name="table">';

if (isset($_GET['theid'])) {
      
      $prodid = $_GET['theid'];
      $query2 = "DELETE FROM form WHERE formid=\"$prodid\"";
      $result2 = mysqli_query($con, $query2);
      if ($result2)
      {
        
        echo "<h2 style=\"margin-bottom:0px;\">Reservation: $prodid deleted |<a href=\"admin.php\"><span style=\"margin-bottom:0px; color:red; margin-left:8px; font-weight:800;\">Refresh List</span></a></h2>\n";
     
      } else {
         echo "<h2 style=\"margin-bottom:0px;\">Problem deleting $prodid</h2>\n";     
      }
   }

   ?>
      
</body>
</html>