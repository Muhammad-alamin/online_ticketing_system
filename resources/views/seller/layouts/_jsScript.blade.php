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
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.3.3/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>


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

//ticket address for paper & membership ticket
$('#mySelect').on('change', function() {
  var value = $(this).val();
  if(value == 'Paper' || value == 'Membership'){
    $(".ticket_address").show();
  }
  else{
    $(".ticket_address").hide();
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


    //pairs value comes when select value appear

    $('#selectTicket').on('change', function() {
  var value = parseInt($(this).val());
  var $selectPicker = $('#selectTicketVarient');
  if (value % 2 === 0) {
    $selectPicker.find('option[value="Pairs"]').removeAttr('style');
    $selectPicker.selectpicker('refresh');
  } else {
    $selectPicker.find('option[value="Pairs"]').css('display', 'none');
    $selectPicker.selectpicker('refresh');
  }
});


//datatable
$(document).ready(function() {
    var table = $('#example').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    } );
} );

$(document).ready(function() {
    $(document).on('change', 'select[name="payout_payment_method"]', function() {
        var value = $(this).val();
        if (value == "bank_transfer") {
            $("#payout-payment-bank_transfer").show();
            $("#payout-payment-paypal").hide();
        } else if (value == "paypal") {
            $("#payout-payment-bank_transfer").hide();
            $("#payout-payment-paypal").show();
        } else {
            $("#payout-payment-bank_transfer").show();
            $("#payout-payment-paypal").hide();
        }
    });
});


//Ticket Live mode button functionality
$(document).ready(function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $('.input-switch').each(function() {
        var id = $(this).data('id');
        var liveMode = $(this).data('live_mode');
        $(this).prop('checked', liveMode === 'On');
        updateSwitchColor($(this), liveMode);
        updateLabelText($(this), liveMode);

        $(this).on('change', function() {
            var checked = $(this).is(':checked');
            var liveMode = checked ? 'On' : 'Off';

            $.ajax({
                url: '/update-live-mode',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    id: id,
                    live_mode: liveMode
                },
                success: function(response) {
                    if (response.status === 'success') {
                        updateSwitchColor($('.input-switch[data-id="' + id + '"]'), liveMode);
                        updateLabelText($('.input-switch[data-id="' + id + '"]'), liveMode);

                        console.log('Live mode successfully updated');
                    } else {
                        console.log('Error updating live mode');
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                    // Handle the error if needed
                }
            });
        });
    });

    function updateSwitchColor(switchElement, liveMode) {
        var labelSwitch = switchElement.next('.label-switch');
        var beforeElement = labelSwitch.find('::before');
        var afterElement = labelSwitch.find('::after');

        if (liveMode === 'On') {
            beforeElement.css({
                background: '#00a900',
                borderColor: '#008e00'
            });
            afterElement.css({
                left: 'calc(100% - 1.5em)',
                background: '#00ce00',
                borderColor: '#009a00'
            });
        } else {
            beforeElement.css({
                background: '#888888',
                borderColor: '#757575'
            });
            afterElement.css({
                left: 0,
                background: '#ffffff',
                borderColor: '#757575'
            });
        }
    }

    function updateLabelText(switchElement, liveMode) {
        var infoText = switchElement.siblings('.info-text');
        infoText.text(liveMode === 'On' ? 'On' : 'Off');
    }
});




</script>
