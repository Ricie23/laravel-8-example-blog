<header class="max-w-xl mx-auto mt-20 text-center">
            <h1 class="text-4xl">
                Latest <span class="text-blue-500">Laravel From Scratch</span> News
            </h1>

            <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
                <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
                    
                    <x-category-dropdown/>
                 
                </div>

                <!-- Other Filters -->
               {{--  <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold lg:w-34 text-left pl-3 lg:inline-flex" >
                                Other Filters
                                <x-icon name="down-arrow" class="absolute pointer-events-none" styler="right:12px"/>
                            </button>
                        </x-slot>

                       <x-dropdown-item href="/" :active="request()->routeIs('home')">All </x-dropdown-item>
                       <x-dropdown-item href="/" :active="request()->routeIs('author')">Foo </x-dropdown-item>
                       <x-dropdown-item href="/" :active="request()->routeIs('category')">Bar </x-dropdown-item>
                            
                    </x-dropdown>  

                    
                </div>
 --}}
                <!-- Search -->
                <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                    <form method="GET" action="#">
                        @if(request('category'))
                        <input type="hidden" name="category" value="{{request('category')}}">
                        @endif
                        <input type="text" name="search" 
                        placeholder="Find something"
                        class="bg-transparent placeholder-black font-semibold text-sm" 
                        value="{{request('search')}}">
                    </form>
                </div>
            </div>
        </header>