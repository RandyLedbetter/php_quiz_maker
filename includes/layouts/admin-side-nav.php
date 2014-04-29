<ul class="nav navbar-nav side-nav">
	<li class="<?php echo ($page == "index.php" ? "active" : "")?>"><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

	<li class="dropdown">
	  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Users <b class="caret"></b></a>
	  <ul class="dropdown-menu">
	    <li class="<?php echo ($page == "manage-users.php" ? "active" : "")?>"><a href="manage-users.php">Manage Users</a></li>
	    <li class="<?php echo ($page == "new-user.php" ? "active" : "")?>"><a href="new-user.php">New User</a></li>
	  </ul>
	</li>

	<li class="dropdown">
	  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Quizzes <b class="caret"></b></a>
	  <ul class="dropdown-menu">
	    <li class="<?php echo ($page == "manage-quizzes.php" ? "active" : "")?>"><a href="manage-quizzes.php">Manage Quizzes</a></li>
	    <li class="<?php echo ($page == "new-quiz.php" ? "active" : "")?>"><a href="new-quiz.php">New Quiz</a></li>
	  </ul>
	</li>

	<li class="dropdown">
	  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Questions <b class="caret"></b></a>
	  <ul class="dropdown-menu">
	    <li class="<?php echo ($page == "manage-questions.php" ? "active" : "")?>"><a href="manage-questions.php">Manage Questions</a></li>
	    <li class="<?php echo ($page == "new-question.php" ? "active" : "")?>"><a href="new-question.php">New Question</a></li>
	  </ul>
	</li>

	<li class="dropdown">
	  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Groups <b class="caret"></b></a>
	  <ul class="dropdown-menu">
	    <li class="<?php echo ($page == "manage-groups.php" ? "active" : "")?>"><a href="manage-groups.php">Manage Groups</a></li>
	    <li class="<?php echo ($page == "new-group.php" ? "active" : "")?>"><a href="new-group.php">New Group</a></li>
	  </ul>
	</li>

</ul>