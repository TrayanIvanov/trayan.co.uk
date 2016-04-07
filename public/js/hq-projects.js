$(document).ready(function(){
    $(".project-delete").click(function() {
        var id = $(this).val();
        swal({
            title: "Are you sure?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            closeOnConfirm: false,
            closeOnCancel: true,
        },
        function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    type: 'delete',
                    url: 'project/' + id,
                    data: {
                        '_token': csrf_token
                    },
                    success: function (data) {
                        if (data.status == 'success') {
                            swal("Deleted!", "Project was deleted succesfully!", "success");
                            setTimeout(function(){
                                window.location=url_current;
                            }, 1000);
                        } else {
                            swal("Error", "Please, try again later!", "error");
                        }
                    },
                });
            }
        });
    });

    $(".project-activate").click(function() {
        var id = $(this).val();
        swal({
            title: "Are you sure?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            closeOnConfirm: false,
            closeOnCancel: true,
        },
        function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    type: 'post',
                    url: 'project/change_status/' + id,
                    data: {
                        '_token': csrf_token
                    },
                    success: function (data) {
                        if (data.status == 'success') {
                            swal("Changed!", "Project's status was changed!", "success");
                            setTimeout(function(){
                                window.location=url_current;
                            }, 1000);
                        } else {
                            swal("Error", "Please, try again later!", "error");
                        }
                    },
                });
            }
        });
    });

    $(".project-index").click(function() {
        var id = $(this).val();
        swal({
            title: "Are you sure?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            closeOnConfirm: false,
            closeOnCancel: true,
        },
        function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    type: 'post',
                    url: 'project/change_frontman/' + id,
                    data: {
                        '_token': csrf_token
                    },
                    success: function (data) {
                        if (data.status == 'success') {
                            swal("Changed!", "Project's front visibility was changed!", "success");
                            setTimeout(function(){
                                window.location=url_current;
                            }, 1000);
                        } else {
                            swal("Error", "Please, try again later!", "error");
                        }
                    },
                });
            }
        });
    });
});
