<div class="p-4 xl:ml-80">
 <nav class="block backdrop-saturate-200 backdrop-blur-2xl bg-opacity-80 border border-white/80 w-full max-w-full px-4 bg-white text-white rounded-xl transition-all sticky top-4 z-40 py-3 shadow-md shadow-blue-gray-500/5">
 <!-- block w-full max-w-full bg-white text-white shadow-none rounded-xl transition-all px-2 py-1 -->
  <div class="flex flex-col-reverse justify-between gap-6 md:flex-row md:items-center">

    <div class="capitalize text-black">

    <div class="flex gap-2">
     <div class="flex items-center bg-green-500/80 p-2 rounded-md"> <!-- bg-green-500/70 -->
      <x-ri-wallet-3-fill class="w-5 h-5 mr-2 text-gray-200 transition duration-75 group-hover:text-blue-gray-500"/>
      <span class="block font-sans text-md antialiased font-semibold leading-relaxed text-white pt-0.5">$50.01</span>
      <Link href="{{route('dashboard')}}" class="bg-white ml-2 p-1 rounded-md">
       <x-ri-add-line class="w-4 h-4 text-green-500 transition duration-75 group-hover:text-blue-gray-500"/>
      </Link>
     </div>

     <div class="flex items-center bg-red-500/80 p-2 rounded-md"> <!-- bg-green-500/70 -->
      <x-ri-megaphone-fill class="w-5 h-5 mr-2 text-gray-200 transition duration-75 group-hover:text-blue-gray-500"/>
      <span class="block font-sans text-md antialiased font-semibold leading-relaxed text-white pt-0.5">$130.21</span>
      <Link href="{{route('dashboard')}}" class="bg-white ml-2 p-1 rounded-md">
       <x-ri-add-line class="w-4 h-4 text-red-500 transition duration-75 group-hover:text-blue-gray-500"/>
      </Link>
     </div>

    </div>

    </div>
    <div class="flex items-center space-x-2">

     <div class="mr-auto md:mr-4 md:w-56"></div>

     <x-splade-toggle>
     <div @click.prevent="toggle" class="flex items-center select-none bg-gray-500/10 rounded px-3 py-1 text-center font-sans text-md font-medium leading-tight font-bold text-gray-900 transition-all">
       <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="user photo">
       <x-ri-arrow-up-s-line v-if="toggled" class="w-5 h-5 ml-2"/>
       <x-ri-arrow-down-s-line v-else class="w-5 h-5 ml-2"/>
     </div>
 
     <x-splade-transition show="toggled" class="absolute top-14 right-3 z-20 my-4 w-48 shadow-md">
      <ul class="overflow-auto rounded-md border border-blue-gray-50 bg-white p-2 space-y-2 font-sans text-sm font-normal text-blue-gray-500 shadow-lg shadow-blue-gray-500/10 focus:outline-none">

       <div class="px-2 pb-2 mb-2 border-b">
        <p class="text-sm font-medium text-gray-800 truncate">
            {{ Auth::user()->name }}
        </p>
        <p class="text-sm font-medium text-gray-00 truncate">
            {{ Auth::user()->email }}
        </p>
       </div>

       <li>
        <x-splade-link href="{{route('profile.edit')}}" class="flex block w-full cursor-pointer select-none rounded-md px-2 py-2 text-start leading-tight transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900">
         <x-ri-profile-line class="w-4 h-4 mr-2"/>
          Profile
        </x-splade-link>
       </li>

       <li>
        <x-splade-link method="post" href="{{ route('logout') }}" class="flex block w-full cursor-pointer select-none rounded-md px-2 py-2 text-start leading-tight transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900">
         <x-ri-logout-box-r-line class="w-4 h-4 mr-2"/>
         Log out
        </x-splade-link>
       </li>

      </ul>
     </x-splade-transition>
     </x-splade-toggle>



     <button @click="sidebar.open = !sidebar.open" class="flex items-center p-2 select-none font-sans font-medium transition-all rounded text-xs text-gray-500 bg-gray-500/10 xl:hidden">
      <x-ri-menu-line class="w-5 h-5"/>
     </button>

    </div>
  </div>
 </nav>

 <!-- Page Content -->
 <div class="max-w mt-4 mx-auto">
  {{$slot}}
 </div>

</div>
    