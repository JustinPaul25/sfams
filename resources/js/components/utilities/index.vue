<template>
    <div class="pt-8 min-h-screen bg-blue-100">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Price and School Year Utilities</h1>
                    <p class="mt-2 text-sm text-gray-700">A table of fee record and school year adjustments.</p>
                </div>
            </div>
            <div class="grid grid-cols-8 gap-8 mt-8">
                <div class="col-span-8 sm:col-span-4 lg:col-span-2">
                    <div class="relative inline-block text-gray-700 w-full">
                        <select v-model="selectedUtility" class="w-full h-10 pl-9 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Regular input">
                            <option disabled value="">Select Department</option>
                            <option v-for="utility in utilities" :value="utility.id">{{ utility.type }}</option>
                        </select>
                        <div
                            class="absolute inset-y-0 left-0 flex items-center px-2 pointer-events-none"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-blue-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <div
                            class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none"
                        >
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                            <path
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                                fill-rule="evenodd"
                            ></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div v-for="utility in utilities">
                <div class="p-8 bg-blue-100 min-h-screen" v-if="utility.id === selectedUtility">
                    <form @submit.prevent="updateUtility" class="space-y-8 divide-y divide-gray-200">
                        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                            <div>
                                <div>
                                    <h3 class="text-xl leading-6 font-medium text-gray-900">Fee for {{ utility.type }} department.</h3>
                                </div>

                                <div class="space-y-6 sm:space-y-5">
                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                        <label for="username" class="block text-sm font-medium text-blue-700 sm:mt-px sm:pt-2"> Entrance Fee </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="relative inline-block text-gray-700 w-full">
                                                <input v-model="form.entrance" type="number" min="0" step="1" value="2016" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                        <label for="username" class="block text-sm font-medium text-blue-700 sm:mt-px sm:pt-2"> Miscellaneous Fee </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="relative inline-block text-gray-700 w-full">
                                                <input v-model="form.misc" type="number" min="0" step="1" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                        <label for="username" class="block text-sm font-medium text-blue-700 sm:mt-px sm:pt-2"> Tuition Fee(whole year) </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="relative inline-block text-gray-700 w-full">
                                                <input v-model="form.tuition" type="number" min="0" step="1" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                        <label for="username" class="block text-sm font-medium text-blue-700 sm:mt-px sm:pt-2"> Books </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="relative inline-block text-gray-700 w-full">
                                                <input v-model="form.books" type="number" min="0" step="1" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                        <label for="username" class="block text-sm font-medium text-blue-700 sm:mt-px sm:pt-2"> Handbook </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="relative inline-block text-gray-700 w-full">
                                                <input v-model="form.handbook" type="number" min="0" step="1" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                        <label for="username" class="block text-sm font-medium text-blue-700 sm:mt-px sm:pt-2"> ID </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="relative inline-block text-gray-700 w-full">
                                                <input v-model="form.id_fee" type="number" min="0" step="1" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                        <label for="username" class="block text-sm font-medium text-blue-700 sm:mt-px sm:pt-2"> Closing </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="relative inline-block text-gray-700 w-full">
                                                <input v-model="form.closing" type="number" min="0" step="1" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                        <label for="username" class="block text-sm font-medium text-blue-700 sm:mt-px sm:pt-2"> Graduation </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="relative inline-block text-gray-700 w-full">
                                                <input v-model="form.graduation" type="number" min="0" step="1" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
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
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
    data() {
        return {
            selectedUtility: '',
            form: {
                id: 0,
                entrance: 0,
                misc: 0,
                tuition: 0,
                books: 0,
                handbook: 0,
                id_fee: 0,
                closing: 0,
                graduation: 0
            }
        }
    },
    computed: {
        ...mapGetters({
            utilities: 'utility/utilities',
        }),
    },
    watch: {
        selectedUtility(newSearch, oldSearch) {
            const result = this.utilities.find(({ id }) => id === newSearch);
            const newForm = {
                id: result.id,
                entrance: result.entrance,
                misc: result.misc,
                tuition: result.tuition,
                books: result.books,
                handbook: result.handbook,
                id_fee: result.id_fee,
                closing: result.closing,
                graduation: result.graduation
            }
            this.form = newForm
        }
    },
    methods: {
        async updateUtility() {
            try {
                await this.$store.dispatch("utility/updateUtility", this.form)
                this.swalAlert()
            } catch (error) {
                this.getList();
                this.$swal.fire({
                    icon: 'Success',
                    title: 'Fee Updated'
                })
            }
        },
        async getList() {
            await this.$store.dispatch("utility/getUtilities");
        }
    },
    mounted() {
        this.getList();
    }
}
</script>