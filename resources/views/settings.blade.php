<x-user-layout>
    <br>
    <div class="container">
        <form action="" method="post" class="row justify-content-center" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group col-md-5 col-12">
                <label for="">Gebruikersnaam</label>
                <input type="text" value="{{Session::get('user')->username}}" class="form-control" disabled>
            </div>
            <div class="form-group col-md-5 col-12">
                <label for="">Naam</label>
                <input name="name" type="text" value="{{Session::get('user')->name}}" class="form-control">
                @error('name')<span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="form-group col-md-5 col-12">
                <label for="">Profiel foto</label>
                <input type="file" name="profile_picture" class="form-control">
                <img src="{{asset('assets/images/') . '/' . Session::get('user')->profile_picture}}"
                     width="150" height="150" class="object-fit-cover" />
            </div>
            <div class="form-group col-12">
                <input type="submit" class="btn btn-primary w-100" value="Opslaan">
            </div>
        </form>
    </div>
</x-user-layout>
