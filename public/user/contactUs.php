<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/25/2020
 * Time: 7:35 AM
 */

require_once '../../private/init.php';
$title = 'Contact Us';
//todo remember to add page titles to all the pages.

require_once SHARED_PATH.'/header.php';
?>

<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <label for="title">Subject</label>
                    <input id="title" class="form-control" type="text" name="subject"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <label for="detail">details</label>
                    <textarea id="detail" class="form-control" type="text" name="detail-text"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once SHARED_PATH.'/footer.php';?>
