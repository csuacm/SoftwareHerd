function clearActivated() {
    $('#manageProject-btn').removeClass('active');
    $('#manageProject').hide();
    $('#manageMembers-btn').removeClass('active');
    $('#manageMembers').hide();
    $('#managePosts-btn').removeClass('active');
    $('#managePosts').hide();
    $('#newPost').hide();
}

$(document).ready(function(){
    $("#manageProject-btn").click(function (e) {
        clearActivated();
        $(this).addClass('active');
        $('#manageProject').show();
    });
    
    $("#manageMembers-btn").click(function (e) {
        clearActivated();
        $(this).addClass('active');
        $('#manageMembers').show();
    });
    
    $("#managePosts-btn").click(function (e) {
        clearActivated();
        $(this).addClass('active');
        $('#managePosts').show();
    });
});

function newPost() {
    $('#managePosts').hide();
    $('#newPost').show();
    resetPostForm();
}

function deleteProject(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    
    if(!confirm('Are you sure you want to delete this project?')){
        return;
    }
    if(!confirm('Are you SURE sure?')){
        return;
    }
    
    var formData = {
        id: id
    }

    $.ajax({
        type: "POST",
        url: '/deleteProject',
        data: formData,
        dataType: 'json',
        success: function (data) {
             window.location = "/project_library";
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}