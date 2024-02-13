<form action="./assets/php/panel-dataadd.php" method="post">
    <?php
    $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];

    // Select Bazaar
    echo '<div class="form-group col-md-12">';
    echo '<label>Select Bazaar:</label>';
    echo '<select class="form-control" name="bazarid" id="bazarid">';
    // Options will be dynamically populated using JavaScript
    echo '</select>';
    echo '</div>';

    // Week Value
    echo '<div class="form-group col-md-12">';
    echo '<label for="weekvalue">Week Value:</label>';
    echo '<input type="text" class="form-control" name="weekvalue" id="weekvalue" required>';
    echo '</div>';

    // Day inputs
    echo '<div class="row">';
    foreach ($days as $day) {
        echo "<div class='col-md-4'>";
        echo "<label>{$day}:</label>";

        for ($i = 1; $i <= 3; $i++) {
            $fieldName = "{$day}_{$i}";
            echo "<input type='text' class='form-control' name='{$fieldName}' placeholder='{$day} {$i}' required>";
            // Log the field name and value to the browser console
            echo "<script>console.log('{$fieldName} :', document.getElementsByName('{$fieldName}')[0].value);</script>";
            echo "&nbsp;"; // Add some space between inputs
        }

        echo "</div>";
    }
    echo '</div>';
    ?>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
