// maakt eerst een lege container aan daar komt later de coden in

function showLogin(view){
    const container = Document.getElementById('form-container');
    container.innerHTML='';
    // maakt en lege container en nu kies p basis van input de goeden container
if(view == 'login'){
    container.innerHTML = `
      <form method="post" action="../adminPages/login.php" class="login">
                <div class="login-veld">
                    <label for="email">E-MAILADRES</label>
                    <input type="email" name="email" placeholder="naam@voorbeeld.com">
                </div>

                <div class="login-veld">
                    <label for="wachtwoord">WACHTWOORD</label>
                    <input type="password" name="password" placeholder="I dunno">
                </div>

                <input type="submit" value="INLOGGEN" class="login-btn">

                <div class="login-footer">
                    <input type="submit" value="Wachtwoord Vergeten?" class="btn black">
                    <input type="submit" value="Nog geen account?" class="btn red">
                </div>
            </form>
    
    `;
}


}