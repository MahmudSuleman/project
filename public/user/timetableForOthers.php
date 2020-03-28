<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/21/2020
 * Time: 10:39 PM
 */


require_once '../../private/init.php';
$title = "Timetable For Others";
require_once SHARED_PATH.'/header.php';

?>

<div id="main-content">
    <form method="get" action="coursesForOthers.php">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="faculty">Faculty</label>
                    <select class="form-control" name="faculty" id="faculty" required onchange="populate_program(this.id, 'program')">
                        <option value="">select</option>
                        <option value="fms">FMS</option>
                        <option value="fas">FAS</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="program">Program</label>
                    <select class="form-control" name="program" id="program" required onchange="populate_program_type(this.id,'program_type')">

                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="program_type">Program Type</label>
                    <select class="form-control" name="program_type" id="program_type" required onchange="populate_level(this.id, 'level')">

                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="level">Level</label>
                    <select class="form-control" name="level" id="level" required>

                    </select>
                </div>
            </div>
        </div>



        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-outline-primary btn-block">Continue</button>
        </div>




    </form>
</div>


<?php require_once SHARED_PATH.'/footer.php';