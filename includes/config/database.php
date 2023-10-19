<?php

function connectDB() : mysqli {
    $db = new mysqli("localhost", "root", "root", "real_state");

    if(!$db) {
        echo "It wasn't possible to connect to the Database";
        exit;
    };

    return $db;
};