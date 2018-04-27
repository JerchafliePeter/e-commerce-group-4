<?php
    //get data from sign-up page
    $emailFull = $_POST[email];
    $userName = $_POST[uName];
    $pWord = $_POST[password];
    $pMatch = $_POST[passMatch];

    if (!$emailFull || !$userName || !$pWord || !$pMatch)
    {
        echo "<p>You have not entered all the required information.</p>";
        exit;
    }

    if ($pWord != $pMatch)
    {
        echo "<p>Password and Confirmation do not match.</p>";
        exit;
    }



?>