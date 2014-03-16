<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>Klanten</title>
        <link href="src/mappen/presentation/css/style.css" rel="stylesheet">
        <link href="src/mappen/presentation/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <script src="src/mappen/presentation/bootstrap/js/bootstrap.min.js"></script>

        <header class="alert alert-block">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                    <a class="btn form-inline pull-right" href="indexlocked.php">Terug</a>
                    </div>
                </div>
            </div>
        </header>
        <div class="container-fluid">
            
                <?php
                        if (isset($error) && $error == "emailexists") {
                        ?>
                    <div class="row-fluid">
                        <div class="span12">
                            <p class="alert alert-error">Email bestaat al!</p></div></div> <?php
                            }
                            ?>
            <div class="row-fluid">
                <div class="span4">
                        <h1>Nieuwe klant</h1>
                    
                        
                    <form method="post" action="nieuweklant.php?action=voegtoe">
                        <table>
                            <tr>
                                <td>Voornaam:</td>
                                <td>
                                    <input type="text" name="voornaam">
                                </td>
                            </tr>
                            <tr>
                                <td>Familienaam:</td>
                                <td>
                                    <input type="text" name="naam">
                                </td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>
                                    <input type="email" name="email" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Straatnaam & nr.:</td>
                                <td>
                                    <input type="text" name="adres" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Gemeente:</td>
                                <td>
                                    <select name="postcodeid">
                                        <?php
                                        foreach ($postcodelijst as $postcode) {
                                            ?>
                                            <option value="<?php print($postcode->getPostcodeid()); ?>">
                                                <?php print($postcode->getGemeente() . " (" . $postcode->getPostcode() . ")"); ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Telefoon:</td>
                                <td>
                                    <input type="tel" name="telefoon" required="">
                                </td>
                            </tr>
                            <tr>
                                <td>Wachtwoord:</td>
                                <td>
                                    <input type="text" name="wachtwoord" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Promo:</td>
                                <td>
                                    <select name="promo">                            
                                        <option value="1">Ja</option>
                                        <option value="0">Nee</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Extra:</td>
                                <td>
                                    <input type="text" name="extra">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input class ="btn" type="submit" value="Toevoegen">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>