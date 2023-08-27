<script>
export default {
    props: {
        activeDrivers: Number,
    },
}
</script>
<template>
    <div class="w-full sm:w-1/3 p-2">
        <div class="bg-green-500 text-white mb-3 h-full max-w-xs rounded-lg overflow-hidden shadow-lg">
          <div class="p-2">Conductores <br> activos</div>
          <div class="p-4">
            <h5 class="text-center text-2xl mt-4 font-semibold">{{ activeDrivers }}</h5>
          </div>
        </div>
      </div>
</template>