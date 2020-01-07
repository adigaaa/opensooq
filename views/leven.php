<?php include 'layout/header.php'?>

<form action="" method="POST">
    <label for="first">First Text:</label>
    <input type="text" name="first_text" placeholder="First Text" required>
    <label for="second">Second Text:</label>
    <input type="text" name="second_text" placeholder="Second Text" required>
    <label for="mode">Mode:</label>
    <select name="type">
        <option value="levenshtein">Levenshtein</option>
        <option value="hamming">Hamming</option>
    </select>
    <input type="submit" value="Calculate">
</form>


<?php include 'layout/footer.php' ?>
