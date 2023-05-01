<template>
    <div class="py-12 bg-gray-400 bg-opacity-80 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0" id="modal">
        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
            <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">                        
                <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Add Task</h1>
                <form @submit.prevent="saveTask">
                    <label class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Title</label>
                    <input 
                        class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" 
                        placeholder="" 
                        v-model="task.title"
                        required
                    />

                    <label for="message" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Description</label>
                    <textarea 
                        rows="8" 
                        class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full pl-3 text-sm border-gray-300 rounded border" 
                        placeholder=""
                        v-model="task.description"
                        required
                        maxlength="254"
                    >
                    </textarea>
                    
                    <label for="expiry" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Due Date</label>                
                    <div class="mb-5 mt-2">                            
                        <input 
                            type="date" 
                            class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10  pl-3 text-sm border-gray-300 rounded border" 
                            v-model="task.due_date"
                            required
                        />
                    </div>
                    
                    <div v-if="isEditTask">
                        
                        <select 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            v-model="task.board_no"
                        >
                            <option selected>Choose a Board</option>
                            <option value="1">To Do</option>
                            <option value="2">In-Progress</option>
                            <option value="3">Done</option>
                        </select>

                        <div class="flex items-start items-center mb-4 mt-4">
                            <input 
                                aria-describedby="checkbox-2" 
                                type="checkbox" 
                                class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-blue-300 h-4 w-4 rounded"
                                v-model="task.status"
                            >
                            <label for="checkbox-2" class="text-sm ml-3 font-medium text-gray-900">Done</label>
                        </div>
                    </div>

                    <!-- <label class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Status</label>
                    <select 
                        class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10  pl-3 text-sm border-gray-300 rounded border"
                        v-model="task.status"
                    >
                        <option value="1">Pending</option>
                        <option value="2">Done</option>
                    </select> -->
                    
                    <div class="flex items-center justify-end w-full mt-4">
                        <button 
                            class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm"
                            type="submit"
                        >
                            <span v-if="isEditTask">Update</span>
                            <span v-else>Save</span>
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
    props: [
        'taskIDToEdit',
        'isEditTask',
        'boardNo',
    ],
    created(){
        if(this.isEditTask){
            this.axios.get('/api/tasks/' + this.taskIDToEdit)
            .then(response => {
                this.task = response.data.data;
            })
        }
    },
    methods:{
        closeTaskForm(){
            this.$emit('close')
        },
        loadTasks(){
            this.$emit('loadTasks')
        },
        saveTask(){
          if(this.isEditTask){
            this.updateTask()
          } else{
            this.storeTask()
          } 
        },
        storeTask(){

            this.task.board_no = this.boardNo

            this.axios
                .post('/api/tasks', this.task)
                .then(response =>{
                    this.loadTasks()
                    this.$emit('close')
                })
                .catch(err=> console.log(err))
        },
        updateTask(){
            this.axios
                .put('/api/tasks/' + this.taskIDToEdit, this.task)
                .then(response =>{
                    this.loadTasks()
                    this.$emit('close')
                    //this.$router.push({name: 'Home'})
                })
                .catch(err=> console.log(err))
        }
    }
}
</script>