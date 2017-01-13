function deletePost(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    
    if(!confirm('Are you sure you want to delete this post?')){
        return;
    }
    
    var formData = {
        id: id
    }

    $.ajax({
        type: "POST",
        url: '/deletePost',
        data: formData,
        dataType: 'json',
        success: function (data) {
            $("#managePosts").load(location.href+" #managePosts>*","");
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}

function resetPostForm() {
    $('#new-post-form').find('#new-post-title').text("");
    $('#new-post-form').find('#new-post-summary').text("");
    tinyMCE.activeEditor.setContent("");
    $('#new-post-form').attr('action', '/createPost');
}

function editPost(id) {
    newPost();
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    
    var formData = {
        id: id
    }

    $.ajax({
        type: "GET",
        url: '/editPost',
        data: formData,
        dataType: 'json',
        success: function (data) {
            $('#new-post-form').find('#new-post-title').text(data.title);
            $('#new-post-form').find('#new-post-summary').text(data.summary);
            tinyMCE.activeEditor.setContent(data.info);
            $('#new-post-form').find('#update-post-id').val(id);
            $('#new-post-form').attr('action', '/updatePost');
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}

function createPost(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    
    if(!confirm('Are you sure you want to delete this post?')){
        return;
    }
    
    var formData = {
        id: id
    }

    $.ajax({
        type: "POST",
        url: '/deletePost',
        data: formData,
        dataType: 'json',
        success: function (data) {
            $("#managePosts").load(location.href+" #managePosts>*","");
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}