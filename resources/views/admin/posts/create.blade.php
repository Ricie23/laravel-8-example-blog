@extends('components.layout')
@section('content')
<x-setting heading="Publish New Post">
	<form method="POST" action="/admin/posts"  enctype="multipart/form-data" class="mt-10">
		@csrf
		
		<x-form.input name="title"/>

		<x-form.input name="slug"/>
		
		<x-form.input name="thumbnail" type="file"/>
		
		<x-form.textarea name="excerpt"/>
		
		<x-form.textarea name="body"/>
		
		<div class="mb-6">
			<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">Category</label>
			<select name="category_id" id="category_id" required class="border border-gray-400 p-2 w-full">
				
				@foreach(\App\Models\Category::all() as $category)
					<option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
					{{ucwords($category->name)}}
					</option>
				@endforeach

			</select>
			@error('category')
			<p class="text-red-500 text-xs mt-1">{{$message}}</p>
			@enderror
		</div>
		<div class="mb-6">
			<button type="submit" class="py-2 px-4  bg-blue-500 rounded text-white hover:bg-blue-700 rounded-2xl">
				Publish
			</button>
		</div>
	</form>	
</x-setting>
@endsection
	
