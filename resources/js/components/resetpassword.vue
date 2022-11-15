<template>
    <div class="pt-8 min-h-screen bg-blue-100">
        <div class="max-w-2xl mx-auto mt-20 p-20 border rounded-md bg-white">
            <div class="sm:flex-auto">
                <h1 class="text-2xl font-semibold text-gray-900 mb-4">Reset/Update Password</h1>
            </div>
            <form @submit.prevent="updatePassword()">
                <label for="input-group-1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
                <div class="relative mb-6">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500 dark:text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                    </div>
                    <input v-model="form.password" type="password" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <label for="input-group-1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Retype Password</label>
                <div class="relative mb-6">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500 dark:text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                    </div>
                    <input v-model="form.retype_password" type="password" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="px-4 py-3 text-right sm:px-6">
                    <button v-if="!updating" type="submit" class="cursor-pointer ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Update</button>
                    <button v-else disabled class="cursor-not-allowed ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Saving...</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                updating: false,
                form: {
                    password: '',
                    retype_password: ''
                }
            }
        },
        methods: {
            async updatePassword() {
                this.updating = true
                if(this.form.password === this.form.retype_password) {
                    await axios.post('/password-reset', this.form)
                    .then(response => {
                        this.$swal.fire({
                            icon: 'Success',
                            title: 'Password Updated!',
                            text: '',
                        })
                        this.updating = false
                        this.form = {
                            password: '',
                            retype_password: ''
                        }
                    })
                } else {
                    this.$swal.fire({
                        icon: 'Error',
                        title: 'Password Not Match!',
                        text: '',
                    })
                    this.updating = false
                    this.form = {
                        password: '',
                        retype_password: ''
                    }
                }
            }
        }
    }
</script>