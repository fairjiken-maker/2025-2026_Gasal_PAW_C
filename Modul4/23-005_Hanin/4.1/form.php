<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Data Form</title>
</head>
<body>
    <h2>Personal Data Form</h2>
    <form action="processData.php" method="POST">
    
        <label for="surname">Username:</label>
        <input type="text" id="surname" name="surname" value="<?php echo isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : ''; ?>" required><br><br>
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" value="<?php echo isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : ''; ?>" ><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <label for="address">Street Address:</label><br>
        <textarea id="address" name="address" rows="4" cols="50"></textarea><br><br>
        
        <label for="state">State:</label>
        <select id="state" name="state">
            <option value="Jakarta">Jakarta</option>
            <option value="West Java">West Java</option>
            <option value="Central Java">Central Java</option>
            <option value="East Java">East Java</option>
        </select><br><br>
        
        <input type="hidden" name="country" value="Indonesia">
        
        <label for="gender">Gender:</label><br>
        <input type="radio" id="male" name="gender" value="Male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="Female">
        <label for="female">Female</label><br><br>
        
        <label for="hobbies">Hobbies:</label><br>
        <input type="checkbox" id="hobby1" name="hobbies[]" value="Reading" checked>
        <label for="hobby1">Reading</label><br>
        <input type="checkbox" id="hobby2" name="hobbies[]" value="Traveling">
        <label for="hobby2">Traveling</label><br>
        <input type="checkbox" id="hobby3" name="hobbies[]" value="Cooking">
        <label for="hobby3">Cooking</label><br><br>
        
        <button type="submit">Submit</button>
    </form>
</body>
</html>