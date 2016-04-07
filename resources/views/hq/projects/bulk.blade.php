@extends('layouts.app-hq')

@section('content')
    <div class="container">
        <a href="{{ url("/hq/project/$project->id/bulk") }}" class="btn btn-default">Refresh</a><br><br>

        <form action="{{ url("/hq/project/$project->id/bulk") }}" method="post" class="dropzone" id="addPhotosForm">
            {{ csrf_field() }}
        </form>

        <div class="row bulk-container">
            @foreach ($photos as $photo)
                <div class="col-sm-3">
                    <button value="{{ $photo->id }}" class="btn btn-danger btn-xs photo-delete">
                        <span class="glyphicon glyphicon-remove"></span>
                    </button>
                    <img src="{{ url($photo->path_thumb) }}" class="img-thumbnail">
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
    <script>
        Dropzone.options.addPhotosForm = {
            paramName: 'photo',
            acceptedFiles: '.jpg, .jpeg, .png',
            maxFilesize: 6,
        }

        $(document).ready(function(){
            $(".photo-delete").click(function() {
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
                            url: '/hq/bulk/' + id,
                            data: {
                                '_token': '{{ csrf_token() }}'
                            },
                            success: function (data) {
                                if (data.status == 'success') {
                                    swal({title: "Deleted!", text: "Photo was deleted succesfully!", type: "success", "showConfirmButton": false});
                                    setTimeout(function(){
                                        window.location="{{ URL::current() }}";
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
    </script>
@endsection
