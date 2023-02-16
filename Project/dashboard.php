<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "project");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize the rooms array
$rooms = array(
    array(0, 0),
    array(0, 0)
);

// If form is submitted
if (isset($_POST['submit'])) {
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
    if (mysqli_query($conn, $sql)) {
        // Update rooms array
        switch ($selectedRoom) {
            case "cone":
                $rooms[0][0] = 1;
                break;
            case "ctwo":
                $rooms[0][1] = 1;
                break;
            case "cthree":
                $rooms[1][0] = 1;
                break;
            case "cfour":
                $rooms[1][1] = 1;
                break;
        }
        echo "Room updated successfully";
    } else {
        echo "Error updating room: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!-- Hotel room selection form -->
<form action="" method="post">
    <h3>Select a room:</h3>
    <input type="radio" name="room" value="cone"> Room 1<br>
    <input type="radio" name="room" value="ctwo"> Room 2<br>
    <input type="radio" name="room" value="cthree"> Room 3<br>
    <input type="radio" name="room" value="cfour"> Room 4<br><br>
    <input type="submit" name="submit" value="Submit">
</form>
