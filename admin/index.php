<?php

    require "../includes/app.php";
    isAuthenticated();

    // Import classes

    use App\Property;
    use App\Agent;

    // Implement a method to obtain all the properties

    $properties = Property::all();
    $agents = Agent::all();

    // Shows conditional message

    // This means that if result is not defined then it's null, it doesn't exist, and so you can't get an error

    $result = $_GET["result"] ?? null;

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        
        // Validate id
        
        $id = $_POST["id"];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id) {
            
            $type = $_POST["type"];

            if (validateContentType($type)) {

                // Compare what we are going to delete

                if($type === "agent") {
                    $agent = Agent::find($id);
                    $agent->delete();
                } else if($type === "property") {
                    $property = Property::find($id);
                    $property->delete();
                }
            } 
        };
    };

    // Include a template
    
    includeTemplate("header");
?>

<main class="container section">
    <h1>Real State Administrator</h1>
        
    <?php
        $message = showNotification(intval($result));
        if($message) { ?>
            <p class="alert success"><?php echo esc($message) ?></p>
    <?php } ?>

    <a href="/admin/properties/create.php" class="button green-button">New Property</a>
    <a href="/admin/agents/create.php" class="button green-button">New Agent</a>

    <h2>Properties</h2>

    <table class="properties">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody> <!-- Show the results -->
            <?php foreach($properties as $property): ?>
                <tr>
                    <td><?php echo $property->id; ?></td>
                    <td><?php echo $property->title; ?></td>
                    <td><img src="/images/<?php echo $property->img; ?>" class="timg"></td>
                    <td>$ <?php echo $property->price; ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $property->id; ?>">
                            <input type="hidden" name="type" value="property">
                            <input type="submit" class="red-button-block" value="Delete">
                        </form>
                        <a href="/admin/properties/update.php?id=<?php echo $property->id; ?>" class="yellow-button-block">Update</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Agents</h2>

    <table class="properties">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody> <!-- Show the results -->
            <?php foreach($agents as $agent): ?>
                <tr>
                    <td><?php echo $agent->id; ?></td>
                    <td><?php echo $agent->name . " " . $agent->surname; ?></td>
                    <td><?php echo $agent->phone; ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $agent->id; ?>">
                            <input type="hidden" name="type" value="agent">
                            <input type="submit" class="red-button-block" value="Delete">
                        </form>
                        <a href="/admin/agents/update.php?id=<?php echo $agent->id; ?>" class="yellow-button-block">Update</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<?php includeTemplate("footer"); ?>