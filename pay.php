<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Example payment usage - SEB - Pangalink-net</title>
</head>
<body>
<?php

// THIS IS AUTO GENERATED SCRIPT
// (c) 2011-2020 Kreata OÜ www.pangalink.net

// File encoding: UTF-8
// Check that your editor is set to use UTF-8 before using any non-ascii characters

// STEP 1. Setup private key
// =========================

$private_key = openssl_pkey_get_private(
    "-----BEGIN RSA PRIVATE KEY-----
MIIEogIBAAKCAQEAwMlRg58sXkpt/yRe4IXUmUHwn4FwY6ZxbANZQKhnUzutCiG5
+nzaImlrI8knArrTman/JY5s1xPxt3GR+ebDLIXZprJ6ORW3qraMXmZ2ZKtEl/gQ
O4Fpb9k8ovu/JaehZUPT6z6hRQUWQMOkhQf0csk5zjrjIL8jcR7bRAja/cjWyHts
NjrC/bWGybW4tC92UVlgZH1Syw4QRXmFefFpTPb0shvRnCQltB7STgLSTuxPrYlN
9Hi1wspOfWI4i2x50p11njraFIf8zv0pGyn4PZOlT1TPpexi/q8nEIeSAvDWr2lT
xWLO8u0BFXJafvhWDjHsiRoLlhr5wQxk2Kt82wIDAQABAoIBAAPlzhUYKcB6RsEK
zjRB4Gt8zs2aw1fwbIifhLVu8i/XnAcBaY4r6gkaEoV1sqk2d8K6kiMDPyYWDCQG
Uso3pSiISD87iocO7liwOiRKdAhTAh8Eb+eUFTqirLwq1NGBEx1GAsnVyVLo6GtE
yVW7NHEBqn6F6EOoOaI22n4Eo9DPrqyk5nrBuaD0zIG1anB9FScADg/nwcEwNUGn
l/4jkMlQtmKJmWqeTFWdN041SE47xqbqxm9SwALL+UnxL4GKAp8S6Mesc9/bXHjK
PgEvKlrMkct+WJ5JpARPopjaUaS1AAogNdGQgFVeW8f3EkJybaGw2/f/zM2tyDSN
Z0J2cNECgYEA8RJAOnCUXv4Fjh9Hsb29CBYuviyHDVBLQ2vGPmSPF4IEmDzBq+yA
J4EZp5jRFMsrti56vZ3cnevFmarQxGGFhbLlnGgajOnLH+aCWzFfKKi9KhvS2HtM
hdNliscEwExk+Q7GuBEGCdgGDG5rhtlsMoSOM8rqlLTgAi4nMjGt0AkCgYEAzLmZ
EcQQlI4xI0Q87IMAUHYOBuMtyaTjLFJKbyEP1ZVU9HbmnjSfXXeyGmV6rGmnT8AV
1nQigEJx2iC5v1/miUONXv3bm1sv83vzyr1SVqPsMu3s+xn1ZWPFeWpfXciVYcHR
kYIRDWPNCXTSOxsT8tOLDo3tnmUT9iggjIULVsMCgYB8eS7+vchub/0QUChlpxGm
zkVeXoFxJ2dlLY3UA3o66iBTNvPNQLU/MJK9jdNPSESOsdsgcxVJ2UZTPPbEn5Ig
4albJAmpfsIp+4yNZ6W5yb66slkg/DEb3HZOvMpAPHHag32p5uhWRtuAqbcNjtAm
GXmPVpPfKrGLjqcgbLRReQKBgBZGn6QyPEedzTT0KNjnTDJ1FgOj1oiZW2qoLZc3
9rwbupm7Ek7mlOybqJJ8tkNqX50q3nVuP47LLA46/1sWeUQ4SHqsjqex3V7V/unx
fbMVtQ65ms6bvXrhx0v1yhivSanQaBg4GdjmIhpETtfFk38Zi4jy4ocYonpnVVtU
4q33AoGATJj0hk9lBf8CyjP5zKE2/G0LeIOQTlT/lyaTN89WMpNrkbzZlY6u/tiL
SuKN3ohC9fCSwAXkzRvTJVAl9xmktv9MlFEkCcJVtNTj8FexQgpmf8m61ciLNsMr
xaMEU35Pv22pi/xt4OJHeJx/UXefohbpR5sTD/KVE/AVdvKTLMo=
-----END RSA PRIVATE KEY-----");

// STEP 2. Define payment information
// ==================================

$fields = array(
    "VK_SERVICE"     => "1011",
    "VK_VERSION"     => "008",
    "VK_SND_ID"      => "uid100010",
    "VK_STAMP"       => "12345",
    "VK_AMOUNT"      => 1900,
    "VK_CURR"        => "EUR",
    "VK_ACC"         => "EE171010123456789017",
    "VK_NAME"        => "ÕIE MÄGER",
    "VK_REF"         => "1234561",
    "VK_LANG"        => "EST",
    "VK_MSG"         => "Torso Tiger",
    "VK_RETURN"      => "https://tak17.janek.itmajakas.ee/code/hajusrakendused/ylesanne4/from-bank.php?action=success",
    "VK_CANCEL"      => "https://tak17.janek.itmajakas.ee/code/hajusrakendused/ylesanne4/from-bank.php?action=cancel",
    "VK_DATETIME"    => "2020-05-21T12:30:05+0300",
    "VK_ENCODING"    => "utf-8",
);

// STEP 3. Generate data to be signed
// ==================================

// Data to be signed is in the form of XXXYYYYY where XXX is 3 char
// zero padded length of the value and YYY the value itself
// NB! SEB expects symbol count, not byte count with UTF-8,
// so use `mb_strlen` instead of `strlen` to detect the length of a string

$data = str_pad (mb_strlen($fields["VK_SERVICE"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_SERVICE"] .    /* 1011 */
    str_pad (mb_strlen($fields["VK_VERSION"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_VERSION"] .    /* 008 */
    str_pad (mb_strlen($fields["VK_SND_ID"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_SND_ID"] .     /* uid100010 */
    str_pad (mb_strlen($fields["VK_STAMP"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_STAMP"] .      /* 12345 */
    str_pad (mb_strlen($fields["VK_AMOUNT"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_AMOUNT"] .     /* 150 */
    str_pad (mb_strlen($fields["VK_CURR"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_CURR"] .       /* EUR */
    str_pad (mb_strlen($fields["VK_ACC"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_ACC"] .        /* EE171010123456789017 */
    str_pad (mb_strlen($fields["VK_NAME"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_NAME"] .       /* ÕIE MÄGER */
    str_pad (mb_strlen($fields["VK_REF"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_REF"] .        /* 1234561 */
    str_pad (mb_strlen($fields["VK_MSG"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_MSG"] .        /* Torso Tiger */
    str_pad (mb_strlen($fields["VK_RETURN"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_RETURN"] .     /* http://localhost:8080/project/5D52p8l69KSfHnVE?payment_action=success */
    str_pad (mb_strlen($fields["VK_CANCEL"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_CANCEL"] .     /* http://localhost:8080/project/5D52p8l69KSfHnVE?payment_action=cancel */
    str_pad (mb_strlen($fields["VK_DATETIME"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_DATETIME"];    /* 2020-05-21T12:30:05+0300 */

/* $data = "0041011003008009uid10001000512345003150003EUR020EE171010123456789017009ÕIE MÄGER0071234561011Torso Tiger069http://localhost:8080/project/5D52p8l69KSfHnVE?payment_action=success068http://localhost:8080/project/5D52p8l69KSfHnVE?payment_action=cancel0242020-05-21T12:30:05+0300"; */

// STEP 4. Sign the data with RSA-SHA1 to generate MAC code
// ========================================================

openssl_sign ($data, $signature, $private_key, OPENSSL_ALGO_SHA1);

/* J5sGhKjZbTumkTdspPMCHoHc6N6Seg2r1acYH34NVm7fto0dSU05qRohK2clASGzDCkW9+pBpyqIta7c7UIC3Vbn3wWVxRYpUjYtMHEbIJxyScK310lpDONr7wKsTXu7+ochHgkfGK/DCVsFtaHASZDo/gfTMFJH5bbyYGsDhDzzDtTnw+ag5LsujMcEcBY2gvNq4J8yWPHjVvJ49gZhVk+vx71jeBjarG2eGIAzzLUsfQQdxTlxCfCGFyQEULGfJyOlve7pTFwONKu1FnWYqxZAwwMHJp4OJt5qCcJTAk+RItWXBXQiPGhlcaSHhhNcGpvZMFkFNQu27gCI28yFpg== */
$fields["VK_MAC"] = base64_encode($signature);

// STEP 5. Generate POST form with payment data that will be sent to the bank
// ==========================================================================
?>

<h1><a href="http://localhost:8080/">Pangalink-net</a></h1>
<p>Makse teostamise näidisrakendus <strong>"SEB"</strong></p>

<form method="post" action="http://localhost:8080/banklink/seb-common">
    <!-- include all values as hidden form fields -->
    <?php foreach($fields as $key => $val):?>
        <input type="hidden" name="<?php echo $key; ?>" value="<?php echo htmlspecialchars($val); ?>" />
    <?php endforeach; ?>

    <!-- draw table output for demo -->
    <table>
        <?php foreach($fields as $key => $val):?>
            <tr>
                <td><strong><code><?php echo $key; ?></code></strong></td>
                <td><code><?php echo htmlspecialchars($val); ?></code></td>
            </tr>
        <?php endforeach; ?>

        <!-- when the user clicks "Edasi panga lehele" form data is sent to the bank -->
        <tr><td colspan="2"><input type="submit" value="Edasi panga lehele" /></td></tr>
    </table>
</form>

</body>
</html>
