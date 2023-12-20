<!DOCTYPE html>
<html>

<head>
  <!-- Add Bootstrap CSS link here -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
    <table class="table table-bordered table-success">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Password</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require './connect.php';
        $sql = 'SELECT * FROM `stu`';
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result)) {
        ?>
            <tr>
              <th scope="row">
                <?php echo $row['id'] ?>
              </th>
              <td><?php echo $row['name'] ?></td>
              <td><?php echo $row['email'] ?></td>
              <td><?php echo $row['phone'] ?></td>
              <td><?php echo $row['password'] ?></td>
              <td>
                <a href="record.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View</a>
              </td>

            </tr>
        <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>



</body>

</html>