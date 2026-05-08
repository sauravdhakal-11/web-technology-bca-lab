<?php
$items = ["Task 1: HTML", "Task 2: CSS", "Task 3: PHP"];
$team = [
    ["name" => "Eren", "role" => "Leader"],
    ["name" => "Mikasa", "role" => "Ace"]
];
?>
<h3>List Layout</h3>
<ul>
    <?php foreach($items as $item) echo "<li>$item</li>"; ?>
</ul>

<h3>Table Layout</h3>
<table border="1">
    <?php foreach($team as $member): ?>
    <tr>
        <td><?php echo $member['name']; ?></td>
        <td><?php echo $member['role']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>