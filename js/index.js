//event para name
$(function() {
    var name = $("#name");
    name.keyup(function() {
        var $this = $(this);
        var nameLength = $this.val().length;

        if (nameLength >= 13) {
            $this.css('background-color', '#FFFA6A');
        } else {
            $this.css('background-color', '#FFFFFF');
        }
    });
    
    name.blur(function(){
        var $this = $(this);
        var nameLength = $this.val().length;
        if (nameLength == 0) {
            $this.css('background-color', '#FFFAAA');
        }
    });
    $('form').submit(function(){
        if (cond){
           return false;
        }
    });
    //event para pass
    var pass = $("#pass");
    pass.keyup(function() {
        var $this1 = $(this);
        var passLength = $this1.val().length;

        if (passLength >= 13) {
            $this1.css('background-color', '#FFFA6A');
        } else {
            $this1.css('background-color', '#FFFFFF');
        }
    });
    
    pass.blur(function(){
        var $this1 = $(this);
        var passLength = $this1.val().length;
        if (passLength == 0) {
            $this1.css('background-color', '#FFFAAA');
        }
    });
    $('form').submit(function(){
        if (cond){
           return false;
        }
    });
//event para duplicated-pass
var pass = $("#duplicated_pass");
    pass.keyup(function() {
        var $this1 = $(this);
        var passLength = $this1.val().length;

        if (passLength >= 13) {
            $this1.css('background-color', '#FFFA6A');
        } else {
            $this1.css('background-color', '#FFFFFF');
        }
    });
    
    pass.blur(function(){
        var $this1 = $(this);
        var passLength = $this1.val().length;
        if (passLength == 0) {
            $this1.css('background-color', '#FFFAAA');
        }
    });
    $('form').submit(function(){
        if (cond){
           return false;
        }
    });

});

