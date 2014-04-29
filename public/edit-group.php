<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation-functions.php"); ?>

<?php $page = "edit-group.php"; ?>

<?php include('../includes/layouts/header.php'); ?>



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
        <h1>Edit Group: <small>Control Panel</small></h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="icon-dashboard"></i> Dashboard</a></li>
          <li class="active"><i class="icon-file-alt"></i> Edit Group</li>
        </ol>
        <hr />
      </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->

    <!-- Display conditional error message -->
    <?php 
      if(!empty($message)) { 
    
        echo "<div class=\"alert alert-dismissable alert-danger col-lg-4 col-lg-offset-1 pull-left\">";
        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>";
        echo "<strong><?php echo $message; ?></strong>";
        echo "</div>";
      }
    ?>
    <?php echo display_form_errors($error_messages); ?>
  
      <div class="clearfix"></div>
        <div class="panel tbp-panel-inverse">
          <div class="panel-heading">
            <h3 class="panel-title"><strong>Group Name</strong></h3>
          </div>
          <div class="panel-body">
             <form class="form-horizontal" role="form">
              <div class="form-group">
                <label for="new-quiz-name-field" class="col-lg-2 control-label">Add Members to this Group</label>
                <div class="col-lg-10">
                  <textarea class="form-control" rows="10" id="add-group-members-textarea" name="add-group-members-textarea" value="<?php echo isset($form_values['question_text']) ? $form_values['question_text'] : '' ?>"
                          placeholder='jdoe@bingmail.com;janedoe@example.com;demostudent39@someuniversity.edu' class="input-xlarge"></textarea>
                          <p class="help-block">Assign individuals to this group by the email address they used to create their Test Builder Pro account.</p>
                          <p class="help-block">Separate each email address with a semi-colon.</p>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-12">
                  <div class="pull-right">
                    <button type ="submit" id="submit-edit-group" name="submit-edit-group" value="submit-edit-group" class="btn btn-primary">Update Group</button>
                    <a href="manage-groups.php" id="cancel-edit-group" name="cancel-edit-group" class="btn btn-default">Cancel</a>
                    <!-- Button trigger modal -->
                    <a class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete-modal">Delete Group</a> 
                  </div>
                </div>
              </div>
            </form>
          </div>
      </div>
        
       

  </div><!-- /#page-wrapper -->

<?php include('../includes/layouts/footer.php'); ?>