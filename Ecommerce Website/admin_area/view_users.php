<h1 class="text-center" id="reqsHeading" style="margin-bottom: 12px;padding-bottom: 8px;padding-top: 12px;">List of Users</h1>
<table class="table">
    <thead>
        <tr>
            <th> Name </th>
            <th> Email</th>
            <th> Contact No. </th>
            <th> Address </th>
        </tr>
    </thead>
    <tbody>
<?php
$user_details = "SELECT * FROM user_details";
$result_category= mysqli_query($conn,$user_details);
while($row = mysqli_fetch_assoc($result_category)) {

    $fname = $row['fname'];
    $lname = $row['lname'];
    $email = $row['email'];
    $mobile = $row['user_mobile'];
    $address = $row['user_address'];
    $province = $row['user_province'];
    $city = $row['user_city'];
    $zip = $row['user_zip'];
    echo'
    <tr>
        <td>'. $fname.'&nbsp'.  $lname.'</td>
        <td>'.  $email.'</td>
        <td>'. $mobile .'</td>
        <td>'. $address.'&nbsp<br>'. $city.'&nbsp'. $province .'&nbsp'.$zip .'</td>'
        ;}?>
                 
    </tbody>
        </table>