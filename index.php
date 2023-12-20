

<!-- Your HTML form -->
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>form_validation</title>
</head>
<!-- ... -->
<body>
    <!-- ... -->
    <div class="container">
    <?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require './connect.php';
    // Initialize an array to store validation errors
//    include './validation.php';

    // If there are no validation errors, process the form data further
    if (empty($errors)) {
        // Perform additional actions (e.g., save data to the database)
        // Here, you can access the form data using $_POST["name"], $_POST["email"], etc.
        // For example:
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $file = $_POST['file'];

        // Add your logic to handle the form data accordingly
        // ...

        // Construct the SQL query directly with the user input
        $sql = "INSERT INTO `stu`(`name`, `email`, `phone`, `password` ) VALUES ('$name', '$email', '$phone', '$password')";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo 'data error' . mysqli_error($conn);

        } else {
            
            echo "<script>confirm('Data entered successfully.');</script>";
            echo '<script>window.location.href="fetch_2.php";</script>';
        }

        // Redirect to a success page or display a success message

    }

}
?>
        <form method="post" action="" enctype="multipart/form-data">
            <!-- Name Input -->
            <div class="mb-3 mt-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" >
                <?php if (isset($errors["name"])) echo "<p class='text-danger'>" . $errors["name"] . "</p>"; ?>
            </div>

            <!-- Email Input -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                <?php if (isset($errors["email"])){ echo "<p class='text-danger'>" . $errors["email"] . "</p>"; }?>
            </div>

            <!-- Phone Input -->
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>">
                <?php if (isset($errors["phone"])) echo "<p class='text-danger'>" . $errors["phone"] . "</p>"; ?>
            </div>

            <!-- Password Input -->
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" >
                <?php if (isset($errors["password"])) echo "<p class='text-danger'>" . $errors["password"] . "</p>"; ?>
            </div>
            <div class="mb-3">
                <!-- <label class="form-label">Choose</label> -->
                <input type="file" class="form-control" name="file" >
                
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form><br>

      
        
    </div>
    <!-- ... -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
<!-- ... -->
</html>
