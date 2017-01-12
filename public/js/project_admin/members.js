function demoteMember(user_id, project_id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    
    var formData = {
        user: user_id,
        project: project_id
    }

    $.ajax({
        type: "POST",
        url: '/demote',
        data: formData,
        dataType: 'json',
        success: function (data) {
            $("#manageMembers").load(location.href+" #manageMembers>*","");
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}
function promoteMember(user_id, project_id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    
    var formData = {
        user: user_id,
        project: project_id
    }

    $.ajax({
        type: "POST",
        url: '/promote',
        data: formData,
        dataType: 'json',
        success: function (data) {
            $("#manageMembers").load(location.href+" #manageMembers>*","");
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}
function removeMember(user_id, project_id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    
    if(!confirm('Are you sure you want to delete this member?')){
        return;
    }
    
    var formData = {
        user: user_id,
        project: project_id
    }

    $.ajax({
        type: "POST",
        url: '/remove',
        data: formData,
        dataType: 'json',
        success: function (data) {
            $("#manageMembers").load(location.href+" #manageMembers>*","");
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}
function acceptMember(user_id, project_id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    
    var formData = {
        user: user_id,
        project: project_id
    }

    $.ajax({
        type: "POST",
        url: '/acceptMember',
        data: formData,
        dataType: 'json',
        success: function (data) {
            $("#manageMembers").load(location.href+" #manageMembers>*","");
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}
function rejectMember(user_id, project_id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    
    if(!confirm('Are you sure you want to reject this member?')){
        return;
    }
    
    var formData = {
        user: user_id,
        project: project_id
    }

    $.ajax({
        type: "POST",
        url: '/declineMember',
        data: formData,
        dataType: 'json',
        success: function (data) {
            $("#manageMembers").load(location.href+" #manageMembers>*","");
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}