<template>
    <div class="py-12 bg-gray-400 bg-opacity-80 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0" id="modal">
        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
            <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">                        
                <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Add Task</h1>
                <form @submit.prevent="storeTask">
                    <label class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Title</label>
                    <input 
                        class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" 
                        placeholder="" 
                        v-model="task.title"
                    />

                    <label for="message" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Description</label>
                    <textarea 
                        rows="8" 
                        class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full pl-3 text-sm border-gray-300 rounded border" 
                        placeholder=""
                        v-model="task.description"
                    >
                    </textarea>
                    
                    <label for="expiry" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Due Date</label>                
                    <div class="mb-5 mt-2">                            
                        <input 
                            type="date" 
                            class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10  pl-3 text-sm border-gray-300 rounded border" 
                            v-model="task.due_date"
                        />
                    </div>
                    

                    <!-- <label class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Status</label>
                    <select 
                        class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10  pl-3 text-sm border-gray-300 rounded border"
                        v-model="task.status"
                    >
                        <option value="1">Pending</option>
                        <option value="2">Done</option>
                    </select> -->
                    
                    <div class="flex items-center justify-start w-full mt-4">
                        <button 
                            class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm"
                            type="submit"
                        >
                            Save
                        </button>
                        <button class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm" @click="closeTaskForm">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default{
    data(){
        return {
            task: {}
        }
    },
    methods:{
        closeTaskForm(){
            this.$emit('close')
        },
        storeTask(){
            console.log('store')
            this.axios
            .post('/api/tasks', this.task)
            .then(response => {
                console.log('data saved')
            })
            // this.axios
            //         .post('http://localhost:8000/api/post/add', this.post)
            //         .then(response => (
            //             this.$router.push({name: 'home'})
            //             // console.log(response.data)
            //         ))
            //         .catch(error => console.log(error))
            //         .finally(() => this.loading = false)
        }
    }
}
</script>