<?php

    define("TEMPLATES_URL", __DIR__ . "/templates");
    define("FUNCTIONS_URL", __DIR__ . "functions.php");
    define("IMAGE_FOLDER", __DIR__ . "/../images/");

    function includeTemplate(string $name, bool $index = false) {
        include TEMPLATES_URL . "/${name}.php";
    };

    function isAuthenticated() {
        session_start();

        if(!$_SESSION["login"]) {
            header("Location: /");
        };
    };

    function debug($variable) {
        echo "<pre>";
        var_dump($variable);
        echo "</pre>";
        exit;
    };

    // Escape/Sanitize HTML

    function esc($html) : string {
        $esc = htmlspecialchars($html);
        return $esc;
    };

    // Validate type of content

    function validateContentType($type) {
        $types = ["agent", "property"];
        return in_array($type, $types);
    };

    // Shows the messages

    function showNotification($code) {
        $message = "";

        switch($code) {
            case 1:
                $message = "Created Successfully";
                break;
            case 2:
                $message = "Updated Successfully";
                break;
            case 3:
                $message = "Deleted Successfully";
                break;
            default:
                $message = false;
                break;
        };

        return $message;
    };