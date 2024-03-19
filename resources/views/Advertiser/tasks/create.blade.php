<x-new-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Task') }}
        </h2>
    </x-slot>

    <x-splade-data remember="menu" store="openTab" default="{ tab1: true, tab2: false }"></x-splade-data>

    <div class="bg-clip-border p-4 rounded-xl bg-white shadow-md">
     <div class="bg-gray-200 p-1 w-2/5 border border-blue-gray-100 ml-auto rounded-md">
     <div class="relative text-blue-gray-500 flex items-center">
      <div class="absolute left-0 inset-y-0 w-1/2 flex bg-gradient-to-tr from-gray-900 to-gray-800 transition-all ease-in-out duration-700 transform rounded-md shadow" :class="{'translate-x-0': openTab.tab1, 'translate-x-full':  openTab.tab2, 'translate-x-200':  openTab.tab3 }"></div>
       <button @click.prevent="openTab.tab1 = true; openTab.tab2 = false;" class="relative flex-1 flex text-sm font-semibold capitalize items-center justify-center cursor-pointer p-2 transition-all duration-700 transform" :class="{'text-white': openTab.tab1 }"><x-ri-discount-percent-fill :class="{'text-red-500': openTab.tab1 }" class="w-5 h-5 mr-2"/>General</button>
       <button @click.prevent="openTab.tab1 = false; openTab.tab2 = true;" class="relative flex-1 flex text-sm font-semibold capitalize items-center justify-center cursor-pointer p-2 transition-all duration-700 transform" :class="{'text-white': openTab.tab2 }"><x-ri-discount-percent-fill :class="{'text-red-500': openTab.tab1 }" class="w-5 h-5 mr-2"/>Promotion</button>
      </div>
     </div>
        
      <x-splade-form method="post" :action="route('task.add')" class="space-y-6 overflow-y-auto" preserve-scroll>

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

        <div class="col-span-4">
          <x-splade-select class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 disabled:opacity-50" id="task_action" name="action" :label="__('Task Action:')" multiple choices>
          <option value="" disabled>Select an action</option>
          @foreach ($actions as $action)
            <option value="{{ $action['id'] }}">{{ $action['key'] }}</option>
          @endforeach
          </x-splade-select>
        </div>

        <!-- <div class="col-span-4 grid grid-cols-1 md:grid-cols-4 gap-2 mt-2 p-2 bg-gray-50 rounded">

        <div class="col-span-4">
          <x-splade-select class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 disabled:opacity-50" id="task_action" name="action" :label="__('Task Action:')">
          <option value="" disabled>Select an action</option>
          @foreach ($actions as $action)
            <option value="{{ $action['id'] }}">{{ $action['key'] }}</option>
          @endforeach
          </x-splade-select>
        </div>

        <div class="col-span-4 md:col-span-2 mt-2">
          <x-splade-select class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 disabled:opacity-50" id="task_action_1" name="action_1" :label="__('Task Action: (Optional)')">
          <option value="">Select an action</option>
          @foreach ($actions as $action)
            <option value="{{ $action['id'] }}">{{ $action['key'] }}</option>
          @endforeach
          </x-splade-select>
        </div>

        <div class="col-span-4 md:col-span-2 mt-2">
          <x-splade-select class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 disabled:opacity-50" id="task_action_2" name="action_2" :label="__('Task Action: (Optional)')">
          <option value="">Select an action</option>
          @foreach ($actions as $action)
            <option value="{{ $action['id'] }}">{{ $action['key'] }}</option>
          @endforeach
          </x-splade-select>
        </div>

        <div class="col-span-4 md:col-span-2 mt-2">
          <x-splade-select class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 disabled:opacity-50" id="task_action_3" name="action_3" :label="__('Task Action: (Optional)')">
          <option value="">Select an action</option>
          @foreach ($actions as $action)
            <option value="{{ $action['id'] }}">{{ $action['key'] }}</option>
          @endforeach
          </x-splade-select>
        </div>

        <div class="col-span-4 md:col-span-2 mt-2">
          <x-splade-select class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 disabled:opacity-50" id="task_action_4" name="action_4" :label="__('Task Action: (Optional)')">
          <option value="">Select an action</option>
          @foreach ($actions as $action)
            <option value="{{ $action['id'] }}">{{ $action['key'] }}</option>
          @endforeach
          </x-splade-select>
        </div>

        </div>
         -->
        <x-splade-textarea class="col-span-4 mt-2" name="task_req" autosize :label="__('Task Requirement:')"/>

        <x-splade-textarea class="col-span-4 mt-2" name="proof_req" autosize :label="__('Proof Requirement:')"/>

        <x-splade-radios class="col-span-4 mt-2" name="proof_type" :label="__('Proof Type:')" :options="$proof_type"/>
        <p class="col-span-4 text-gray-500 text-xs italic mb-2">Specify exactly what kind of proof you require from users. Example: <span class="underline">Take a screenshot of your browser history showing you visited at leaset 1 post and clicked at least 1 Ad.</span> Make sure to write exactly Proof that you required for Approval, in textbox below.</p>

        <div class="col-span-4 md:col-span-2 mt-2">
        <x-splade-select class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 disabled:opacity-50" name="approval_time" :label="__('Approval Time:')">
          <option value="">No Approval Time</option>
          @foreach($approval_time as $time)
            <option value="{{ $time['key'] }}">{{ $time['value'] }}</option>
          @endforeach
        </x-splade-select>
        <p class="text-gray-500 text-xs italic mb-2">Specify how much time you want to allow yourself to approve or reject a submission.</p>
        </div>

        <div class="col-span-4 md:col-span-2 mt-2">
        <x-splade-select class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 disabled:opacity-50" name="submission_time" :label="__('Submission Time:')">
          <option value="">No Submission Time</option>
          @foreach($sub_time as $time)
            <option value="{{ $time['key'] }}">{{ $time['value'] }}</option>
          @endforeach
        </x-splade-select>
        <p class="text-gray-500 text-xs italic mb-2">Specify how much time you want allow for your user to Submit the task. If you know that your task take at lease 5 Min to complete you can set time restriction to 4 Min or more below, or you can leave blank for 0. <span class="text-red-600 italic underline">Warning: This may lead to many fraudulently submissions.</span></p>
        </div>

        <x-splade-input class="col-span-4 md:col-span-1 mt-2" id="limit" name="limit" type="number" :label="__('Limit:')" placeholder="Limit"/>
        <x-splade-input class="col-span-4 md:col-span-1 mt-2" name="budget" type="number" :label="__('Budget:')" placeholder="Budget"/>
        <x-splade-input class="col-span-4 md:col-span-2 mt-2" name="daily_submission" type="number" :label="__('Daily Submission Cap:')" placeholder="Daily Submission Cap"/>

        <x-splade-file class="col-span-4 mt-3" name="thumbnail" min-size="50KB" max-size="2MB" preview :label="__('Task Thumbnail:')" />
        <img v-if="form.thumbnail" class="h-24 w-32 rounded" :src="form.$fileAsUrl('thumbnail')" />


        <label class="col-span-4 mt-5 mb-2">Total Campaign price after fees $<span class="col-span-4 text-green-600 font-semibold" id="sumDisplay"></span>.</label>

        <div class="flex items-center gap-4 col-span-4">
          <x-splade-submit :label="__('Submit for Approval')" />
        </div>
      </div>  

      </x-splade-form>

    </div>
