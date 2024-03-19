<x-new-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

      <div class="flex flex-col bg-clip-border p-4 rounded-xl bg-white shadow-md">

       <div class="flex">
        <Link href="{{route('task.create')}}" class="select-none rounded-md bg-gradient-to-tr from-gray-900 to-gray-800 py-2 px-5 mb-2 ml-auto text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
         {{ __('New Task') }}
        </Link>
       </div>

        <x-splade-table :for="$tasks">

         <x-splade-cell details as="$task"> 

         <div class="flex">

         <div class="flex flex-col">

          <h2 class="text-gray-800 block font-sans text-md antialiased font-semibold leading-snug tracking-normal mb-1">Task Title:</h2>
          <span class="block font-sans text-sm antialiased font-light leading-relaxed text-inherit">{{ $task->name }}</span>
 
          <h2 class="text-gray-800 block font-sans text-md antialiased font-semibold leading-snug tracking-normal mt-3 mb-1">Category:</h2>
          <span class="block font-sans text-sm antialiased font-light leading-relaxed text-inherit">{{ $task->category }}</span>

          <h2 class="text-gray-800 block font-sans text-md antialiased font-semibold leading-snug tracking-normal mt-3 mb-1">Requirements:</h2>
          <ul>
           @foreach(json_decode($task->task_req, true) as $index => $re)
            @if ($loop->iteration <= 1)
             <li class="block font-sans text-sm antialiased font-light leading-relaxed text-inherit mb-2">
              {{ $loop->iteration }}) {{ $re['req'] }}
             </li>
            @else
            <x-splade-toggle>
             <div v-show="toggled">
              <li class="block font-sans text-sm antialiased font-light leading-relaxed text-inherit mb-2">
               {{ $loop->iteration }}) {{ $re['req'] }}
              </li>
             </div>
             <button v-if="!toggled"  @click.prevent="toggle" class="text-green-600">Show More</button>
             <button v-if="toggled" @click.prevent="setToggle(false)" class="text-red-600">Show Less</button>
            </x-splade-toggle>
            @break
            @endif
           @endforeach
          </ul>

          <h2 class="text-gray-800 block font-sans text-md antialiased font-semibold leading-snug tracking-normal mt-3 mb-1">Created At:</h2>
          <span class="block font-sans text-sm antialiased font-light leading-relaxed text-inherit">{{ date('m-d-Y H:i a', strtotime($task->created_at)) }}</span>

          <div class="flex flex-col mt-3">
           <h2 class="text-gray-800 block font-sans text-md antialiased font-semibold leading-snug tracking-normal mb-1">Status:</h2>
           @if($task->status === 0)
           <span class="text-yellow-600 text-m font-semibold rounded">Pending</span>  
           @elseif($task->status === 1)
           <span class="text-green-600 text-m font-semibold rounded">Approved</span>  
           @else
           <span class="text-red-600 text-m font-semibold rounded">Rejected</span>  
           @endif
          </div>

          <div class="block sm:hidden flex flex-col mt-3">
           <h2 class="text-gray-800 block font-sans text-md antialiased font-semibold leading-snug tracking-normal mb-1">Status:</h2>
           @if($task->status === 0)
           <span class="text-yellow-600 text-m font-semibold rounded">Pending</span>  
           @elseif($task->status === 1)
           <span class="text-green-600 text-m font-semibold rounded">Approved</span>  
           @else
           <span class="text-red-600 text-m font-semibold rounded">Rejected</span>  
           @endif

           <h2 class="text-gray-800 block font-sans text-md antialiased font-semibold leading-snug tracking-normal my-2">Image:</h2>
           <Link href="{{ asset($task->thumbnail) }}" away>
            @if($task && $task->thumbnail)<img src="{{ asset($task->thumbnail) }}" class="w-40 h-28 rounded"/>@endif
           </Link>
          </div>

          <h2 class="text-gray-800 block font-sans text-md antialiased font-semibold leading-snug tracking-normal mt-3 mb-1">Actions:</h2>
          <div class="flex gap-2">
            <Link href="{{ route('task.edit', $task->id) }}" class="flex items-center select-none rounded-md bg-blue-500 py-2 px-3 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none">
             <x-ri-pencil-fill class="w-4 h-4 mr-1"/>
             Edit
            </Link>
            <Link href="{{ route('task.destroy', $task->id) }}" method="DELETE" confirm="Delete the following Task {{$task->name}}" confirm-text="Are you sure?" confirm-button="Yes" cancel-button="No" class="flex items-center select-none rounded-md bg-red-500 py-2 px-3 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none">
             <x-ri-delete-bin-6-fill class="w-4 h-4 mr-1"/>
             Delete
            </Link>
          </div>

         </div> 
         
         

         <div class="flex ml-auto">
          <div class="hidden sm:block flex flex-col">
           <h2 class="text-gray-800 block font-sans text-md antialiased font-semibold leading-snug tracking-normal mb-1">Task Thumbnail:</h2>
           <Link href="{{ asset($task->thumbnail) }}" away>
            @if($task && $task->thumbnail)<img src="{{ asset($task->thumbnail) }}" class="w-48 h-52 rounded"/>@endif
           </Link>
          </div>  
         </div>

         </div>

         </x-splade-cell>   

        </x-splade-table>

      </div>
</x-new-app-layout>    