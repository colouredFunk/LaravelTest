@extends('layout.main')
@section('content')

<form action="#" method="POST" id="reportForm">
    <input type="hidden" class="form-control" name="id" id="id">   
    <input type="text" class="form-control" name="fName" id="fName">
    <input type="text" class="form-control" name="status" id="status">
    <button type="submit" class="btn btn-lg btn-success "><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
</form>
<script type="text/javascript">
    $(document).ready(function () {
        $('form').submit(function(e){
            e.preventDefault();
            console.log($('input[name="status"]:checked', '#reportForm').val());
            //formData
            var formData = new FormData();
            formData.append('fName', $('#fName').val());
            formData.append('id', $('#id').val());
            formData.append('status', $('#status').val());
            $.ajax({
                url:"{{URL::route('account-create')}}",
                method: 'post',
                processData:false,
                contentType:false,
                cache:false,
                dataType:'json',
                data: formData,
              //  data: $('form').serialize(),
                success:function(data){
                       $( ".info" ).hide().empty();
                    console.log(data);
                    if(!data.success){
                       $.each(data.error, function(index, error){
                            $( ".info" ).append('<li>'+error+'</li>');
                        });
                         $( ".info" ).slideDown();
                    } else {
                         $('#id').val(data.last_insert_id);
                        $( ".info" ).append('<li>Saved</li>');
                        $( ".info" ).slideDown();
                    }
                },
                error:function(){}
            });    
       }); 
    });
</script>
@stop