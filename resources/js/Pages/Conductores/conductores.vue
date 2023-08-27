<script setup>
import tablaConductores from '@/Components/componentesConductor/tablaConductores.vue'
import cardCountAll from '@/Components/componentesConductor/cardCountAll.vue'
import cardCountActive from '@/Components/componentesConductor/cardCountActive.vue'
import cardCountInactive from '@/Components/componentesConductor/cardCountInactive.vue'
</script>
<script>
export default {
  props: {
    driversResponse: Object,
    errors: Object,
  },
  
}
</script>
<template>
  <html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="container mx-auto px-4">
      <div class="flex">
        <div class="text-3xl font-bold">
          <h1>Conductores</h1>
        </div>
      </div>
      <div class="flex">
        <div class="w-1/2">
          <tablaConductores :drivers="driversResponse.drivers" />
        </div>
        <div class="w-1/2">
          <div class="container mx-auto">
            <div class="flex">
              <div class="text-3xl font-bold">
                <h1>Estadisticas</h1>
              </div>
            </div>
            <div class="flex flex-wrap">
              <cardCountAll :totalDrivers="driversResponse.totalDrivers" :errors="errors"/>
              <cardCountActive :activeDrivers="driversResponse.activeDrivers" />
              <cardCountInactive :inactiveDrivers="driversResponse.inactiveDrivers" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>
</template>

  
