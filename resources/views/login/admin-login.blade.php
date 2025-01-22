<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking Point</title>
    <script
        src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
</head>

<style>
    .small-swal-popup {
    max-width: 320px !important;
    padding: 0px !important;    
    font-size: 14px;   
}

.custom-text-color {
    color: blue; 
    font-size: 16px;
}

.custom-title-color {
    color: #2b8a3e; 
    font-size: 20px;
}

.custom-text-error-color {
    color: red; 
    font-size: 16px;
}

.custom-title-error-color {
    color: red; 
    font-size: 20px;
}
</style>

<body>
    <div class="bg-gray-50">
        <div class="min-h-screen flex flex-col items-center justify-center py-6 px-4">
            <div class="max-w-md w-full">
                <a href="/parking-point">
                    <img src="./images/logo/logo.png" alt="logo image" class='w-40 mb-4 mx-auto block'>
                </a>
                <div class="p-8 rounded-2xl bg-white shadow">
                    <h2 class="text-gray-800 text-center text-2xl font-bold">Login</h2>


                    <form action="" class="mt-8 space-y-4" method="POST" id="signin-form">
                        @csrf
                        <div>
                            <label class="text-gray-800 text-sm mb-2 block">Email</label>
                            <div class="relative flex items-center">
                                <input name="email" type="text" required
                                    class="w-full text-gray-800 focus:border-cyan-500 focus:ring-cyan-500 text-sm border border-gray-300 px-4 py-3 rounded-md outline-cyan-600"
                                    placeholder="Enter Your Email" value="" />
                            </div>
                        </div>
                        <div>
                            <label class="text-gray-800 text-sm mb-2 block">Password</label>
                            <div class="relative flex items-center">
                                <input name="password" type="password" required
                                    class="w-full text-gray-800 focus:border-cyan-500 focus:ring-cyan-500 text-sm border border-gray-300 px-4 py-3 rounded-md outline-cyan-600"
                                    placeholder="Enter password" />
                            </div>
                        </div>
                       
                        <div class="flex flex-wrap items-center justify-between gap-4">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember-me" type="checkbox"
                                    class="h-4 w-4 shrink-0 text-cyan-600 focus:outline-cyan-600 focus:ring-cyan-500 focus:outline-cyan-600 border-gray-300 rounded" />
                                <label for="remember-me" class="ml-3 block text-sm text-gray-800">Remember me</label>
                            </div>
                            <div class="text-sm">
                                <a href="/parking-point/forget-password.php"
                                    class="text-cyan-500 hover:underline font-semibold">Forgot your password?</a>
                            </div>
                        </div>
                        <div class="!mt-8">
                            <button type="submit"
                                class="w-full py-3 px-4 text-base font-semibold tracking-wide rounded-lg text-white bg-cyan-500 hover:bg-cyan-600 focus:outline-none">Sign
                                in</button>
                        </div>
                        {{-- <p class="text-gray-800 text-sm !mt-8 text-center">Don't have an account? <a
                                href="/parking-point/signup.php"
                                class="text-cyan-500 hover:underline ml-1 whitespace-nowrap font-semibold">Register
                                here</a></p> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


<script src="asset/js/main.js"></script>

  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/popper.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.css">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400&display=swap">

  <script>

      $(document).ready(function(){
		

		$('#signin-form').on('submit', function(e) {
    e.preventDefault();

    var formdata = $(this).serialize();

    $.ajax({
        url: "{{route('adminLogins')}}",
        type: "POST",
        data: formdata,
        success: function(response) {
            console.log(response);

			if(response.status == "success"){

				Swal.fire({
                title: 'Success!',
                text: 'You have successfully logged in.',
                icon: 'success',
                confirmButtonText: 'OK',
                customClass: {
        popup: 'small-swal-popup',
        htmlContainer: 'custom-text-color', 
        title: 'custom-title-color' 
    }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{route('admin.index')}}";
                }
            });

			}

			if(response.status == "error"){

Swal.fire({
// title: 'Ooops....',
text: 'Invalid Login credentials',
icon: 'error',
confirmButtonText: 'OK',
customClass: {
        popup: 'small-swal-popup',
        htmlContainer: 'custom-text-error-color', 
        title: 'custom-title-error-color' 
    }
}).then((result) => {
if (result.isConfirmed) {
	window.location.reload();
}
});

}
            
        },
        error: function(xhr, status, error) {

            console.error(xhr.responseText);

            Swal.fire({
                title: 'Error!',
                text: 'There was a problem with your login.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
});


	  });

  </script>