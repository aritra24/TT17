<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        $firstname = $lastname = $firstname_error = $lastname_error = $pref = '';
        $email = $regno = $phnow = $email_error= $regno_error = $phnow_error = $pref_error = '';

        if (isset($_POST['firstname'])) {
            if(empty($_POST['firstname'])) {
                $firstname_error = 'Firstname is required';
                $_SESSION['firstname_error'] = $firstname_error;
            } else {
                if($_POST['firstname'] == test_input($_POST['firstname'])) {
                     if (!preg_match("/^[a-zA-Z ]*$/",$_POST['firstname'])){
                    $firstname_error = 'Only letters and whitespaces allowed';
                    $_SESSION['firstname_error'] = $firstname_error;
                  }
                    else {
                    $firstname = test_input($_POST['firstname']);
                    $_SESSION['firstname']=$firstname;}
            }
        }
    }
       if (isset($_POST['lastname'])) {
            if(empty($_POST['lastname'])) {
                $lastname_error = 'Lastname is required';
                $_SESSION['lastname_error'] = $lastname_error;
            } else {
                if($_POST['lastname'] == test_input($_POST['lastname'])) {
                     if (!preg_match("/^[a-zA-Z ]*$/",$_POST['lastname'])){
                        $lastname_error = 'Only letters and whitespaces allowed';
                        $_SESSION['lastname_error'] = $lastname_error;
                      }
                    else {
                    $lastname = test_input($_POST['lastname']);
                    $_SESSION['lastname']=$lastname;
                  }
            }
        }
    }
       if (isset($_POST['email'])) {
            if(empty($_POST['email'])) {
                $email_error = 'Email is required';
                $_SESSION['email_error'] = $email_error;
            } else {
                 if($_POST['email'] == test_input($_POST['email'])) {
                    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                    $email_error = 'Enter a valid email address';
                    $_SESSION['email_error'] = $email_error;
                  }
                    else {
                    $email = test_input($_POST['email']);
                    $_SESSION['email']=$email;}
            }
        }
    }
        if (isset($_POST['phnow'])) {
            if(empty($_POST['phnow'])) {
                $phnow_error = 'Phone no. is required';
                $_SESSION['phnow_error'] = $phnow_error;
            } else {
                 if($_POST['phnow'] == test_input($_POST['phnow'])) {
                    if (!preg_match("/^[7-9]{1}[0-9]{9}$/",$_POST['phnow']))
                    { $phnow_error = 'Enter valid phone no.';
                      $_SESSION['phnow_error'] = $phnow_error;
                } else {
                   $phnow = test_input($_POST['phnow']);
                   $_SESSION['phnow']=$phnow;

                }
            }
        }
    }
        if (isset($_POST['regno'])) {
            if(empty($_POST['regno'])) {
                $regno_error = 'Enter registration no.';
                $_SESSION['regno_error'] = $regno_error;
            } else {
                 if($_POST['regno'] == test_input($_POST['regno'])) {
                    if (!preg_match("/^[1]{1}[3-7]{1}[0-9]{7}$/",$_POST['regno']))
                    {$regno_error = 'Enter valid phone no.';
                      $_SESSION['regno_error'] = $regno_error;
                } else {
                    $regno = test_input($_POST['regno']);
                    $_SESSION['regno']=$regno;

                }
            }
        }
    }
      if (isset($_POST['pref'])) {
            if(empty($_POST['pref'])) {
                $pref_error = 'Enter a preference';
                $_SESSION['pref']=$pref;
            } else {
                 if($_POST['pref'] == test_input($_POST['pref'])) {
                    if ($_POST['pref'] == 1 || $_POST['pref'] == 2)
                    {$pref = test_input($_POST['pref']);
                    $_SESSION['pref']=$pref;
                } else {
                    $pref_error = 'Choose a valid preference';
                    $_SESSION['pref_error'] = $pref_error;
                }
            }
        }
    }

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tut17";

$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

if($firstname_error == '' && $lastname_error == '' && $email_error == '' && $regno_error == '' && $phnow_error == '' && $pref_error == '') {
    $stmt = $conn->prepare("INSERT INTO info (FN, LN, EMAIL, REGNO, PHNO, CT) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $firstname, $lastname, $email, $regno, $phnow, $pref);
    $stmt->execute();
    $stmt -> close();
    $conn -> close();
    header("Location: gen.php");
}
else
{
$conn -> close();
header("Location: register.php?err=1");
}
}
?>
