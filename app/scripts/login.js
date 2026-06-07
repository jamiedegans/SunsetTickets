// maakt eerst een lege container aan daar komt later de coden in

function showLogin(view) {
    const container = document.getElementById('form-container');
    container.innerHTML = '';
    // maakt en lege container en nu kies p basis van input de goeden container
if (view == 'login') {
    container.innerHTML = `
        <form method="post" action="../adminPages/login.php" class="login">
            <div class="login-veld">
                <label>E-MAILADRES</label>
                <input type="email" name="email" placeholder="naam@voorbeeld.com">
            </div>

            <div class="login-veld">
                <label>WACHTWOORD</label>
                <input type="password" name="password" placeholder="wachtwoord">
            </div>

            <input type="submit" name="submit" value="INLOGGEN" class="login-btn">

            <div class="login-footer">
                <button type="button" onclick="showLogin('fergot')" class="btn black">Wachtwoord Vergeten?</button>
                <button type="button" onclick="showLogin('make')" class="btn red">Nog geen account?</button>
            </div>
        </form>
    `;
}
    if (view == 'make') {
        container.innerHTML = `
         <form method="post" action="../adminPages/login.php" class="login">

            <h2> Account Aanmaken</h2>
               <div class="login-veld">
                    <label for="text">VOORNAAM</label>
                    <input type="text" name="voornaam" placeholder="Jan">
                </div>

                   <div class="login-veld">
                    <label for="text">ACHTERNAAM</label>
                    <input type="text" name="achternaam" placeholder="Jansen">
                </div>

            
                <div class="login-veld">
                    <label for="text">E-MAIL</label>
                    <input type="email" name="email" placeholder="naam@voorbeeld.com">
                </div>


                <div class="login-veld">
                    <label for="wachtwoord">WACHTWOORD</label>
                    <input type="password" name="password" placeholder="I dunno">
                </div>
                
            <button class="btn red" onclick="showLogin('login')">Terug</button>
        </form>

        `;
    }

        if (view == 'fergot') {
        container.innerHTML = `

        <form method="post" action="../adminPages/login.php" class="login">
            <div div class="login-veld" >
                    <label for="text">E-MAIL</label>
                    <input type="email" name="email" placeholder="naam@voorbeeld.com">
                </div>
                <button class="btn red onclick="showLogin('login')">Terug</button>
         </form>
        `;
        }


}//end
