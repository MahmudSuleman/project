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

                <div class="updates-area">
                    <h3>
                        <table>
                            <tr>
                                <td>author:</td>
                                <td>Mahmud</td>
                            </tr>
                            <tr>
                                <td>description:</td>
                                <td>changed csc 102 to csc 104</td>
                            </tr>
                            <tr>
                                <td>time:</td>
                                <td>12/12/2020 @ 01:20PM</td>
                            </tr>
                        </table>
                    </h3>
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
include_once SHARED_PATH . '/footer.php';?>
