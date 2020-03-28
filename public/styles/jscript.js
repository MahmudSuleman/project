function populate_program(s1, s2){
    var s1 = document.getElementById(s1);
    var s2 = document.getElementById(s2);

    s2.innerHTML = '';

    if(s1.value == 'FMS'){
        var optionsArray = [
            '|',
            'ACTUARIAL SCIENCE|ACTUARIAL SCIENCE',
            'COMPUTER SCIENCE|COMPUTER SCIENCE',
            'FINANCIAL MATHEMATICS|FINANCIAL MATHEMATICS',
            'PURE MATHEMATICS|PURE MATHEMATICS',
            'STATISTICS|STATISTICS',
            'MATHEMATICS WITH ECONOMICS|MATHEMATICS WITH ECONOMICS',
            'COMPUTING WITH ACCOUNTING|COMPUTING WITH ACCOUNTING'
        ];


    }

    for(var option in optionsArray){
        var pair = optionsArray[option].split('|');
        var newOption = document.createElement('option');
        newOption.value = pair[0];
        newOption.innerHTML = pair[1];
        s2.options.add(newOption);
    }
}


function populate_program_type(s1, s2){
    var s1 = document.getElementById(s1);
    var s2 = document.getElementById(s2);

    s2.innerHTML = '';

    if(s1.value == 'computer science' || s1.value == 'statistics' ){
        var optionsArray = ['|', 'degree|Degree', 'diploma|Diploma'];
    }else if(s1.value != 'computer science' || s1.value != 'statistics' ) {
        var optionsArray = ['|','degree|Degree']
    }

    for(var option in optionsArray){
        var pair = optionsArray[option].split('|');
        var newOption = document.createElement('option');
        newOption.value = pair[0];
        newOption.innerHTML = pair[1];
        s2.options.add(newOption);
    }
}



function populate_level(s1, s2){
    var s1 = document.getElementById(s1);
    var s2 = document.getElementById(s2);

    s2.innerHTML = '';

    if(s1.value == 'degree'){
        var optionsArray = ['|','100|100', '200|200', '300|300', '400|400'];
    }else{
        var optionsArray = ['|','100|100', '200|200'];
    }

    for(var option in optionsArray){
        var pair = optionsArray[option].split('|');
        var newOption = document.createElement('option');
        newOption.value = pair[0];
        newOption.innerHTML = pair[1];
        s2.options.add(newOption);
    }
}