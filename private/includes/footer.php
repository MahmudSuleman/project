
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <div class="credits">
                    <h3 class="credits-title">credits</h3>
                    <h4>STUDENT</h4>
                    <p>Mahmud Suleman Sheikh W.</p>
                    <p>UDS, Navrongo Campus</p>
                    <p>BSc. Computer Science</p>
                    <p>2019/20</p>


                    <h4 class="mt-5">SUPERVISOR</h4>
                    <p>Mr. Stephen Akobre</p>
                    <p>UDS, Navrongo Campus</p>
                    <p>Lecturer</p>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="contact">
                    <h3 class="credits-title">Contact Us</h3>

                    <form action="">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" cols="30" rows="5" clas="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="send" class="btn btn-outline-primary btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="about">
                    <h4 class="credits-title">About</h4>
                    <p>This website was designed as an undergraduate final year project specifically for UDS,Navrongo campus to help the students get an extracted timetable based on the courses they offer.</p>
                </div>
            </div>
        </div>

    </div>

    <div class="copyright">
        <p>copyright &copy; UDS 2019-<?= date("y");?></p>
    </div>


</footer>

<script src="../../node_modules/popper.js/src/index.js"></script>
<script src="../../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../public/styles/jscript.js"></script>