<div class="min-h-screen bg-gray-50">
   <x-splade-data store="sidebar" default="{ open: false }" />

    <aside id="logo-sidebar" :class="{ 'translate-x-0': sidebar.open, '-translate-x-80': !sidebar.open }" class="bg-white shadow-sm fixed inset-0 z-20 my-4 ml-4 h-[calc(100vh-32px)] w-72 rounded-xl transition-transform duration-300 xl:translate-x-0 border border-blue-gray-100" aria-label="Sidebar">
        @include('layouts.menu-link')
    </aside>

    @include('layouts.navigation')
</div>