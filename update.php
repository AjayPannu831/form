<!-- update.php -->

<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require './connect.php';
    include './validation.php';

    // Get the form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Update the record in the database
    $sql = "UPDATE `stu` SET `name`='$name', `email`='$email', `phone`='$phone', `password`='$password' WHERE `id`='$id'";
    $result = mysqli_query($conn,$sql);
    if ($result) {
        
        
         // Redirect back to the table view after successful update -->
        
         echo "<script>confirm('Data updated successfully.');</script>";
         echo "<script>window.location.href='fetch_2.php';</script>";
    
    } 
    
    else {
        // Handle errors if the update fails
    
        echo "Error updating record: " . mysqli_error($conn);
    }

    
}

// If the form is not submitted or there's an error in the update, fetch the data and display the form
if (isset($_GET['id'])) {
    require './connect.php';
    include "./validation.php";

    $id = $_GET['id'];

    // Fetch the existing data for the given ID
    $sql = "SELECT * FROM `stu` WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $password = $row['password'];
    } else {
        // Handle if the record is not found
        echo "Record not found.";
        
    }

    
} else {
    // Handle if the ID is not provided in the URL
    echo "Invalid request.";
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">

    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>">
        </div>
        <button type="submit" class="btn btn-primary" >Update</button>
    </form>
</div>
</body>
</html>
