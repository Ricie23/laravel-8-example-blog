@extends('components.layout')
@section('content')
<x-setting :heading="'Edit Post: '.$post->title">
	<form method="POST" action="/admin/posts/{{$post->id}}"  enctype="multipart/form-data" class="mt-10">
		@csrf
		@method('PATCH')

		<x-form.input name="title" :value="old('title', $post->title)"/>
		<x-form.input name="slug" :value="old('slug', $post->slug)"/>
		<div class="flex mt-6 mb-5">
			<div class="flex-1">
				<x-form.input name="thumbnail" type="file" :value="old('thumbnail',$post->thumbnail) "/>
			</div>
			<img src="{{asset('storage/'.$post->thumbnail)}}" class="rounded-xl ml-6" width="100"/>
		</div>
		<x-form.textarea name="excerpt">{!!old('excerpt',$post->excerpt) !!}</x-form.textarea>
		
		<x-form.textarea name="body">{!! old('body',$post->body) !!} </x-form.textarea>
		
		<div class="mb-6">
			<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">Category</label>
			<select name="category_id" id="category_id" required class="border border-gray-400 p-2 w-full">
				
				@foreach(\App\Models\Category::all() as $category)
					<option value="{{$category->id}}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
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
				Update
			</button>
		</div>
	</form>	
</x-setting>
@endsection
	
