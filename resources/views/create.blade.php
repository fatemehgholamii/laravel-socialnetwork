<form method="post" enctype="multipart/form-data" action="{{ route('Post.store') }}">
	@csrf
	<div class="row">
		<div class="col-md-6 form-group">
			<label for="file" class="col-md-3 col-form-label">فایل ضمیمه</label>

			<div class="col-md-9">
				<input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file">
				@error('file')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</div>
	</div>
	<button type="submit" class="btn btn-primary w-100">
		ثبت
	</button>
</form>