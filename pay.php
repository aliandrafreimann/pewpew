<?php
session_start();
require_once 'functions.php';

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
$total = filter_input(INPUT_POST, 'total', FILTER_VALIDATE_FLOAT);
$fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
$lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);

if ($action == 'pay' && $total == "0") {
    $_SESSION['message'] = 'Total cant be empty';
    header('Location: cart.php');
} elseif ($action == 'pay' && $fname == "") {
    $_SESSION['message'] = 'Firstname cant be empty';
    header('Location: cart.php');
} elseif ($action == 'pay' && $lname == "") {
    $_SESSION['message'] = 'Lastname cant be empty';
    header('Location: cart.php');
}
?>
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
MIIEpAIBAAKCAQEAoXT8RCIEllvxSGlrbljPYnk7cJxNEQsB0724O9QTE+nOO58w
u+8EmF71+BOJsxESa4nW/5pj9qDVmz53i2jgU5wANgjnd+AKWc47jdguWY4uSzeG
Aaf4qS2R/V834SmghfMMPMPHYukF3RsjRVGdf3zQZcFmMfr3V7uVYZNhhZqCTz2V
inzacWChUHfxibv0Fcb0TBUQVsbQXZA034d43KDvqfUd6UuZxFRUvnyEd3u4YbpT
hi32+3zrRFl5JVJzFMlB4S+Uu638dY3kfsuYh4yDqWQecwmbDzRp/a8qYOd0cUle
FdzfaSA0j1qmzk7c12m2k4FwVwjo6NrETJSv4QIDAQABAoIBADUPn0A89cj8WmVz
z8yp/y3brb8qfuFU/rq5pOx0m/h1ZEOP45I/0QDKZIes1Bo3SBhzamcCNEv/O3QT
qXH1e5O+twsLDhcFWCF/d278Vu8znN83ViEBNOVUhqAARPsIlSqwX5swtDw7XKP3
oTXMxrf5Kvvl/VH7qoH4sfUpXGltgjUpwv15EKnoq9BrcWetxBB5Wy2nAuH+O5j/
dG+cvSACNL5TWZlZ17mBDWeADzI7wdsyf7CO49pHHCkbtYJoFuoP2yWQTYyBkeIe
3be1cSCay17/kpy7cpnajifJa0iLwD+HjMwFOYrWo0LrBXdFoIDSIVkAPrfuF0an
dq/bl6kCgYEAzi18ygrF214lXV988hic0njyAYi3InlG8eAyDJVBvxaWD9XcjlOB
DrEKTFKg/UMYvhalq7CeSapXc+AXRvNR6pA/aeuP1W6J5UpIsLAixb7deLmqfSqY
j1+7FYV51kOoon9D+0vg9kE9GtRXq+sjFwTdIbee7kN9VYRl0pIsz0sCgYEAyHj/
GW6xhve8O0BpTTvuC5jSPg+HqpQmWU4AaFfCx/ThktMq7/7q1ienCqxPQ/NJqNba
/4Qu2Vo9VAQynjzGia5F12trplTIQT/AuSk3fhuT0vrQva/TNTkrySl0+iNLgT+L
MbqUXYrfDt88mUCnLPCW32sFPgPkxwo7x9OHhgMCgYEAuy6q65dKODXKAHKPsg/M
WH07YU8ozKCEW1XqumfLj9vGk0va+FAxjBAJRG+D/0qqLPHMqQopOsHusaHSIDUJ
usYI/HXDWMcJZGTDh73xY8w7r74IXaiNZyVHaWuLyI4WjKi0JHKoI4npGvGLQuaw
LdbZmCHnpXMaV8hi1QCms+8CgYEAnOw5o0rGpAOf0DGnO9HBkEpbqEC3zYqSSi2I
nCS2T5ccS7YIUjyUznXTh8NBeMsjyYoFeyWZFoJQp0dx5/Ni5bsI6IsphNWwu4KP
9WCSE6C6ode7NgA/r9XEtH5DFtox7EY1SwPlxyNBX37XDI9TTRY2w0QeomCh4Dve
d5jY6MkCgYAVgIXQb5gElmYQbt8aVonCmNkB2VJu60QbOuQa3XHBm7piDT1zDij/
JufBxCad3/Db1lKkRqw+Lg3ge0JuV62LrUXWnvyut7mVEvkkEdh9NYIiy8t3XyKD
37NxCbhGX5/idm95osDBZr3co7XeoKfNFDX+NJpI2cYgoEZ/bgkuOg==
-----END RSA PRIVATE KEY-----");

// STEP 2. Define payment information
// ==================================

$fields = array(
    "VK_SERVICE"     => "1011",
    "VK_VERSION"     => "008",
    "VK_SND_ID"      => "uid100010",
    "VK_STAMP"       => "12345",
    "VK_AMOUNT"      => $total,
    "VK_CURR"        => "EUR",
    "VK_ACC"         => "EE171010123456789017",
    "VK_NAME"        => $fname . " " . $lname,
    "VK_REF"         => "1234561",
    "VK_LANG"        => "EST",
    "VK_MSG"         => "PC parts",
    "VK_RETURN"      => "https://hajusrakendus4.tak17pold.itmajakas.ee/from-bank.php?action=success",
    "VK_CANCEL"      => "https://hajusrakendus4.tak17pold.itmajakas.ee/from-bank.php?action=cancel",
    "VK_DATETIME"    => date(DATE_ISO8601),
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
    str_pad (mb_strlen($fields["VK_RETURN"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_RETURN"] .     /* http://localhost:8080/project/WunsR2SOuSqg2dcy?payment_action=success */
    str_pad (mb_strlen($fields["VK_CANCEL"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_CANCEL"] .     /* http://localhost:8080/project/WunsR2SOuSqg2dcy?payment_action=cancel */
    str_pad (mb_strlen($fields["VK_DATETIME"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_DATETIME"];    /* 2020-05-21T17:16:12+0300 */

/* $data = "0041011003008009uid10001000512345003150003EUR020EE171010123456789017009ÕIE MÄGER0071234561011Torso Tiger069http://localhost:8080/project/WunsR2SOuSqg2dcy?payment_action=success068http://localhost:8080/project/WunsR2SOuSqg2dcy?payment_action=cancel0242020-05-21T17:16:12+0300"; */

// STEP 4. Sign the data with RSA-SHA1 to generate MAC code
// ========================================================

openssl_sign ($data, $signature, $private_key, OPENSSL_ALGO_SHA1);

/* I3Fnrd62Z1IfBP2MRptlVnEpi+GN09HSe01rgrXeWTCi4qXn/ODGUSw8uScz9MDhJpxjS7TlmVLZF/pe3tAGmG7UNveU+idz/SgKxkPIKCjMEaUJdx0CCANvinAJ3DOrof7q96NOdzgy+pvRuN9nMjTtHIIg2yF4gzz9KgOn67pSuREoZxXpTodnN8FRtDf7oJ3Oh0ZzltYNnR+jrsxLdSj5R3nTSON0c7ZIldRBfVqHzP4VHtxx0rV/an/53o/jVfRMXvjeY2WxKF3BGpZayc7sR8vfYxTFk7Y3SHv4YUU6JY9vA8hqUdtqpSu2FyuUIs/1qCd/1EzxI30uwqX+Ig== */
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