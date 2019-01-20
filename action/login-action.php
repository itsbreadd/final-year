<?php

session_start();

if (isset($_POST['submit'])) { //checking if submit button was clicked

    include_once 'dbcon.php';

    //mysqli prevents database reading code (converts to text)
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $pword = $_POST['pword'];

    //Error Handling
    //Check Empty Inputs
    if (empty($uname) || empty($pword)) {
        header("Location: ../index.php?login=empty");
        exit();
    } else {
      $sql = "SELECT * FROM user WHERE user_username='$uname'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      if ($resultCheck < 1) {
        header("Location: ../index.php?login=error-username-doesnt-exist");
        exit();
      } else {
        if ($row = mysqli_fetch_assoc($result)) {
          //Check if username matches password //Dehash password
          $hashedPwordCheck = password_verify($pword, $row['user_password']);
          if ($hashedPwordCheck == false) {
            header("Location: ../index.php?login=error-user-name-doesnt-match-password");
            exit();
          } elseif ($hashedPwordCheck == true) {
              //Log in user below
              $_SESSION['u_id'] = $row['user_id'];
              $_SESSION['u_username'] = $row['user_username'];
              $_SESSION['u_first'] = $row['user_first'];
              $_SESSION['u_last'] = $row['user_last'];
              $_SESSION['u_email'] = $row['user_email'];
              header("Location: ../register.php?login=success"); //CHANGE THIS TO HOMEPAGE WHEN COMPLETE
              exit();
          }
        }
      }
    }
} else {
    header("Location: ../index.php?login=final-fatal-error");
    exit();
}


?>