</x-new-app-layout>

<x-splade-script>
    // Get the select elements
    var selectElements = [
        document.getElementById('task_action'),
        document.getElementById('task_action_1'),
        document.getElementById('task_action_2'),
        document.getElementById('task_action_3'),
        document.getElementById('task_action_4')
    ];

    var sumDisplay = document.getElementById('sumDisplay');
    var limit = document.getElementById('limit');
    var fee = {{ $fees }};
    var actions = {!! json_encode($actions) !!};

    // Function to calculate the sum of selected options' values
    function calculateSum() {
        var sum = 0;

        // Loop through each select element
        selectElements.forEach(function(selectElement) {
            var selectedOptions = selectElement.selectedOptions;

            // Loop through selected options and sum their values
            for (var i = 0; i < selectedOptions.length; i++) {
                var option = selectedOptions[i];
                var optionId = option.value;


                //console.log(optionId)

                // Find the action object based on its ID
                var action = actions.find(function(a) {
                    return String(a.id) === optionId;

                    console.log(a.id);

                });

                console.log(actions)


                // Add the value of the found action to the sum
                if (action) {
                    sum += parseFloat(action.value);
                }
            }
        });

        // Calculate the total sum including the fee and update the sum display
        var total = sum * limit.value;
        var totalWithFee = total + fee;
        sumDisplay.textContent = totalWithFee.toFixed(2);
    }

    // Add event listeners to each select element
    selectElements.forEach(function(selectElement) {
        selectElement.addEventListener('change', calculateSum);
    });

    limit.addEventListener('input', calculateSum);
</x-splade-script>