<template>

<transition name="fade">

<div
  class="fixed inset-0 w-full p-2 h-screen flex items-center justify-center bg-smoke-50"
  @click.self="close"
>
 
 <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/3 bg-white shadow-lg rounded-lg p-0">
 
     <div class="relative text-center text-gray-700 bg-gray-300 p-2 rounded">

     	<slot name="header"></slot>

 		<button
        aria-label="close"
        class="absolute block top-0 right-0 text-xl text-gray-500 my-1 mx-2" 
        @click.prevent="close">
        ×
     </button>    

  	</div>

	<slot name="default"/></slot>
    

 

  
  </div>
</div>

</transition>

</template>

<script>

export default {
  
  props: {
  },

  watch: {
    showing(value) {
      if (value) {
        return document.querySelector('body').classList.add('overflow-hidden');
      }

      document.querySelector('body').classList.remove('overflow-hidden');
    }
  },
  
  methods: {
  	close() {
  		this.$emit('close');
  	}
  }
};

</script>

<style scoped>

.fade-enter-active, .fade-leave-active {
  transition: all .5s ease;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>