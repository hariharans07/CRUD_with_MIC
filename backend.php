<?php
include("db.php");

//Add new User
if (isset($_POST['save_newuser'])) {
    try {


        $course = mysqli_real_escape_string($conn, $_POST['course']);
        $institutionname = mysqli_real_escape_string($conn, $_POST['institutionname']);
        $board_university = mysqli_real_escape_string($conn, $_POST['board_university']);
        $yearofpassing = mysqli_real_escape_string($conn, $_POST['yearofpassing']);
        $percentage_cgpa = mysqli_real_escape_string($conn, $_POST['percentage_cgpa']);


        $query = "INSERT INTO academicdetails (course, institutionname, board_university, yearofpassing, percentage_cgpa) VALUES ('$course', '$institutionname','$board_university','$yearofpassing','$percentage_cgpa')";

        if (mysqli_query($conn, $query)) {
            $res = [
                'status' => 200,
                'message' => 'Details Updated Successfully'
            ];
            echo json_encode($res);
        } else {
            throw new Exception('Query Failed: ' . mysqli_error($conn));
        }
    } catch (Exception $e) {
        $res = [
            'status' => 500,
            'message' => 'Error: ' . $e->getMessage()
        ];
        echo json_encode($res);
    }
}


//delete User
if (isset($_POST['delete_user'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['user_id']);
  
    $query = "DELETE FROM academicdetails WHERE id='$student_id'";
    $query_run = mysqli_query($conn, $query);
  
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Details Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Details Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
  }


  //get data for User edit
if (isset($_POST['edit_user'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['user_id']);
  
    $query = "SELECT * FROM academicdetails WHERE id='$student_id'";
    $query_run = mysqli_query($conn, $query);
  
    $User_data = mysqli_fetch_array($query_run);
  
  
    if ($query_run) {
      $res = [
        'status' => 200,
        'message' => 'details Fetch Successfully by id',
        'data' => $User_data
    ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Details Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
  }
  
  //User edit
  if (isset($_POST['save_edituser'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['id']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $institutionname = mysqli_real_escape_string($conn, $_POST['institutionname']);
    $board_university = mysqli_real_escape_string($conn, $_POST['board_university']);
    $yearofpassing = mysqli_real_escape_string($conn, $_POST['yearofpassing']);
    $percentage_cgpa = mysqli_real_escape_string($conn, $_POST['percentage_cgpa']);

  
    $query = "UPDATE academicdetails SET course='$course',institutionname='$institutionname',board_university='$board_university',yearofpassing='$yearofpassing',percentage_cgpa='$percentage_cgpa' WHERE id='$student_id'";
    $query_run = mysqli_query($conn, $query);
  
    if ($query_run) {
      $res = [
        'status' => 200,
        'message' => 'details Updated Successfully'
    ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Details Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
  }

//Add new family detail
if (isset($_POST['save_newfam'])) {
    try {


        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $relationship = mysqli_real_escape_string($conn, $_POST['relationship']);
        $occupation = mysqli_real_escape_string($conn, $_POST['occupation']);
        $organization = mysqli_real_escape_string($conn, $_POST['organization']);
        $mobilenumber = mysqli_real_escape_string($conn, $_POST['mobilenumber']);


        $query = "INSERT INTO familydetails (name, relationship, occupation, organization, mobilenumber) VALUES ('$name', '$relationship','$occupation','$organization','$mobilenumber')";

        if (mysqli_query($conn, $query)) {
            $res = [
                'status' => 200,
                'message' => 'Details Updated Successfully'
            ];
            echo json_encode($res);
        } else {
            throw new Exception('Query Failed: ' . mysqli_error($conn));
        }
    } catch (Exception $e) {
        $res = [
            'status' => 500,
            'message' => 'Error: ' . $e->getMessage()
        ];
        echo json_encode($res);
    }
}

//delete family details
if (isset($_POST['delete_famdetails'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['user_id']);
  
    $query = "DELETE FROM familydetails WHERE id2='$student_id'"; 
    $query_run = mysqli_query($conn, $query);
  
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Details Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Details Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
  }


   //get data for family edit
if (isset($_POST['edit_famdet'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['user_id']);
  
    $query = "SELECT * FROM familydetails WHERE id2='$student_id'";
    $query_run = mysqli_query($conn, $query);
  
    $User_data = mysqli_fetch_array($query_run);
  
  
    if ($query_run) {
      $res = [
        'status' => 200,
        'message' => 'details Fetch Successfully by id',
        'data' => $User_data
    ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Details Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
  }
  
  //family edit
  if (isset($_POST['save_editfam'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['id2']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $relationship = mysqli_real_escape_string($conn, $_POST['relationship']);
    $occupation = mysqli_real_escape_string($conn, $_POST['occupation']);
    $organization = mysqli_real_escape_string($conn, $_POST['organization']);
    $mobilenumber = mysqli_real_escape_string($conn, $_POST['mobilenumber']);

  
    $query = "UPDATE familydetails SET name='$name',relationship='$relationship',occupation='$occupation',organization='$organization',mobilenumber='$mobilenumber' WHERE id2='$student_id'";
    $query_run = mysqli_query($conn, $query);
  
    if ($query_run) {
      $res = [
        'status' => 200,
        'message' => 'details Updated Successfully'
    ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Details Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
  }

  //Add new family detail
if (isset($_POST['save_newpar'])) {
    try {


        $name1 = mysqli_real_escape_string($conn, $_POST['name1']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $languageknown = mysqli_real_escape_string($conn, $_POST['languageknown']);
        $extracurricular = mysqli_real_escape_string($conn, $_POST['extracurricular']);


        $query = "INSERT INTO parentdetails (name1, gender, languageknown, extracurricular) VALUES ('$name1', '$gender','$languageknown','$extracurricular')";

        if (mysqli_query($conn, $query)) {
            $res = [
                'status' => 200,
                'message' => 'Details Updated Successfully'
            ];
            echo json_encode($res);
        } else {
            throw new Exception('Query Failed: ' . mysqli_error($conn));
        }
    } catch (Exception $e) {
        $res = [
            'status' => 500,
            'message' => 'Error: ' . $e->getMessage()
        ];
        echo json_encode($res);
    }
}

//delete parent details
if (isset($_POST['delete_pardetails'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['user_id']);
  
    $query = "DELETE FROM parentdetails WHERE id3='$student_id'"; 
    $query_run = mysqli_query($conn, $query);
  
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Details Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Details Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
  }

   //get data for parent edit
if (isset($_POST['edit_pardet'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['user_id']);
  
    $query = "SELECT * FROM parentdetails WHERE id3='$student_id'";
    $query_run = mysqli_query($conn, $query);
  
    $User_data = mysqli_fetch_array($query_run);
  
  
    if ($query_run) {
      $res = [
        'status' => 200,
        'message' => 'details Fetch Successfully by id',
        'data' => $User_data
    ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Details Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
  }
  
  //parent edit
  if (isset($_POST['save_editpar'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['id3']);
    $name1 = mysqli_real_escape_string($conn, $_POST['name1']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $languageknown = mysqli_real_escape_string($conn, $_POST['languageknown']);
    $extracurricular = mysqli_real_escape_string($conn, $_POST['extracurricular']);

  
    $query = "UPDATE parentdetails SET name1='$name1',gender='$gender',languageknown='$languageknown',extracurricular='$extracurricular' WHERE id3='$student_id'";
    $query_run = mysqli_query($conn, $query);
  
    if ($query_run) {
      $res = [
        'status' => 200,
        'message' => 'details Updated Successfully'
    ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Details Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
  }

?>