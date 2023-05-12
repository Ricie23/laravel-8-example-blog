@props(['name', "type"=>"submit"])
<div class="mb-6">
	<button  type="{{$type}}" class="py-2 px-4  bg-blue-500 rounded text-white hover:bg-blue-700 rounded-2xl">
		{!!$name!!}
	</button>
</div>
