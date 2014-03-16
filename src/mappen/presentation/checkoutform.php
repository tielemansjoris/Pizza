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
                <a class="btn form-inline pull-right" href="index.php">Back</a>
            </div>
        </header>
       
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
            <h1>Winkelkar</h1>
            <table class="table table-striped table-bordered">
            <tr>
                <th class ="span9">Titel</th>
                <th class ="span2">prijs</th>
                <th class ="span1"></th> 
            </tr>
            <?php
            foreach ($winkelkar as $result) {
                ?>
                <tr>
                    <td>
                            <?php print($result->getProductnaam()); ?>

                    </td>
                    <td>
                        <?php print ($result->getPrijs() . " €  "); ?>
                    </td> 
                    <th>
                        <a class="btn btn-small form-inline pull-right" href="checkout.php?action=verwijder&winkelkarid=
                           <?php print($result->getWinkelkarid()); ?>">Verwijder</a>
                    </th>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td></td>                
                <td>Totaal: <?php print $totaal ." €" ?></td>
                <th></th>
            </tr>
            </table>
            </div>
            </div>
            <div class="row-fluid">
        <div class="span6 pull-left">    
        <a class="btn" href="winkelkar.php?action=empty&klantid=<?php print $klant->getKlantid() ?>">Winkelkar leegmaken</a>
            </div>
            <div class="span6">
        <form class="form-horizontal pull-right" method="post" action="checkout.php?action=checkout">
            <div class="control-group">
                <label class="control-label">Opmerkingen</label>
                <div class="controls">
                    <textarea name="extra" rows=""></textarea>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
            <input class="btn" type="submit" value="Bestelling Verzenden">            
                </div>
            </div>    
        </form>
                
            </div>
            </div>
            <div class="row-fluid">
                <div class="span4">
            <h1>Klantinformatie</h1>
            <table class="table table-bordered">
                <tr>
                    <th class ="span2">Voornaam:</th>
                    <td class ="span4"><?php print $klant->getVoornaam(); ?>
                </tr>
                <tr>
                    <th>Familienaam:</th>
                    <td><?php print $klant->getNaam(); ?>
                </tr>
                <tr>
                    <th>Adres:</th>
                    <td><?php print $klant->getAdres(); ?>
                </tr>
                <tr>
                    <th>Postcode:</th>
                    <td><?php print $klant->getPostcode()->getPostcode(); ?>
                </tr>
                <tr>
                    <th>Gemeente:</th>
                    <td><?php print $klant->getPostcode()->getGemeente(); ?>
                </tr>
                <tr>
                    <th>Telefoon:</th>
                    <td><?php print $klant->getTelefoon(); ?>
                </tr>                
                <tr>
                    <th>Promo:</th>
                    <td><?php 
                    if ($klant->getPromo() == 1) {
                        print "Ja";
                        
                    }
                    else {
                        print "Nee";
                    } ?>
                        
                </tr>
            </table>
            <a class="btn pull-left" href="updateklant.php">Klantgegevens aanpassen</a>
                </div>
        </div>
    </body>
</html>

