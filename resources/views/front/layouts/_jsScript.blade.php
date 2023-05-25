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
    })

   
</script>
