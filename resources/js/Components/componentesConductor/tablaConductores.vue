<script>
import Swal from 'sweetalert2';
import { router } from '@inertiajs/vue3';
export default {
    props: {
        drivers: Object
    },
    methods:{
        changeStatus(event){
          if(event.target.checked){
            Swal.fire({
            title: '¿Estás seguro que deseas activar al conductor?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded',
            cancelButtonColor: 'bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded',
            confirmButtonText: 'Activar',
            cancelButtonText: 'Cancelar',
          }).then((result) => {
            if (result.isConfirmed) {
              router.put('conductores/activar/'+event.target.dataset.id)
            }else if(result.dismiss === Swal.DismissReason.cancel){
              event.target.checked = false;
            }
          });
          }else{
            Swal.fire({
            title: '¿Estás seguro que deseas desactivar al conductor?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded',
            cancelButtonColor: 'bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded',
            confirmButtonText: 'Desactivar',
            cancelButtonText: 'Cancelar',
          }).then((result) => {
            if (result.isConfirmed) {
              router.delete('conductores/desactivar/'+event.target.dataset.id)
            }else if(result.dismiss === Swal.DismissReason.cancel){
              event.target.checked = true;
            }
          });
          }
          
        }

    }
}

</script>
<template><table class="w-full table-auto border-collapse rounded-lg overflow-hidden text-lg">
    <thead>
      <tr class="bg-gray-400">
        <th class="border p-3">Nombre</th>
        <th class="border p-3">Apellido</th>
        <th class="border p-3">Numero licencia</th>
        <th class="border p-3">Estado</th>
      </tr>
    </thead>
    <tbody>
      <tr v-if="!drivers" >
        <td colspan="4" class="text-center">No hay conductores registrados</td>
      </tr>
      <tr v-for="driver in drivers" :key="driver.id" class="bg-white even:bg-gray-100">
        <td>{{ driver.nombre }}</td>
        <td>{{ driver.apellido }}</td>
        <td>{{ driver.numeroLicencia }}</td>
        <td class="text-center"><input type="checkbox" id="estado" name="estado" :data-id="driver.id" :checked="driver.estado" @change="changeStatus"></td>
      </tr>
    </tbody>
  </table>
</template>
