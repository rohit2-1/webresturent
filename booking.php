<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Simple Static Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Georgia', serif;
      background: url('scrappaper.jpg') no-repeat center center fixed;
      background-size: cover;
      color: #333;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
  .close-btn {
  position: fixed;
  top: 20px;
  right: 30px;
  font-size: 28px;
  margin-right: 40px;
  margin-top: 30px;
  color: #fffcfc;
  text-decoration: none;
  background: #000000;
  padding: 6px 12px;
  border-radius: 60%;
  box-shadow: 0 2px 6px rgba(0,0,0,0.3);
  z-index: 999;
  transition: transform 0.3s;
}

.close-btn:hover {
  transform: scale(1.3);
  background-color: #e42e2e;
}


    .form-container {
      background-color: white;
      width: 100%;
      max-width: 400px;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }


    h1 {
      text-align: center;
      font-size: 32px;
      margin-bottom: 25px;
      color: #2c2c2c;
    }

    label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="tel"],
    input[type="email"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .button-group {
      display: flex;
      justify-content: center;
    }

    button {
      padding: 10px 25px;
      border: none;
      border-radius: 5px;
      color: white;
      font-size: 16px;
      cursor: pointer;
    }

    .login-btn {
      background-color: #e42e2e;
    }

    button:hover {
      opacity: 0.9;
    }
  </style>
</head>
<body>

  <a href="projectweb.html" class="close-btn" aria-label="Close & go home">
    <i class="fas fa-times"></i>
  </a>

  <div class="form-container">
    <h1>Book</h1>
    <form method="post" action="">
      <label for="name">Name</label>
      <input type="text" id="name" name="Name" placeholder="Your name" required />

      <label for="phone">PhoneNumber</label>
      <input type="tel" id="phone" name="PhoneNumber" placeholder="Your phone number" required />

      <label for="email">Email Address</label>
      <input type="email" id="email" name="Email" placeholder="Your email" required />

      <div class="button-group">
        <button type="submit" name="sb" class="login-btn">Book</button>
      </div>
    </form>
  </div>

  <?php
  // Connect to MySQL
  $con = mysqli_connect("localhost", "root", "", "Book_Resturent");

  if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }

  if (isset($_POST['sb'])) {
    $Name = $_POST['Name'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $Email = $_POST['Email'];

    $query = "INSERT INTO book (Name, PhoneNumber, Email) VALUES ('$Name', '$PhoneNumber', '$Email')";
    $execute = mysqli_query($con, $query);

    if ($execute) {
      echo "<p style='color: green;'>✅ Booking successful!</p>";
    } else {
      echo "<p style='color: red;'>❌ Error: " . mysqli_error($con) . "</p>";
    }
  }

  mysqli_close($con);
  ?>
</body>
</html>