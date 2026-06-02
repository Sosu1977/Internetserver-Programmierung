<?php
include "includes/debug.php";
?>


function startForm(string $action): void
{
    echo "<form method='post' action='$action'>";
}

function writeInputField(string $label, string $name): void
{
    echo "<p>";
    echo "<label>$label:</label><br>";
    echo "<input type='text' name='$name'>";
    echo "</p>";
}

function closeForm(): void
{
    echo "<button type='submit'>Weiter</button>";
    echo "</form>";
}
