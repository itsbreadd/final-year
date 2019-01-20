<?php

if (isset($_POST['submit'])) { //checking if submit button was clicked

    include_once 'dbcon.php';

    $uname = mysqli_real_escape_string($conn, $_POST['uname']); //mysqli prevents database reading code (converts to text)
    $first = mysqli_real_escape_string($conn, $_POST['firstname']);
    $last = mysqli_real_escape_string($conn, $_POST['lastname']);
    $pword = mysqli_real_escape_string($conn, $_POST['pword']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    //Error Handling
    //Empty Field Check
    if (empty($uname) || empty($first) || empty($last) || empty($pword) || empty($email)) {
        header("Location: ../register.php?register=empty"); //return them to register if fields are empty
        exit();
    } else {
        //Input characters valid?
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
          header("Location: ../register.php?register=invalid");
          exit();
        } else {
          //Email validity checked
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../register.php?register=email");
            exit();
          } else {
              //Check if username is taken
              $sql = "SELECT * FROM user WHERE user_username='$uname'";
              $result = mysqli_query($conn, $sql);
              $resultCheck = mysqli_num_rows($result);

              if ($resultCheck > 0) {
                header("Location: ../register.php?register=usernametaken");
                exit();
              } else {
                  //Password hashing
                  $hashedPword = password_hash($pword, PASSWORD_DEFAULT);
                  //Insert user into database
                  $sql = "INSERT INTO user (user_username, user_password, user_first,
                    user_last, user_email) VALUES ('$uname', '$hashedPword', '$first', '$last',
                    '$email');";
                  mysqli_query($conn, $sql);
                  //USER IS TAKEN HERE AFTER SIGN UP
                  header("Location: ../register.php?register=success");
                  exit();

              }
          }
        }
    }

} else {
  header("Location: ../register.php"); //return them to register if submit wasnt hit
  exit();
}

?>
