<?php 

if (isset($_COOKIE['username']) && isset($_COOKIE['email'])) {
    $username = $_COOKIE['username'];
    $email = $_COOKIE['email'];
}

?>

<header>
    <a href="./">
        <img src="./public/assets/images/logo.png" alt="logo">
    </a>
    <nav>
        <button title="burger-button">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <ul>
            <li><a href="./" class="underline-animation">Accueil</a></li>
            <li><a href="./equipage" class="underline-animation">L'équipage</a></li>
            <li><a href="./arcs" class="underline-animation">Arcs</a></li>
            <li><a href="./primes" class="underline-animation">Primes</a></li>

            <?php 
                if (isset($username) && isset($email)) {
                    echo "<li><a href='./src/controllers/logout' class='underline-animation'>Logout</a></li>";
                } else {
                    echo "<li><a href='./login' class='underline-animation'>Login</a></li>";
                }
            ?>
        </ul>
    </nav>
</header>

