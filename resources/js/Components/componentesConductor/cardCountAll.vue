<script>
import formDriver from '@/Components/componentesConductor/formDriver.vue';
export default {
    components: {
        formDriver,
    },
    props: {
        totalDrivers: Number,
        errors: Object
    },
    data() {
        return {
            showModal: false
        }
    },
    methods: {
        openModal() {
            this.showModal = true;
        },
        closeModal() {
            this.showModal = false;
        },
        closeOnEscape(e) {
            if (e.key === 'Escape' && this.showModal) {
                this.showModal = false;
            }
        },
    },
    mounted() {
        document.addEventListener('keydown', this.closeOnEscape);
    }
}
</script>
<template>
    <div class="w-full sm:w-1/3 p-2">
        <div class="bg-blue-500 text-white mb-3 h-full max-w-xs rounded-lg overflow-hidden shadow-lg">
            <div class="p-2">Total conductores</div>
            <div class="p-4">
                <h5 class="text-center text-2xl font-semibold">{{ totalDrivers }}</h5>
            </div>
            <div class="p-2 bg-transparent border-t border-success">
                <button @click="openModal" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                    Abrir Modal
                </button>
            </div>
        </div>
    </div>
    <div>
        <!-- Modal -->
        <transition name="modal" v-if="showModal">
            <div class="fixed inset-0 flex items-center justify-center z-50">
                <div class="modal-overlay absolute inset-0 bg-gray-800 opacity-50"></div>

                <div class="modal-container bg-white w-1/2 mx-auto rounded-lg shadow-lg z-50 overflow-y-auto">
                    <div class="modal-content py-4 text-left px-6">
                        <!-- Contenido del modal aquí -->
                        <h2 class="text-xl font-semibold mb-2">Añadir conductor</h2>
                     <formDriver :errors="errors" @closeModal="closeModal"></formDriver>
                       
                        <!-- Botón para cerrar el modal -->
                      
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer bg-gray-100 py-4 px-6 flex justify-end">
                        <button @click="closeModal" class="mr-2 px-4 py-2 bg-gray-500 text-white rounded-lg">
                            Cerrar
                        </button>
                        <button @click="saveData" class="px-4 py-2 bg-blue-500 text-white rounded-lg">
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>
<style>
.modal-enter-active,
.modal-leave-active {
    transition: opacity 0.5s;
}

.modal-enter,
.modal-leave-to {
    opacity: 0;
}</style>