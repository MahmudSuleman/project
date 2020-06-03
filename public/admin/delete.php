<?php

include_once '../../private/init.php';

global $db;

if( isset(  $_GET['index'] ) && isset( $_GET['code'] ) ){

    if( $_GET['index'] == "courses"  ){

       $db->delete('courses', ['code' => h( $_GET['code'] )]);

        redirect_to(url_for('admin/index.php'));

    }

    else if( $_GET['index'] ==  "timetable" ){

        $db->delete('timetable', ['code' => h( $_GET['code'] )]);

        redirect_to(url_for('admin/index.php'));

    }
}
