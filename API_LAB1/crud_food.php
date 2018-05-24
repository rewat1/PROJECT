<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

require_once("config/db.php");
require_once("cmd/exec.php");


$db = new Database();
$strConn = $db->getConnection();
$strExe = new ExecSQL($strConn);

/*if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$content = file_get_contents('php://input');
$user = json_decode($content, true);

$action = $user['cmd'];
$name = $user['fullName'];
$email = $user['email'];
$password = $user['password']; */

$action = $_GET['cmd'];
$foodname = $_GET['food_name'];
$foodtype = $_GET['food_type'];
$foodproduction = $_GET['food_production'];
$foodmethod = $_GET['food_method'];
$fooddetail = $_GET['food_detail'];



switch ($action){
    case "insert" :
     {
            $sql = " INSERT INTO food (food_name, food_type, food_production, food_method, food_detail) 
                        VALUES ('".$foodname."', '".$foodtype."', '".$foodproduction."', '".$foodmethod."', '".$fooddetail."') ";
            $stmt = $strExe->dataTransection($sql);

            if ($stmt == 1) {
                echo json_encode(['status' => 'ok','message' => 'บันทึกข้อมูลเรียบร้อยแล้ว']);
            } else {
                echo json_encode(['status' => 'error','message' => 'เกิดข้อผิดพลาดในการบันทึกข้อมูล']);
            }
        }

    break;

    /*case "select" :
        $sql = " SELECT * FROM users ";
        $stmt = $strExe->populateData($sql);
        $row_count = $strExe->rowCount("users");
        $usersArray = array();
        if($row_count >0) {
            foreach($stmt as $row){
                $usersArray[] = $row;
                $item = array(
                    'foodname ' =>$row['food_name'],
                    'foodtype ' =>$row['food_type'],
                    'foodproduction '=>$row['food_production'],
                    'foodmethod '=>$row['food_method'],
                    'fooddetail ' =>$row['food_detail']
        
                );
            }
        }
        echo json_encode($usersArray);
    break;
*/
    case "select":

    $sql = " SELECT * FROM food ";
        $stmt = $strExe->populateData($sql);
        $row_count = $strExe->readAll("food");
        foreach($stmt as $row){

        $usersArray = array();
        if($row_count >0) {

            $usersArray['rs'] = array(
            'ชื่ออาหาร ' =>$row['food_name'],
            'ปะเภทอาหาร ' =>$row['food_type'],
            'ที่ผลิต '=>$row['food_production'],
            'กระบวนการผลิต '=>$row['food_method'],
            'รายละเอียด ' =>$row['food_detail']
        
    );
    

        array_push($usersArray['rs'],$item);
    }
    else{
        echo json_encode(array('msg' => 'result not found.') );
    }
        echo json_encode($usersArray);

}

    default :
   
    }
//}


?>