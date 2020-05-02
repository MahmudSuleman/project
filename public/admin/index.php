<?php
require_once '../../private/init.php';
$title = "Homepage";
require_once SHARED_PATH . '/admin_header.php';
Admin::require_login();
require_once SHARED_PATH.'/admin_nav.php';
?>


<section class="content-area">

    <div class="table-area" id="live-search" style="height: 100vh; overflow-y: scroll">
        <p>Search for a course</p>

    </div>
</section>


<script>
    function result() {
        var str = document.getElementById('search').value;
        var index = document.getElementById('index').value;

        if (str.length == 0) {
            document.getElementById('live-search').innerHTML = 'Search for a course';
            return;
        }
        var xhr = '';
        if(window.XMLHttpRequest){
             xhr = new XMLHttpRequest();

        }else{
             xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhr.open("get", "./search.php?q=" + str + "&index=" + index, true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('live-search').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }
</script>

<?php require_once SHARED_PATH.'/footer.php';