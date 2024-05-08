
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<div class="container">
  <div class="row">
    <div class="col-lg-6 col-12 mx-auto">
      <div class="text-center">
        <img src="https://annedece.sirv.com/Images/user-vector.jpg" class="rounded-circle p-2 bg-white" style="width: 140px;">
      </div>
      <div class="p-5 bg-white rounded shadow-lg">
        <h3 class="mb-2 text-center pt-5">Sign In</h3>
        <p class="text-center lead">Sign In to manage all your devices</p>
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label font-weight-bold">Email</label>
            <input name="email" class="form-control form-control-lg" type="email" id="email">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label font-weight-bold">Password</label>
            <input name="password" class="form-control form-control-lg" type="password" id="password">
          </div>
          <p class="m-0 py-4"><a href="" class="text-muted">Forgot password?</a></p>
          <button class="btn btn-primary btn-lg w-100 shadow-lg" type="submit">SIGN IN</button>
        </form>
        <div class="text-center pt-4">
          <p class="m-0">Don't have an account? <a href="{{route('register')}}" class="text-dark font-weight-bold">Sign Up</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

