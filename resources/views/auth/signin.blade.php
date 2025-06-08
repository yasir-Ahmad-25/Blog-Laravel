<x-base>

    <form action="" method="post" id="signinForm">
        
        <div class="form-group">
            <label for="#">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email')}}">
        </div>

        <div class="form-group">
            <label for="#">Password</label>
            <input type="password" name="password" id="password" class="form-control" >
        </div>

        <div class="form-group">
            
            <button type="submit" class="btn btn-primary w-100"> Login </button>
        </div>

    </form>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#signinForm').on('submit' , function(e){
                e.preventDefault();

                // serialize form data
                var formData = $(this).serialize();

                $.ajax({
                    url: '{{ route('blogs.login_user')}}',
                    method: 'POST', 
                    data: formData,
                    success: function(response){
                        
                        window.location.href = response.redirect;

                    },
                    error: function(xhr,status,error){
                        console.error(error);
                    }

                })
            })
        })
    </script>
</x-base>