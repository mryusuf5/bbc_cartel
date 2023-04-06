<x-user-layout>
    <br>
    <div class="container">
        <form action="" method="post" class="bg-dark p-2 rounded">
            @csrf
            @method('POST')
            <h3 class="text-center text-white">Register</h3>
            <br>
            <div class="form-group">
                <label for="" class="text-white">Username</label>
                <input name="username" type="text" class="form-control">
                @error('username')<span class="text-danger">{{$message}}</span>@enderror
            </div>
            <br>
            <div class="form-group">
                <label for="" class="text-white">Volledige naam (ja ook achternaam)</label>
                <input name="name" type="text" class="form-control">
                @error('name')<span class="text-danger">{{$message}}</span>@enderror
            </div>
            <br>
            <div class="form-group">
                <label for="" class="text-white">Password</label>
                <input name="password" type="password" class="form-control">
                @error('password')<span class="text-danger">{{$message}}</span>@enderror
            </div>
            <br>
            <div class="form-group">
                <label for="" class="text-white">Repeat password</label>
                <input name="repeat_password" type="password" class="form-control">
            </div>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Register">
            </div>
        </form>
    </div>
</x-user-layout>
