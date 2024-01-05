<?php 
function connectToDatabase(){
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'magang';
    
    // Create Connection
    $conn = new mysqli($host, $username, $password, $dbname);
    
    //Check Connection
    if($conn->connect_error){
        die("Connection Failed: " . $conn->connect_error);
    }

    return $conn;
}

function closeDatabaseConnection($conn){
    $conn->close();
}

function insertPembelian($name, $price, $quantity){
    $conn = connectToDatabase();

    $stmt = $conn->prepare("INSERT INTO pembelian (product, price, quantity) VALUES (?, ?, ?)");
    // Ikat parameter ke pernyataan yang telah disiapkan
    $stmt->bind_param("sii", $name, $price, $quantity);

    //Jalankan pernyataan yang telah disiapkan
    if ($stmt->execute() !== TRUE) {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
    closeDatabaseConnection($conn);
}

function fetchDataFromDatabase(){
    $conn = connectToDatabase();

    $sql = "SELECT * FROM pembelian";
    $result = $conn->query($sql);

    closeDatabaseConnection($conn);

    return $result;
}
?>