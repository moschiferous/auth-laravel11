<x-guest-layout>
    <div class="container">
        <form method="POST" action="{{ route('auth.login') }}">
            @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-guest-layout>