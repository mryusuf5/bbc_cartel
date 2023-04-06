<x-user-layout>
    <br>
    <div class="container">
        <form action="{{route('images.store')}}" method="post" enctype="multipart/form-data" class="row">
            @csrf
            @method('POST')
            <div class="form-group col-md-5 col-12">
                <label for="">Titel</label>
                <input type="text" class="form-control" name="title">
                @error('title')<span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="form-group col-md-5 col-12">
                <label for="">Description</label>
                <input type="text" class="form-control" name="description">
            </div>
            <div class="form-group col-md-5 col-12">
                <label for="">Foto</label>
                <input type="file" class="form-control" name="image">
                @error('image')<span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="form-group col-12 mt-2">
                <input type="submit" class="btn btn-primary" value="Opslaan">
            </div>
        </form>
    </div>
</x-user-layout>
