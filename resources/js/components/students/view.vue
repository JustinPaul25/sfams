<template>
    <div class="pt-8 min-h-screen bg-blue-100">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6 flex">
                <div>
                    <h3 class="text-2xl leading-6 font-medium text-blue-700 flex place-self-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                </svg>{{ student.last_name }}, {{ student.first_name }}</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500 ml-8">Personal details</p>
                </div>
                <div class="ml-auto">
                    <a :href="`/student/${student.id}/edit`" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Edit</a>
                    <button v-if="!viewDetails" @click="viewDetails = !viewDetails" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">View More</button>
                    <button v-if="viewDetails" @click="viewDetails = !viewDetails" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">View Less</button>
                </div>
            </div>
            <div v-if="viewDetails" class="border-t border-gray-200 px-4 py-5 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-200">
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Grade</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.grade_level.level }}</dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Gender</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.gender == 1 ? 'Male' : 'Female' }}</dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Bithdate</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.birth_date }}</dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Address</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.purok_street }}, {{ student.barangay }}, {{ student.city }}, {{ student.province }}</dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.email }}</dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Mobile Number</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.phone }}</dd>
                </div>
                </dl>
            </div>
        </div>
        <div class="flex flex-wrap pb-3 mx-4 md:mx-24 lg:mx-0">
            <div class="w-full p-2 lg:w-1/4 md:w-1/2">
                <div class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                    <div class="flex flex-row justify-between items-center">
                        <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 group-hover:text-gray-50">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                            </svg>
                        </div>
                    </div>
                    <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">{{ student.grades[0].average }}</h1>
                    <div class="flex flex-row justify-between group-hover:text-gray-200">
                    <p>Current Grade</p>
                    </div>
                </div>
            </div>
            <div class="w-full p-2 lg:w-1/4 md:w-1/2">
                <div class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                    <div class="flex flex-row justify-between items-center">
                        <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 group-hover:text-gray-50">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                            </svg>
                        </div>
                    </div>
                    <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">₱ {{ student.account.discount }}</h1>
                    <div class="flex flex-row justify-between group-hover:text-gray-200">
                    <p>Discounted Amount</p>
                    </div>
                </div>
            </div>
            <div class="w-full p-2 lg:w-1/4 md:w-1/2">
                <div class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                    <div class="flex flex-row justify-between items-center">
                        <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 group-hover:text-gray-50">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 00-2.25-2.25H15a3 3 0 11-6 0H5.25A2.25 2.25 0 003 12m18 0v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9m18 0V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v3" />
                            </svg>
                        </div>
                    </div>
                    <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">₱ {{ remainingBalance() }}</h1>
                    <div class="flex flex-row justify-between group-hover:text-gray-200">
                    <p>Remaining Balance</p>
                    <span class="cursor-pointer" @click="openAccountModal()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 group-hover:text-gray-200"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                            clip-rule="evenodd" />
                        </svg>
                    </span>
                    </div>
                </div>
            </div>
            <div class="w-full p-2 lg:w-1/4 md:w-1/2">
                <div class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                    <div class="flex flex-row justify-between items-center">
                        <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 group-hover:text-gray-50"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
                        </div>
                    </div>
                    <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">{{ checkRequirements() }}</h1>
                    <div class="flex flex-row justify-between group-hover:text-gray-200">
                    <p>Requirements Left</p>
                    <span class="cursor-pointer" @click="openRequirementsModal()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 group-hover:text-gray-200"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                            clip-rule="evenodd" />
                        </svg>
                    </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">OR Number</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Description</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Amount</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Date</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                        <tr v-for="payment in student.payments">
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-blue-700 sm:pl-6">{{ payment.or_number }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-xs text-gray-500">{{ payment.description }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">₱ {{ payment.amount }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ payment.created_at }}</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <sweet-modal ref="accountModal">
            <p class="font-bold text-lg">Remaining Account Balance</p>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">

                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        Remaining Balance
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-sm font-medium text-gray-900">Back Account</td>
                                    <td class="text-sm text-gray-900 font-light">
                                        ₱ {{ student.account.back_account }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-sm font-medium text-gray-900">Entrance</td>
                                    <td class="text-sm text-gray-900 font-light">
                                        ₱ {{ student.account.entrance }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-sm font-medium text-gray-900">Miscellaneous</td>
                                    <td class="text-sm text-gray-900 font-light">
                                        ₱ {{ student.account.misc }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-sm font-medium text-gray-900">Tuition</td>
                                    <td class="text-sm text-gray-900 font-light">
                                        ₱ {{ student.account.tuition }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-sm font-medium text-gray-900">Books</td>
                                    <td class="text-sm text-gray-900 font-light">
                                        ₱ {{ student.account.books }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-sm font-medium text-gray-900">Hand Book</td>
                                    <td class="text-sm text-gray-900 font-light">
                                        ₱ {{ student.account.handbook }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-sm font-medium text-gray-900">Student ID</td>
                                    <td class="text-sm text-gray-900 font-light">
                                        ₱ {{ student.account.id_fee }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-sm font-medium text-gray-900">Closing Fee</td>
                                    <td class="text-sm text-gray-900 font-light">
                                        ₱ {{ student.account.closing }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-sm font-medium text-gray-900">Graduation Fee</td>
                                    <td class="text-sm text-gray-900 font-light">
                                        ₱ {{ student.account.graduation }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-sm font-medium text-gray-900">Total:</td>
                                    <td class="text-sm font-medium text-gray-900 text-xl">₱ {{ remainingBalance() }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </sweet-modal>
        <sweet-modal ref="requirementsModal">
            <p v-if="!checkRequirements() > 0" class="font-bold text-lg">No Requirements Left</p>
            <p v-else class="font-bold text-lg">Requirements Left</p>
            <ul v-if="checkRequirements() > 0" class="list-disc">
                <li v-if="student.student_requirement.ECCD_checklist === 0">ECCD Checklist</li>
                <li v-if="student.student_requirement.good_moral === 0">Good Moral</li>
                <li v-if="student.student_requirement.birth_cert === 0">Birth Certificate PSA (Original)</li>
                <li v-if="student.student_requirement.card === 0">Form 138 (Card)</li>
                <li v-if="student.student_requirement.coc === 0">Certificate of Completion</li>
                <li v-if="student.student_requirement.form_137 === 0">Form 137</li>
                <li v-if="student.student_requirement.picture === 0">1x1 Picture</li>
            </ul>
        </sweet-modal>
    </div>
</template>

<script>
export default {
    props: ['student'],
    data() {
        return {
            viewDetails: false
        }
    },
    methods: {
        checkRequirements() {
            const requirements = this.student.student_requirement;
            let reqCount = 0;

            for(let key in requirements) {
                if(requirements[key] === 0) {
                    reqCount++
                }
            }

            return reqCount
        },
        remainingBalance() {
            const account = this.student.account;

            return parseInt(account.back_account) + parseInt(account.books) + parseInt(account.closing) + parseInt(account.entrance) + parseInt(account.graduation) + parseInt(account.handbook) + parseInt(account.id_fee) + parseInt(account.misc) + parseInt(account.tuition);
        },
        openAccountModal() {
            this.$refs.accountModal.open()
        },
        openRequirementsModal() {
            this.$refs.requirementsModal.open()
        }
    }
}
</script>
