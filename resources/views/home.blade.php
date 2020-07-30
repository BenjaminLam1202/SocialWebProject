@extends('layouts.app')
@section('content')


<div class="container">
  
  <style type="text/css">
    .counter {
    background-color:#f5f5f5;
    padding: 20px 0;
    border-radius: 5px;
}

.count-title {
    font-size: 40px;
    font-weight: normal;
    margin-top: 10px;
    margin-bottom: 0;
    text-align: center;
}

.count-text {
    font-size: 13px;
    font-weight: normal;
    margin-top: 10px;
    margin-bottom: 0;
    text-align: center;
}

.fa-2x {
    margin: 0 auto;
    float: none;
    display: table;
    color: #4ad1e5;
}

  </style>

<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
<div class="container">
  <div class="row">
      <br/>
     <div class="col text-center">
    <h2>Dashboard</h2>
    <p>hello {{Auth::user()->name}}</p>
    </div>
    
             
    
  </div>
    <div class="row text-center">
          <div class="col">
          <div class="counter">
      <i class="fa fa-code fa-2x"></i>
      <h2 class="timer count-title count-number" data-to="100" data-speed="1500"></h2>
       <p class="count-text ">Tổng số Bài viết của bạn</p>
       <p class="count-text ">{{Auth::user()->posts->count()}}</p>
    </div>
          </div>
              <div class="col">
               <div class="counter">
      <i class="fa fa-coffee fa-2x"></i>
      <h2 class="timer count-title count-number" data-to="1700" data-speed="1500"></h2>
      <p class="count-text ">Tổng số bài viết của mọi người</p>
      <p class="count-text ">{{App\Post::all()->count()}}</p>
    </div>
              </div>
              <div class="col">
                  <div class="counter">
      <i class="fa fa-lightbulb-o fa-2x"></i>
      <h2 class="timer count-title count-number" data-to="11900" data-speed="1500"></h2>
      <p class="count-text ">Tổng số bình luận của bạn</p>
      <p class="count-text ">{{Auth::user()->comments->count()}}</p>
    </div></div>
              <div class="col">
              <div class="counter">
      <i class="fa fa-coffee fa-2x"></i>
      <h2 class="timer count-title count-number" data-to="157" data-speed="1500"></h2>
      <p class="count-text ">Tổng số bình luận của mọi người</p>
      <p class="count-text ">{{App\Comment::all()->count()}}</p>

    </div>
              </div>
              <div class="col">
              <div class="counter">
      <i class="fa fa-file fa-2x"></i>
      <h2 class="timer count-title count-number" data-to="157" data-speed="1500"></h2>
      <p class="count-text ">Tổng số danh mục</p>
      <p class="count-text ">{{App\Category::all()->count()}}</p>

    </div>
              </div>
              <div class="col">
              <div class="counter">
      <i class="fa fa-coffee fa-2x"></i>
      <h2 class="timer count-title count-number" data-to="157" data-speed="1500"></h2>
      <p class="count-text ">Tổng lượt thích của bạn</p>
      <p class="count-text ">{{Auth::user()->reactions->count()}}</p>

    </div>
              </div>
              <div class="col">
              <div class="counter">
      <i class="fa fa-heart fa-2x"></i>
      <h2 class="timer count-title count-number" data-to="157" data-speed="1500"></h2>
      <p class="count-text ">Tổng số lượt mọi người </p>
      <p class="count-text ">{{DB::table('posts')->join('reactions', 'reactions.post_id', '=', 'posts.id')->where('posts.user_id', Auth::user()->id)->get()->count()}}</p>

    </div>
              </div>
         </div>
</div>



</div>


@endsection
