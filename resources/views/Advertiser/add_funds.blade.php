<x-app-layout> 
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Add Funds') }}
    </h2>
  </x-slot>
  <x-splade-form method="post" :action="route('add_funds')" class="space-y-6" preserve-scroll>

  <x-splade-data remember="menu" store="openTab" default="{ tab1: true, tab2: false, tab3: false }"></x-splade-data>

    <div class="bg-clip-border p-4 bg-white border border-blue-gray-100 shadow-md rounded-xl">

    <div class="hidden md:bloc bg-gray-200 p-1 w-7/12 border border-blue-gray-100 mx-auto rounded-md">
     <div class="relative text-blue-gray-500 flex items-center">

      <div class="absolute left-0 inset-y-0 w-1/3 flex bg-gradient-to-tr from-gray-900 to-gray-800 transition-all ease-in-out duration-700 transform rounded-md shadow" :class="{'translate-x-0': openTab.tab1, 'translate-x-full':  openTab.tab2, 'translate-x-200':  openTab.tab3 }"></div>

       <button @click.prevent="openTab.tab1 = true; openTab.tab2 = false; openTab.tab3 = false" class="relative flex-1 flex text-sm font-semibold capitalize items-center justify-center cursor-pointer p-2 transition-all duration-700 transform" :class="{'text-white': openTab.tab1 }">
       </button>
       <button @click.prevent="openTab.tab1 = false; openTab.tab2 = true; openTab.tab3 = false" class="relative flex-1 flex text-sm font-semibold capitalize items-center justify-center cursor-pointer p-2 transition-all duration-700 transform" :class="{'text-white': openTab.tab2 }">Skrill</button>
       <button @click.prevent="openTab.tab1 = false; openTab.tab2 = false; openTab.tab3 = true" class="relative flex-1 flex text-sm font-semibold capitalize items-center justify-center cursor-pointer p-2 transition-all duration-700 transform" :class="{'text-white': openTab.tab3 }">Bitcoin</button>
     </div>
    </div>

    <!-- <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2 my-3">

     <div @click.prevent="openTab.tab1 = true; openTab.tab2 = false; openTab.tab3 = false" class="bg-white p-2 shadow-md rounded" :class="{'border border-blue-500': openTab.tab1 }">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40px" height="40px" viewBox="0 0 256 302" version="1.1" preserveAspectRatio="xMidYMid">
	     <g>
		    <path d="M217.168476,23.5070146 C203.234077,7.62479651 178.045612,0.815753338 145.823355,0.815753338 L52.3030619,0.815753338 C45.7104431,0.815753338 40.1083819,5.6103852 39.0762042,12.1114399 L0.136468302,259.076601 C-0.637664968,263.946149 3.13311322,268.357876 8.06925331,268.357876 L65.804612,268.357876 L80.3050438,176.385849 L79.8555471,179.265958 C80.8877248,172.764903 86.4481659,167.970272 93.0324607,167.970272 L120.46841,167.970272 C174.366398,167.970272 216.569147,146.078116 228.897012,82.7490197 C229.263268,80.8761167 229.579581,79.0531577 229.854273,77.2718188 C228.297683,76.4477414 228.297683,76.4477414 229.854273,77.2718188 C233.525163,53.8646924 229.829301,37.9325302 217.168476,23.5070146" fill="#27346A"/>
		    <path d="M102.396976,68.8395929 C103.936919,68.1070797 105.651665,67.699203 107.449652,67.699203 L180.767565,67.699203 C189.449511,67.699203 197.548776,68.265236 204.948824,69.4555699 C207.071448,69.7968545 209.127479,70.1880831 211.125242,70.6375799 C213.123006,71.0787526 215.062501,71.5781934 216.943728,72.1275783 C217.884341,72.4022708 218.808307,72.6852872 219.715624,72.9849517 C223.353218,74.2002577 226.741092,75.61534 229.854273,77.2718188 C233.525163,53.8563683 229.829301,37.9325302 217.168476,23.5070146 C203.225753,7.62479651 178.045612,0.815753338 145.823355,0.815753338 L52.2947379,0.815753338 C45.7104431,0.815753338 40.1083819,5.6103852 39.0762042,12.1114399 L0.136468302,259.068277 C-0.637664968,263.946149 3.13311322,268.349552 8.0609293,268.349552 L65.804612,268.349552 L95.8875974,77.5798073 C96.5035744,73.6675208 99.0174265,70.4627756 102.396976,68.8395929 Z" fill="#27346A"/>
		    <path d="M228.897012,82.7490197 C216.569147,146.069792 174.366398,167.970272 120.46841,167.970272 L93.0241367,167.970272 C86.4398419,167.970272 80.8794007,172.764903 79.8555471,179.265958 L61.8174095,293.621258 C61.1431644,297.883153 64.4394738,301.745495 68.7513129,301.745495 L117.421821,301.745495 C123.182038,301.745495 128.084882,297.550192 128.983876,291.864891 L129.458344,289.384335 L138.631407,231.249423 L139.222412,228.036354 C140.121406,222.351053 145.02425,218.15575 150.784467,218.15575 L158.067979,218.15575 C205.215193,218.15575 242.132193,199.002194 252.920115,143.605884 C257.423406,120.456802 255.092683,101.128442 243.181019,87.5519756 C239.568397,83.4399129 235.081754,80.0437153 229.854273,77.2718188 C229.571257,79.0614817 229.263268,80.8761167 228.897012,82.7490197 L228.897012,82.7490197 Z" fill="#2790C3"/>
		    <path d="M216.952052,72.1275783 C215.070825,71.5781934 213.13133,71.0787526 211.133566,70.6375799 C209.135803,70.1964071 207.071448,69.8051785 204.957148,69.4638939 C197.548776,68.265236 189.457835,67.699203 180.767565,67.699203 L107.457976,67.699203 C105.651665,67.699203 103.936919,68.1070797 102.4053,68.8479169 C99.0174265,70.4710996 96.5118984,73.6675208 95.8959214,77.5881313 L80.3133678,176.385849 L79.8638711,179.265958 C80.8877248,172.764903 86.4481659,167.970272 93.0324607,167.970272 L120.476734,167.970272 C174.374722,167.970272 216.577471,146.078116 228.905336,82.7490197 C229.271592,80.8761167 229.579581,79.0614817 229.862597,77.2718188 C226.741092,75.623664 223.361542,74.2002577 219.723948,72.9932757 C218.816631,72.6936112 217.892665,72.4022708 216.952052,72.1275783" fill="#1F264F"/>
	     </g>
      </svg>
       <img src="https://res.cloudinary.com/emil-dev/image/upload/v1711125521/pngimg.com_-_paypal_PNG7_dgqj4y.png" class="w-auto h-12"/>
       <div class="mt-2">
        <h2 class="font-semibold text-md text-gray-800 leading-tight">Paypal</h2>
        <p class="text-gray-500 text-xs">Pay using Paypal account, Credit, Debit Card.</p>
       </div>
     </div>

     <div @click.prevent="openTab.tab1 = false; openTab.tab2 = true; openTab.tab3 = false" class="bg-white p-2 shadow-md rounded" :class="{'border border-blue-500': openTab.tab2 }">
       <img src="https://res.cloudinary.com/emil-dev/image/upload/v1711125305/Stripe-logo-1-1280x720_kbvvqu.png" class="w-auto h-12"/>
       <div class="mt-2">
        <h2 class="font-semibold text-md text-gray-800 leading-tight">Stripe</h2>
        <p class="text-gray-500 text-xs">Pay using Credit, Debit Card.</p>
       </div>
     </div>

     <div @click.prevent="openTab.tab1 = false; openTab.tab2 = false; openTab.tab3 = true" class="bg-white p-2 shadow-md rounded" :class="{'border border-blue-500': openTab.tab3 }">
       <img src="https://res.cloudinary.com/emil-dev/image/upload/v1711125305/CoinPayments-Wallet_xh8mxk.png" class="w-auto h-12"/>
       <div class="mt-2">
        <h2 class="font-semibold text-md text-gray-800 leading-tight">CoinPayments</h2>
        <p class="text-gray-500 text-xs">Pay using Bitcoin.</p>
       </div>
     </div>

    </div>  -->

    <h2 class="font-semibold text-md text-gray-800 leading-tight mb-2">Payment Methods:</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2 my-3">

     <x-splade-radio name="provider" value="paypal" class="border border-gray-300 p-1 rounded"> 
     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px" viewBox="0 0 256 302" version="1.1" preserveAspectRatio="xMidYMid">
	     <g>
		    <path d="M217.168476,23.5070146 C203.234077,7.62479651 178.045612,0.815753338 145.823355,0.815753338 L52.3030619,0.815753338 C45.7104431,0.815753338 40.1083819,5.6103852 39.0762042,12.1114399 L0.136468302,259.076601 C-0.637664968,263.946149 3.13311322,268.357876 8.06925331,268.357876 L65.804612,268.357876 L80.3050438,176.385849 L79.8555471,179.265958 C80.8877248,172.764903 86.4481659,167.970272 93.0324607,167.970272 L120.46841,167.970272 C174.366398,167.970272 216.569147,146.078116 228.897012,82.7490197 C229.263268,80.8761167 229.579581,79.0531577 229.854273,77.2718188 C228.297683,76.4477414 228.297683,76.4477414 229.854273,77.2718188 C233.525163,53.8646924 229.829301,37.9325302 217.168476,23.5070146" fill="#27346A"/>
		    <path d="M102.396976,68.8395929 C103.936919,68.1070797 105.651665,67.699203 107.449652,67.699203 L180.767565,67.699203 C189.449511,67.699203 197.548776,68.265236 204.948824,69.4555699 C207.071448,69.7968545 209.127479,70.1880831 211.125242,70.6375799 C213.123006,71.0787526 215.062501,71.5781934 216.943728,72.1275783 C217.884341,72.4022708 218.808307,72.6852872 219.715624,72.9849517 C223.353218,74.2002577 226.741092,75.61534 229.854273,77.2718188 C233.525163,53.8563683 229.829301,37.9325302 217.168476,23.5070146 C203.225753,7.62479651 178.045612,0.815753338 145.823355,0.815753338 L52.2947379,0.815753338 C45.7104431,0.815753338 40.1083819,5.6103852 39.0762042,12.1114399 L0.136468302,259.068277 C-0.637664968,263.946149 3.13311322,268.349552 8.0609293,268.349552 L65.804612,268.349552 L95.8875974,77.5798073 C96.5035744,73.6675208 99.0174265,70.4627756 102.396976,68.8395929 Z" fill="#27346A"/>
		    <path d="M228.897012,82.7490197 C216.569147,146.069792 174.366398,167.970272 120.46841,167.970272 L93.0241367,167.970272 C86.4398419,167.970272 80.8794007,172.764903 79.8555471,179.265958 L61.8174095,293.621258 C61.1431644,297.883153 64.4394738,301.745495 68.7513129,301.745495 L117.421821,301.745495 C123.182038,301.745495 128.084882,297.550192 128.983876,291.864891 L129.458344,289.384335 L138.631407,231.249423 L139.222412,228.036354 C140.121406,222.351053 145.02425,218.15575 150.784467,218.15575 L158.067979,218.15575 C205.215193,218.15575 242.132193,199.002194 252.920115,143.605884 C257.423406,120.456802 255.092683,101.128442 243.181019,87.5519756 C239.568397,83.4399129 235.081754,80.0437153 229.854273,77.2718188 C229.571257,79.0614817 229.263268,80.8761167 228.897012,82.7490197 L228.897012,82.7490197 Z" fill="#2790C3"/>
		    <path d="M216.952052,72.1275783 C215.070825,71.5781934 213.13133,71.0787526 211.133566,70.6375799 C209.135803,70.1964071 207.071448,69.8051785 204.957148,69.4638939 C197.548776,68.265236 189.457835,67.699203 180.767565,67.699203 L107.457976,67.699203 C105.651665,67.699203 103.936919,68.1070797 102.4053,68.8479169 C99.0174265,70.4710996 96.5118984,73.6675208 95.8959214,77.5881313 L80.3133678,176.385849 L79.8638711,179.265958 C80.8877248,172.764903 86.4481659,167.970272 93.0324607,167.970272 L120.476734,167.970272 C174.374722,167.970272 216.577471,146.078116 228.905336,82.7490197 C229.271592,80.8761167 229.579581,79.0614817 229.862597,77.2718188 C226.741092,75.623664 223.361542,74.2002577 219.723948,72.9932757 C218.816631,72.6936112 217.892665,72.4022708 216.952052,72.1275783" fill="#1F264F"/>
	     </g>
      </svg>
       <!-- <img src="https://res.cloudinary.com/emil-dev/image/upload/v1711125521/pngimg.com_-_paypal_PNG7_dgqj4y.png" class="w-auto h-12"/> -->
      <div class="mt-2">
       <h2 class="font-semibold text-md text-gray-800 leading-tight">Paypal</h2>
       <p class="text-gray-500 text-xs">Pay using Paypal account, Credit, Debit Card.</p>
      </div>
     </x-splade-radio>

     <x-splade-radio name="provider" value="stripe" class="border border-gray-300 p-1 rounded"> 
      <img src="https://res.cloudinary.com/emil-dev/image/upload/v1711125305/Stripe-logo-1-1280x720_kbvvqu.png" class="w-auto h-10"/>
      <div class="mt-">
       <h2 class="font-semibold text-md text-gray-800 leading-tight">Stripe</h2>
       <p class="text-gray-500 text-xs">Pay using Credit, Debit Card.</p>
      </div>
     </x-splade-radio>

     <x-splade-radio name="provider" value="coin_payments" class="border border-gray-300 p-1 rounded"> 
      <img src="https://res.cloudinary.com/emil-dev/image/upload/v1711125305/CoinPayments-Wallet_xh8mxk.png" class="w-auto h-10"/>
      <div class="mt-2">
       <h2 class="font-semibold text-md text-gray-800 leading-tight">CoinPayments</h2>
       <p class="text-gray-500 text-xs">Pay using Bitcoin.</p>
      </div>
     </x-splade-radio>

    </div>


     <x-splade-input class="col-span-4 md:col-span-3 mt-2" name="amount" type="number" :label="__('Amount:')"/>
     <p class="col-span-4 text-gray-500 text-xs mb-2">Enter the amount of money you wish to add.<span class="text-red-600 italic underline">Minimum amount that you can add is 2$.</span></p> 
     <div class="flex items-center gap-4 col-span-4 mt-4">
      <x-splade-submit :label="__('Add Funds')" />
     </div>
    </div>   
  </x-splade-form>

</x-app-layout> 