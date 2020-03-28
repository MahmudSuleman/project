<?php
/**
 * Created by PhpStorm.
 * User: Mahmud Suleman Sheikh Wunnam
 * Date: 12/25/2019
 * Time: 10:42 AM
 */


$title = "Timetable || Home";

require_once "../../private/init.php";
require_once SHARED_PATH."/header.php";
?>


<div id="main-content">
    <div class="container table-div">
        <table id="tabs-table">
            <tr>
                <td><a href="registerCourses.php">Register Courses</a></td>
                <td><a href="deregisterCourses.php">De-register Courses</a></td>
                <td> <a href="viewTimetable.php">View Timetable</a></td>
            </tr>

            <tr>
                <td><a href="updateUser.php">Update User Details</a></td>
                <td><a href="timetableForOthers.php">Timetable for Others</a></td>
                <td><a href="contactUs.php">Contact Us</a></td>
            </tr>

            <tr>
                <td><a href="resetPassword.php">Reset Password</a></td>
                <td><a href="#">User Profile</a></td>
                <td><a href="logout.php">LogOut</a></td>
            </tr>

        </table>
    </div>
</div>

<?php require_once '../../private/includes/footer.php';?>