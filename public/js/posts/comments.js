$(document).ready(function(){
    $("#new-comment-form").submit(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        e.preventDefault(); 

        var formData = {
            data: $(this).find('#new-comment-data').val(),
            post_id: $(this).find('#new-comment-post').val(),
            user_id: $(this).find('#new-comment-user').val()
        }

        console.log(formData);
        
        var type = "POST"; //for creating new resource

        $.ajax({
            type: type,
            url: '/newComment',
            data: formData,
            dataType: 'json',
            success: function (data) {
                loadComments();
            },
            error: function (data) {
                loadComments();
                $("#new-comment-data").attr('placeholder', 'Error');
            }
        });
    });
});

function loadComments() {
    $("#comments").load(location.href+" #comments>*","");
    $("#new-comment-data").text("");
}

function deleteComment(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    
    if(!confirm('Are you sure you want to delete this comment?')){
        return;
    }
    
    var formData = {
        id: id
    }

    $.ajax({
        type: "POST",
        url: '/deleteComment',
        data: formData,
        dataType: 'json',
        success: function (data) {
            loadComments();
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}