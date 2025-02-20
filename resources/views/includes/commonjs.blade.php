<script type="text/javascript" src="{{ asset('assets/js/commonJs.js') }}"></script>

<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmqmsf3pVEVUoGAmwerePWzjUClvYUtwM&libraries=geometry,places&ext=.js"></script>

<script type="text/javascript" src="{{ asset('assets/js/map.api.js') }}"></script> -->


<script>
    $(document).ready(function() {
        // Load initial data for the first tab
        const firstTabId = $('.category-tab').first().data('id');
        loadBlogData(firstTabId);


        $('.category-tab').click(function(e) {
            e.preventDefault();
            const categoryId = $(this).data('id');
            // console.log(categoryId);

            $('.nav-tabs li').removeClass('active');
            $(this).parent().addClass('active');

            loadBlogData(categoryId);
        });

        function loadBlogData(categoryId) {
            $.ajax({

                url: "get_blogs",
                method: 'GET',
                data: {
                    category_id: categoryId
                },
                success: function(response) {
                    $('#blog-content').html(response);
                },
                error: function() {
                    // alert('Failed to load blogs. Please try again.');
                },
            });
        }
    });
</script>


<script type="text/javascript" src="{{ asset('assets/js/main.js?v=0.4') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/toastr.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/custom-validation.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>