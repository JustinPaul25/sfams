<template>
    <div class="pt-8 min-h-screen bg-blue-100">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Branches</h1>
                    <p class="mt-2 text-sm text-gray-700">A table of recorded branches.</p>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <a href="/branches/form" class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:w-auto">Add new branch</a>
                </div>
            </div>
            <!-- <div class="grid grid-cols-8 gap-8 mt-8">
                <div class="col-span-8 sm:col-span-4 lg:col-span-2">
                    <div class="relative inline-block text-gray-700 w-full">
                        <input v-model="search" type="text" class="w-full h-10 pl-9 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Search Student">
                        <div class="absolute inset-y-0 left-0 flex items-center px-2 pointer-events-none">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2 text-blue-500"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="mt-2 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Branch ID</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Name</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Students</th>
                                        <th scope="col" class="relative whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Actions</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="branch in branches">
                                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-blue-700 sm:pl-6">{{ branch.id }}</td>
                                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900 hover:text-blue-700"><a :href="`/branch/${branch.id}`">{{ branch.name }}</a></td>
                                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-blue-700 sm:pl-6">{{ branch.student_count }}</td>
                                        <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            <a :href="`/branch/${branch.id}/pay`" class="text-blue-500 hover:opacity-75 mr-3">Pay<span class="sr-only">, AAPS0L</span></a>
                                            <a :href="`/branch/${branch.id}`" class="text-blue-500 hover:opacity-75">View<span class="sr-only">, AAPS0L</span></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                branches: []
            }
        },
        methods: {
            async getBranches() {
                await axios.get('/branch-list')
                .then(response => {
                    this.branches = response.data
                })
            }
        },
        created() {
            this.getBranches()
        }
    }
</script>