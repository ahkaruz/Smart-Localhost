<?php

function mysqlVersion() {
    $output = shell_exec('mysql --version');
    $lastDigit = strpos($output, ' ', 11);
    $mysqlVersion = substr($output, 11, $lastDigit - 11);
    return $mysqlVersion;
}

function mysqlStatus() {
    $host = "localhost";
    $user = "root";
    $password = "1234";
    try {
        $conn = new mysqli($host, $user, $password);
        return "Connected.";
    } catch (Exception $e) {
        return "Not connected.";
    }
}

if (isset($_GET['ajax']) && $_GET['ajax'] === 'mysql_status') {
    header('Content-Type: application/json');
    echo json_encode(['status' => mysqlStatus()]);
    exit;
}

function xdebugVersion() {
    $output = shell_exec('php -v');
    $xdeb = strpos($output, 'Xdebug');
    if ($xdeb == true) {
        $lastDigit = strpos($output, ',', $xdeb);
        $xdebVersion = substr($output, $xdeb + 6, $lastDigit - $xdeb - 6);
        return $xdebVersion;
    } else {
        return "Not installed.";
    }
}

function composerVersion() {
    exec('composer --version 2>NUL', $out);
    if (!empty($out)) {
        $output = $out[0];
        $comp = strpos($output, 'version') + 8;
        $lastDigit = strpos($output, ' ', $comp);
        $compVersion = substr($output, $comp, $lastDigit - $comp);
        return $compVersion;
    } else {
        return "Not installed.";
    }
}