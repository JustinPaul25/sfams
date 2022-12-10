<template>
    <div class="pt-8 min-h-screen bg-blue-100">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">School Year</h1>
                </div>
            </div>
        </div>
        <div class="p-8 bg-blue-100 min-h-screen">
            <div class="flex w-full">
                <button @click="newSchoolYear()" class="bg-blue-500 py-2 px-4 text-white rounded font-bold hover:opacity-75 ml-auto">New School Year</button>
            </div>
            <div class="mt-4">
                <table class="table-auto w-full">
                    <thead class="bg-gray-200 rounded-t">
                        <tr>
                        <th class="text-left p-4">Year</th>
                        <th class="text-left p-4">Date Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="sy in schoolYears" class="bg-white text-gray-800">
                            <td class="p-2">{{ sy.from }} - {{ sy.to }}</td>
                            <td class="p-2">{{ sy.created_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            schoolYears: null
        }
    },
    methods: {
        newSchoolYear() {
            this.$swal.fire({
                title: 'Input password for security',
                text: 'This action will update student and branch status and payments',
                input: 'password',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Process New Year',
                showLoaderOnConfirm: true,
                preConfirm: (password) => {
                    this.$isLoading(true)
                    axios.post('/new-school-year', {password: password})
                    .then(response => {
                        this.getSchoolYear()
                        if(response.data == 'Not Matched!') {
                            this.$swal.fire({
                                icon: 'Error',
                                title: 'Incorrect Password'
                            })
                        }
                        this.$isLoading(false)
                    })
                    .catch(error => {
                        this.$swal.showValidationMessage(
                        `Request failed: ${error}`
                        )
                    })
                },
                allowOutsideClick: () => !this.$swal.isLoading()
                }).then((result) => {
                if (result.isConfirmed) {
                    console.log(result)
                }
            })
        },

        getSchoolYear() {
            axios.get('/school-years')
            .then(response => {
                this.schoolYears = response.data
            })
        }
    },
    created() {
        this.getSchoolYear()
    }
}
</script>