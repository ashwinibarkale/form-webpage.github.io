<?php
// Establish database connection
$db_host = 'localhost'; // Replace with your database host
$db_user = 'root'; // Replace with your database username
$db_pass = ''; // Replace with your database password
$db_name = 'user_db'; // Replace with your database name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
  die("Database connection failed: " . mysqli_connect_error());
}

// Fetch user input from form
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];

// Sanitize and validate user input
$firstName = mysqli_real_escape_string($conn, trim($firstName));
$lastName = mysqli_real_escape_string($conn, trim($lastName));
$dob = mysqli_real_escape_string($conn, trim($dob));
$gender = mysqli_real_escape_string($conn, $gender);
$telephone = mysqli_real_escape_string($conn, trim($telephone));
$email = mysqli_real_escape_string($conn, trim($email));

// Validate required fields
if (empty($firstName) || empty($dob) || empty($gender) || empty($telephone) || empty($email)) {
  echo "Error: Required fields are missing.";
  exit;
}

// Save data to the database using prepared statements
$query = "INSERT INTO users (first_name, last_name, dob, gender, telephone, email) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "ssssss", $firstName, $lastName, $dob, $gender, $telephone, $email);

if (mysqli_stmt_execute($stmt)) {
  echo "Data saved successfully!";
} else {
  echo "Error: Data could not be saved.";
}

// Close prepared statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
