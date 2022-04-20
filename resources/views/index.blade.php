@extends('master')

@section('content')
<div class="container mt-4">
    <div class="row">
        @foreach($videoLists->items as $key => $item)
            <div class="col-4">
                <a href="{{route('watch', $item->id->videoId)}}">
                    <div class="card mb-4">
                        <img src="{{$item->snippet->thumbnails->medium->url}}" class="img-fluid" alt="">
                        <div class="card-body">
                            <h5 class="card-titled">{{\Str::limit($item->snippet->title, $limit = 50, $end = '...')}}</h5>
                        </div>
                        <div class="card-footer text-muted">
                            Publicado el {{date('d M Y', strtotime($item->snippet->publishTime))}}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
        
    </div>
</div>



<div class="container my-4">
    <h2>Comentarios:</h2>
    <div class="row">
    <div class="col-12">
        <ul class="list-group">
            @foreach(App\Models\Comment::all() as $comment)
            <li class="list-group-item">
            <span class="mr-4">
            {{ $comment->description }}
            </span>
            <small>
            {{ $comment->created_at }}
            </small>
            </li>
            @endforeach
        </ul>
    </div>
    
    </div>
</div>
@endsection