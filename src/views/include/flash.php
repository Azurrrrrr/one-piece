<?php 
    if (isset($username) && isset($email)) {
        echo "
            <div class='logged-info'>
                <p>Bonjour <b>$username</b>, votre email est <b>$email</b></p>
            </div>
        ";
    }
?>
