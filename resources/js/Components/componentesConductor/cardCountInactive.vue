<script>
export default {
    props: {
        inactiveDrivers: Number,
    },
}
</script>
<template>
    <div class="w-full sm:w-1/3 p-2">
        <div class="bg-red-500 text-white mb-3 h-full max-w-xs rounded-lg overflow-hidden shadow-lg">
          <div class="p-2">Conductores desactivados</div>
          <div class="p-4">
            <h5 class="text-center text-2xl mt-4 font-semibold">{{ inactiveDrivers }}</h5>
          </div>
        </div>
      </div>
</template>