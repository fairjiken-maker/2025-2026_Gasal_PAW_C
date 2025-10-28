<form method="POST" action="process_Data.php">
    <label for="surname">Surname:</label>
    <input type="text" name="surname" id="surname" value="">
    <?php
    if (!empty($errors['surname'])) {
        echo "<p style='color:red'>" . $errors['surname'] . "</p>";
    }
    ?>
    <br>
    <input type="submit" value="Submit">
</form>