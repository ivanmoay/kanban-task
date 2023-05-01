<template>
    <div class="py-12 bg-gray-400 bg-opacity-80 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0" id="modal">
        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
            <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">                        
                <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Are you sure you want to delete Task?</h1>                    
                    
                    <div class="flex items-center justify-end w-full mt-4">
                        <button 
                            class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm"
                            @click="confirmDelete"
                        >
                            Yes
                        </button>
                        <button class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm" @click="closeConfirmDelete">Cancel</button>
                    </div>

            </div>
        </div>
    </div>
</template>

<script>
export default{
    data(){
        return {
            //task: {}
        }
    },
    methods:{
        closeConfirmDelete(){
            this.$emit('close')
        },
        confirmDelete(){
            this.$emit('close')
        }
    }
}
</script>