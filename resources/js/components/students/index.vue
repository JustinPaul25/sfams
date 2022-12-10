<template>
    <div class="pt-8 min-h-screen bg-blue-100">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Students</h1>
                    <p class="mt-2 text-sm text-gray-700">A table of recorded students.</p>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <a href="/students/form" class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:w-auto">Record Student</a>
                </div>
            </div>
            <div class="grid grid-cols-8 gap-8 mt-8">
                <div class="col-span-8 sm:col-span-4 lg:col-span-2">
                    <div class="relative inline-block text-gray-700 w-full">
                        <input v-model="search" type="text" class="w-full h-10 pl-9 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Search Student">
                        <div class="absolute inset-y-0 left-0 flex items-center px-2 pointer-events-none">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2 text-blue-500"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                    </div>
                </div>
                <div class="col-span-8 sm:col-span-4 lg:col-span-2">
                    <div class="relative inline-block text-gray-700 w-full">
                        <select v-model="level" class="w-full h-10 pl-9 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Regular input">
                            <option value="" selected>All Grades</option>
                            <option v-for="level in levels" :value="level.id">{{ level.level }}</option>
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
                <div class="col-span-8 sm:col-span-4 lg:col-span-2">
                    <div class="relative inline-block text-gray-700 w-full">
                        <select v-model="sort_by" class="w-full h-10 pl-9 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Regular input">
                            <option value="asc" selected>Sort By: A-Z</option>
                            <option value="desc" >Sort By: Z-A</option>
                        </select>
                        <div
                            class="absolute inset-y-0 left-0 flex items-center px-2 pointer-events-none"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-blue-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" />
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
                <div class="col-span-8 sm:col-span-4 lg:col-span-2">
                    <div class="relative inline-block text-gray-700 w-full">
                        <select v-model="status" class="w-full h-10 pl-9 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Regular input">
                            <option value="">Status: Enrolled & Non-Enrolled</option>
                            <option value="ENROLLED" selected>Status: Enrolled</option>
                            <option value="REENROLL" >Status: Non-Enrolled</option>
                        </select>
                        <div
                            class="absolute inset-y-0 left-0 flex items-center px-2 pointer-events-none"
                        >
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="text-blue-500 h-6 w-6"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
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
            <div class="mt-2 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">LRN Number</th>
                                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Student Name</th>
                                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Grade - Section</th>
                                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                                <th scope="col" class="relative whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-6">
                                <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="student in students">
                                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-blue-700 sm:pl-6">{{ student.enrollment_id }}</td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900 hover:text-blue-700"><a :href="`/student/${student.id}`">{{ student.last_name }}, {{ student.first_name }}</a></td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{ student.grade_level.level }} - {{ student.section.section }}</td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                                    <span v-if="student.status == 'ENROLLED'" class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-blue-600 bg-blue-200 uppercase last:mr-0 mr-1">
                                        Enrolled
                                    </span>
                                    <span v-if="student.status == 'REENROLL'" class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-yellow-600 bg-yellow-200 uppercase last:mr-0 mr-1">
                                        Non-Enrolled / Old Student
                                    </span>
                                </td>
                                <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <button v-if="checkRequirements(student.student_requirement) > 0" @click="openRequirementsModal(student.student_requirement)" class="text-green-500 hover:opacity-75 mr-3 font-semibold">Submit Requirement<span class="sr-only">, AAPS0L</span></button>
                                    <a v-if="student.status == 'REENROLL'" :href="`/reenroll/${student.id}`" class="text-yellow-500 hover:opacity-75 mr-3">Enroll<span class="sr-only">, AAPS0L</span></a>
                                    <button @click="openGradesModal(student)" class="text-blue-700 hover:opacity-75 mr-3 font-semibold">Grades<span class="sr-only">, AAPS0L</span></button>
                                    <a :href="`/student/${student.id}/pay-tuition`" class="text-orange-500 hover:opacity-75 mr-3">Pay Tuition<span class="sr-only">, AAPS0L</span></a>
                                </td>
                            </tr>

                            <!-- More transactions... -->
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <sweet-modal ref="requirementsModal">
            <div>
                <p class="font-bold text-lg">Requirements Left</p>
                <div v-if="requirements">
                    <div v-if="requirements.coc === 0">
                        <label class="inline-flex items-center mt-3">
                            <input v-model="form.coc" type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" checked><span class="ml-2 text-gray-700">Certificate of Completion</span>
                        </label>
                    </div>
                    <div v-if="requirements.birth_cert === 0">
                        <label class="inline-flex items-center mt-3">
                            <input v-model="form.birth_cert" type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" checked><span class="ml-2 text-gray-700">PSA Birth Certificate (Original)</span>
                        </label>
                    </div>
                    <div v-if="requirements.ECCD_checklist === 0">
                        <label class="inline-flex items-center mt-3">
                            <input v-model="form.ECCD_checklist" type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" checked><span class="ml-2 text-gray-700">ECCD Checklist</span>
                        </label>
                    </div>
                    <div v-if="requirements.card === 0">
                        <label class="inline-flex items-center mt-3">
                            <input v-model="form.card" type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" checked><span class="ml-2 text-gray-700">Card (Form 138)</span>
                        </label>
                    </div>
                    <div v-if="requirements.picture === 0">
                        <label class="inline-flex items-center mt-3">
                            <input v-model="form.picture" type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" checked><span class="ml-2 text-gray-700">1x1 Picture</span>
                        </label>
                    </div>
                    <div v-if="requirements.good_moral === 0">
                        <label class="inline-flex items-center mt-3">
                            <input v-model="form.good_moral" type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" checked><span class="ml-2 text-gray-700">Good Moral</span>
                        </label>
                    </div>
                    <div v-if="requirements.form_137 === 0">
                        <label class="inline-flex items-center mt-3">
                            <input v-model="form.form_137" type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" checked><span class="ml-2 text-gray-700">Form 137</span>
                        </label>
                    </div>
                    <button @click="updateRequirements()" class="mt-2 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Update Requirements</button>
                </div>
            </div>
        </sweet-modal>
        <sweet-modal ref="gradesModal">
            <div>
                <p class="font-bold text-lg" v-if="selectedStudent">{{ selectedStudent.last_name }}, {{ selectedStudent.first_name }} Grades</p>
                <div>
                    <div class="mt-2" v-for="(grade, index) in grades" :key="index">
                        <div class="flex items-center">
                            <label class="font-bold">{{ grade.grade_level.level }} (S.Y.{{grade.school_year.from}} - {{grade.school_year.to}})</label>
                            <input @change="() => { if(grade.average > 101 || grade.average < 0) { grade.average = 0 }}" v-model="grade.average" :name="`grades[${index}][average]`" type="number" max="100" min="0" step="0.1" class="ml-auto h-10 pl-9 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-right" placeholder="Grades">
                        </div>
                    </div>
                </div>
                <button @click="updateGrade()" class="mt-2 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Update Grades</button>
            </div>
        </sweet-modal>
    </div>
