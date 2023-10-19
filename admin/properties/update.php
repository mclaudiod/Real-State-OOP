<?php

    use App\Property;
    use App\Agent;
    use Intervention\Image\ImageManagerStatic as Image;

    require "../../includes/app.php";
    
    isAuthenticated();

    // Validate ID by valid ID

    $id = $_GET["id"];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    if(!$id) {
        header("Location: /admin");
    };
    
    // Obtain the data of the property
    
    $property = Property::find($id);

    // Query to obtain all the agents

    $agents = Agent::all();

    // To insert data into the database first we declare an if statement to require the use of POST (in this case at least), which we use to collect the variables of the inputs, to save them in an array which then is inserted into the database, basically the "name" property is used in conjuction with the $_POST to save the value in a variable, which is later used to insert it in the rest of the MySQL code and then send it to the database, which makes it to be saved there

    // Array with error messages

    $errors = Property::getErrors();

    // POST executes the code AFTER the user sends the form

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        
        // Assign the atributes
        
        $args = $_POST["property"];
        $property->synchronize($args);

        // Upload files
        
        // Generate an unique name

        $imgName = md5(uniqid(rand(), true)) . ".jpg";

        // Resize the image with Intervention

        if($_FILES["property"]["tmp_name"]["img"]) {
            $img = Image::make($_FILES["property"]["tmp_name"]["img"])->fit(800,600);
            $property->setImage($imgName);
        }
        
        // Validation

        $errors = $property->validate();

        // Check that the errors array is empty

        if(empty($errors)) {

            // Save the image on the server

            if(!is_null($img)) {
                $img->save((IMAGE_FOLDER . $imgName));
            }

            // Save it on the database

            $property->save();
        };
    };

    includeTemplate("header");
?>

<!-- Here we are creating a form where it should have the same inputs as the database has, for example in this case it's a database about properties, so we have the title, price, image,description, etc, because those are the ones we already created in the database, it's also important to give every input the property "name" to be able to use it to make the array and then save it in the database

enctype="multipart/form-data" is used to permit the form to upload files, this applies to other techologies too-->

<main class="container section">
    <h1>Update Property</h1>
        
    <a href="/admin" class="button green-button">Return</a>

    <?php foreach($errors as $error): ?>
    <div class="alert error">
        <?php echo $error; ?>
    </div>
    <?php endforeach; ?>
        

    <form class="form" method="POST" enctype="multipart/form-data">
        <?php include "../../includes/templates/form_properties.php"; ?>
        <input type="submit" value="Update Property" class="button green-button">
    </form>
        
</main>

<?php includeTemplate("footer"); ?>