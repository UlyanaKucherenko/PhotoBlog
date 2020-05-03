@extends('layouts.layout',['title' => 'Главная страница'])




@section('content')



    @if(isset($_GET['search']))
        @if(count($posts)>0)
            <h2>Результаты по запросу " <?=$_GET['search']?>" </h2>
            <p class="lead">Всего найдено {{count($posts)}} постов </p>
        @else
            <h2>По запросу "<?=$_GET['search']?>" ничего не найдено</h2>
            <a href="{{route('post.index')}}" class="btn btn-outline-primary">Отобразить все посты</a>
        @endif
    @endif


    <div class="row">
        @foreach($posts as $post)
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card">
                <div class="card-body bg-light">

                    <div class="card-img" style="background-image: url({{ $post->img ?? asset('img/cat.jpg') }})"></div>
                    <div class="card-header bg-light"> {{$post->short_title}}</div>
                    <div class="card-author">Автор: {{$post->name}}</div>
                    <a href="{{ route('post.show', ['id'=>$post->post_id] ) }}" class="btn btn-outline-primary">Посмотреть пост</a>
                </div>
            </div>
        </div>
         @endforeach
    </div>

    @if(!isset($_GET['search']))
    {{$posts->links()}}
    @endif

@endsection
