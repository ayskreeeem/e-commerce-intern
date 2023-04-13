<h1 class="text-center" id="reqsHeading" style="margin-bottom: 12px;padding-bottom: 8px;padding-top: 12px;">Inquiries</h1>
<table class="table">
    <thead>
        <tr>
            <th> Name </th>
            <th> Email</th>
            <th> Subject</th>
            <th> Message </th>
        </tr>
    </thead>
    <tbody>
<?php
$user_details = "SELECT * FROM contact";
$result_category= mysqli_query($conn,$user_details);
while($row = mysqli_fetch_assoc($result_category)) {

    $name = $row['name'];
    $email = $row['email'];
    $subject = $row['subject'];
    $message = $row['message'];
    echo'
    <tr>
        <td>'.$name.'</td>
        <td>'. $email.'</td>
        <td>'. $subject .'</td>
        <td>'.$message.'</td>'
        ;}?>
                 
    </tbody>
        </table>