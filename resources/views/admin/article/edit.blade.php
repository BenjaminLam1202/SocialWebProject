@extends('layouts.app')
@section('content')
<div class="container">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<form class="form-horizontal">
		<fieldset>

			<!-- Form Name -->
			<legend>Form Name</legend>


			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label" for="ppa">Edit your comment</label>  
				<div class="col-md-4">
					<input id="ppa" name="ppa" type="text" placeholder="" class="form-control input-md" required="">
					
				</div>
			</div>

		</fieldset>
	</form>
</div>
@endsection