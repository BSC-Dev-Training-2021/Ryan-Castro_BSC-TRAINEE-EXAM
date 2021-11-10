$("#signform").hide();
$("#inlogbt").hide();
$("#addnewitem").hide();

function inlog() {
        $("#signform").hide();
        $("#logform").show();
        $("#inlogbt").hide();
        $("#insignbt").show();
}
  
function insign() {
        $("#signform").show();
        $("#logform").hide();
        $("#inlogbt").show();
        $("#insignbt").hide();
}

function addnewitem() {

        $("#addnewitem").show();
        $("#hideitems").hide();

}
function addeditem() {

        $("#addnewitem").hide();
        $("#hideitems").show();
}