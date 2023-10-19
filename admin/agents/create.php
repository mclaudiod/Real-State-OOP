<?php
    
    require "../../includes/app.php";

    use App\Agent;

    isAuthenticated();
    
    $agent = new Agent();

    // Query to obtain all the agents

    $agents = Agent::all();

    // To insert data into the database first we declare an if statement to require the use of POST (in this case at least), which we use to collect the variables of the inputs, to save them in an array which then is inserted into the database, basically the "name" agent is used in conjuction with the $_POST to save the value in a variable, which is later used to insert it in the rest of the MySQL code and then send it to the database, which makes it to be saved there

    // Array with error messages

    $errors = Agent::getErrors();

    // POST executes the code AFTER the user sends the form

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        
        // Creates a new instance

        $agent = new Agent($_POST["agent"]);

        // Validate

        $errors = $agent->validate();

        // Check that the errors array is empty

        if(empty($errors)) {

            // Save it on the database

            $agent->save();
        };
    };

    includeTemplate("header");
?>

<!-- Here we are creating a form where it should have the same inputs as the database has, for example in this case it's a database about agents, so we have the name, surname and phone, because those are the ones we already created in the database, it's also important to give every input the agent "name" to be able to use it to make the array and then save it in the database

action="/admin/agents/create.php" is so that the data on the form is send to this webpage and not another, so it can't be edited by someone

enctype="multipart/form-data" is used to permit the form to upload files, this applies to other techologies too-->

<main class="container section">
    <h1>Create Agent</h1>

    <a href="/admin" class="button green-button">Return</a>

    <?php foreach($errors as $error): ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="form" method="POST" action="/admin/agents/create.php">
        <?php include "../../includes/templates/form_agents.php"; ?>
        <input type="submit" value="Create Agent" class="button green-button">
    </form>  
</main>

<?php includeTemplate("footer"); ?>