<?php

require_once '../../private/init.php';
$title = 'Add Trimester Course';
require_once SHARED_PATH . '/admin_header.php';
Admin::require_login();



if (isset($_POST['submit_timetable']))
{
    $args = [];
    $args['code'] = strtoupper($_POST['code']);
    $args['startTime'] = strtoupper($_POST['startTime']);
    $args['endTime'] = strtoupper($_POST['endTime']);
    $args['day'] = strtoupper($_POST['day']);
    $args['hall'] = strtoupper($_POST['hall']);
    $args['faculty'] = strtoupper($_POST['faculty']);
    $args['program'] = strtoupper($_POST['program']);

    $timetable = new TimeTable($args);
    if($timetable->addCourse())
    {
        header('location: index.php');
    }

}
?>


<div id="main-content">
    <hr>
    <p class="text-center">ADD TIMETABLE COURSE</p>
    <hr>
    <div class="container-fluid">
    <form method="post" action="addTimetableCourse.php">
            <div class="row">
                <div class="col-sm-6 form-group">
                    <label for="code">Code</label>
                    <input required id="code" class="form-control" type="text" name="code"/>
                </div>
                <div class="col-sm-6 form-group">
                    <label for="startTime">Start Time</label>
                    <input id="startTime" class="form-control" type="time" name="startTime"/>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 form-group">
                    <label for="endTime">End Time</label>
                    <input required id="endTime" class="form-control" type="time" name="endTime"/>
                </div>
                <div class="col-sm-6 form-group">
                    <label for="day">Day</label>
                    <select required class="form-control" name="day" id="day">
                        <option value="" ></option>
                        <option value="1" >Monday</option>
                        <option value="2" >Tuesday</option>
                        <option value="3" >Wednesday</option>
                        <option value="4" >Thursday</option>
                        <option value="5" >Friday</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 form-group">
                    <label for="hall">Hall</label>
                    <input required id="hall" class="form-control" type="text" name="hall"  />
                </div>
                <div class="col-sm-6 form-group">
                    <label for="trimester">Trimester</label>
                    <select required class="form-control" name="trimester" id="trimester">
                        <option value="" ></option>
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 form-group">
                    <label for="faculty">Faculty</label>
                    <select required name="faculty" id="faculty" class="form-control">
                        <option value=""></option>
                        <option value="FAS" >FAS</option>
                        <option value="FMS" >FMS</option>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label for="program">Program</label>
                    <select required name="program" id="program" class="form-control"  onfocus="populate_program('faculty', 'program')">
                        <option value=""> </option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-m my-5" name="submit_timetable" >Add Course</button>
    </form>

    </div>
    </div>
    <?php require_once SHARED_PATH . '/footer.php'; ?>