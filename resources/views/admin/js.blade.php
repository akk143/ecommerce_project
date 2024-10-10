    <script type="text/javascript">

        function confirmation(event){

            event.preventDefault();

            let redirectURL = event.currentTarget.getAttribute('href');
            // console.log(redirectURL);

            swal({
                title:"Are you sure want to delete this?",
                text:"This action can't be undone",
                icon:"warning",
                buttons:true,
                dangerMode:true,
            }).then((willDelete)=>{
                if (willDelete) {
                    // Redirect to the URL if confirmed
                    window.location.href = redirectURL;
                }
            });



        // Test SweetAlert
        // swal("Test Alert", "If this shows up, SweetAlert is working", "success");



        // Custom Script for Toastr 
        $(document).ready(function(){
            @if(Session::has('toastr'))
                toastr.success("{{ Session::get('toastr') }}");
            @endif
        });

        }

    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('/admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('/admincss/js/front.js') }}"></script>
    

    <!-- Toastr JS -->
    <script src="{{ asset('node_modules/toastr/build/toastr.min.js') }}"></script>
