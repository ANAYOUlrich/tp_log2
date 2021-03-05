<script type="text/javascript" src="{{ asset('adminPublic/bower_components/jquery/js/jquery.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $("select#lang").change(function(){
            var val = $("select#lang").val();
            if(val!="{{session('lang')}}"){
                $.ajax({
                    method  : 'get',
                    url     : '/lang/'+ val,
                    type    : 'json'
                }).done(function (){
                    window.location.href = document.location.href;
                })
            }
        });

    })
</script>