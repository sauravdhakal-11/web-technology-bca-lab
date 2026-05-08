<?php
// Define Subject Details
$subjects = [
    ["code" => "CACS151", "title" => "Data Structure", "credit" => 3],
    ["code" => "CACS152", "title" => "Object Oriented Programming in Java", "credit" => 3],
    ["code" => "CACS153", "title" => "Microprocessor", "credit" => 3],
    ["code" => "CACS154", "title" => "Financial Accounting", "credit" => 3],
    ["code" => "CAEN155", "title" => "English II", "credit" => 3],
];

// Helper Function: Convert Marks to Grade and Point (TU Scale)
function getGrade($marks) {
    if ($marks >= 90) return ["A", 4.0];
    if ($marks >= 80) return ["A-", 3.7];
    if ($marks >= 70) return ["B+", 3.3];
    if ($marks >= 60) return ["B", 3.0];
    if ($marks >= 50) return ["B-", 2.7];
    if ($marks >= 40) return ["C", 2.4];
    return ["F", 0.0];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCA Grade Sheet Generator</title>
    <!-- Using the CSS provided in previous turn to ensure fit-to-screen -->
    <link rel="stylesheet" href="style.css">
    <style>
        .input-form { background: #fff; padding: 20px; margin: 20px auto; max-width: 500px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .input-group { margin-bottom: 10px; display: flex; justify-content: space-between; }
        @media print { .input-form, button { display: none; } }
    </style>
</head>
<body>

<!-- INPUT FORM -->
<div class="input-form">
    <h3>Enter Subject Marks (0-100)</h3>
    <form method="POST">
        <?php foreach($subjects as $index => $sub): ?>
            <div class="input-group">
                <label><?php echo $sub['title']; ?>:</label>
                <input type="number" name="marks[]" min="0" max="100" required>
            </div>
        <?php endforeach; ?>
        <button type="submit" style="background: #d97d54; color: white; border: none; padding: 10px 20px; cursor: pointer; width: 100%;">Generate Marksheet</button>
    </form>
</div>

<?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
<div class="grade-container invoice-wrapper"> <!-- invoice-wrapper class from previous CSS logic -->
    <div class="top-bar"></div>
    <div class="header-section">
        <h1>TRIBHUVAN UNIVERSITY</h1>
        <h2>Faculty of Humanities & Social Sciences</h2>
        <h3>BCA 2nd Semester - Grade Sheet</h3>
    </div>

    <div class="student-info" style="padding: 20px 40px;">
        <p><strong>Name:</strong> John Doe</p>
        <p><strong>Symbol No:</strong> 7054321</p>
    </div>

    <div class="table-container">
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Credit</th>
                    <th>Grade</th>
                    <th>Point</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $totalPoints = 0;
                $userMarks = $_POST['marks'];
                foreach($subjects as $i => $sub): 
                    $gradeData = getGrade($userMarks[$i]);
                    $totalPoints += $gradeData[1];
                ?>
                <tr>
                    <td><?php echo $i + 1; ?></td>
                    <td><?php echo $sub['code']; ?></td>
                    <td style="text-align: left;"><?php echo $sub['title']; ?></td>
                    <td><?php echo $sub['credit']; ?></td>
                    <td><?php echo $gradeData[0]; ?></td>
                    <td><?php echo number_format($gradeData[1], 1); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr class="balance-due">
                    <td colspan="5">Cumulative Grade Point Average (GPA)</td>
                    <td><?php echo number_format($totalPoints / 5, 2); ?></td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="signature-section" style="display: flex; justify-content: space-between; padding: 40px;">
        <div class="sig" style="text-align: center;">
            <p>___________________</p>
            <p>Checked By</p>
        </div>
        <div class="sig" style="text-align: center;">
            <p>___________________</p>
            <p>Controller of Examinations</p>
        </div>
    </div>
    <div class="bottom-bar"></div>
</div>
<?php endif; ?>

</body>
</html>