<?php
    /* this program reads in a spesfied xml
     * and adds it to the mysql databce
     */

    //copy file to string
    $flepath = (string) "./xml/stevesshop.xml";

    //parse data as xml
    $xml = simplexml_load_file($flepath) or die("unable to open file ($flepath)");

    if (empty($xml)) {
        exit("there is no data found at ($flepath)");
    } else {
        echo "file found <br>";
    }

//    print( "<br>" . $xml->products->product["id"] . "<br>");
//    print($xml->products->product["name"] . "<br>");
//    print( $xml->products->product["price"] . "<br>");
//    print($xml->products->product["description"] ."<br>");

    print("</pre>");

    //copy to db
    $servername = "localhost";
    $username = "****";
    $password = "***";
    $dbname   = "****";

    // Create connection
    global $conn;
    $conn= new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "DELETE FROM products WHERE 1;";
    if ($conn->query($sql) === TRUE) {
        echo "OLD DATABCE CLEARED <br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "DELETE FROM stocks WHERE 1;";
    if ($conn->query($sql) === TRUE) {
        echo "OLD DATABCE CLEARED <br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "DELETE FROM categories WHERE 1;";
    if ($conn->query($sql) === TRUE) {
        echo "OLD DATABCE CLEARED <br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    //add all products
    foreach($xml->products->children() as $product) {

        $id          = $product["id"];
        $name        = $product["name"];
        $price       = $product["price"];
        $description = $product["description"];

        $sql = "INSERT INTO products(id, name, price, description)
        VALUES ('$id', '$name', '$price', '$description')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully <br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    //add all stock
//    foreach($xml->stocks->children() as $stock) {
//
//        $id       = (int) $stock["id"];
//        $amount   = (int) $stock["amount"];
//        $price = (string) $stock["price"];
//
//        $sql = "INSERT INTO stocks($id, amount, price)
//        VALUES ('$id', '$amount', '$price')";
//
//        if ($conn->query($sql) === TRUE) {
//            echo "New record created successfully <br>";
//        } else {
//            echo "Error: " . $sql . "<br>" . $conn->error;
//        }
//    }


    $conn->close();
?>
