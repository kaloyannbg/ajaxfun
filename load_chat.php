<?php

include 'config.php';
if($_POST['message'] == '') {
    echo 'type your message';
} else {
    $query = query("INSERT INTO messages(message, time)
    VALUES('".addslashes(htmlspecialchars($_POST['message']))."', '".time()."') ");
    echo $_POST['message'];
}
