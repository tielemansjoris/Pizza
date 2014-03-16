<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>Pizza</title>
        <link href="src/mappen/presentation/css/style.css" rel="stylesheet">
        <link href="src/mappen/presentation/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <script src="src/mappen/presentation/bootstrap/js/bootstrap.min.js"></script>

        <header class="alert alert-block">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <a class="btn form-inline pull-left" href="nieuweklant.php">Nieuwe gebruiker</a>
                        <form method="post" action="login.php?action=login" class="form-inline pull-right">
                            Email:
                            <input type="text" name="email" value="<?php print $email;?>" required>
                            Wachtwoord:
                            <input type="password"  name="wachtwoord" required>
                            <input class="btn" type="submit" value="login">
                        </form>
                    </div>
                </div>
            </div>
        </header>       
                 
        <div class="container-fluid">                               
                <?php
                if (isset($error) && $error == "verkeerdwachtwoord") {
                ?>
                <div class="row-fluid">
                    <div class="span12">                 
                        <p class=" alert alert-error">Gebruikersnaam of wachtwoord verkeerd!</p> <?php
                        }
                        ?>
                    </div>
                </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <h1>Menu</h1>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td class ="span8"><h4>Productnaam<h4></td>
                            <td class ="span2"><h4>prijs</h4></td>
                            <td class ="span2"><h4>promoprijs</h4></td>                
                        </tr>
                        <?php
                        foreach ($pizzalijst as $pizza) {
                            ?>
                            <tr>
                                <th>
                                    Pizza <?php print $pizza->getProductnaam() ?>
                                </th>
                                <td>
                                    <?php print $pizza->getPrijs() . " €" ?>
                                </td>                    
                                <td>
                                    <?php print $pizza->getPromoprijs() . " €" ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    Ingrediënten:  
                                    <?php print $pizza->getProductomschrijving() ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table> 
                </div>
            </div>
            <div class="row-fluid">
                <div class="span7">
                    <div class="hero-unit">
                        <h1>Welkom bij Pizza Joris!</h1>
                        <p>                            
                            De lekkerste & de snelste! Kwaliteit, versheid en klanttevredenheid. 
                            Dat zijn de basisprincipes bij Pizza Joris. Deze doelen mogen dan niet revolutionair zijn, maar enkel
                            wanneer de uitvoering ervan consistent gebeurt, kunnen klanten de zaak verlaten met de best mogelijke pizza.
                            De ingrediënten, het personeel en de diensten zijn van de bovenste plank.
                        </p>
                      </div>
                </div>
            </div>
        </div>
    </body>
</html>