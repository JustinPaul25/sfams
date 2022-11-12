<template>
    <div class="pt-8 min-h-screen bg-blue-100">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Reports</h1>
                    <p class="mt-2 text-sm text-gray-700">Students Transaction Reports.</p>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <button @click="print()" class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:w-auto">Print Transaction</button>
                </div>
            </div>
            <div class="grid grid-cols-8 gap-8 mt-8">
                <div class="col-span-8 sm:col-span-4 lg:col-span-2">
                    <label class="text-blue-700 font-bold mb-2 text-xs">Filter By:</label>
                    <div class="relative inline-block text-gray-700 w-full">
                        <select v-model="sortBy" class="w-full h-10 pl-9 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Regular input">
                            <option value="" selected> None</option>
                            <option value="date"> Date</option>
                            <option value="month"> Month</option>
                            <option value="year"> Year</option>
                            <option value="range"> Date Range</option>
                        </select>
                        <div
                            class="absolute inset-y-0 left-0 flex items-center px-2 pointer-events-none"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
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
                <div v-if="sortBy === 'date'" class="col-span-8 sm:col-span-4 lg:col-span-2">
                    <label class="text-blue-700 font-bold mb-2 text-xs">Date:</label>
                    <div class="relative inline-block text-gray-700 w-full">
                        <input v-model="date" type="date" class="w-full h-10 pl-9 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                        <div class="absolute inset-y-0 left-0 flex items-center px-2 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div v-if="sortBy === 'month'" class="col-span-8 sm:col-span-4 lg:col-span-2">
                    <label class="text-blue-700 font-bold mb-2 text-xs">Month:</label>
                    <div class="relative inline-block text-gray-700 w-full">
                        <input v-model="month" type="month" class="w-full h-10 pl-9 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                        <div class="absolute inset-y-0 left-0 flex items-center px-2 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div v-if="sortBy === 'year'" class="col-span-8 sm:col-span-4 lg:col-span-2">
                    <label class="text-blue-700 font-bold mb-2 text-xs">Year:</label>
                    <div class="relative inline-block text-gray-700 w-full">
                        <input v-model="year" type="number" placeholder="YYYY" min="2017" max="2100" class="w-full h-10 pl-9 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                        <div class="absolute inset-y-0 left-0 flex items-center px-2 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div v-if="sortBy === 'range'" class="col-span-8 sm:col-span-4 lg:col-span-2">
                    <label class="text-blue-700 font-bold mb-2 text-xs">From:</label>
                    <div class="relative inline-block text-gray-700 w-full">
                        <input v-model="from" type="date" class="w-full h-10 pl-9 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                        <div class="absolute inset-y-0 left-0 flex items-center px-2 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div v-if="sortBy === 'range'" class="col-span-8 sm:col-span-4 lg:col-span-2">
                    <label class="text-blue-700 font-bold mb-2 text-xs">To:</label>
                    <div class="relative inline-block text-gray-700 w-full">
                        <input v-model="to" type="date" class="w-full h-10 pl-9 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                        <div class="absolute inset-y-0 left-0 flex items-center px-2 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="col-span-8 sm:col-span-4 lg:col-span-2">
                    <label class="text-blue-700 font-bold mb-2 text-xs">Types:</label>
                    <div class="relative inline-block text-gray-700 w-full">
                        <select v-model="type" class="w-full h-10 pl-9 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                            <option value="">All Types</option>
                            <option value="STUDENT">Student</option>
                            <option value="BRANCH">Branch</option>
                        </select>
                        <div class="absolute inset-y-0 left-0 flex items-center px-2 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0013.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 01-.75.75H9a.75.75 0 01-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 011.927-.184" />
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
                                <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Transaction ID</th>
                                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Type</th>
                                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Payer</th>
                                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Amount</th>
                                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Date</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="transaction in transactions">
                                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-blue-700 sm:pl-6">{{ transaction.id }}</td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900 hover:text-blue-700"><a href="/students/view">{{ transaction.type }}</a></td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{ transaction.type === "STUDENT" ?  `${transaction.student.first_name} ${transaction.student.last_name}` : transaction.branch.name }}</td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">₱ {{ transaction.amount }}</td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ transaction.created_at }}</td>
                            </tr>

                            <!-- More transactions... -->
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="printMe" hidden>
            <p style="text-align: center; margin-bottom: -10px; font-size: 0.5rem; font-weight: bold;">Philippine Baptist Christian College of Mindanao, Inc.</p>
            <p style="text-align: center; font-size: 0.5em;">Fd. Rd. 2, Tibal-og, Sto Tomas Davao del Norte</p>
            <p style="text-align: center; margin: 25px 0px; font-size: 1rem; font-weight: bold;">Transaction Report</p>
            <table style="font-family: arial, sans-serif; border-collapse: collapse; width: 100%;">
                <tr>
                    <th style="font-size: 0.5rem; font-weight: bold;">ID</th>
                    <th style="font-size: 0.5rem; font-weight: bold;">Type</th>
                    <th style="font-size: 0.5rem; font-weight: bold;">Payer</th>
                    <th style="font-size: 0.5rem; font-weight: bold;">Amount</th>
                    <th style="font-size: 0.5rem; font-weight: bold;">Date</th>
                </tr>
                <tr v-for="transaction in transactions">
                    <td style="border: 1px solid #dddddd; text-align: left; padding: 1px; font-size: 0.5rem;">{{ transaction.id }}</td>
                    <td style="border: 1px solid #dddddd; text-align: left; padding: 1px; font-size: 0.5rem;">{{ transaction.type }}</td>
                    <td style="border: 1px solid #dddddd; text-align: left; padding: 1px; font-size: 0.5rem;">{{ transaction.type === "STUDENT" ?  `${transaction.student.first_name} ${transaction.student.last_name}` : transaction.branch.name }}</td>
                    <td style="border: 1px solid #dddddd; text-align: left; padding: 1px; font-size: 0.5rem;">₱ {{ transaction.amount }}</td>
                    <td style="border: 1px solid #dddddd; text-align: left; padding: 1px; font-size: 0.5rem;">{{ transaction.created_at }}</td>
                </tr>
            </table>
            <p>{{ total(transactions).amount }}</p>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
            transactions: [],
            sortBy: '',
            date: null,
            month: null,
            year: null,
            from: null,
            to: null,
            type: ''
        }
    },
    watch: {
        sortBy: function(newVal, oldVal) {
            if(newVal === '') {
                this.getReports()
            }
        },
        type: function(newVal, oldVal) {
            this.getReports()
        },
        date: function(newVal, oldVal) {
            this.getReports()
        },
        month: function(newVal, oldVal) {
            this.getReports()
        },
        year: function(newVal, oldVal) {
            this.getReports()
        },
        from: function(newVal, oldVal) {
            if(this.to !== null) {
                this.getReports()
            }
        },
        to: function(newVal, oldVal) {
            if(this.from !== null) {
                this.getReports()
            }
        },
    },
    methods: {
        async getReports() {
            await axios.get('/transactions', 
            {
                params: {
                    sortBy: this.sortBy,
                    date: this.date,
                    month: this.month,
                    year: this.year,
                    from: this.from,
                    to: this.to,
                    type: this.type
                }
            })
            .then(response => {
                this.transactions = response.data
            })
        },
        async print() {
            await this.$htmlToPaper('printMe');
        },
        total(transactions) {
            
            return transactions.length !== 0 ? transactions.reduce((a, b) => ({amount: parseInt(a.amount) + parseInt(b.amount)})) : 0;
        }
    },
    mounted() {
        this.getReports();
    }
}
</script>