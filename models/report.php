<?php
require_once('connection.php');

class Report
{
    static function FindStudentsInMonth($month) {
        $db = DB::getInstance();
        $req = $db->query("
            SELECT `FindStudentsInMonth`('$month') AS `FindStudentsInMonth`;
        ");
        $result = ($req->fetch_row())[0];
        $lines = explode("\n", $result);
        $students = [];
        foreach ($lines as $line) {
            $info = explode(',', $line);
            if (count($info) >= 3) {
                $studentInfo = [
                    'Student_ID' => trim(str_replace('Student ID:', '', $info[0])),
                    'Name' => trim(str_replace('Name:', '', $info[1])),
                    'DOB' => trim(str_replace('DOB:', '', $info[2])),
                ];
                $students[] = $studentInfo;
            }
        }
        return $students;
    }

    static function CalculateExpensesForBuildingMonth($Bname, $month) {
        $db = DB::getInstance();
        $req = $db->query("
            SELECT `CalculateExpensesForBuildingMonth`('$Bname', '$month') AS `CalculateExpensesForBuildingMonth`;
        ");
        $result = ($req->fetch_row())[0];
        return $result;
    }

    static function PrintStudentListByDatein($room_id) {
        $db = DB::getInstance();
        $req = $db->query("
            CALL `PrintStudentListByDatein`('$room_id');
        ");
        $students = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $student) {
            $studentInfo = [
                'CCCD_number' => $student['CCCD_number'],
                'CCCD_date' => $student['CCCD_date'],
                'Fname' => $student['Fname'],
                'Lname' => $student['Lname'],
                'DOB' => $student['DOB'],
                'Sex' => $student['Sex'],
                'Religion' => $student['Religion'],
                'Ethnicity' => $student['Ethnicity'],
                'Phone' => $student['Phone'],
                'Email' => $student['Email'],
                'Avatar' => $student['Avatar'],
                'Bank_name' => $student['Bank_name'],
                'Bank_number' => $student['Bank_number'],
                'Address' => $student['Address'],
                'Status' => $student['Status'],
                'Student_ID' => $student['Student_ID'],
                'Date_in' => $student['Date_in'],
                'Date_out' => $student['Date_out'],
                'Room_ID' => $student['Room_ID'],
            ];
            $students[] = $studentInfo;
        }
        return $students;
    }

    static function PrintGeneralInfo($Bname) {
        $db = DB::getInstance();
        $req = $db->query("
            CALL `PrintGeneralInfo`('$Bname');
        ");
        $buildings = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $building) {
            $buildingInfo = [
                'Room_ID' => $building['Room_ID'],
                'Bname' => $building['Bname'],
                'StudentCount' => $building["StudentCount"],
                'AvgAge' => $building["AvgAge"]
            ];
            $buildings[] = $buildingInfo;
        }
        return $buildings;
    }
}