 <?php
$servername = "localhost"; //if using remote change here
$username = YOUR USERNAME HERE;
$password = YOUR PASSWORD HERE;
$dbname = YOUR DB NAME HERE;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//get the URL parameter
$id = $_GET["id"];

$sql = "SELECT * from items where item_id=" . $id . ";";

//query the database
$result = $conn->query($sql);

//open log file to append to
$fp = fopen("mylog.txt", 'a');//opens file in append mode

if ($result->num_rows > 0) {
  //log results to log file
  while($row = $result->fetch_assoc()) {
    fwrite($fp, "Item: " . $row["item_name"]. " - Price: $" . $row["item_price"]. "\n");
  }
  echo "data logged";
}

fclose($fp);
$conn->close();
?> 
