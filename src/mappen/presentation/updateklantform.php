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
                <h4 class="form-inline pull-left">Welkom <?php print $klant->getVoornaam() . " " . $klant->getNaam() ?></h4>
                <a class="btn form-inline pull-right" href="index.php">Terug</a>
            </div>
        </header>
            <?php
                        if (isset($error) && $error == "emailexists") {
                        ?>
                    <div class="row-fluid">
                        <div class="span12">
                            <p class="alert alert-error">Email bestaat al!</p></div></div> <?php
                            }
                            ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span4">
                    <h1>Update klant</h1>
                    <form method="post" action="updateklant.php?action=update&klantid=<?php print $klant->getKlantid() ?>">
                        <table>
                            <tr>
                                <td>Voornaam:</td>
                                <td>
                                    <input type="text" name="voornaam" value="<?php print $klant->getVoornaam() ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Familienaam:</td>
                                <td>
                                    <input type="text" name="naam" value="<?php print $klant->getNaam() ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>
                                    <input type="email" name="email" value="<?php print $klant->getEmail() ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Straatnaam & nr.:</td>
                                <td>
                                    <input type="text" name="adres" value="<?php print $klant->getAdres() ?>">
                                </td>
                            </tr>

                            <tr>
                            <td>Gemeente:</td>
                            <td>
                                <select name="postcodeid">
                                    <?php
                                    foreach ($postcodelijst as $postcode) {
                                        if ($postcode->getPostcodeid() == $klant->getPostcode()->getPostcodeId()) {
                                            $selWaarde = " selected";
                                        } else {
                                            $selWaarde = "";
                                        }
                                        ?>
                                            <option value="<?php print ($postcode->getPostcodeid()); ?>"<?php print($selWaarde); ?>>
                                            <?php print($postcode->getGemeente() . " (" . $postcode->getPostcode() . ")"); ?>
                                        </option>
                                            <?php
                                        }
                                        ?>
                                </select>
                            </td>
                        </tr>
                            <tr>
                                <td>Telefoon:</td>
                                <td>
                                    <input type="text" name="telefoon" value="<?php print $klant->getTelefoon() ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Paswoord:</td>
                                <td>
                                    <input type="text" name="wachtwoord" placeholder="nieuw wachtwoord" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Promo:</td>
                                <td>
                                    <select name="promo">                            
                                        <option value="1" <?php if ($klant->getPromo() == 1){ print "selected"; } ?>>Ja</option>
                                        <option value="0" <?php if ($klant->getPromo() == 0){ print "selected"; } ?>>Nee</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Extra:</td>
                                <td>
                                    <input type="text" name="extra" value="<?php print $klant->getExtra() ?>">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input class="btn" type="submit" value="Update">
                                    </form>
                                    <a class="btn" href="updateklant.php?action=verwijder&klantid=<?php print $klant->getKlantid() ?>">Delete gebruiker</a>
                                </td>
                            </tr>
                        </table>
                </div>
            </div>
        </div>
    </body>
</html>