<?php

require_once '../../private/init.php';
$title = 'Add Trimester Course';
require_once SHARED_PATH . '/admin_header.php';
Admin::require_login();



if (isset($_POST['submit_course']))
{
//    print_r($_POST);
//    die();
    $args = [];
    $args['code'] = strtoupper($_POST['code']);
    $args['title'] = strtoupper($_POST['title']);
    $args['level'] = strtoupper($_POST['level']);
    $args['trimester'] = strtoupper($_POST['trimester']);
    $args['program'] = strtoupper($_POST['program']);
    $args['faculty'] = strtoupper($_POST['faculty']);
    $args['prog_type'] = strtoupper($_POST['program_type']);

    $course = new Course($args);
    if($course->create())
    {
        header('location: index.php');
    }
    else
    {
        echo 'failed';
    }
}
?>


    <div id="main-content">
        <hr>
        <p class="text-center">ADD TRIMESTER COURSE</p>
        <hr>
        <div class="container-fluid">
            <form method="post" action="addTrimesterCourse.php">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="code">Course Code</label>
                            <input required class="form-control" id="code" type="text" name="code" />
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="title">Course Title</label>
                            <input required class="form-control" id="title" type="text" name="title" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="trimester">Trimester</label>
                            <select required class="form-control" name="trimester" id="trimester">
                                <option value=""></option>
                                <option value="1" >1</option>
                                <option value="2" >2</option>
                            </select>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="faculty">Faculty</label>
                            <select required class="form-control" name="faculty" id="faculty" >
                                <option value=""></option>
                                <option value="FMS" >FMS</option>
                                <option value="FAS" >FAS</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="program">Program</label>
                            <select class="form-control" name="program" id="program" onfocus="populate_program('faculty', 'program')">
                                <option ></option>
                            </select>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="program_type">Program Type</label>
                            <select required class="form-control" name="program_type" id="program_type" onfocus="populate_program_type('program', 'program_type')">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="level">Level</label>
                            <select required class="form-control" name="level" id="level"   onfocus="populate_level('program_type', 'level')">
                                <option value="" ></option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" name="submit_course"  class="btn btn-m btn-primary mx-auto my-5">Add Course</button>
            </form>

        </div>
    </div>
<?php require_once SHARED_PATH . '/footer.php'; ?>