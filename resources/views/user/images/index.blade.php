<x-user-layout>
    <br>
    {{--    <div class="container">--}}
    <div class="row flex-column g-0 justify-content-center align-items-center">
        @foreach($images as $image)
            <div class="card col-lg-3 col-sm-8 col-10">
                <div class="card-header bg-dark text-white d-flex align-items-center gap-2">
                    <img src="{{asset('assets/images/') . '/' . $image->profile_picture}}" height="50" width="50"
                         class="rounded-circle object-fit-cover">
                    <span>{{$image->name}}</span>
                </div>
                <img src="{{asset('assets/images/') . '/' . $image->path}}" class="card-img-top">
                <div class="card-body bg-dark text-white rounded-bottom">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex gap-4 align-items-center">
                            @if(Session::get('user'))
                                @if($image->is_liked)
                                    <form action="{{route('likes.destroy',$image->is_liked->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="outline: 0; border: 0; background: transparent;">
                                            <i class="fa-regular fa-heart text-danger fs-3"></i>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{route('likes.store', ['image_id' => $image->id])}}" method="post">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" style="outline: 0; border: 0; background: transparent;">
                                            <i class="fa-regular fa-heart text-secondary fs-3"></i>
                                        </button>
                                    </form>
                                @endif
                            @endif
                            <a href="">
                                <i class="fa-regular fa-comment text-secondary fs-3"></i>
                            </a>
                            <a href="">
                                <i class="fa-regular fa-share-from-square text-secondary fs-3"></i>
                            </a>
                        </div>
                        <div>
                            <a href="">
                                <i class="fa-regular fa-bookmark text-secondary fs-3"></i>
                            </a>
                        </div>
                    </div>

                    <br>
                    <small class="muted">{{$image->like_ammount}} likes</small>
                    <h5 class="card-title">{{$image->title}}</h5>
                    <p class="card-text">{{$image->description}}</p>
                </div>
            </div>
        @endforeach
    </div>
    {{--    </div>--}}
</x-user-layout>
