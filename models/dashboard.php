<?php
require_once('connection.php');

function get_total_building() {
    $db = DB::getInstance();
    $req = $db->query("SELECT COUNT(Name) AS total_buldings FROM BUILDING;");
    $result = $req->fetch_assoc();
    if ($result && isset($result['total_buldings'])) {
        return $result['total_buldings'];
    } else {
        return "Error retrieving total number of BUILDING";
    }
}

function get_total_room() {
    $db = DB::getInstance();
    $req = $db->query("SELECT COUNT(Room_ID) AS total_rooms FROM ROOM;");
    $result = $req->fetch_assoc();
    if ($result && isset($result['total_rooms'])) {
        return $result['total_rooms'];
    } else {
        return "Error retrieving total number of ROOM";
    }
}

function get_total_slot() {
    $db = DB::getInstance();
    $req = $db->query("SELECT COUNT(CCCD_number) AS total_student_lives FROM student WHERE Status='Đang ở';");
    return "Đang tính...";
}

function get_total_student_still_lives() {
    $db = DB::getInstance();
    $req = $db->query("SELECT COUNT(CCCD_number) AS total_student_lives FROM student WHERE Status='Đang ở';");
    $result = $req->fetch_assoc();
    if ($result && isset($result['total_student_lives'])) {
        return $result['total_student_lives'];
    } else {
        return "Error retrieving total number of STUDENT";
    }
}

function get_total_student_outs() {
    $db = DB::getInstance();
    $req = $db->query("SELECT COUNT(CCCD_number) AS total_student_outs FROM student WHERE Status='Trả phòng';");
    $result = $req->fetch_assoc();
    if ($result && isset($result['total_student_outs'])) {
        return $result['total_student_outs'];
    } else {
        return "Error retrieving total number of STUDENT";
    }
}

function get_total_employee() {
    $db = DB::getInstance();
    $req = $db->query("SELECT COUNT(CCCD_number) AS total_employees FROM employee;");
    $result = $req->fetch_assoc();
    if ($result && isset($result['total_employees'])) {
        return $result['total_employees'];
    } else {
        return "Error retrieving total number of EMPLOYEE";
    }
}

function get_total_manager() {
    $db = DB::getInstance();
    $req = $db->query("SELECT COUNT(CCCD_number) AS total_managers FROM manager;");
    $result = $req->fetch_assoc();
    if ($result && isset($result['total_managers'])) {
        return $result['total_managers'];
    } else {
        return "Error retrieving total number of MANAGER";
    }
}


