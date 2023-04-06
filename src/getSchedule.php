<?php

    $servername = "localhost";
    $username = "u318358312_kenny";
    $password = "Password00";
    $dbname = "u318358312_kenny";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_GET['employeeId'])) {
        $employeeId = $_GET['employeeId'];

        $sql = "SELECT Lundi, Mardi, Mercredi, Jeudi, Vendredi, Samedi, Dimanche FROM u318358312_kenny WHERE Employee_Id = '$employeeId'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $employeeData = array();
            while($row = mysqli_fetch_assoc($result)) {
                $employeeData['Lundi'] = $row['Lundi'];
                $employeeData['Mardi'] = $row['Mardi'];
                $employeeData['Mercredi'] = $row['Mercredi'];
                $employeeData['Jeudi'] = $row['Jeudi'];
                $employeeData['Vendredi'] = $row['Vendredi'];
                $employeeData['Samedi'] = $row['Samedi'];
                $employeeData['Dimanche'] = $row['Dimanche'];
            }
            echo json_encode($employeeData);
        } else {
            http_response_code(404);
        }
    }

    mysqli_close($conn);

?>
