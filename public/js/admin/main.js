function clearActivated() {
    $('#manageSite-btn').removeClass('active');
    $('#manageSite').hide();
    $('#manageMembers-btn').removeClass('active');
    $('#manageMembers').hide();
    $('#manageProjects-btn').removeClass('active');
    $('#manageProjects').hide();
}

$(document).ready(function(){
    $("#manageSite-btn").click(function (e) {
        clearActivated();
        $(this).addClass('active');
        $('#manageSite').show();
    });
    
    $("#manageMembers-btn").click(function (e) {
        clearActivated();
        $(this).addClass('active');
        $('#manageMembers').show();
    });
    
    $("#manageProjects-btn").click(function (e) {
        clearActivated();
        $(this).addClass('active');
        $('#manageProjects').show();
    });
});