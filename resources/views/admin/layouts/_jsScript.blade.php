
<script src="{{asset('assets/js/bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>
<script src="{{asset('assets/js/libs/editors/summernote.js?ver=2.2.0')}}"></script>
<script src="{{asset('assets/js/editors.js?ver=2.2.0')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('assets/js/dark-mode-switch.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="{{asset('assets/js/jquery.datetimepicker.full.js')}}"></script>



<script type="text/javascript">

$('#match_time').datetimepicker({
    step: 30
});


    $(document).ready(function() {
        $("#my_summernote").summernote({
            height: 200
        });
        $('.dropdown-toggle').dropdown();
    });

    $( function() {
        $( "#datepicker" ).datepicker({
            minDate:0,
            dateFormat:'dd-mm-yy'
        });

    } );

    $( function() {
        $( "#daily_report" ).datepicker({
            dateFormat:'dd/mm/yy'
        });

    } );

    $( function() {
        $( "#transaction_complete_date" ).datepicker({
            dateFormat:'dd/mm/yy'
        });

    } );

    $( function() {
        $( "#campaignStartDatepicker" ).datepicker({
            minDate:0,
            dateFormat:'mm-dd-yy'
        });

    } );
    $( function() {
        $( "#campaignEndDatepicker" ).datepicker({
            minDate:0,
            dateFormat:'mm-dd-yy'
        });

    } );


//     $('#user_id').on('change',function (e) {
//         console.log(e);
//
//         var user_id = e.target.value;
//
// //ajax
//         $.get('/ajax-userList?user_id' + user_id , function (data) {
// //success data
//             console.log(data);
//         });
//
//     });

    $(document).ready(function () {
        $('select[name="vendor_id"]').on('change',function () {
            var vendor_id = $(this).val();
            if(vendor_id){
                $.ajax({
                    url: "{{url('/get/user-list/')}}/" + vendor_id,
                    type: "get",
                    dataType: "json",
                    success:function (data) {
                        $("#brand_id").empty();
                        $.each(data,function (key,value) {
                            $("#brand_id").append('<option value="'+value.id+'">'+value.brand_name+'</option>')
                        });
                    },
                });
            }else {
                alert('danger');
            }
        });
    });


    $(document).ready(function () {
        $('select[name="category_id"]').on('change',function () {
            var category_id = $(this).val();
            if(category_id){
                $.ajax({
                    url: "{{url('/get/parent_sub_cat-list/')}}/" + category_id,
                    type: "get",
                    dataType: "json",
                    success:function (data) {
                        $("#parent_sub_cat").empty();
                        $.each(data,function (key,value) {
                            $("#parent_sub_cat").append('<option value="'+value.id+'">'+value.sub_cat_name+'</option>')
                        });
                    },
                });
            }else {
                alert('danger');
            }
        });
    });

    $(document).ready(function () {
        $('select[name="parent_sub_cat"]').on('change',function () {
            var parent_sub_cat_id = $(this).val();
            if(parent_sub_cat_id){
                $.ajax({
                    url: "{{url('/get/child_sub_cat-list/')}}/" + parent_sub_cat_id,
                    type: "get",
                    dataType: "json",
                    success:function (data) {
                        $("#child_sub_cat").empty();
                        $.each(data,function (key,value) {
                            $("#child_sub_cat").append('<option value="'+value.id+'">'+value.child_sub_cat_name+'</option>')
                        });
                    },
                });
            }else {
                alert('danger');
            }
        });
    });

</script>



