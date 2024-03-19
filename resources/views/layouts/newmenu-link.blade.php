<div class="relative">
 <a class="py-6 px-8 text-center" href="#/"><h6 class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-blue-gray-900">TaskWall Demo</h6></a>
 <button @click="sidebar.open = !sidebar.open" class="align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-8 max-w-[32px] h-8 max-h-[32px] rounded-lg text-xs text-white hover:bg-white/10 active:bg-white/30 absolute right-0 top-0 grid rounded-br-none rounded-tl-none xl:hidden" type="button">
   <x-ri-close-line class="text-black w-5 h-5 mt-2"/>
 </button>
</div>
<div class="m-4">
 <ul class="mb-4 flex flex-col gap-2">
  
  <li class="mx-1 mb-2">
   <p class="block antialiased font-sans font-semibol leading-normal text-blue-gray-800 font-black opacity-75">
    {{ __('Publisher') }}
   </p>
  </li>

  <li>
   <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
    <x-ri-pie-chart-2-fill class="w-5 h-5 mr-2 text-blue-gray-500 transition duration-75 group-hover:text-blue-gray-500 @if(request()->routeIs('dashboard')) text-white @endif"/>
    <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">{{ __('Dashboard') }}</p>
   </x-nav-link>
  </li>

  <li>
   <x-nav-link :href="route('placements')" :active="request()->routeIs('placements')">
    <x-ri-stack-fill class="w-5 h-5 mr-2 text-blue-gray-500 transition duration-75 group-hover:text-blue-gray-500 @if(request()->routeIs('placements')) text-white @endif"/>
    <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">{{ __('Offerwalls') }}</p>
   </x-nav-link>
  </li>

  <li class="mx-1 mt-3 mb-2">
   <p class="block antialiased font-sans font-semibol leading-normal text-blue-gray-800 font-black opacity-75">
    {{ __('Advertiser') }}
   </p>
  </li>


  <li>
   <x-nav-link :href="route('ad_dashboard')" :active="request()->routeIs('ad_dashboard')">
    <x-ri-pie-chart-2-fill class="w-5 h-5 mr-2 text-blue-gray-500 transition duration-75 group-hover:text-blue-gray-500 @if(request()->routeIs('ad_dashboard')) text-white @endif"/>
    <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">{{ __('Dashboard') }}</p>
   </x-nav-link>
  </li>

  <x-splade-toggle>
    <button @click.prevent="toggle" class="flex w-full items-center rounded-lg p-2 text-start leading-tight outline-none transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 focus:bg-blue-gray-50 focus:bg-opacity-80 text-blue-gray-500">
     <x-ri-megaphone-fill class="w-5 h-5 mr-2 transition duration-75 group-hover:text-blue-gray-500"/>
      {{ __('Advertise') }}
      <x-ri-arrow-up-s-line v-if="toggled" class="w-5 h-5 mr-2 ml-auto transition duration-75 group-hover:text-blue-gray-500"/>
      <x-ri-arrow-down-s-line v-else class="w-5 h-5 mr-2 ml-auto transition duration-75 group-hover:text-blue-gray-500"/>
    </button>
 
    <x-splade-transition show="toggled" class="ml-2">
     <li>
      <x-nav-link :href="route('tasks')" :active="request()->routeIs('tasks')">
       <x-ri-list-ordered-2 class="w-4 h-4 mr-2 text-blue-gray-500 transition duration-75 group-hover:text-blue-gray-500 @if(request()->routeIs('tasks')) text-white @endif"/>
       <p class="block antialiased font-sans text-sm leading-relaxed text-inherit font-medium capitalize">{{ __('Tasks') }}</p>
      </x-nav-link>
     </li>

     <li>
      <x-nav-link :href="route('ad_dashboard')" :active="request()->routeIs('ad_dashboard')">
       <x-ri-cursor-fill class="w-4 h-4 mr-2 text-blue-gray-500 transition duration-75 group-hover:text-blue-gray-500 @if(request()->routeIs('ad_dashboard')) text-white @endif"/>
       <p class="block antialiased font-sans text-sm leading-relaxed text-inherit font-medium capitalize">{{ __('Clicks') }}</p>
      </x-nav-link>
     </li>
    </x-splade-transition>

  </x-splade-toggle>


</ul>
</div>