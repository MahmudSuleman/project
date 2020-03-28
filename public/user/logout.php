<?php

require_once "../../private/init.php";

if(User::logOut())
    header("Location: ../index.php");
