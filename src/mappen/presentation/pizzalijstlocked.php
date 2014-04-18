<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>Pizza</title>
        <link href="src/mappen/presentation/css/style.css" rel="stylesheet">
        <link href="src/mappen/presentation/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    </head>
    <body>
        <script src="src/mappen/presentation/bootstrap/js/bootstrap.min.js"></script>
<!--        <div class="alert alert-block">
        <header class="left">
            <div class="container-fluid ">
                <div class="row-fluid">
                    <div class="span12">
                        <a class="btn form-inline pull-left" href="nieuweklant.php">Nieuwe gebruiker</a>
                        <form method="post" action="login.php?action=login" class="form-inline pull-right">
                            Email:
                            <input type="text" name="email" value="<?php print $email; ?>" required>
                            Wachtwoord:
                            <input type="password"  name="wachtwoord" required>
                            <input class="btn" type="submit" value="login">
                        </form>
                    </div>
                </div>
            </div>
        </header> 
        </div>-->

        <div class="bs-docs-example">
            <div class="navbar navbar-inverse">
              <div class="navbar-inner">
                  <a class="brand" href="#">Pizza Joris</a>
                  <a class="btn btn-inverse pull-right nw" href="nieuweklant.php">Nieuwe gebruiker</a>
                <form method="post" action="login.php?action=login"  class="navbar-form pull-right">
                    <input type="text" name="email" value="<?php print $email; ?>" required>
                  <input type="password"  name="wachtwoord" required>
                  <button type="submit" class="btn btn-inverse">Login</button>
                </form>
                

              </div>
            </div>
          </div>

        <div class="container-fluid">                               
            <?php
            if (isset($error) && $error == "verkeerdwachtwoord") {
                ?>
                <div class="row-fluid">
                    <div class="span12">                 
                        <p class=" alert alert-error">Gebruikersnaam of wachtwoord verkeerd!</p> <?php
                    }
                    ?>
                    <?php
                    if ((isset($toegevoegd)) && $toegevoegd == true) {
                        ?>
                        <div class="row-fluid">
                            <div class="span12">                 
                                <p class=" alert alert-success">Nieuwe gebruiker toegevoegd!</p> <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p> Hallo werkt dit? </p>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span7">
                    <img class="img-rounded span12 banner" src="src/mappen/presentation/img/banner.jpg">
                </div>
                <div class="span5">
                    <h1 class="h1font">Contact</h1>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th colspan="3">
                        <h4>Pizza Joris</h4>
                        </th>
                        </tr>
                        <tr>
                            <th class="span2">
                                Adres:
                            </th>
                            <td class="span3">Pizzastraat 45 <br>
                                Gent (9000)</td>
                            <td  class="span7" rowspan="4"><img class="img-polaroid span12" src="src/mappen/presentation/img/kaart.jpg"></td>
                        </tr>
                        <tr>
                            <th>
                                Telefoon:
                            </th>
                            <td>09 123 4567</td>
                        </tr>
                        <tr>
                            <th>
                                Email:
                            </th>
                            <td><a href="mailto:pizzajoris@pizza.be" target="_top">pizzajoris@pizza.be</a></td>
                        </tr>
                        <tr>
                            <th>
                                Open:
                            </th>
                            <td>Elke dag van 17h tot 23h</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <h1 class="h1font">Menu</h1>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td class="span2"><h4>Pizza</h4></td>
                            <td class ="span6"><h4>Productnaam</h4></td>
                            <td class ="span1"><h4>Prijs</h4></td>
                            <td class ="span1"><h4>Promo</h4></td>                
                        </tr>
                        <?php
                        foreach ($pizzalijst as $pizza) {
                            ?>
                            <tr>
                                <th rowspan="2"><img class="img-polaroid span12" src="src/mappen/presentation/img/<?php print $pizza->getAfbeelding() ?>"</th>
                                <th>
                                    <?php print $pizza->getProductnaam() ?>
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
                <div class="span5">
                    <h1 class="h1font">Gastenboek</h1>

                    <?php foreach ($gastenboek as $gboek) { ?>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td>
                                        
                                        <?php print $gboek->getEmail(); ?>
                                        <small><em><?php print "(" . $gboek->getDatum() . ")" ; ?></em></small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    "<?php print $gboek->getBericht(); ?>"
                 
                                </td>
                            </tr>
                        </tbody>
                    </table> <?php } ?>
                    <form class="form-horizontal pull-right" method="post" action="gastenboek.php?action=addbericht">
                        <div class="control-group">
                            <label class="control-label">Emailadres:</label>
                            <div class="controls">
                                <input type="email" name="email" value="<?php print $email; ?>" required>
                            </div>
                        </div>   
                        <div class="control-group">
                            <label class="control-label">Bericht:</label>
                            <div class="controls">
                                <textarea name="bericht"  maxlength="146"  cols="100" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <input class="btn" type="submit" value="Bericht Verzenden">            
                            </div>
                        </div>    
                    </form>  
                </div>
            </div>
        </div>
    </body>
</html>
