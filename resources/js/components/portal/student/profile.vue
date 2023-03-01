<template>
    <div class="container mx-auto p-5">
        <div class="md:flex md:-mx-2 min-h-screen bg-blue-100">
            <div class="w-full md:w-3/12 md:mx-2">
                <div class="bg-white p-3 border-t-4 border-blue-700">
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ app.current_user.name }}</h1>
                    <h3 class="text-gray-600 font-lg text-semibold leading-6">{{ student.grade_level.level }}</h3>
                    <p class="text-sm text-gray-500 hover:text-gray-600 leading-6 mt-4">ADDRESS: </p>
                    <p class="text-base text-gray-500 hover:text-gray-600 leading-6 mb-4">{{ student.purok_street }}, {{ student.barangay }}, {{ student.city }}</p>
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>Status</span>
                            <span class="ml-auto">
                                <span v-if="student.status === 'ENROLLED'" class="bg-green-500 py-1 px-2 rounded text-white text-sm">Enrolled</span>
                                <span v-if="student.status === 'REENROLLED'" class="bg-red-500 py-1 px-2 rounded text-white text-sm">Not Enrolled</span>
                                <span v-if="student.status === 'GRADUATED'" class="bg-blue-500 py-1 px-2 rounded text-white text-sm">Graduated</span>
                                <span v-if="student.status === 'TRANSFERED'" class="bg-yellow-500 py-1 px-2 rounded text-white text-sm">Transfered</span>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="bg-white p-3 border-t-4 border-blue-700 mt-4">
                    <div class="flex justify-between">
                        <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">Grades</h1>
                        <button @click="openGradesModal()" class="text-blue-700 font-bold hover:opacity-75">View Table</button>
                    </div>

                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li v-for="grade in student.grades" class="flex items-center py-3">
                            <span>{{ grade.grade_level.level }}</span>
                            <span class="ml-auto font-bold">
                                Avg: {{ grade.average }}
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-full md:w-9/12 h-64 bg-blue-100">
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                        </svg>
                        <span class="tracking-wide">My School</span>
                    </div>
                    <div class="text-gray-700">
                        <div>
                            <div class="px-4 font-bold">{{ student.branch.name }}</div>
                        </div>
                        <div>
                            <div class="px-4 text-xs">{{ student.branch.address }}</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-3 shadow-sm rounded-sm mt-4">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="h-5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                        </span>
                        <span class="tracking-wide">About</span>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">First Name</div>
                                <div class="px-4 py-2">{{ student.first_name }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Last Name</div>
                                <div class="px-4 py-2">{{ student.last_name }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Gender</div>
                                <div class="px-4 py-2">{{ student.gender === 1 ? 'Male' : 'Female' }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Contact No.</div>
                                <div class="px-4 py-2">{{ student.phonea }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Current Address</div>
                                <div class="px-4 py-2">{{ student.purok_street }}, {{ student.barangay }}, {{ student.city }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email.</div>
                                <div class="px-4 py-2">
                                    <a class="text-blue-800" href="mailto:jane@example.com">{{ student.email }}</a>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Birthday</div>
                                <div class="px-4 py-2">{{ student.birth_date }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-3 shadow-sm rounded-sm mt-4">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="h-5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </span>
                        <span class="tracking-wide">Parents/Guardian</span>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Father's Name</div>
                                <div class="px-4 py-2">{{ student.father_name }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Father's Phone Number</div>
                                <div class="px-4 py-2">{{ student.father_phone }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Mother's Name</div>
                                <div class="px-4 py-2">{{ student.mother_name }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Mother's Phone Number</div>
                                <div class="px-4 py-2">{{ student.mother_phone }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Guardian's Name</div>
                                <div class="px-4 py-2">{{ student.guardian_name }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Guardian's Phone Number</div>
                                <div class="px-4 py-2">{{ student.guardian_phone }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-3 shadow-sm rounded-sm mt-4">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5" />
                        </svg>
                        <span class="tracking-wide">Contact Person</span>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Name</div>
                                <div class="px-4 py-2">{{ student.contact_person }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Number</div>
                                <div class="px-4 py-2">{{ student.contact_person_number }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <sweet-modal ref="gradesModal">
            <div>
                <p class="font-bold text-lg">{{ student.last_name }}, {{ student.first_name }} Grades</p>
                <table class="table-auto w-full mt-2 border border-current">
                    <thead>
                        <tr>
                            <th class="border border-current">Subject</th>
                            <th class="border border-current">1st</th>
                            <th class="border border-current">2nd</th>
                            <th class="border border-current">3rd</th>
                            <th class="border border-current">4th</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(value, name, index) in student.grade.grade">
                            <td class="border border-current">{{ value.label }}</td>
                            <td  v-for="(grade, name, index) in value.value" class="border border-current">
                                <p>{{ grade.value }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="border border-current font-bold">Average:</td>
                            <td class="border border-current">
                                {{ getPeriodAverage(student.grade.grade, 0) }}
                            </td>
                            <td class="border border-current">
                                {{ getPeriodAverage(student.grade.grade, 1) }}
                            </td>
                            <td class="border border-current">
                                {{ getPeriodAverage(student.grade.grade, 2) }}
                            </td>
                            <td class="border border-current">
                                {{ getPeriodAverage(student.grade.grade, 3) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </sweet-modal>
    </div>
</template>

<script>
    export default {
        props: ['student'],
        methods: {
            openGradesModal() {
                this.$refs.gradesModal.open()
            },
            getPeriodAverage(grades, index) {
                let average = 0;
                grades.forEach(element => {
                    average = Number(average) + Number(element.value[index].value)
                });
                return average/grades.length;
            },
        }
    }
</script>
