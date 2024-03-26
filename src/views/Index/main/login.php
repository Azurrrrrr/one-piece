<main>
    <form action="./src/controllers/login" method="POST">
        <h2>Vous avez déjà un compte :</h2>
        <label>
            <span>Nom d'utilisateur</span>
            <input type="text" name="username" required>
        </label>
        <small class="error"><?php if (isset($_GET["error-username"])) echo $_GET["error-username"]; ?></small>

        <label>
            <span>Mot de passe</span>
            <input class="password-input" type="password" name="password" required>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1000 1000">
                <path d="M500,188.2C229.4,188.2,10,410.9,10,500c0,89.1,219.4,311.8,490,311.8c270.6,0,490-222.7,490-311.8S770.6,188.2,500,188.2z M500,722.7c-123,0-222.7-99.7-222.7-222.7c0-123,99.7-222.7,222.7-222.7c123,0,222.7,99.7,222.7,222.7C722.7,623,623,722.7,500,722.7z"/><path d="M500,345.3c-85.4,0-154.7,69.3-154.7,154.7c0,85.4,69.3,154.7,154.7,154.7c85.4,0,154.7-69.2,154.7-154.7C654.7,414.6,585.4,345.3,500,345.3z"/>
                <line x1="950" x2="100" y1="200" y2="800"/>
            </svg>
        </label>
        <small class="error"><?php if (isset($_GET["error-password"])) echo $_GET["error-password"]; ?></small>
        
        <button type="submit">Se connecter</button>


        <a href="./register">Créer un compte</a>
    </form>
</main>
