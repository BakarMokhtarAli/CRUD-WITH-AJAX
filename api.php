<?php 

include 'conn.php';

$action = $_POST['action'];



function readAll($conn){

    $data = array();
    $message = array();
    $query = 'SELECT * FROM students';

    $result = $conn->query($query);

    if($result){
        while($row = $result->fetch_assoc()){
            $data [] = $row;
        }
        $message = array("status"=>true,"data"=>$data);
    }else{
        $message = array("status"=>false,"data"=>$conn->error);
    }
    echo json_encode($message);

};
function readStudentInfo($conn){

    $data = array();
    $message = array();
    $studenId = $_POST['id'];
    $query = "SELECT * FROM students WHERE id = '$studenId'";

    $result = $conn->query($query);

    if($result){
        while($row = $result->fetch_assoc()){
            $data [] = $row;
        }
        $message = array("status"=>true,"data"=>$data);
    }else{
        $message = array("status"=>false,"data"=>$conn->error);
    }
    echo json_encode($message);

};

function registerStudent($conn){
    $studenId = $_POST['id'];
    $studenName = $_POST['name'];
    $studenClass = $_POST['class'];

    $message = array();

    $query = "INSERT INTO students (id,name,class) VALUES('$studenId','$studenName','$studenClass')";
    $result = $conn->query($query);
    if($result){
        $message = array("status"=>true,"data"=>"student registred success");
    }else{
        $message = array("status"=>false,"data"=>$conn->error);
    }
    echo json_encode($message);
};
function updateStudent($conn){
    $studenId = $_POST['id'];
    $studenName = $_POST['name'];
    $studenClass = $_POST['class'];

    $message = array();

    $query = "UPDATE students SET name = '$studenName', class = '$studenClass' WHERE id = '$studenId'";
    $result = $conn->query($query);
    if($result){
        $message = array("status"=>true,"data"=>"student updated success");
    }else{
        $message = array("status"=>false,"data"=>$conn->error);
    }
    echo json_encode($message);
};
function deleteStudent($conn){
    $studenId = $_POST['id'];

    $message = array();

    $query = "DELETE FROM students WHERE id = '$studenId'";
    $result = $conn->query($query);
    if($result){
        $message = array("status"=>true,"data"=>"student deleted success");
    }else{
        $message = array("status"=>false,"data"=>$conn->error);
    }
    echo json_encode($message);
};






if(isset($action)){
    $action($conn);
}else{
    echo "action required";
}



?>