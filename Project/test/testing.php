<?php  
$conn = mysqli_connect("localhost", "root", "", "project");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$rooms = array(
    array(0, 0),
    array(0, 0)
);




//Checking if form submitted and updating 

if (isset($_POST['submit'])) {
sleep(50);

    // Get selected room
    $selectedRoom = $_POST['room'];
    // Update selected room in the database
    if($selectedRoom=='cone'||$selectedRoom=='ctwo'){

        $sql = "UPDATE rooms SET $selectedRoom=1 WHERE id=1";
        
    }
    elseif($selectedRoom=='cthree'){
        $sql = "UPDATE rooms SET cone=1 WHERE id=2";
    }
    else{
        $sql = "UPDATE rooms SET ctwo=1 WHERE id=2";
    }


//Loop
$updated = false;
if (mysqli_query($conn, $sql)) {
for($i=0;$i<count($rooms)&&!$updated;$i++){
    for($j=0;$j<count($rooms[$i])&&!$updated;$j++){
        if($selectedRoom =='cone'){
            $rooms[0][0]=1;
            $updated=true;
            echo 'Update Successful';
        }
        if($selectedRoom =='ctwo'){
            $rooms[0][1]=1;
            $updated=true;
            echo 'Update Successful';
        }
        if($selectedRoom =='cthree'){
            $rooms[1][0]=1;
            $updated=true;
            echo 'Update Successful';
        }
        if($selectedRoom =='cfour'){
            $rooms[1][1]=1;
            $updated=true;
            echo 'Update Successful';
        }
    }
   }

}
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Hotel Rooms</title>
</head>
<body>
<form action="" method="post">
    <h3>Select a room:</h3>

<?php  
$conn = mysqli_connect("localhost", "root", "", "project");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$data = 'Select * from rooms where id=1';
$result = mysqli_query($conn, $data);
$row1 = mysqli_fetch_assoc($result);
//Row 2
$data = 'Select * from rooms where id=2';
$result = mysqli_query($conn, $data);
$row2 = mysqli_fetch_assoc($result);

$zero0 = $row1['cone'];
$zero1 = $row1['ctwo'];
$one0 = $row2['cone'];
$one1 = $row2['ctwo'];

if($zero0==0){
    echo '<input type="radio" name="room" value="cone"> Room 1<br>';
}
else{
    echo '<h4>Sorry Room 1 is booked</h4>';
}
if($zero1==0){
    echo '<input type="radio" name="room" value="ctwo"> Room 2<br>';
}
else{
    echo '<h4>Sorry Room 2 is booked</h4>';
}
if($one0==0){
    echo '<input type="radio" name="room" value="cthree"> Room 3<br>';
}
else{
    echo '<h4>Sorry Room 3 is booked</h4>';
}
if($one1==0){
    echo '<input type="radio" name="room" value="cfour"> Room 4<br>';
}
else{
    echo '<h4>Sorry Room 4 is booked</h4>';
}
?>


    <input type="submit" name="submit" value="Submit" id="sub">
</form>

<h1 id="done"></h1>
<script>
    var submit = document.getElementById('sub');
submit.onclick = function() {
    document.getElementById('done').innerHTML='Your Room is Booked';
}
</script>
</body>
</html>