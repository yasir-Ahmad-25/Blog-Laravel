<x-base>

    <form method="post" id="signupForm">
        <div class="form-group">
            <label for="#">Profile image</label>
            <input type="file" name="profile_image" id="profile_image" class="form-control" value="{{ old('profile_image')}}">
        </div>

        <div class="form-group">
            <label for="#">fullname</label>
            <input type="text" name="fullname" id="fullname" class="form-control" value="{{ old('fullname')}}">
        </div>

        <div class="form-group">
            <label for="#">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email')}}">
        </div>

        <div class="form-group">
            <label for="#">Password</label>
            <input type="password" name="password" id="password" class="form-control" >
        </div>

        <div class="form-group">
            <label for="#">Password Confirmation</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>

        <div class="form-group">
            
            <button type="submit" class="btn btn-primary w-100"> Create Account </button>
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
            $('#signupForm').on('submit' , function(e){
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: '{{ route('blogs.create_user')}}',
                    method: 'POST', 
                    data: formData,
                    contentType: false,
                    processData: false,
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