<?php

	function redirect_to($new_location) {
		header("Location: " . $new_location);
		exit;
	}

	function confirm_query($result_set) {
		if(!$result_set) {
			die("The Database Query Failed.");
		}
	}

	function get_all_users() {
		global $db;

	  	$query  = "SELECT * ";
	  	$query .= "FROM user";

	  	$result = mysqli_query($db, $query);
	  	confirm_query($result);

	  	return $result;
	}

	function get_user_by_id($user_id) {
		global $db;

		// Sanitize input parameter prior to making query
		$safe_user_id = mysqli_real_escape_string($db, $user_id);

		$query 	= "SELECT * ";
		$query .= "FROM user ";
		$query .= "WHERE user_id = {$safe_user_id} ";
		$query .= "LIMIT 1";
		$user_set = mysqli_query($db, $query);
		confirm_query($user_set);
		if($user = mysqli_fetch_assoc($user_set)) {
			return $user;
		} else {
			return null;
		}
	}

	function get_user_by_username($username) {
		global $db;

		// Sanitize input parameter prior to making query
		$safe_username = mysqli_real_escape_string($db, $username);

		$query 	= "SELECT * ";
		$query .= "FROM user ";
		$query .= "WHERE username = {$safe_username} ";
		$query .= "LIMIT 1";
		$user_set = mysqli_query($db, $query);
		confirm_query($user_set);
		if($user = mysqli_fetch_assoc($user_set)) {
			return $user;
		} else {
			return null;
		}
	}

	function get_all_quizzes() {
		global $db;

	  	$query  = "SELECT * ";
	  	$query .= "FROM quiz";

	  	$result = mysqli_query($db, $query);
	  	confirm_query($result);

	  	return $result;
	}

	function get_quiz_by_id($quiz_id) {
		global $db;

		// Sanitize input parameter prior to making query
		$safe_quiz_id = mysqli_real_escape_string($db, $quiz_id);

		$query 	= "SELECT * ";
		$query .= "FROM quiz ";
		$query .= "WHERE quiz_id = {$safe_quiz_id} ";
		$query .= "LIMIT 1";
		$quiz_set = mysqli_query($db, $query);
		confirm_query($quiz_set);
		if($quiz = mysqli_fetch_assoc($quiz_set)) {
			return $quiz;
		} else {
			return null;
		}
	}

	function get_all_questions() {
		global $db;

	  	$query  = "SELECT * ";
	  	$query .= "FROM question";

	  	$result = mysqli_query($db, $query);
	  	confirm_query($result);

	  	return $result;
	}

	function get_question_by_id($question_id) {
		global $db;

		// Sanitize input parameter prior to making query
		$safe_question_id = mysqli_real_escape_string($db, $question_id);

		$query 	= "SELECT * ";
		$query .= "FROM question ";
		$query .= "WHERE question_id = {$safe_question_id} ";
		$query .= "LIMIT 1";
		$question_set = mysqli_query($db, $query);
		confirm_query($question_set);
		if($question = mysqli_fetch_assoc($question_set)) {
			return $question;
		} else {
			return null;
		}
	}

	function get_quiz_questions($quiz_id) {
		global $db;

		// Sanitize input parameter prior to making query
		$safe_quiz_id = mysqli_real_escape_string($db, $quiz_id);

		$query 	= "SELECT * ";
		$query .= "FROM quiz_has_question ";
		$query .= "WHERE quiz_id = {$safe_quiz_id}";
		$question_set = mysqli_query($db, $query);
		confirm_query($question_set);

			
		return $question_set;
	}

	function get_question_answers($question_id) {
		global $db;

		// Sanitize input parameter prior to making query
		$safe_question_id = mysqli_real_escape_string($db, $question_id);

		$query 	= "SELECT * ";
		$query .= "FROM answer ";
		$query .= "WHERE question_id = {$safe_question_id}";
		$result = mysqli_query($db, $query);
		confirm_query($result);
		$answer_set = array();
		$id = 0;
		while ($row = mysqli_fetch_assoc($result)) {
		  $answer_set[$id++] = $row; 
		}
			
		return $answer_set;
	}
  
?>