@extends('layouts.app')
@section('content')

<div class="container">
	<style type="text/css">
		body {
			background-color: #eeeeee;
		}

		.h7 {
			font-size: 0.8rem;
		}

		.gedf-wrapper {
			margin-top: 0.97rem;
		}

		@media (min-width: 992px) {
			.gedf-main {
				padding-left: 4rem;
				padding-right: 4rem;
			}
			.gedf-card {
				margin-bottom: 2.77rem;
			}
		}

		/**Reset Bootstrap*/
		.dropdown-toggle::after {
			content: none;
			display: none;
		}
	</style>
	<div class="container-fluid">
		<div class="container-fluid gedf-wrapper">
			<div class="row">
				<div class="col-md-3">
					<div class="card">
						<div class="card-body">
							<div class="h5">@Myblog</div>
							<div class="h7 text-muted">Fullname : {{Auth::user()->name}}</div>
							<div class="h7">{{Auth::user()->des}}
							</div>
						</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item">
								<div class="h6 text-muted">Tổng số bài viết </div>
								<div class="h5">{{App\Post::all()->count()}}</div>
							</li>
							<li class="list-group-item">
								<div class="h6 text-muted">Tổng lượt thích của bạn</div>
								<div class="h5">{{Auth::user()->reactions->count()}}</div>
							</li>
							
						</ul>
					</div>
				</div>
				<div class="col-md-6 gedf-main">

					<!--- \\\\\\\Post-->
					<div class="card gedf-card">
						<div class="card-header">
							<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Viết Bài</a>
								</li>

							</ul>
						</div>
						<div class="card-body">
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">





									<form action="/p" method="post">
										@csrf


											
											<div class="modal-body mx-3">
												<div class="md-form mb-5">
													<i class="fas fa-envelope prefix grey-text"></i>
													<input id="title" type="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required>
													<label data-error="wrong" data-success="right" for="defaultForm-email">{{ __('Title') }}</label>
													@if ($errors->has('title'))
													<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('title') }}</strong>
													</span>
													@endif
												</div>

												<div class="md-form mb-5">
													<i class="fas fa-envelope prefix grey-text"></i>
													<textarea id="des" type="des" class="form-control{{ $errors->has('des') ? ' is-invalid' : '' }}" name="des" value="{{ old('des') }}" required></textarea>
													<label data-error="wrong" data-success="right" for="defaultForm-email">{{ __('Description') }}</label>
													@if ($errors->has('des'))
													<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('des') }}</strong>
													</span>
													@endif
												</div>




												<div class="md-form mb-5">
													<i class="fas fa-envelope prefix grey-text"></i>
													<select id="category" type="category" name="category" class="browser-default custom-select">
														@foreach(App\Category::all() as $category)
														<option value="{{$category->id}}">{{$category->category}}</option>
														@endforeach
													</select>
													<label data-error="wrong" data-success="right" for="defaultForm-email">{{ __('Category') }}</label>
												</div>

											</div>
											<div class="btn-toolbar justify-content-between">
												<div class="btn-group">
													<button type="submit" name="submit" class="btn btn-primary">share</button>
												</div>
											</div>



									</form>


									{{-- <div class="form-group">
										<label class="sr-only" for="message">post</label>
										<textarea class="form-control" id="message" rows="3" placeholder="What are you thinking?"></textarea>
									</div> --}}

								</div>
							</div>

						</div>
					</div>
					<!-- Post /////-->
					@foreach ($posts as $post)
					<!--- \\\\\\\Post-->
					<div class="card gedf-card">
						<div class="card-header">
							<div class="d-flex justify-content-between align-items-center">
								<div class="d-flex justify-content-between align-items-center">
									{{-- <div class="mr-2">
										<img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
									</div> --}}
									<div class="ml-2">
										<div class="h5 m-0"><a href="/profile/{{ $post->user->id }}">{{ $post->user->name }}</a></div>
										<div class="h7 text-muted">{{ $post->user->username }}</div>
									</div>
								</div>

							</div>

						</div>
						<div class="card-body">
							<div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>{{ $post->created_at }}</div>
							<a class="card-link" href="#">
								<h5 class="card-title"><a href="/api/article/detail/post/{{ $post->id }}">{{ $post->title }}</a></h5>
							</a>

							<p class="card-text">
								{{ $post->des }}
							</p>
							<div>
								<span class="badge badge-primary">{{ $post->category->category }}</span>
							</div>
						</div>
						<div class="card-footer">
							@if( $post->reactions()->where([['post_id', $post->id],['user_id', Auth::user()->id],])->get() == "[]")
							<a href="/l/{{$post->id}}" class="card-link"><i class="fa fa-gittip"></i> Like</a>
							@else
							<a href="/nl/{{$post->reactions()->where([['post_id', $post->id],['user_id', Auth::user()->id],])->get()->first()->id}}" class="card-link"><i class="fa fa-gittip"></i> Dislike</a>
							
							@endif
							<a href="#" class="card-link">comment : {{App\Comment::all()->where('commentable_id',$post->id)->count()}}</a>

						</div>
					</div>
					<!-- Post /////-->
					@endforeach


				</div>
				<div class="col-md-3">
					<div class="card gedf-card">
						<div class="card-body">
							<h5 class="card-title">Other topics</h5>
							<h6 class="card-subtitle mb-2 text-muted">recommendation</h6>
							@foreach(App\Category::all() as $category)
							<p class="card-text"> 

								<a href="/api/admin/categories/{{$category->id}}">{{$category->category}}</a>


							</p>
							@endforeach
						</div>
					</div>
					<div class="card gedf-card">
						<div class="card-body">
							<h5 class="card-title">Authors</h5>
							<h6 class="card-subtitle mb-2 text-muted">want to see more ?</h6>
							@foreach(App\User::with('posts')->get() as $post)
							<p class="card-text"> 

								<a href="/profile/{{$post->id}}">{{$post->name}}</a>


							</p>
							@endforeach

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
  {{ $posts->links() }}
@endsection