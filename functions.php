<?php

function message () {
    if (!empty($_SESSION['message'])) {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);

        return '<div class="alert alert-info">' . $message . '</div>';
    }

    return;
}
