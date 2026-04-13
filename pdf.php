
<?php
include "Db.php";
require "vendor/autoload.php";

$sql = $conn->prepare("SELECT * FROM Dashboard");
$sql->execute();
$result = $sql->get_result();

$pdf = new TCPDF();
$pdf->AddPage();
$pdf->SetFont('times', 'I', 20);
$pdf->Cell(0, 10, "Employee Table", 1, 1, 'C');

$html = '<table border="1" cellpadding="5" style="background-color:pink;">
<tr>
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Salary</th>
    <th>Exp</th>
</tr>';

while ($row = $result->fetch_assoc()) {
    $html .= '<tr>
        <td>'.$row["BookId"].'</td>
        <td>'.$row["BookTitle"].'</td>
        <td>'.$row["AuthorName"].'</td>
        <td>'.$row["Genre"].'</td>
        <td>'.$row["AvailableCopies"].'</td>
    </tr>';
}

$html .= '</table>';

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('Employee.pdf', 'D');
?>