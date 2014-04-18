<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>Pizza</title>
        <link href="src/mappen/presentation/css/style.css" rel="stylesheet">
        <link href="src/mappen/presentation/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <script src="src/mappen/presentation/bootstrap/js/bootstrap.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        
        
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
<!--        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
            <div class="container">
                <ul class=""nav navbar-nav navbar-right">
                    <li><a href = "#">Home</a></li>
            </ul>
            </div>
            </div>
        </div>-->
        
        <div class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar/">Default</a></li>
            <li class="active"><a href="./">Static top</a></li>
            <li><a href="../navbar-fixed-top/">Fixed top</a></li>
          </ul>
        </div><!--/.nav-collapse -->
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

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span7">
                    <img class="img-rounded span12" src="src/mappen/presentation/img/banner.jpg">
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