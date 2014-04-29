<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation-functions.php"); ?>
<?php require_once("../includes/db-connection.php"); ?>

<?php
  
  // Temporary hack to simulate logged in user
  $user_id = 1;

  if(isset($_POST['submit-new-mc-question'])) {

    // The New Multiple Choice Form was submitted
    

    // Validate New User Form inputs
    $fields_required = array("question_text", "answer1", "answer2",
                              "answer3", "answer4", "weight");
    foreach($fields_required as $field) {
      $value = trim($_POST[$field]);
      if(!has_presence($value)) {
        $error_messages[$field] = ucfirst($field) . " is required.";
      }
    }

    

    // If there were errors, redirect back to the form.
    if(!empty($error_messages)) {
      $_SESSION["errors"] = $error_messages;

      $form_values = array("question_text" => $_POST['question_text'],
                           "answer1"  => $_POST['answer1'],
                           "answer2"  => $_POST['answer2'],
                           "answer3"  => $_POST['answer3'],
                           "answer4"  => $_POST['answer4'],
                           "weight"   => $_POST['weight']);
      $_SESSION["form_history"] = $form_values;

      redirect_to("new-question.php");
    }

    // If inputs were valid begin insertion.
    $_POST = array_map('mysql_real_escape_string',$_POST);

    $question_text    = $_POST['question_text'];
    $answer1          = $_POST['answer1'];
    $answer2          = $_POST['answer2'];
    $answer3          = $_POST['answer3'];
    $answer4          = $_POST['answer4'];
    $weight           = $_POST['weight'];
    $type             = "Multiple Choice";
    $owner            = $user_id;
    

    // Insert new question into question table
    $query  = "INSERT INTO question (";
    $query .= "  question_text, type, owner, weight";
    $query .= ") VALUES (";
    $query .= "  '{$question_text}', '{$type}', '{$owner}',";
    $query .= "  '{$weight}'";
    $query .= ")";

    $result = mysqli_query($db, $query);

    if ( false === $result ) {
      // Query failed. Print out information.
      printf("error: %s\n", mysqli_error($db));
      $_SESSION["error_message"] = "Database insertion failure";
      redirect_to("new-question.php");

    } 

    $inserted_question_id = mysqli_insert_id($db);

    // Insert new question's answers into answer table
    $ischecked = false;
      
    // Answer 1
    if($_POST['ischecked'] == '1') { $ischecked = true; }

    $query1  = "INSERT INTO answer (";
    $query1 .= "  answer_text, question_id, is_correct";
    $query1 .= ") VALUES (";
    $query1 .= "  '{$answer1}', '{$inserted_question_id}', '{$ischecked}'";
    $query1 .= ")";

    $result1 = mysqli_query($db, $query1);

    if ( false === $result1 ) {
      // Query failed. Print out information.
      printf("error: %s\n", mysqli_error($db));
      $_SESSION["error_message"] = "Database insertion failure";
      redirect_to("new-question.php");
    }

    $ischecked = false; 

    // Answer 2
    if($_POST['ischecked'] == '2') { $ischecked = true; }

    $query2  = "INSERT INTO answer (";
    $query2 .= "  answer_text, question_id, is_correct";
    $query2 .= ") VALUES (";
    $query2 .= "  '{$answer2}', '{$inserted_question_id}', '{$ischecked}'";
    $query2 .= ")";

    $result2 = mysqli_query($db, $query2);

    if ( false === $result2 ) {
      // Query failed. Print out information.
      printf("error: %s\n", mysqli_error($db));
      $_SESSION["error_message"] = "Database insertion failure";
      redirect_to("new-question.php");
    }

    $ischecked = false;

    // Answer 3
    if($_POST['ischecked'] == '3') { $ischecked = true; }

    $query3  = "INSERT INTO answer (";
    $query3 .= "  answer_text, question_id, is_correct";
    $query3 .= ") VALUES (";
    $query3 .= "  '{$answer3}', '{$inserted_question_id}', '{$ischecked}'";
    $query3 .= ")";

    $result3 = mysqli_query($db, $query3);

    if ( false === $result3 ) {
      // Query failed. Print out information.
      printf("error: %s\n", mysqli_error($db));
      $_SESSION["error_message"] = "Database insertion failure";
      redirect_to("new-question.php");
    }

    $ischecked = false;

    // Answer 4
    if($_POST['ischecked'] == '4') { $ischecked = true; }

    $query4  = "INSERT INTO answer (";
    $query4 .= "  answer_text, question_id, is_correct";
    $query4 .= ") VALUES (";
    $query4 .= "  '{$answer4}', '{$inserted_question_id}', '{$ischecked}'";
    $query4 .= ")";

    $result4 = mysqli_query($db, $query4);

    if ( false === $result4 ) {
      // Query failed. Print out information.
      printf("error: %s\n", mysqli_error($db));
      $_SESSION["error_message"] = "Database insertion failure";
      redirect_to("new-question.php");
    }  



    // Success
    $_SESSION["message"] = "Successfully created new multiple choice question!";
    redirect_to("manage-questions.php");
    





  } else {
    // This is probably a get request
    $_SESSION["message"] = "Please fill in the form to create a new question.";
    redirect_to("new-question.php");
    
  } 
?>

<?php require_once("../includes/db-connection-close.php"); ?>