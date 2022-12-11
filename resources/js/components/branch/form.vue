<template>
    <div class="pt-8 min-h-screen bg-blue-100">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-2xl font-bold text-gray-900">Create Branch</h1>
                </div>
            </div>
        </div>
        <div class="p-8 bg-blue-100 min-h-screen">
            <form @submit.prevent="createBranch" class="space-y-8 divide-y divide-gray-200">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div>
                        <div class="space-y-6 sm:space-y-5">
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                <label for="username" class="block text-sm font-medium text-blue-700 sm:mt-px sm:pt-2"> School Name </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div class="relative inline-block text-gray-700 w-full">
                                        <input v-model="form.name" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
                                    </div>
                                </div>
                            </div>
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                <label for="username" class="block text-sm font-medium text-blue-700 sm:mt-px sm:pt-2"> School Address </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div class="relative inline-block text-gray-700 w-full">
                                        <textarea v-model="form.address" rows="3" type="text" class="w-full pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                <label for="username" class="block text-sm font-medium text-blue-700 sm:mt-px sm:pt-2"> E-Mail </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div class="relative inline-block text-gray-700 w-full">
                                        <input v-model="form.email" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
                                        <span class="italic text-xs flex items-center mt-2">
                                            <svg viewBox="0 0 24 24" width="15" height="15" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1 mr-1"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                            For Portal Credentials</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-5">
                    <div class="flex justify-end">
                        <a href="/branches" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Back to list</a>
                        <button v-if="!isSending" type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Create Branch</button>
                        <button v-else disabled class="ml-3 cursor-not-allowed flex justify-center items-center rounded-lg px-4 py-2 text-white text-sm bg-blue-700 opacity-75">Saving...</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default{
        data() {
            return {
                isSending: false,
                form: {
                    email: '',
                    name: '',
                    address: '',
                    students: 0,
                }
            }
        },
        methods: {
            async createBranch() {
                this.isSending = true
                await axios.post('/branch', this.form)
                .then(response => {
                    this.isSending = false
                    window.location.href = '/branches';
                })
            }
        }
    }
</script>