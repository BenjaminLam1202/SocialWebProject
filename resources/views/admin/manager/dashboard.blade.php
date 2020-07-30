
@extends('admin.layout.menu')
@section('contenter')
<div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Bootstrap CSS -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">


  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
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
  <div class="container">
    <div class="row">
      <br/>
      <div class="col text-center">
        <h2>{{ __('dashboard.dashboard') }}</h2>
        <p>{{ __('dashboard.hello') }} {{Auth::user()->name}}</p>
      </div>
      
      
      
    </div>
    <div class="row text-center">
      <div class="col">
        <div class="counter">
          <i class="fa fa-code fa-2x"></i>
          <h2 class="timer count-title count-number" data-to="100" data-speed="1500"></h2>
          <p class="count-text ">{{ __('dashboard.firstbo') }}</p>
          <p class="count-text ">{{Auth::user()->posts->count()}}</p>
        </div>
      </div>
      <div class="col">
       <div class="counter">
        <i class="fa fa-coffee fa-2x"></i>
        <h2 class="timer count-title count-number" data-to="1700" data-speed="1500"></h2>
        <p class="count-text ">{{ __('dashboard.secondbo') }}</p>
        <p class="count-text ">{{App\Post::all()->count()}}</p>
      </div>
    </div>
    <div class="col">
      <div class="counter">
        <i class="fa fa-lightbulb-o fa-2x"></i>
        <h2 class="timer count-title count-number" data-to="11900" data-speed="1500"></h2>
        <p class="count-text ">{{ __('dashboard.thirdtbo') }}</p>
        <p class="count-text ">{{Auth::user()->comments->count()}}</p>
      </div></div>
      <div class="col">
        <div class="counter">
          <i class="fa fa-coffee fa-2x"></i>
          <h2 class="timer count-title count-number" data-to="157" data-speed="1500"></h2>
          <p class="count-text ">{{ __('dashboard.fourthtbo') }}</p>
          <p class="count-text ">{{App\Comment::all()->count()}}</p>

        </div>
      </div>
      <div class="col">
        <div class="counter">
          <i class="fa fa-file fa-2x"></i>
          <h2 class="timer count-title count-number" data-to="157" data-speed="1500"></h2>
          <p class="count-text ">{{ __('dashboard.fifbo') }}</p>
          <p class="count-text ">{{App\Category::all()->count()}}</p>

        </div>
      </div>
      <div class="col">
        <div class="counter">
          <i class="fa fa-coffee fa-2x"></i>
          <h2 class="timer count-title count-number" data-to="157" data-speed="1500"></h2>
          <p class="count-text ">{{ __('dashboard.sixtbo') }}</p>
          <p class="count-text ">{{Auth::user()->reactions->count()}}</p>

        </div>
      </div>
      <div class="col">
        <div class="counter">
          <i class="fa fa-heart fa-2x"></i>
          <h2 class="timer count-title count-number" data-to="157" data-speed="1500"></h2>
          <p class="count-text ">{{ __('dashboard.lastbo') }}</p>
          <p class="count-text ">{{DB::table('posts')->join('reactions', 'reactions.post_id', '=', 'posts.id')->where('posts.user_id', Auth::user()->id)->get()->count()}}</p>

        </div>
      </div>
    </div>
  </div>

<div class="container">
 <div id="chart" style="height: 300px;"></div>
    <!-- Charting library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <!-- Your application script -->
    <script>
      const chart = new Chartisan({
        el: '#chart',
        url: "@chart('sample_chart')",
        data: {
            chart: { "labels": ["{{ __('dashboard.posts') }}", "{{ __('dashboard.comments') }}", "{{ __('dashboard.reaction') }}"] },
            datasets: [
                { "name": "{{ __('dashboard.admin') }}", "values": [{{Auth::user()->posts->count()}}, {{Auth::user()->comments->count()}}, {{Auth::user()->reactions->count()}}] },
                { "name": "{{ __('dashboard.user') }}", "values": [{{App\Post::all()->count()}}, {{App\Comment::all()->count()}}, {{DB::table('posts')->join('reactions', 'reactions.post_id', '=', 'posts.id')->where('posts.user_id', Auth::user()->id)->get()->count()}}] }
            ],
        },
        hooks: new ChartisanHooks()
            .colors(['#ECC94B', '#4299E1', '#AAEE11'])
            .legend({ position: 'left' })

            //.datasets([{ type: 'line', fill: false }, 'bar']),
      });
    </script>   
     <div id="chart1" style="height: 300px;"></div>
     <script>
      const chart1 = new Chartisan({
        el: '#chart1',
        url: "@chart('admin_chart')",
        type: 'pie',
        data: {
           chart: { "labels": ["{{ __('dashboard.yourreaction') }}","{{ __('dashboard.totalpost') }}"] },
           type: "pie",
            datasets: [
                { "name": "post", "values": [{{Auth::user()->reactions->count()}},{{App\Post::all()->count()}}] }
            ],
        },
        hooks: new ChartisanHooks()
            .colors(['#ECC94B', '#4299E1', '#AAEE11'])
            .datasets([{ type: 'pie', fill: false }]),
            
      });
    </script>





    </div>
</div>
@endsection