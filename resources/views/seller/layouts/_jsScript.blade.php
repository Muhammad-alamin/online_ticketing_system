<script src="{{ asset('front/assets/js/jquery-3.2.0.min.js') }}"></script>
<script src="{{ asset('front/assets/js/bootstrap-slider.min.js') }}"></script>
<script src="{{ asset('front/assets/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('front/assets/js/jquery.scrolling-tabs.min.js') }}"></script>
<script src="{{ asset('front/assets/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('front/assets/js/jquery.flexslider-min.js') }}"></script>
<script src="{{ asset('front/assets/js/jquery.imagemapster.min.js') }}"></script>
<script src="{{ asset('front/assets/js/tooltip.js') }}"></script>
<script src="{{ asset('front/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/assets/js/featherlight.min.js') }}"></script>
<script src="{{ asset('front/assets/js/featherlight.gallery.min.js') }}"></script>
<script src="{{ asset('front/assets/js/bootstrap.offcanvas.min.js') }}"></script>
<script src="{{ asset('front/assets/js/main.js') }}"></script>


<script>
    $(document).ready(function(){
        $('#search').on('keyup',function(){
            var query= $(this).val();
            $.ajax({
                url:"search",
                type:"GET",
                data:{'search':query},
                success:function(data){
                    $('#search_list').html(data);
                }
            });
             //end of ajax call
        });
    });

var inputs = document.querySelectorAll('.file-input')

for (var i = 0, len = inputs.length; i < len; i++) {
  customInput(inputs[i])
}

function customInput (el) {
  const fileInput = el.querySelector('[type="file"]')
  const label = el.querySelector('[data-js-label]')

  fileInput.onchange =
  fileInput.onmouseout = function () {
    if (!fileInput.value) return

    var value = fileInput.value.replace(/^.*[\\\/]/, '')
    el.className += ' -chosen'
    label.innerText = value
  }
}

//ticket count condition
$('#selectTicket').on('change', function() {
  var value = $(this).val();
  if(value > 1){
    $("#ticket_varient").show();
  }
  else{
    $("#ticket_varient").hide();
  }
});

//ticket types condition
$('#mySelect').on('change', function() {
  var value = $(this).val();
  if(value == 'E-ticket'){
    $("#file").show();
  }
  else{
    $("#file").hide();
  }
});

$('#selectTicket').on('change', function() {
  var value = $(this).val();
  $(".append").empty();
  $(".append").append('<br><div style="color: red">Upload Your '+value+' Tickets</div>');
});

$(document).ready(function () {
        $('select[name="section"]').on('change',function () {
            var section_id = $(this).val();
            if(section_id){
                $.ajax({
                    url: "{{url('/seller/get/child_sub_cat-list/')}}/" + section_id,
                    type: "get",
                    dataType: "json",
                    success:function (data) {
                        console.log(data)
                        $("#block").empty();
                        $.each(data,function (key,value) {
                            $("#block").append('<option value="'+value.id+'">'+value.block_number+'</option>')
                        });
                    },
                });
            }else {
                alert('danger');
            }
        });
    });

</script>
