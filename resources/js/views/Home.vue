<template>
  <div class="flex flex-col justify-center mt-10">
    <div>
      <h1>KANBAN BOARD</h1>
    </div>
    <div class="w-full max-w-screen-2xl">
      <div class="flex items-start gap-8">

        <div class="w-1/2 bg-gray-100">
          <h2 class="text-2xl font-bold mb-4 bg-blue-500 text-white text-center py-2">To Do</h2>
          <div class="bg-red-400 p-4 rounded-lg mx-8 mb-4">
            xxxxxxxxxx
          </div>
          
        </div>      

        <div class="w-1/2 bg-gray-100 p-4">
          <h2 class="text-lg font-bold mb-4">Done</h2>
          <ul class="list-disc pl-6">
            <li class="mb-2">
              <div class="flex items-center">
                <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-500" checked>
                <span class="ml-2 line-through">Task 7</span>
              </div>
            </li>
            <li class="mb-2">
              <div class="flex items-center">
                <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-500" checked>
                <span class="ml-2 line-through">Task 8</span>
              </div>
            </li>
            <li class="mb-2">
              <div class="flex items-center">
                <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-500" checked>
                <span class="ml-2 line-through">Task 9</span>
              </div>
            </li>
          </ul>
        </div>
        <div class="w-1/2 bg-gray-100 p-4">
          <h2 class="text-lg font-bold mb-4">Done</h2>
          <ul class="list-disc pl-6">
            <li class="mb-2">
              <div class="flex items-center">
                <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-500" checked>
                <span class="ml-2 line-through">Task 7</span>
              </div>
            </li>
            <li class="mb-2">
              <div class="flex items-center">
                <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-500" checked>
                <span class="ml-2 line-through">Task 8</span>
              </div>
            </li>
            <li class="mb-2">
              <div class="flex items-center">
                <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-500" checked>
                <span class="ml-2 line-through">Task 9</span>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: 'Home',
  components: {
  }
}
</script>
