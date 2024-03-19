<x-new-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Create Placement') }}
    </h2>
  </x-slot>

  <x-splade-data remember="menu" store="openTab" default="{ tab1: true, tab2: false, tab3: false }"></x-splade-data>

  <div class="bg-clip-border p-4 bg-white border border-blue-gray-100 shadow-md rounded-xl">
   <x-splade-form method="post" :action="route('placement.add')" class="space-y-6 overflow-y-auto" preserve-scroll>

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

    <div v-show="openTab.tab1" class="p-">
     <h2 class="text-2xl text-gray-800 font-sans font-semibold">General</h2>
     <p class="block font-sans text-sm antialiased font-light leading-relaxed text-blue-gray-500 mb-4">Tell us about your app or placement.</p>
      <div class="grid grid-cols-1 md:grid-cols-6 gap-1">

       <x-splade-input class="col-span-6 md:col-span-4" name="name" type="text" :label="__('Placement Name:')" placeholder="Placement Name"/>

       <x-splade-select class="col-span-6 md:col-span-2" name="category" :label="__('Category:')">
        <option value="" disabled>Select an category</option>
        @foreach ($category as $cat)
         <option value="{{ $cat['name'] }}">{{ $cat['name'] }}</option>
        @endforeach         
       </x-splade-select>

       <div class="col-span-6 mt-2">
        <x-splade-input name="url" type="text" :label="__('Website Url:')" placeholder="Website Url"/>
        <p class="text-gray-500 text-xs italic mt-1">This is your website address where the wall will be placed, for example https://example.com.</p>
       </div>

       <div class="col-span-6 md:col-span-3 mt-2">
        <x-splade-input id="currency" name="currency" type="text" :label="__('Currency Name:')" placeholder="Currency Name eg(Points, Gems, Diamonds. etc)"/>
        <p class="text-gray-500 text-xs italic mt-1">This is your currency name that users will see when they withdraw to your website. For example: points OR cents.</p>
       </div>

       <div class="col-span-6 md:col-span-3 mt-2">
        <x-splade-input id="rate" name="rate" type="number" :label="__('Currency Rate:')" placeholder="Currency Rate"/>
        <p class="text-gray-500 text-xs italic mt-1">$1 = X currency to your users? For example want to give 70% profit to your users and your currency is "Cent" then you need to put 30 above and your users would get 70 "Cent" and you get $1 USD.</p>
       </div>

       <div class="col-span-6 mt-2 border border-blue-gray-100 shadow-md rounded-md">
        <h2 class="text-lg text-gray-800 font-sans font-semibold p-2">Example Conversion Calculations</h2>

        <table class="table-auto min-w-full">
         <thead class="bg-gray-100 border-y">
          <tr>
           <th class="text-sm font-medium text-gray-900 px-6 py-2 text-left">TaskWall <span id="currencyout"></span></th>
           <th class="text-sm font-medium text-gray-900 px-6 py-2 text-left"><span id="currencyout"></span> that Owner Earns</th>
           <th class="text-sm font-medium text-gray-900 px-6 py-2 text-left"><span id="currencyout"></span> paid to User</th>
          </tr>
         </thead>
         <tbody>
          @for ($i = 0; $i < 3; $i++)
          <tr class="bg-white border-b">
           <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">100 </td>
           <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">$0.01</td>
           <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">7 <span id="currencyout"></span></td>
          </tr>
          @endfor
         </tbody>
        </table>
       </div>

       <span id="rateout"></span>
       <span id="currencyout"></span>


       <x-splade-input class="col-span-6 mt-2" name="postback" type="text" :label="__('Postback Url:')" placeholder="Postback Url"/>
       <p class="col-span-6 text-gray-500 text-xs italic mt-">This is the URL we will send a GET request to when a user withdraws earnings to your website.</p>
       
      </div>
    </div>

    <div v-show="openTab.tab2" class="p-4">
      <h2 class="text-2xl font-semibold mb-2 text-blue-600">Section 2 Content</h2>
      <p class="text-gray-700">Proin non velit ac purus malesuada venenatis sit amet eget lacus. Morbi quis purus id ipsum ultrices aliquet Morbi quis.</p>
    </div>

    <div v-show="openTab.tab3" class="p-4">
      <h2 class="text-2xl font-semibold mb-2 text-blue-600">Section 3 Content</h2>
      <p class="text-gray-700">Fusce hendrerit urna vel tortor luctus, nec tristique odio tincidunt. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
    </div>      
    
    <div class="mt-4">
     <x-splade-submit :label="__('Submit Placement')" />
    </div>
    
   </x-splade-form>
  </div>
</x-new-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var rateInput = document.getElementById('rate');
        var currencyInput = document.getElementById('currency');

        var rate = document.getElementById('rateout');
        var currency = document.getElementById('currencyout');

        rateInput.addEventListener('input', function() {
          var rateValue = rateInput.value;
          rate.textContent = rateValue;
        });

        currencyInput.addEventListener('input', function() {
          var currencyValue = currencyInput.value;
          currency.textContent = currencyValue;
        });
    });
</script>