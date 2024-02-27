<?php
    function OpenCon()
    {
    $dbhost = "localhost";
    $dbuser = "Code.zugang";
    $dbpass = "EMG123PMTF";
    $db = "AdoptAGeo";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$dbname) or die("Connect failed: %s\n". $conn -> error);
    return $conn;
    }
    function CloseCon($conn)
    {
    $conn -> close();
    }
    ?>