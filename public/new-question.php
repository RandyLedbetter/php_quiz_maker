<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation-functions.php"); ?>
<?php require_once("../includes/db-connection.php"); ?>
<?php include('../includes/layouts/header.php'); ?>

<?php $page = "new-question.php"; ?>

<body>

<div id="wrapper">

  <!-- Sidebar -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Test Builder Pro - Admin</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <?php include('../includes/layouts/admin-side-nav.php'); ?>

      <ul class="nav navbar-nav navbar-right navbar-user">
        <li class="dropdown user-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
            <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
            <li class="divider"></li>
            <li><a href="#"><i class="fa fa-power-off"></i> Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </nav>
  <div id="page-wrapper">

    <div class="row">
      <div class="col-lg-12">
        <h1>New Question <small>Control Panel</small></h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="icon-dashboard"></i> Dashboard</a></li>
          <li class="active"><i class="icon-file-alt"></i> New Question</li>
        </ol>
        <hr />
      </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->

    <!-- Display conditional messages and/or errors -->
    <?php $error_messages = errors(); ?>
    <?php $form_values = form_history() ?>
    <?php echo display_form_errors($error_messages); ?>
    <?php echo user_form_info_msg(); ?>
    <?php echo user_form_failure_msg(); ?>
      
      
    <div class="clearfix"></div>
      <div class="row">
        <div class="col-lg-12">
          <h2 id="nav-tabs">Question Type</h2>
            <div class="bs-example">
              <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                <li class="active"><a href="#new-mc-question-form" data-toggle="tab">Multiple Choice</a></li>
                <li><a href="#new-essay-question-form" data-toggle="tab">Essay</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in col-lg-offset-1 col-lg-6" id="new-mc-question-form">
                  <p>
                    <form class="form-horizontal" action="process-new-mc-question.php" method="post">
                      <div class="form-group">
                        <div class="col-sm-12">
                        <label for="question_text">Question Text</label>
                        <textarea class="form-control" rows="3" id="question_text" name="question_text" value="<?php echo isset($form_values['question_text']) ? $form_values['question_text'] : '' ?>"placeholder="Ex. What color is an apple?" class="input-xlarge"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-12">
                        <label for="answer1 control-label">Answer 1</label>
                        <textarea class="form-control" rows="1" id="answer1" name="answer1" value="<?php echo isset($form_values['answer_text']) ? $form_values['answer_text'] : '' ?>"placeholder="Ex. Orange" class="input-xlarge"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-12">
                          <label class="text-info">
                            <input type="radio" name="ischecked" id="ischecked1" value="1" checked>
                            Is Correct
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-12">
                        <label for="answer2 control-label">Answer 2</label>
                        <textarea class="form-control" rows="1" id="answer2" name="answer2" value="<?php echo isset($form_values['answer_text']) ? $form_values['answer_text'] : '' ?>"placeholder="Ex. Red" class="input-xlarge"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-12">
                          <label class="text-info">
                            <input type="radio" name="ischecked" id="ischecked2" value="2">
                            Is Correct
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-12">
                        <label for="answer3 control-label">Answer 3</label>
                        <textarea class="form-control" rows="1" id="answer3" name="answer3" value="<?php echo isset($form_values['answer_text']) ? $form_values['answer_text'] : '' ?>"placeholder="Ex. Green" class="input-xlarge"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-12">
                          <label class="text-info">
                            <input type="radio" name="ischecked" id="ischecked3" value="3">
                            Is Correct
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-12">
                        <label for="answer4 control-label">Answer 4</label>
                        <textarea class="form-control" rows="1" id="answer4" name="answer4" value="<?php echo isset($form_values['answer_text']) ? $form_values['answer_text'] : '' ?>"placeholder="Ex. Red or Green" class="input-xlarge"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-12">
                          <label class="text-info">
                            <input type="radio" name="ischecked" id="ischecked4" value="4">
                            Is Correct
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-12">
                          <label for="weight control-label">Points <span class="text-help">Between 1 and 100</span></label>
                            <input type="number" class="form-control" name="weight" min="1" max="100" value="10" placeholder="10">
                        </div>
                      </div>

                      <!-- Button -->
                      <div class="col-sm-offset-10 col-sm-2">
                        <label for="submit-new-mc-question"></label>
                          <button type ="submit" id="submit-new-mc-question" name="submit-new-mc-question" value="submit-new-mc-question" class="btn btn-primary pull-right tbp-flush-right">Create New Question</button>
                      </div>

                    </form>
                  </p>
                </div>
                <div class="tab-pane fade col-lg-offset-1 col-lg-6" id="new-essay-question-form">
                  <p>
                    <form class="form-horizontal" action="process-new-user.php" method="post">
                      <div class="form-group">
                        <div class="col-sm-12">
                        <label for="first_name">Question Text</label>
                        <textarea class="form-control" rows="4" id="question-text" name="question-text" value="<?php echo isset($form_values['question_text']) ? $form_values['question_text'] : '' ?>"
                          placeholder='Ex. If a six-string guitar is tuned in Standard E, what notes would each string be tuned to? List them from the lowest pitch to the highest.' class="input-xlarge"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-12">
                        <label for="answer1 control-label">Answer 1</label>
                        <textarea class="form-control" rows="10" id="answer1" name="answer1" value="<?php echo isset($form_values['answer_text']) ? $form_values['answer_text'] : '' ?>"
                          placeholder="Ex. E, A, D, G, B, E." class="input-xlarge"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-12">
                        <label for="weight control-label">Points</label>
                        <input type="number" name="weight" min="1" max="100">
                        </div>
                      </div>

                      

                      <!-- Button -->
                      <div class="col-sm-offset-10 col-sm-2">
                        <label for="submit-new-user"></label>
                        <button type ="submit" id="submit-new-question" name="submit-new-question" value="submit-new-question" class="btn btn-primary pull-right tbp-flush-right">Create New Question</button>
                      </div>

                    </form>
                  </p>
                </div>
              </div>
            </div>
        </div>
      </div>
  </div><!-- /#page-wrapper -->

<script>
  function resetNewUserForm() {
    location.reload();
  }
</script>
<?php include('../includes/layouts/footer.php'); ?>
<?php require_once("../includes/db-connection-close.php"); ?>