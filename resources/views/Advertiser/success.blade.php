<x-guest-layout>

 <div class="bg-gray-100 h-screen pt-40">
 <div class="bg-clip-border p-4 bg-white max-w-4xl md:mx-auto mx-2 border border-blue-gray-100 shadow-md rounded-xl">
   <x-ri-checkbox-circle-fill class="w-14 h-14 text-green-600 mx-auto"/>
   <h3 class="text-xl text-gray-800 font-semibold text-center mt-3">Payment Successfull!</h3>   
   <p class="text-gray-500 text-sm text-center mt-1">Your deposit of ${{ $amount }} via {{ $provider }} was successfully processed.</p>

   <div class="">
    <Link href="{{ route('funds') }}" class="mx-auto select-none rounded-md bg-gradient-to-tr from-gray-900 to-gray-800 py-2 px-3 text-center align-middle font-sans text-xs font-bold text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 bg-indigo-500 hover:bg-indigo-700 text-white border-transparent focus:border-indigo-300 focus:ring-indigo-200">Return Home</Link>
   </div>
 </div>
 </div>


  <div class="bg-gray-100 h-screen pt-36">
      <div class="bg-white p-6 max-w-5xl mx-auto">
        <svg viewBox="0 0 24 24" class="text-green-600 w-16 h-16 mx-auto my-6">
            <path fill="currentColor"
                d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
            </path>
        </svg>
        <div class="text-center">
            <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">Payment Done!</h3>
            <p class="text-gray-600 my-2">Thank you for completing your secure online payment.</p>
            <p> Have a great day!  </p>
            <div class="py-10 text-center">
                <a href="#" class="px-12 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold py-3">
                    GO BACK 
               </a>
            </div>
        </div>
    </div>
  </div>

</x-guest-layout>

