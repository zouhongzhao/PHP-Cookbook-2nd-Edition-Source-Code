$name   = 'Rasmus Lerdorf';
$db     = mysqli_connect();
$result = mysqli_query($db, "SELECT email FROM users 
                            WHERE name  LIKE '$name'");
$row    = mysqli_fetch_assoc($db, $r);
$email  = $row['email'];