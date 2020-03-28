<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/28/2020
 * Time: 9:33 AM
 */

require_once '../../private/init.php';
require_once SHARED_PATH.'/header.php';
?>

<div id="main-content">
    <div class="container">
        <form method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input class="form-control" id="code" type="text"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" id="title" type="text"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="start">Start Time</label>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="hour">Hours</label>
                                <select name="startHour" id="hour" class="form-control">
                                    <?php
                                    for($i=7; $i<=18; $i++ )
                                        echo '<option value="'.$i.'">'.$i.'</option>'
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="minute">Minutes</label>
                                <select name="startMinute" id="minute" class="form-control">
                                    <?php
                                    for($i=0; $i<=55; $i += 5 )
                                        echo '<option value="'.$i.'">'.$i.'</option>'
                                    ?>
                                </select>
                            </div>

                        </div>

                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="start">End Time</label>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="eHour">Hours</label>
                                <select name="endHour" id="eHour" class="form-control">
                                    <?php
                                    for($i=7; $i<=18; $i++ )
                                        echo '<option value="'.$i.'">'.$i.'</option>'
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="minute">Minutes</label>
                                <select name="endMinute" id="minute" class="form-control">
                                    <?php
                                    for($i=0; $i<=55; $i += 5 )
                                        echo '<option value="'.$i.'">'.$i.'</option>'
                                    ?>
                                </select>
                            </div>

                        </div>

                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<? require_once SHARED_PATH.'/footer.php';