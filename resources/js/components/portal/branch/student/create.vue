<template>
    <div class="p-8 bg-blue-100 min-h-screen">
        <form class="space-y-8 divide-y divide-gray-200">
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div>
                <h3 class="text-2xl leading-6 font-medium text-gray-900">Save Student</h3>
            </div>
            <div class="space-y-6 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                    <label for="username" class="block text-sm font-medium text-blue-700 sm:mt-px sm:pt-2"> First Name </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.first_name" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="First Name">
                        </div>
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                    <label for="username" class="block text-sm font-medium text-blue-700 sm:mt-px sm:pt-2"> Middle Name </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.middle_name" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Middle Name">
                        </div>
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                    <label for="username" class="block text-sm font-medium text-blue-700 sm:mt-px sm:pt-2"> Last Name </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.last_name" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Last Name">
                        </div>
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                    <label for="username" class="block text-sm font-medium text-blue-700 sm:mt-px sm:pt-2"> Grade Level </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <select v-model="form.grade_level_id" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                <option v-for="level in levels" :value="level.id">{{ level.level }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <a href="/branch-student" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Cancel</a>
                <button :disabled="isSending" @click="saveStudent()" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Save New Student</button>
            </div>
        </div>
        </form>
    </div>
</template>

<script>
export default {
    props: ['levels'],
    data() {
        return {
            isSending: false,
            form: {
                first_name: '',
                middle_name: '',
                last_name: '',
                grade_level_id: ''
            }
        }
    },
    methods: {
        saveStudent() {
            this.isSending = true
            axios.post('/branch-student', this.form)
            .then(response => {
                this.isSending = false
                window.location.href = '/branch-student'
            })
        }
    }
}
</script>
