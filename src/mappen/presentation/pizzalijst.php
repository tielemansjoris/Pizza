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
                <a class="btn form-inline pull-right" href="login.php?action=logout">Uitloggen</a>
                <a class="btn form-inline pull-right" href="updateklant.php">Account wijzigen</a>
                <h4 class="form-inline pull-left">Welkom <?php print $klant->getVoornaam() . " " . $klant->getNaam() ?></h4>

            </div>
        </header>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <?php
                        if (isset($verzonden) && $verzonden == true) {
                        ?>
                        <p class="alert alert-success"">Bestelling verzonden!</p> <?php
                        }
                        ?>
                <h1>Menu</h1>
                    <table class="table table-bordered table-striped">
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
                                    Pizza 
                                    <?php print $pizza->getProductnaam() ?>
                                    <a class="btn btn-small form-inline pull-right" href="winkelkar.php?action=voegtoe&productid=<?php print $pizza->getProductid() ?>">Voeg toe</a>

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
                <h1>Winkelkar</h1>
                <table class="table table-striped table-bordered">
                <tr>
                    <th class="span8">Titel</th>
                    <th class="span2">Prijs</th>
                    <th class="span2"></th>
                </tr>
                <?php
                foreach ($winkelkar as $result) {
                    $totaal += $result->getPrijs();
                    ?>
                    <tr>
                        <td>
                                <?php print($result->getProductnaam()); ?>

                        </td>
                        <td>
                            <?php print ($result->getPrijs() . " €  "); ?>
                        </td>                    
                        <th>
                            <a class="btn btn-small form-inline pull-right" href="winkelkar.php?action=verwijder&winkelkarid=<?php print($result->getWinkelkarid()); ?>">Verwijder</a>
                        </th>
                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <th>Totaal</th>
                    <td colspan="2"> <?php print $totaal ." €" ?></td>                
                </tr>
                </table>
                    <?php if (!empty($winkelkar)) { ?>
                    <a class="btn form-inline pull-right" href="checkout.php">Checkout</a>
                    <a class="btn form-inline pull-right" href="winkelkar.php?action=empty&klantid=<?php print $klant->getKlantid() ?>">Winkelkar leegmaken</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </body>
</html>