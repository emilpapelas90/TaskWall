<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <x-splade-table :for="$placements">

     <x-splade-cell name as="$placement">
      <div class="flex items-center">
       <img class="w-7 h-7 mr-2 rounded" src="http://www.google.com/s2/favicons?domain={{ $placement->url }}"/>
       <span>{{ $placement->name }}</span>
      </div>
     </x-splade-cell>

     <x-splade-cell status as="$placement"> 
      @if($placement->status == 0)
      <div class="align-middle select-none font-sans font-medium transition-all text-sm py-1.5 rounded-md text-amber-900">
       <span>{{  __('Pending') }}</span>
      </div>
      @elseif($placement->status == 1)
      <div class="align-middle select-none font-sans font-medium transition-all text-sm py-1.5 rounded-md text-green-900">
       <span>{{  __('Approved') }}</span>
      </div>
      @else
      <div class="align-middle select-none font-sans font-medium transition-all text-sm py-1.5 rounded-md text-red-900">
       <span>{{  __('Rejected') }}</span>
      </div>
      @endif
     </x-splade-cell>

     <x-splade-cell created_at as="$placement">
      {{ date('m-d-Y', strtotime($placement->created_at)) }}
     </x-splade-cell>

     <x-splade-cell action as="$placement">
      <div class="flex gap-2">
       <Link href="{{ route('placement.edit', $placement->id) }}" class="flex items-center select-none rounded-md bg-blue-500 py-1.5 px-3 text-center align-middle font-sans text-xs font-bold text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none">
        <x-ri-pencil-fill class="w-4 h-4 mr-1"/>
        Edit
       </Link>
       <Link href="{{ route('placement.destroy', $placement->id) }}" method="DELETE" confirm="Delete the following Placement {{$placement->name}}" confirm-text="Are you sure?" confirm-button="Yes" cancel-button="No" class="flex items-center select-none rounded-md bg-red-500 py-1.5 px-3 text-center align-middle font-sans text-xs font-bold text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none">
        <x-ri-delete-bin-6-fill class="w-4 h-4 mr-1"/>
        Delete
       </Link>
      </div>
     </x-splade-cell>

    </x-splade-table>

</x-app-layout>    