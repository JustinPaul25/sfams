<template>
    <div class="pt-8 min-h-screen bg-blue-100">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Branch Fee Utilities</h1>
                </div>
            </div>
        </div>
        <div class="p-8 bg-blue-100 min-h-screen">
            <form @submit.prevent="updateUtility" class="space-y-8 divide-y divide-gray-200">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div>
                        <div>
                            <h3 class="text-xl leading-6 font-medium text-gray-900">Fee for Branch</h3>
                        </div>

                        <div class="space-y-6 sm:space-y-5">
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                <label for="username" class="block text-sm font-medium text-blue-700 sm:mt-px sm:pt-2"> Royalty </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div class="relative inline-block text-gray-700 w-full">
                                        <input v-model="form.royalty" type="number" min="0" step="1" value="2016" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
                                    </div>
                                </div>
                            </div>
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                <label for="username" class="block text-sm font-medium text-blue-700 sm:mt-px sm:pt-2"> Renewal/Registration </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div class="relative inline-block text-gray-700 w-full">
                                        <input v-model="form.renewal" type="number" min="0" step="1" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
                                    </div>
                                </div>
                            </div>
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                <label for="username" class="block text-sm font-medium text-blue-700 sm:mt-px sm:pt-2"> Fee per Student </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div class="relative inline-block text-gray-700 w-full">
                                        <input v-model="form.per_student" type="number" min="0" step="1" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-5">
                    <div class="flex justify-end">
                        <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Update Fees</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    id: '',
                    royalty: '',
                    renewal: '',
                    per_student: '',
                }
            }
        },
        methods: {
            async getUtility() {
                await axios.get('/branch-utlity/1')
                .then(response => {
                    const formData = response.data
                    this.form = {
                        id: formData.id,
                        royalty: formData.royalty,
                        renewal: formData.renewal,
                        per_student: formData.per_student,
                    }
                })
            },
            async updateUtility() {
                await axios.put('/branch-utility/1', this.form)
                .then(response => {
                    this.$swal.fire({
                        icon: 'Success',
                        title: 'Fee Updated'
                    })
                    this.getUtility();
                })
            }
        },
        created() {
            this.getUtility()
        }
    }
</script>