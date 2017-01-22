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
            $("#manageProjects").load(location.href+" #manageProjects>*","");
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}