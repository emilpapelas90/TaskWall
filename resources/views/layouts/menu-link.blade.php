    <ul class="mb-2 space-y-2">
      <li>
       <Link href="{{ url('/admin/dashboard') }}" class="flex items-center p-1.5 font-medium text-red-900 rounded hover:bg-red-100 group">
        <x-ri-shield-user-fill class="w-5 h-5 transition duration-75"/>
        <span class="ml-3">Admin</span>
       </Link>
      </li>
    </ul>  

    <h6 class="text-md font-medium">Monetize</h6>
    <ul class="pt-2 mt-3 mb-2 space-y-2 border-t border-gray-200">

      <li>
       <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        <x-ri-pie-chart-2-fill class="w-5 h-5 mr-3 text-gray-500 transition duration-75 group-hover:text-gray-900 @if(request()->routeIs('dashboard')) text-white @endif"/>
        {{ __('Dashboard') }}
       </x-nav-link>
      </li>

      <li>
       <x-nav-link :href="route('placements')" :active="request()->routeIs('placements')">
        <x-ri-stack-fill class="w-5 h-5 mr-3 text-gray-500 transition duration-75 group-hover:text-gray-900 @if(request()->routeIs('placements')) text-white @endif"/>
        {{ __('Placements') }}
       </x-nav-link>
      </li>

      <li>
       <Link href="{{ url('/earnings') }}" class="flex items-center p-1.5 text-gray-900 rounded hover:bg-gray-100 group">
        <x-ri-money-dollar-box-fill class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"/>
        <span class="ml-3">Earnings</span>
       </Link>
      </li>

      <li>
       <Link href="{{ url('/earnings') }}" class="flex items-center p-1.5 text-gray-900 rounded hover:bg-gray-100 group">
        <x-ri-wallet-3-fill class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"/>
        <span class="ml-3">Payouts</span>
       </Link>
      </li>

      <li>
       <Link href="{{ url('/chargebacks') }}" class="flex items-center p-1.5 text-gray-900 rounded hover:bg-gray-100 group">
        <x-ri-delete-back-2-fill class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"/>
        <span class="ml-3">Chargebacks</span>
       </Link>
      </li>
    

    </ul>

    <h6 class="text-md font-medium mt-3">Advertise</h6>
    <ul class="pt-2 mt-3 mb-2 space-y-2 border-t border-gray-200">

      <li>
       <Link href="{{ url('/advertiser/dashboard') }}" class="flex items-center p-1.5 text-gray-900 rounded hover:bg-gray-100 group">
        <x-ri-pie-chart-2-fill class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"/>
        <span class="ml-3">Dashboard</span>
       </Link>
      </li>
    
      <li>
         <x-splade-toggle>
          <button @click.prevent="toggle" class="w-full flex items-center p-1.5 text-gray-900 rounded hover:bg-gray-100 group">
           <x-ri-megaphone-fill class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"/>
           <span class="flex-1 ml-3 text-left whitespace-nowrap">Campaigns</span>
           <x-ri-arrow-down-s-line class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"/>
          </button>
           <x-splade-transition show="toggled" class="ml-2">

            <Link href="{{ url('/advertiser/tasks') }}" class="flex items-center p-1.5 text-gray-900 group">
            <x-ri-list-ordered-2 class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"/>
            <span class="ml-3">Tasks</span>
            </Link>

            <Link href="{{ url('/advertiser/click/create') }}" class="flex items-center p-1.5 text-gray-900 group">
            <x-ri-cursor-fill class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"/>
            <span class="ml-3">Clicks</span>
            </Link>

           </x-splade-transition>
         </x-splade-toggle>
      </li>

      <li>
       <Link href="{{ url('/advertiser/add_funds') }}" class="flex items-center p-1.5 text-gray-900 rounded hover:bg-gray-100 group">
        <x-ri-wallet-3-fill class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"/>
        <span class="ml-3">Add Funds</span>
       </Link>
      </li>
      
      <li>
       <Link href="{{ url('/advertiser/submissions') }}" class="flex items-center p-1.5 text-gray-900 rounded hover:bg-gray-100 group">
        <x-ri-user-follow-fill class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"/>
        <span class="ml-3">Submissions</span> 
       </Link>
      </li>

      <li>
       <Link href="{{ url('/advertiser/disputes') }}" class="flex items-center p-1.5 text-gray-900 rounded hover:bg-gray-100 group">
        <x-ri-delete-back-2-fill class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 rotate-180"/>
        <span class="ml-3">Disputes</span>
       </Link>
      </li>

    </ul>
    
    <ul class="pt-2 mt-3 mb-2 space-y-2 border-t border-gray-200">

      <li>
       <Link href="{{ url('/documentation') }}" class="flex items-center p-1.5 text-gray-900 rounded hover:bg-gray-100 group">
        <x-ri-book-2-fill class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"/>
        <span class="ml-3">Documentation</span>
       </Link>
      </li>

      <li>
       <Link href="{{ url('/settings') }}" class="flex items-center p-1.5 text-gray-900 rounded hover:bg-gray-100 group">
        <x-ri-settings-3-fill class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"/>
        <span class="ml-3">Settings</span>
       </Link>
      </li>

      <li>
       <Link href="{{ url('/support') }}" class="flex items-center p-1.5 text-gray-900 rounded hover:bg-gray-100 group">
        <x-ri-customer-service-line class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"/>
        <span class="ml-3">Support</span>
       </Link>
      </li>

      <li>
       <Link method="post" href="{{ route('logout') }}" class="flex items-center p-1.5 text-gray-900 rounded hover:bg-gray-100 group">
        <x-ri-logout-box-fill class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"/>
        <span class="ml-3">{{ __('Log Out') }}</span>
       </Link>
      </li>

    </ul>