@props(['heading'])
<section class=" py-8 max-w-4xl mx-auto">
	<h1 class="text-center text-xl font-bold mb-8 pb-2 border-b">{!!$heading!!}</h1>
	<div class="flex">
		<aside class="w-48">
			<h4 class="font-semibold mb-4">Links</h4>
			<ul>
				<li>
					<a href="/admin/posts" class="{{request()->is('admin/posts') ? 'text-gray-500' : 'text-blue-500'}} ">All Posts</a>
				</li>
				<li>
					<a href="/admin/posts/create" class="{{request()->is('admin/posts/create') ? 'text-gray-500' : 'text-blue-500'}} ">New Post</a>
				</li>
				
			</ul>
		</aside>
	
		<main class="flex-1 mx-auto mt-10 bg-gray-200 p-6 border-gray-700 rounded-xl">
			{{$slot}}
		</main>
	</div>
</section>
