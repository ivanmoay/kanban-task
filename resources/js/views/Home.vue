<template>
  <div class="flex justify-center mt-10">

    <!-- <div v-if="showTaskForm">
      <TaskForm />
    </div>   -->

    <TaskForm v-if="showTaskForm" @close="toggleTaskForm" @loadTasks="loadTasks" :taskIDToEdit="taskIDToEdit"
      :isEditTask="isEditTask" :boardNo="boardNo" />

    <div class="w-full max-w-screen-2xl">
      <header class="py-4 px-8">
        <h1 class="text-3xl text-gray-800 text-center">Kanban Board</h1>
      </header>

      <div class="flex items-start gap-8">

        

        <div class="w-1/2 bg-gray-100">
          <div class="flex items-center bg-blue-500 mb-4 py-2 group">
            <h2 class="text-2xl text-white text-center flex-1">To Do</h2>
            <a class="hover:cursor-pointer invisible group-hover:visible" @click="toggleTaskForm(1)">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="w-6 h-6 stroke-white fill-white flex-none mr-2">
                <path fill-rule="evenodd"
                  d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z"
                  clip-rule="evenodd" />
              </svg>
            </a>
          </div>
          <div v-for="task in tasks">
            <Task v-if="task.board_no == 1" :id="task.id" :title="task.title" :description="task.description" :due_date="task.due_date"
              @editTask="editTask" :status="task.status" :boardNo="task.board_no"/>
          </div>
        </div>

        <div class="w-1/2 bg-gray-100">
          <div class="flex items-center bg-yellow-500 mb-4 py-2 group">
            <h2 class="text-2xl text-white text-center flex-1">In-Progress</h2>
            <a class="hover:cursor-pointer invisible group-hover:visible" @click="toggleTaskForm(2)">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="w-6 h-6 stroke-white fill-white flex-none mr-2">
                <path fill-rule="evenodd"
                  d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z"
                  clip-rule="evenodd" />
              </svg>
            </a>
          </div>
          <div v-for="task in tasks">
            <Task v-if="task.board_no == 2" :id="task.id" :title="task.title" :description="task.description" :due_date="task.due_date"
              @editTask="editTask" :status="task.status" :boardNo="task.board_no"/>
          </div>
        </div>

        <div class="w-1/2 bg-gray-100">
          <div class="flex items-center bg-green-500 mb-4 py-2 group">
            <h2 class="text-2xl text-white text-center flex-1">Done</h2>
            <a class="hover:cursor-pointer invisible group-hover:visible" @click="toggleTaskForm(3)">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="w-6 h-6 stroke-white fill-white flex-none mr-2">
                <path fill-rule="evenodd"
                  d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z"
                  clip-rule="evenodd" />
              </svg>
            </a>
          </div>
          <div v-for="task in tasks">
            <Task v-if="task.board_no == 3" :id="task.id" :title="task.title" :description="task.description" :due_date="task.due_date"
              @editTask="editTask" :status="task.status" :boardNo="task.board_no"/>
          </div>
        </div>
        
      </div>

    </div>
  </div>
</template>

<script>
import TaskForm from '../components/TaskForm.vue'
import Task from '../components/Task.vue'
import draggable from 'vuedraggable'

export default {
  name: 'Home',
  components: {
    TaskForm,
    Task,
    draggable
  },
  data() {
    return {
      showTaskForm: false,
      tasks: [],
      taskIDToEdit: 0,
      isEditTask: false,
      boardNo: 0
    }
  },
  created() {
    this.axios
      .get('/api/tasks').then(response => {
        this.tasks = response.data;
      });
  },
  methods: {
    toggleTaskForm(board_no) {
      this.boardNo = board_no
      this.taskIDToEdit = 0
      this.isEditTask = false
      this.showTaskForm = !this.showTaskForm;
    },
    loadTasks() {
      this.axios
        .get('/api/tasks').then(response => {
          this.tasks = response.data;
        });
    },
    editTask(id) {
      //console.log(id)
      this.boardNo = 0;
      this.taskIDToEdit = id
      this.isEditTask = true
      this.showTaskForm = true;
    },
    onChange(e){
      console.log(e)
    }
  }
}
</script>
