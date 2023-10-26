<?php

    include '../../dbconnection.php';
    include '../admin/helpers/helper.php';


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // print_r($_POST['id']);
    // $id = $_POST['']
    $start = $_GET['start'] ?? "";
    $length = $_GET['length'] ?? "";
    $draw = $_GET['draw'] ?? "";
    $search = $_GET['search']['value'] ?? "";
    $columns = $_GET['columns'] ?? "";
    $orderBy = $columns[$_GET['order'][0]['column']]['data'] ?? "";
    $orderDir = $_GET['order'][0]['dir'] ?? "";


    $query = "SELECT id, username, userkey FROM users 
              WHERE username LIKE '%$search%'
              AND userkey $id
              ORDER BY $orderBy $orderDir 
              LIMIT $start, $length";
    $result = $conn->query($query);
    
    if ($result === false) {
        die("Query failed: " . $conn->error);
    }

    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    $totalRecords = $conn->query("SELECT COUNT(*) AS count FROM users")->fetch_assoc()['count'];

    $totalRecordsFiltered = $conn->query("SELECT COUNT(*) AS count FROM users WHERE username LIKE '%$search%'")->fetch_assoc()['count'];


    $conn->close();

    // Prepare the response in the format expected by DataTables
    $response = array(
        "draw" => intval($draw),
        "recordsTotal" => intval($totalRecords),
        "recordsFiltered" => intval($totalRecordsFiltered),
        "data" => $data
    );

    // Set the content type to JSON
    header('Content-Type: application/json');

    // Return the response as JSON
    echo json_encode($response);

