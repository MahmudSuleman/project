<?php
/**
 * Created by PhpStorm.
 * User: Chamtooni
 * Date: 2/22/2020
 * Time: 9:02 PM
 */

//todo convert all cases to upper before submitting to db;
require_once '../../private/init.php';
$title = 'Edit Administrator Details';
require_once SHARED_PATH .'/admin_header.php';
//todo if start time greater than end time form timetable course, do not submit data
Admin::require_login();

if(isset($_POST['submit_timetable'])){
//    die('clicked');

    $args= [];
    $args['code'] = $_POST['code'];
    $args['startTime'] = $_POST['startTime'];
    $args['endTime'] = $_POST['endTime'];
    $args['day'] = $_POST['day'];
    $args['hall'] = $_POST['hall'];
    $args['faculty'] = $_POST['faculty'];
    $args['trimester'] = $_POST['trimester'];
    $args['program'] = $_POST['program'];

    $update = $_POST['updates'];
    $daytime = date("Y-m-d h:m a");
    $author = $_SESSION['username'];
    $course = $_POST['code'];

    global $db;
    $db->insert("updates", ["author"=>$author, "detail"=>$update, "course"=> $course]);
    $data = new TimeTable($args);
    if($data->updateCourse() ){header('location: index.php');}else{echo 'failed'; die();}

}else if(isset($_POST['submit_course'])){
//    die('clicked');
    $args = [];
    $args['code'] = $_POST['code'];
    $args['title'] = $_POST['title'];
    $args['level'] = $_POST['level'];
    $args['trimester'] = $_POST['trimester'];
    $args['faculty'] = $_POST['faculty'];
    $args['program'] = $_POST['program'];
    $args['prog_type'] = $_POST['program_type'];

    $data = new Course($args);
    if($data->update()){header('location: index.php');}else{echo 'failed';}

}else {
    $index = $_GET['index'];
    $course = $_GET['code'];
    if ($index == 'timetable')
        $get_course = TimeTable::find($course);
    else if ($index == 'courses')
        $get_course = Course::find($course);

//var_dump($get_course);
//    die();
    else
        header('location: index.php');

}
?>

<div id="main-content">

    <div class="form-div container">
        <div class="form-div__header">
            <h3 class="form-div__header--text">Edit <?= $index?> Data</h3>
        </div>
        <form action="edit.php?index=<?= $index ?>&code=<?= $course ?>" method="post">
            <?php if($index == 'timetable'){?>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="code">Code</label>
                        <input readonly id="code" class="form-control" type="text" name="code" value="<?= $get_course['code']?>"/>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="startTime">Start Time</label>
                        <input id="startTime" class="form-control" type="time" name="startTime" value="<?= $get_course['startTime']?>"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="endTime">End Time</label>
                        <input id="endTime" class="form-control" type="time" name="endTime" value="<?= $get_course['endTime']?>"/>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="day">Day</label>
                        <select class="form-control" name="day" id="day">
                            <option value="1" <?php if($get_course['day'] == 1) {echo 'selected';}?>>Monday</option>
                            <option value="2" <?php if($get_course['day'] == 2) echo 'selected';?>>Tuesday</option>
                            <option value="3" <?php if($get_course['day'] == 3) echo 'selected';?>>Wednesday</option>
                            <option value="4" <?php if($get_course['day'] == 4) echo 'selected';?>>Thursday</option>
                            <option value="5" <?php if($get_course['day'] == 5) echo 'selected';?>>Friday</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="hall">Hall</label>
                        <input id="hall" class="form-control" type="text" name="hall" value="<?= $get_course['hall']; ?>"/>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="trimester">Trimester</label>
                        <select class="form-control" name="trimester" id="trimester">
                            <option value="1" <?php if($get_course['trimester']==1) echo 'selected';?>>1</option>
                            <option value="2" <?php if($get_course['trimester'] ==2) echo 'selected';?>>2</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="faculty">Faculty</label>
                        <select name="faculty" id="faculty" class="form-control">
                            <option value=""></option>
                            <option value="FMS" <?php if($get_course['faculty']== 'FMS') echo 'selected';?>>FMS</option>
                            <option value="FAS" <?php if($get_course['faculty'] == 'FAS') echo 'selected';?>>FAS</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="program">Program</label>
                        <select name="program" id="program" class="form-control"  onfocus="populate_program('faculty', this.id)">
                            <option value="<?= $get_course['program']; ?>"><?= $get_course['program']; ?></option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 off-set-3">
                        <label for="updates">What has changed?</label>
                        <textarea name="updates" id="updates" cols="100" rows="5" required></textarea>
                    </div>
                </div>
                <button class="btn btn-primary btn-m" name="submit_timetable" type="submit">Update</button>


            <?php }else if($index == 'courses'){?>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="code">Course Code</label>
                        <input readonly class="form-control" id="code" type="text" name="code" value="<?= $get_course['code'];?>"/>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="title">Course Title</label>
                        <input class="form-control" id="title" type="text" name="title" value="<?= $get_course['title']?>"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="trimester">Trimester</label>
                        <select class="form-control" name="trimester" id="trimester">
                            <option value=""></option>
                            <option value="1" <?php if($get_course['trimester'] == 1) echo 'selected' ?>>1</option>
                            <option value="2" <?php if($get_course['trimester'] == 2) echo 'selected' ?>>2</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="faculty">Faculty</label>
                        <select class="form-control" name="faculty" id="faculty" >
                            <option value=""></option>
                            <option value="fms" <?php if($get_course['faculty'] == 'FMS') echo 'selected' ?>>FMS</option>
                            <option value="fas" <?php if($get_course['faculty'] == 'FAS') echo 'selected' ?>>FAS</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="program">Program</label>
                        <select class="form-control" name="program" id="program" onfocus="populate_program('faculty', 'program')">
                            <option value="<?= $get_course['program']?>"><?= $get_course['program']?></option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="program_type">Program Type</label>
                        <select class="form-control" name="program_type" id="program_type" onfocus="populate_program_type('program', 'program_type')">
                            <option value="<?= $get_course['program_type']?>"><?= $get_course['program_type']?></option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="level">Level</label>
                        <select class="form-control" name="level" id="level"   onfocus="populate_level('program_type', 'level')">
                            <option value="<?= $get_course['level']?>"><?= $get_course['level']?></option>
                        </select>
                    </div>
                </div>
                <button name="submit_course" type="submit" class="btn btn-m btn-primary mx-auto">Update</button>

            <?php }else{header('location: index.php');}?>
        </form>
    </div>



</div>
<?php require_once SHARED_PATH . '/footer.php';