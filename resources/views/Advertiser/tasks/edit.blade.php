<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

      <div class="bg-clip-border p-4 rounded-xl bg-white shadow-md">
        
      <x-splade-form method="patch" :default="$task" :action="route('task.update', $task)" class="space-y-6 overflow-y-auto" preserve-scroll>

      <div class="grid grid-cols-1 md:grid-cols-4 gap-2">

        <x-splade-input class="col-span-4 md:col-span-3 mt-2" name="name" type="text" :label="__('Task Title:')" placeholder="Task Title"/>
            
        <div class="col-span-4 md:col-span-1 mt-2">
          <x-splade-select name="category" :label="__('Task Category:')">
          <option value="" disabled>Select an category</option>
          @foreach ($category as $option)
            <option value="{{ $option['name'] }}">{{ $option['name'] }}</option>
          @endforeach
          </x-splade-select>
        </div>

        <!-- {{json_encode($actions)}} -->

        <x-splade-select class="col-span-4 mt-2" :options="$actions" name="actions[]" option-value="id" option-label="key" multiple choices relation>
         
        </x-splade-select>

        
        <x-splade-textarea class="col-span-4 mt-2" name="task_req" autosize :label="__('Task Requirement:')"/>

        <x-splade-textarea class="col-span-4 mt-2" name="proof_req" autosize :label="__('Proof Requirement:')"/>

        <x-splade-radios class="col-span-4 mt-2" name="proof_type" :label="__('Proof Type:')" :options="$proof_type"/>
        <p class="col-span-4 text-gray-500 text-xs mb-2">Specify exactly what kind of proof you require from users. Example: <span class="italic underline">Take a screenshot of your browser history showing you visited at leaset 1 post and clicked at least 1 Ad.</span> Make sure to write exactly Proof that you required for Approval, in textbox below.</p>

        <div class="col-span-4 md:col-span-2 mt-2">
        <x-splade-select class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 disabled:opacity-50" name="approval_time" :label="__('Approval Time:')">
          <option value="">No Approval Time</option>
          @foreach($approval_time as $time)
            <option value="{{ $time['key'] }}">{{ $time['value'] }}</option>
          @endforeach
        </x-splade-select>
        <p class="text-gray-500 text-xs mb-2">Specify how much time you want to allow yourself to approve or reject a submission.</p>
        </div>

        <div class="col-span-4 md:col-span-2 mt-2">
        <x-splade-select class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 disabled:opacity-50" name="submission_time" :label="__('Submission Time:')">
          <option value="">No Submission Time</option>
          @foreach($sub_time as $time)
            <option value="{{ $time['key'] }}">{{ $time['value'] }}</option>
          @endforeach
        </x-splade-select>
        <p class="text-gray-500 text-xs mb-2">Specify how much time you want allow for your user to Submit the task. If you know that your task take at lease 5 Min to complete you can set time restriction to 4 Min or more below, or you can leave blank for 0. <span class="text-red-600 italic underline">Warning: This may lead to many fraudulently submissions.</span></p>
        </div>

        <x-splade-input class="col-span-4 md:col-span-1 mt-2" id="limit" name="limit" type="number" :label="__('Limit:')" placeholder="Limit"/>
        <x-splade-input class="col-span-4 md:col-span-1 mt-2" name="budget" type="number" :label="__('Budget:')" placeholder="Budget"/>
        <x-splade-input class="col-span-4 md:col-span-2 mt-2" name="daily_submission" type="number" :label="__('Daily Submission Cap:')" placeholder="Daily Submission Cap"/>

        <x-splade-file class="col-span-4 mt-3" name="thumbnail" min-size="50KB" max-size="2MB" preview :label="__('Task Thumbnail:')" />
        <!-- <img v-if="form.thumbnail" class="h-24 w-32 rounded" :src="form.$fileAsUrl('thumbnail')" /> -->


        <label class="col-span-4 mt-5 mb-2">Total Campaign price after fees $<span class="col-span-4 text-green-600 font-semibold" id="sumDisplay"></span>.</label>

        <div class="flex items-center gap-4 col-span-4">
          <x-splade-submit :label="__('Submit for Approval')" />
        </div>
      </div>  

      </x-splade-form>

      </div>
</x-app-layout>