<template>
    <div class="bg-blue-100 min-h-screen">
        <section class="py-1 bg-blueGray-50 flex">
            <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4 mt-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                <h3 class="font-semibold text-base text-blueGray-700">Subjects</h3>
                            </div>
                        </div>
                    </div>

                    <div class="block w-full overflow-x-auto">
                        <table class="items-center bg-transparent w-full border-collapse ">
                            <thead>
                                <tr>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Subject
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">

                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr v-for="subject in subjects">
                                    <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                        {{ subject.name }}
                                    </th>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <button @click="editSubject(subject)" class="text-gray-900 hover:text-blue-700 font-semibold">Update</button>
                                        <button @click="deleteSubject(subject)" class="text-red-500 hover:opacity-75 font-semibold ml-2">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="w-full xl:w-4/12 mb-12 xl:mb-0 px-4 mt-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
                    <div class="w-full max-w-xs">
                        <form class="bg-white w-full rounded px-8 pt-6 pb-4 mb-4">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                    Subject Title
                                </label>
                                <input v-model="form.name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Subject Title">
                            </div>
                            <div class="w-full flex">
                                <button v-if="!isEdit" @click="storeSubject()" :disabled="isSending || form.name === ''" :class="isSending || form.name === '' ? 'cursor-not-allowed' : ''" class="bg-blue-700 text-white hover:opacity-75 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mb-1 ease-linear transition-all duration-150 ml-auto" type="button">Add Subject</button>
                                <button v-else @click="updateSubject()" :disabled="isSending || form.name === ''" :class="isSending || form.name === '' ? 'cursor-not-allowed' : ''" class="bg-blue-700 text-white hover:opacity-75 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mb-1 ease-linear transition-all duration-150 ml-auto" type="button">Update Subject</button>
                                <button v-if="isEdit" @click="cancelEdit()" :disabled="isSending" :class="isSending ? 'cursor-not-allowed' : ''" class="bg-red-500 text-white hover:opacity-75 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mb-1 ease-linear transition-all duration-150 ml-2" type="button">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                subjects: null,
                form: {
                    id: '',
                    name: ''
                },
                isSending: false,
                isEdit: false
            }
        },
        methods: {
            getSubjects() {
                axios.get('/subjects')
                .then(response => {
                    this.subjects = response.data
                })
            },
            cancelEdit() {
                this.isEdit = false
                this.form.name = ''
            },
            editSubject(subject) {
                this.isEdit = true
                this.form.name = subject.name
                this.form.id = subject.id
            },
            deleteSubject(subject) {
                this.$swal.fire({
                    title: `Are you sure to delete ${subject.name}?`,
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.get(`/subjects/${subject.id}/delete`)
                        .then(response => {
                            this.getSubjects()
                            this.$swal.fire({
                                icon: 'Success',
                                title: `Subject Deleted!`
                            })
                            this.form.name = ''
                            this.isSending = false
                        })
                    }
                })
            },
            updateSubject() {
                this.isSending = true
                if(this.form.name === '') {
                    this.$swal.fire({
                        icon: 'Success',
                        title: `Cant update empty title`
                    })
                    this.isSending = false
                } else {
                    axios.put(`/subjects/${this.form.id}/update`, this.form)
                    .then(response => {
                        console.log(response)
                        this.getSubjects()
                        this.$swal.fire({
                            icon: 'Success',
                            title: `Subject Updated!`
                        })
                        this.form.name = ''
                        this.isSending = false
                    })
                    .catch(response => {
                        this.$swal.fire({
                            icon: 'Error',
                            title: `Can't save duplicate subject!`
                        })
                        this.isSending = false
                    })
                }
            },
            storeSubject() {
                this.isSending = true
                if(this.form.name === '') {
                    this.$swal.fire({
                        icon: 'Success',
                        title: `Cant save empty title`
                    })
                    this.isSending = false
                } else {
                    axios.post('/subjects', this.form)
                    .then(response => {
                        console.log(response)
                        this.getSubjects()
                        this.$swal.fire({
                            icon: 'Success',
                            title: `Subject Saved!`
                        })
                        this.form.name = ''
                        this.isSending = false
                    })
                    .catch(response => {
                        this.$swal.fire({
                            icon: 'Error',
                            title: `Can't save duplicate subject!`
                        })
                        this.isSending = false
                    })
                }
            }
        },
        created() {
            this.getSubjects()
        }
    }
</script>