</template>

<script>
    import { mapGetters } from "vuex";
    import _ from 'lodash';

    export default {
        props: ['levels', 'branches'],
        data() {
            return {
                requirements: null,
                search: '',
                level: '',
                sort_by: 'asc',
                status: '',
                grades: [],
                selectedStudent: null,
                form: {
                    ECCD_checklist: false,
                    birth_cert: false,
                    card: false,
                    coc: false,
                    form_137: false,
                    good_moral: false,
                    picture: false,
                }
            }
        },
        computed: {
            ...mapGetters({
                students: 'student/students',
            }),
        },
        watch: {
            search(newSearch, oldSearch) {
                this.getStudents()
            },
            level(newSearch, oldSearch) {
                this.getStudents()
            },
            sort_by(newSearch, oldSearch) {
                this.getStudents()
            },
            status(newSearch, oldSearch) {
                this.getStudents()
            }
        },
        methods: {
            async getStudents() {
                await this.$store.dispatch("student/getStudents", {
                    params: {
                        name: this.search,
                        level: this.level,
                        sort_by: this.sort_by,
                        status: this.status
                    }
                });
            },
            openGradesModal(student) {
                this.grades = student.grades
                this.selectedStudent = student
                this.$refs.gradesModal.open()
            },
            async updateGrade() {
                await axios.put(`/update-grades/${this.selectedStudent.id}`, {
                    grades: this.grades
                }).then(response => {
                    this.$refs.gradesModal.close()
                    this.getStudents()
                });
            },
            openRequirementsModal(requirements) {
                const reqData = {
                    ECCD_checklist: requirements.ECCD_checklist === 1 ? true : false,
                    birth_cert: requirements.birth_cert === 1 ? true : false,
                    card: requirements.card === 1 ? true : false,
                    coc: requirements.coc === 1 ? true : false,
                    form_137: requirements.form_137 === 1 ? true : false,
                    good_moral: requirements.good_moral === 1 ? true : false,
                    picture: requirements.picture === 1 ? true : false,
                }
                this.form = reqData
                this.requirements = requirements
                this.$refs.requirementsModal.open()
            },
            async updateRequirements() {
                await axios.put(`/student/${this.requirements.student_id}/update-requirements`, this.form)
                .then(response => {
                    this.$refs.requirementsModal.close()
                    this.getStudents()
                })
            },
            checkRequirements(requirements) {
                let reqCount = 0;

                for(let key in requirements) {
                    if(requirements[key] === 0) {
                        reqCount++
                    }
                }

                return reqCount
            },
        },
        created() {
            this.getStudents()
        }
    }
</script>