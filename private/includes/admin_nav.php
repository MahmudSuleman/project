
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
<!--            <li class="nav-item dropdown">-->
<!--                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                    Add New Course-->
<!--                </a>-->
<!--                <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
<!--                    <a class="dropdown-item" href="addTrimesterCourse.php">Trimester Course</a>-->
<!--                    <a class="dropdown-item" href="addTimetableCourse.php">Timetable Course</a>-->
<!--                </div>-->
<!--            </li>-->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url_for('admin/addTrimesterCourse.php'); ?>">Add Trimester Course</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url_for('admin/addTimetableCourse.php'); ?>"> Add Timetable Course</a>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0" method="get" action="index.php?">
            <select name="index" id="index"  onchange="result()">
                <option value="courses">Course</option>
                <option value="timetable">Timetable</option>
            </select>
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search" id="search" onkeyup="result()" onfocus="result()">
        </form>


    </div>
    <li class="nav-item dropdown" style="list-style-type: none">
        <a class="nav-link dropdown-toggle admin" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo 'Hi, '. $_SESSION['username'].'!'; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo url_for("admin/profile.php"); ?>">Profile</a>
            <a class="dropdown-item" href="<?php echo url_for("admin/logout.php"); ?>">Logout</a>
        </div>
    </li>
</nav>
