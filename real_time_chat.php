<?php

include 'config.php';


$query = query("SELECT * FROM messages");
while ($row = mysqli_fetch_assoc($query)) {
    echo '<p>[ '.date("m/d/y, H:i:s", $row['time']) . ' ] ' .$row['message'] . '</p>';
}
