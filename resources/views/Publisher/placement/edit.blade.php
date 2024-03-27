<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit Placement') }}
    </h2>
  </x-slot>

  <x-splade-data remember="menu" store="openTab" default="{ tab1: true, tab2: false, tab3: false }"></x-splade-data>

  <div class="bg-clip-border p-4 bg-white border border-blue-gray-100 shadow-md rounded-xl">
   <x-splade-form method="patch" :default="$placement" :action="route('placement.update',$placement)" class="space-y-6 overflow-y-auto" preserve-scroll>

    <div class="hidden md:block bg-gray-200 p-1 w-7/12 border border-blue-gray-100 ml-auto rounded-md">
     <div class="relative text-blue-gray-500 flex items-center">

      <div class="absolute left-0 inset-y-0 w-1/3 flex bg-gradient-to-tr from-gray-900 to-gray-800 transition-all ease-in-out duration-700 transform rounded-md shadow" :class="{'translate-x-0': openTab.tab1, 'translate-x-full':  openTab.tab2, 'translate-x-200':  openTab.tab3 }"></div>

       <button @click.prevent="openTab.tab1 = true; openTab.tab2 = false; openTab.tab3 = false" class="relative flex-1 flex text-sm font-semibold capitalize items-center justify-center cursor-pointer p-2 transition-all duration-700 transform" :class="{'text-white': openTab.tab1 }"><x-ri-discount-percent-fill :class="{'text-red-500': openTab.tab1 }" class="w-5 h-5 mr-2"/>General</button>
       <button @click.prevent="openTab.tab1 = false; openTab.tab2 = true; openTab.tab3 = false" class="relative flex-1 flex text-sm font-semibold capitalize items-center justify-center cursor-pointer p-2 transition-all duration-700 transform" :class="{'text-white': openTab.tab2 }"><x-ri-discount-percent-fill :class="{'text-red-500': openTab.tab1 }" class="w-5 h-5 mr-2"/>Promotion</button>
       <button @click.prevent="openTab.tab1 = false; openTab.tab2 = false; openTab.tab3 = true" class="relative flex-1 flex text-sm font-semibold capitalize items-center justify-center cursor-pointer p-2 transition-all duration-700 transform" :class="{'text-white': openTab.tab3 }"><x-ri-discount-percent-fill :class="{'text-red-500': openTab.tab1 }" class="w-5 h-5 mr-2"/>Design</button>
     </div>
    </div>


    <div class="block md:hidden bg-gray-200 p-1 w-48 border border-blue-gray-100 ml-auto rounded-md">
     <div class="relative text-blue-gray-500 flex flex-col items-center">

      <div class="absolute left-0 inset-x-0 h-9 w-full flex bg-gradient-to-tr from-gray-900 to-gray-800 transition-all ease-in-out duration-700 transform rounded-md shadow" :class="{'translate-y-0': openTab.tab1, 'translate-y-full':  openTab.tab2, 'translate-y-200':  openTab.tab3 }"></div>

       <button @click.prevent="openTab.tab1 = true; openTab.tab2 = false; openTab.tab3 = false" class="relative flex-1 flex text-sm font-semibold capitalize items-center justify-center cursor-pointer p-2 transition-all duration-700 transform" :class="{'text-white': openTab.tab1 }"><x-ri-discount-percent-fill :class="{'text-red-500': openTab.tab1 }" class="w-5 h-5 mr-2"/>General</button>
       <button @click.prevent="openTab.tab1 = false; openTab.tab2 = true; openTab.tab3 = false" class="relative flex-1 flex text-sm font-semibold capitalize items-center justify-center cursor-pointer p-2 transition-all duration-700 transform" :class="{'text-white': openTab.tab2 }"><x-ri-discount-percent-fill :class="{'text-red-500': openTab.tab1 }" class="w-5 h-5 mr-2"/>Promotion</button>
       <button @click.prevent="openTab.tab1 = false; openTab.tab2 = false; openTab.tab3 = true" class="relative flex-1 flex text-sm font-semibold capitalize items-center justify-center cursor-pointer p-2 transition-all duration-700 transform" :class="{'text-white': openTab.tab3 }"><x-ri-discount-percent-fill :class="{'text-red-500': openTab.tab1 }" class="w-5 h-5 mr-2"/>Design</button>
     </div>
    </div>

    <div v-show="openTab.tab1">
     <h2 class="text-2xl text-gray-800 font-sans font-semibold">General</h2>
     <p class="block font-sans text-sm antialiased font-light leading-relaxed text-gray-500 mb-4">Tell us about your app or placement.</p>
      <div class="grid grid-cols-1 md:grid-cols-6 gap-1">

       <div class="col-span-6 md:col-span-4">
        <x-splade-input name="name" type="text" :label="__('Placement Name:')"/>
        <p class="text-gray-500 text-xs italic mt-1">Name of your placement.</p>
       </div>

       <x-splade-select class="col-span-6 md:col-span-2" name="category" :label="__('Category:')">
        <option value="" disabled>Select an category</option>
        @foreach ($category as $cat)
         <option value="{{ $cat['name'] }}">{{ $cat['name'] }}</option>
        @endforeach         
       </x-splade-select>

       <div class="col-span-6 mt-2">
        <x-splade-input name="url" type="text" :label="__('Website Url:')"/>
        <p class="text-gray-500 text-xs italic mt-1">This is your website address where the wall will be placed, for example https://example.com.</p>
       </div>

       <div class="col-span-6 md:col-span-3 mt-2">
        <x-splade-input id="currency" name="currency" type="text" :label="__('Currency Name:')"/>
        <p class="text-gray-500 text-xs italic mt-1">This is your currency name that users will see when they withdraw to your website. For example: Points or Cents.</p>
       </div>
     
       <div class="col-span-6 md:col-span-3 mt-2">
        <x-splade-input id="rate" name="rate" type="number" :label="__('Currency Rate:')"/>
        <p class="text-gray-500 text-xs italic mt-1">If an offer payout is <span class="font-semibold text-green-600">$1.00</span>, the user will receive <span class="font-semibold" v-text="form.rate"></span> <span class="font-semibold" v-text="form.currency"></span> .</p>
       </div>

       <div class="col-span-6 mt-2 border border-blue-gray-100 shadow-md rounded-md">
        <h2 class="text-lg text-gray-800 font-sans font-semibold p-2">Example Conversion Calculations</h2>

        <table class="table-auto min-w-full">
         <thead class="bg-gray-100 border-y">
          <tr>
           <th class="text-sm font-medium text-gray-900 px-6 py-2 text-left"><span class="flex">TaskWall<p class="ml-1" v-text="form.currency"></p></span></th>
           <th class="text-sm font-medium text-gray-900 px-6 py-2 text-left">Owner Earns</th>
           <th class="text-sm font-medium text-gray-900 px-6 py-2 text-left"><span class="flex"><p class="mr-1" v-text="form.currency"></p>paid to User</span></th>
          </tr>
         </thead>
         <tbody>
          <tr class="bg-white border-b">
           <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">100</td>
           <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">$0.01</td>
           <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><span class="flex"><span v-if="form.rate != null" v-text="0.01 * form.rate" class="mr-1"></span><p v-text="form.currency"></p></span></td>
          </tr>
          <tr class="bg-white border-b">
           <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">1,000</td>
           <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">$0.10</td>
           <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><span class="flex"><span v-if="form.rate != null" v-text="0.10 * form.rate" class="mr-1"></span><p v-text="form.currency"></p></span></td>
          </tr>
          <tr class="bg-white border-b">
           <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">10,000</td>
           <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">$1</td>
           <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><span class="flex"><span v-if="form.rate != null" v-text="1 * form.rate" class="mr-1"></span><p v-text="form.currency"></p></span></td>
          </tr>
         </tbody>
        </table>
       </div>


       <x-splade-input class="col-span-6 mt-2" name="postback" type="text" :label="__('Postback Url:')"/>
       <p class="col-span-6 text-gray-500 text-xs italic">This is the URL we will send a GET request to when a user withdraws earnings to your website.</p>

      </div>
    </div>

    <div v-show="openTab.tab2">
     <h2 class="text-2xl text-gray-800 font-sans font-semibold">Promotion</h2>      
     <p class="block font-sans text-sm antialiased font-light leading-relaxed text-gray-500 mb-4">Increase the amount of Currency for your Placement for a Limited time.</p>
      <div class="grid grid-cols-1 md:grid-cols-6 gap-1">

       <x-splade-input class="col-span-6" name="message" type="text" :label="__('Display Message:')"/>
       <p class="col-span-6 text-gray-500 text-xs italic mt-1 mb-2">Message that you want to display to your users.</p>

       <div class="col-span-6 md:col-span-2">
        <x-splade-input name="start_at" :label="__('Start:')" date time/>
        <p class="text-gray-500 text-xs italic mt-1">Date when Promotion will Start.</p>
       </div>

       <div class="col-span-6 md:col-span-2">
        <x-splade-input name="end_at" :label="__('End:')" date time/>
        <p class="text-gray-500 text-xs italic mt-1">Date when Promotion will End.</p>
       </div>

       <div class="col-span-6 md:col-span-2">
        <x-splade-input name="percentage" type="number" :label="__('Increase %:')"/>
        <p class="text-gray-500 text-xs italic mt-1">Enter the percentage increase you would like to reward your users during this promotion.</p>
       </div>

      <div class="col-span-6 mt-2">
       <h2 class="text-lg text-gray-800 font-sans font-semibold p-2">Active Promotions</h2>
       <div class="overflow-y-auto">
       <table class="table-auto min-w-full">
         <thead class="bg-gray-100 border-y">
          <tr>
           <th class="text-sm font-medium text-gray-900 px-6 py-2 text-left">Start Date</th>
           <th class="text-sm font-medium text-gray-900 px-6 py-2 text-left">End Date</th>
           <th class="text-sm font-medium text-gray-900 px-6 py-2 text-left">% Increase</th>
           <th class="text-sm font-medium text-gray-900 px-6 py-2 text-left">Status</th>
           <th class="text-sm font-medium text-gray-900 px-6 py-2 text-left">Action</th>
          </tr>
         </thead>
         <tbody>
          @if($promotions)
          <tr class="bg-white border-b">
           <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ date('m-d-Y H:i', strtotime($promotions->start_at)) }}</td>
           <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ date('m-d-Y H:i', strtotime($promotions->end_at)) }}</td>
           <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $promotions->percentage }}</td>
           <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
            @if($promotions->status == 1)
            <span class="align-middle select-none font-sans font-medium transition-all text-sm text-green-900">Active</span>  
            @else
            <span class="align-middle select-none font-sans font-medium transition-all text-sm text-red-900">Inactive</span>  
            @endif
           </td>
           <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
            <Link href="{{ route('promo.destroy', $promotions->placement_id) }}" method="DELETE" confirm="Delete the following Promotion for {{$placement['name']}}" confirm-text="Are you sure?" confirm-button="Yes" cancel-button="No" class="flex font-sans font-bold text-center text-xs text-red-500">
             <x-ri-delete-bin-6-fill class="w-4 h-4 mr-1"/>
            </Link>
           </td>
          </tr>
          @else
          <tr>
           <td colspan="5" class="bg-white border-b text-center py-4">No promotions available.</td>
          </tr>
          @endif
         </tbody>
        </table>
        </div>
       </div>
      </div>
    </div>

    <div v-show="openTab.tab3">
      <h2 class="text-2xl text-gray-800 font-sans font-semibold">Section 3 Content</h2>
      <p class="text-gray-500">Fusce hendrerit urna vel tortor luctus, nec tristique odio tincidunt. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
    </div>      
    
    <div class="mt-4">
     <x-splade-submit :label="__('Submit')" />
    </div>

   </x-splade-form>
  </div>
</x-app-layout>