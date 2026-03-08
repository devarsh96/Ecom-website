<?php
session_start();
    if (session_status() == PHP_SESSION_NONE) {
        echo "destroyed";
    }
    else {
        echo "active";
    }
?>