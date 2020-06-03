var faculty = document.getElementById("faculty");
var program = document.getElementById("program");
var program_type = document.getElementById("program_type");
var level = document.getElementById("level");



function populate_program()
{

    var query = "SELECT DISTINCT program FROM category WHERE faculty = '"+faculty.value +"'";
    var xhr = new XMLHttpRequest();
    xhr.open("get", "category_data.php?type=program&q=" + query, true);

    xhr.onreadystatechange = function()
    {
        if(xhr.readyState == 4 && xhr.status == 200)
        {
            var data = xhr.responseText;
            program.innerHTML = data;
        }

    };

    xhr.send();
}

function populate_program_type()
{

    var query = "SELECT DISTINCT program_type FROM category WHERE program = '"+program.value +"'";
    var xhr = new XMLHttpRequest();
    xhr.open("get", "category_data.php?type=program_type&q=" + query, true);

    xhr.onreadystatechange = function()
    {
        if(xhr.readyState == 4 && xhr.status == 200)
        {
            var data = xhr.responseText;
            program_type.innerHTML = data;
        }

    };

    xhr.send();
}


function populate_level()
{

    var query = "SELECT DISTINCT level FROM category WHERE program_type = '"+program_type.value +"'";
    var xhr = new XMLHttpRequest();
    xhr.open("get", "category_data.php?type=level&q=" + query, true);

    xhr.onreadystatechange = function()
    {
        if(xhr.readyState == 4 && xhr.status == 200)
        {
            var data = xhr.responseText;
            level.innerHTML = data;
        }

    };

    xhr.send();
}




faculty.addEventListener("change",populate_program);
program.addEventListener("change", populate_program_type);
program_type.addEventListener("change", populate_level);
