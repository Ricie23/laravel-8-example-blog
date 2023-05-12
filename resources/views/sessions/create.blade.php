@extends('components.layout')
@section('content')

<section class="px-6 py-8">
	<main class="max-w-lg mx-auto mt-10 bg-gray-200 p-6 border-gray-700 rounded-xl">
		<h1 class="text-center text-xl font-bold">Log In!</h1>
		<form method="POST" action="/login" class="mt-10">
			@csrf

			<div class="mb-6">
				<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
					Email
				</label>
				<input type="email" name="email" id="email" required value="{{old('email')}}" class="border border-gray-400 p-2 w-full"/>
				@error('email')
				<p class="text-red-500 text-xs mt-1">{{$message}}</p>
				@enderror
			</div>

			<div class="mb-6">
				<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
					Password
				</label>
				<input type="password" name="password" id="password" required class="border border-gray-400 p-2 w-full"/>
				@error('password')
				<p class="text-red-500 text-xs mt-1">{{$message}}</p>
				@enderror
			</div>

			<div class="mb-6">
				<button type="submit" class="block mb-2 uppercase font-bold text-xs bg-blue-200  text-gray-700">
					Log In
				</button>
			</div>
		</form>
	</main>
</section>
@endsection
	
