<script>
import { reactive } from 'vue';
import { router } from '@inertiajs/vue3';
export default {
    props: {
        errors: Object,
    },
    data() {
        return {
            driverForm: {
                NombreInput: '',
                ApellidoInput: '',
                NumeroLicenciaInput: '',
                FechaInput: ''
            }
        }
    },
    methods: {
        closeModal() {
            this.$emit('closeModal');
        },
        submit(){
          router.post('conductores/saveDriver', this.driverForm)
          router.on('success', () => {
           this.driverForm.NombreInput = '';
           this.driverForm.ApellidoInput = '';
           this.driverForm.NumeroLicenciaInput = '';
           this.driverForm.FechaInput = '';
            this.closeModal();
          })
        }
    }
}
</script>
<template>
    <form method="POST" @submit.prevent="submit"  class="space-y-4">
        <div class="mb-3">
          <label for="NombreInput" class="block text-sm font-medium text-gray-700">Nombre conductor</label>
          <input type="text" id="NombreInput" name="NombreInput" v-model="driverForm.NombreInput" placeholder="Pablo"
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300 {{ errors.NombreInput ? 'border-red-500' : 'border-gray-300' }}">
          <p v-if="errors" class="mt-1 text-sm text-red-500">{{ errors.NombreInput }}</p>
        </div>
        <div class="mb-3">
          <label for="ApellidoInput" class="block text-sm font-medium text-gray-700">Apellido conductor</label>
          <input type="text" id="ApellidoInput" name="ApellidoInput" v-model="driverForm.ApellidoInput" placeholder="Gonzalez" 
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300">
            <p v-if="errors" class="mt-1 text-sm text-red-500">{{errors.ApellidoInput}}</p>
        </div>
        <div class="mb-3">
          <label for="NumeroLicenciaInput" class="block text-sm font-medium text-gray-700">Numero de licencia</label>
          <input type="text" id="NumeroLicenciaInput" name="NumeroLicenciaInput" v-model="driverForm.NumeroLicenciaInput" placeholder="523564" 
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300 {{ errors.NumeroLicenciaInput ? 'border-red-500' : 'border-gray-300' }}">
            <p v-if="errors" class="mt-1 text-sm text-red-500">{{errors.NumeroLicenciaInput}}</p>
        </div>
        <div class="mb-3">
          <label for="FechaInput" class="block text-sm font-medium text-gray-700">Fecha nacimiento</label>
          <input type="date" id="FechaInput" name="FechaInput" v-model="driverForm.FechaInput" 
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300">
            <p v-if="errors" class="mt-1 text-sm text-red-500">{{errors.FechaInput}}</p>
        </div>
        <button type="submit"
          class="w-full px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:ring focus:ring-blue-200 focus:outline-none focus:border-blue-300">
          Guardar
        </button>
        <button type="button" @click="closeModal"
          class="w-full px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-600 focus:ring focus:ring-red-200 focus:outline-none focus:border-red-300">
          Cancelar
        </button>
      </form>
</template>