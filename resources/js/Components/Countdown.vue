<template>
 <div class="bg-gray-400 p-4">{{ formattedCountdown }}</div>
</template>
  
<script>
export default {
 props: {
  time:{
   required: true,
  }
 },
 data(){
  return {
    coountdown: 30 * 60,
    time_res: '',
   }
 },
 computed: {
  formattedCountdown() {
    const minutes = Math.floor(this.coountdown / 60);
    const seconds = this.coountdown % 60;
    return `${minutes} minutes ${seconds} seconds`;
   },
   restriction() {
    const minutes = Math.floor(this.time_res / 60);
    const seconds = this.time_res % 60;
    return `${minutes} minutes ${seconds} seconds`;
   }
 },
 methods:{
   countDownTimer() {
    if (this.coountdown > 0) {
     setTimeout(() => {
      this.coountdown -= 1
      this.countDownTimer()
     }, 1000)
    } 
   },
 }
}
  </script>