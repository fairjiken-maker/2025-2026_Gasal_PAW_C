<form method="POST" action="processData.php">
    <label for="surname">Surname:</label>
    <input type="text" name="surname" id="surname" value="<?php echo isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : ''; ?>">
    <?php
    if (!empty($errors['surname'])) {
        echo "<p style='color:red'>" . $errors['surname'] . "</p>";
    }
    ?>
    <br>
    <input type="submit" value="Submit">
</form>