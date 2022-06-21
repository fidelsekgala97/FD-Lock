$(document).ready(function() {

    var a = $("#pattern-box > div").remove().toArray();

    for (var i = a.length - 1; i >= 1; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var bi = a[i];
        var bj = a[j];
        a[i] = bj;
        a[j] = bi;
    }
    $("#pattern-box").append(a);
    var btns = $("#pattern-box > div"); 
    var pattern = '';
    for (let i = 0; i < 16; i++) {

        btns[i].onclick = function() {
            
            btns[i].style.backgroundColor = "#ccc";
            pattern +=btns[i].id;
            $('#pattern').attr('value', pattern)
        } 
    }
    
});