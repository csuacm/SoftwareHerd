function deleteUser(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    
    if(!confirm('Are you sure you want to delete this user?')){
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
        url: '/deleteUser',
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