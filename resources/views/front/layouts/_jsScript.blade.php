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
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>



<script>
    $(document).ready(function(){
        $('#search').on('keyup',function(){
            var query= $(this).val();
            $.ajax({
                url:"/ticket/search",
                type:"GET",
                data:{'search':query},
                success:function(data){
                    $('#search_list').html(data);
                }
            });
             //end of ajax call
        });
    });

    $('tr[data-id]').click(function(){
        alert($(this).data("id"));
    });

    $(document).ready(function() {
        $('.hover_div').hover(function() {
            // Get the current image id
            var imageId = $(this).data('ticket_id');
            // Fetch the new image from the database
            var newImage = $.ajax({
                url: '/api/images/' + imageId,
                method: 'GET',
                dataType: 'json'
            });

            // When the new image is fetched, replace the old image
            newImage.done(function(data) {
                $('#image-container img').attr('src', data.image_path);
            });
        });
    });

    $(document).ready(function() {
        $('.hover_section').hover(function() {
            // Get the current image id
            var imageId = $(this).data('event_id');
            // Fetch the new image from the database
            var newImage = $.ajax({
                url: '/event/images/' + imageId,
                method: 'GET',
                dataType: 'json'
            });

            // When the new image is fetched, replace the old image
            newImage.done(function(data) {
                $('#image-container img').attr('src', data.image_path);
            });
        });
    });

    $('.hover_div').hover(function() {
    $(this).css('background-color', '#EDEADE');
    }, function() {
    $(this).css('background-color', 'white');
    });

    var input = document.querySelector("#mobile_code");
    window.intlTelInput(input, {
    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js",
  });

</script>
