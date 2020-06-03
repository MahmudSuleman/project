<?php
/**
 * Created by PhpStorm.
 * User: Chamtooni
 * Date: 3/6/2020
 * Time: 10:30
 */

require_once '../private/init.php';
$title = 'Homepage';
require_once SHARED_PATH . '/admin_header.php';
global $db;
$sql = "SELECT * FROM project.updates ORDER BY  daytime DESC LIMIT 5";
$updates = $db->pdoQuery($sql)->aResults;
if(isset($_POST['send'])){
    global $db;
    $email = $_POST['email'];
    $message = $_POST['message'];
    $result = $db->insert("contacts", ['email'=>$email, 'message'=>$message]);

    if($result)
        echo "<script>alert('Message sent! Thanks for your contribution...')</script>";


}
// todo implement the messages functionality fro the admin
?>


<div class="section-main">
    <div class="logo-box row">

        <div class="logo-box__items">
            <h1>
                <span class="logo-box__text1">get your timetable</span>
                <span class="logo-box__text2">anytime, anywhere</span>
            </h1>

            <a class="btn btn-extract" href="#timetable">extract now</a>
        </div>

    </div>

    <section class="section-about">
        <h2 class="section-about__title">about</h2>

        <div class="row">
            <div class="col section-about__how-to">
                <h2>how to extract your timetable</h2>

                <ol type="1">
                    <li>click on the extract now button above</li>
                    <li>fill the form shown to you by providing:
                        <ul type="i">
                            <li>faculty</li>
                            <li>department</li>
                            <li>program</li>
                            <li>program type (degree/diploma)</li>
                            <li>level</li>

                        </ul>
                    </li>
                    <li>click on proceed</li>
                    <li>choose the courses you have registered</li>
                    <li>click on proceed</li>
                    <li>there you go, you can save your timetable as pdf or print</li>
                </ol>
            </div>
            <div class="col section-about__updates">
                <h2>last updated</h2>

                <div class="updates-area" style="overflow-y: scroll">
                    <?php if(!empty($update)){
                        foreach ($updates as $update) {?>
                    <h3>
                        <table style="margin-bottom: 20px; background-color: #fffcc8">
                            <tr>
                                <td>author:</td>
                                <td><?php echo $update['author'] ?></td>
                            </tr>
                            <tr>
                                <td>Course:</td>
                                <td><?php echo $update['course'] ?></td>
                            </tr>
                            <tr>
                                <td>description:</td>
                                <td><?php echo $update['detail'] ?></td>
                            </tr>
                            <tr>
                                <td>time:</td>
                                <td><?php echo $update['daytime'] ?></td>
                            </tr>
                        </table>
                    </h3>
                    <?php }} else{echo "NO UPDATES AVAILABLE...";} ?>
                </div>

            </div>
        </div>
    </section>

    <section class="section-timetable" id="timetable">
        <h2 class="mt-lg-5 text-center">get your timetable </h2>

        <form method="get" action="selectCourses.php" >
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="faculty">faculty</label>
                        <select required name="fac" id="faculty" class="form-control">
                            <option value="#">SELECT FACULTY</option>
                            <option value="FMS">FMS</option>
                            <option value="FAS">FAS</option>
                        </select>
                    </div>
                </div>


                <div class="col">
                    <div class="form-group">
                        <label for="program">program</label>
                        <select required name="prog" id="program" class="form-control">
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="program_type">Program type</label>
                        <select required name="prog_type" id="program_type" class="form-control"></select>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="level">level</label>
                        <select required name="level" id="level" class="form-control">
                        </select>
                    </div>
                </div>
            </div>
            <button id="btn" name="submit" type="submit" class="btn btn-proceed btn-block">proceed</button>
        </form>

        <div id="main"></div>

    </section>

</div>
<?php
include_once SHARED_PATH . '/footer_nav.php';
include_once SHARED_PATH . '/footer.php';?>
