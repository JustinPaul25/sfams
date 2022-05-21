<template>
    <div class="p-8 bg-blue-100 min-h-screen">
        <form class="space-y-8 divide-y divide-gray-200">
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div>
                <div>
                    <h3 class="text-2xl leading-6 font-medium text-gray-900">User Form</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Please make sure to fill the required fields.</p>
                </div>

                <alerts v-if="showError" :errors="errors"/>
                <div class="space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                        <label for="username" class="block text-sm font-medium text-blue-700 sm:mt-px sm:pt-2"> Name </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="relative inline-block text-gray-700 w-full">
                                <input v-model="form.name" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Full Name">
                            </div>
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                        <label for="username" class="block text-sm font-medium text-blue-700 sm:mt-px sm:pt-2"> Email </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="relative inline-block text-gray-700 w-full">
                                <input v-model="form.email" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Email">
                            </div>
                        </div>
                    </div>
                </div>

                <div v-if="type === 'CREATE'" class="text-lg max-w-prose mx-auto mt-4">
                    <h1>
                        <span class="block text-base text-center text-indigo-600 font-semibold tracking-wide uppercase">Password is (sfams2022)</span>
                    </h1>
                    <p class="mt-2 text-xl text-gray-500 leading-8">
                        Password will be default for new users., Advice to update password as soon as possible.
                    </p>
                </div>
            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <a href="/users" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Cancel</a>
                <a @click="submit()" class="cursor-pointer ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    {{ type === 'CREATE' ? 'Save New User' : 'Update User' }}
                </a>
            </div>
        </div>
        </form>
    </div>
</template>

<script>
import Alerts from "../alerts.vue"
import { mapGetters } from "vuex";

export default {
    components: {Alerts},
    props: [
        'type',
        'user'
    ],
    data() {
        return {
            form: {
                name: '',
                email: '',
            },
            showError: false
        }
    },
    computed: {
        ...mapGetters("user", {
            errors: "errors",
        }),
    },
    methods: {
        submit() {
            if(this.type === "CREATE") {
                this.createUser()
            } else {
                this.updateUser()
            }
        },

        async createUser() {
            try {
                await this.$store.dispatch("user/createUser", this.form)
                this.swalAlert()
            } catch (error) {
                this.showError = true
                throw error
            }
        },

        async updateUser() {
            try {
                await this.$store.dispatch("user/updateUser", this.form)
                this.swalAlert()
            } catch (error) {
                this.showError = true
                throw error
            }
        },

        swalAlert() {
            let title = this.type === "CREATE" ? 'New Account Created' : 'Account Updated'
            let text = this.type === "CREATE" ? "Create more?" : "Countinue editing?"
            let btnText = this.type === "CREATE" ? 'Yes, Create More' : 'Yes, Continue'

            this.$swal.fire({
                title: title,
                text: text,
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: btnText
            }).then((result) => {
                if (!result.isConfirmed) {
                    window.location.href = "/users";
                }
            })
        }
    },
    created() {
        if(this.type === "EDIT") {
            this.form = this.user
        }
    }
}
</script>
