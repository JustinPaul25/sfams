<template>
    <div>
        <main class="flex-1 pb-8">
            <!-- Page header -->
            <div class="bg-white shadow flex items-center">
                <div class="px-4 sm:px-6 lg:max-w-6xl lg:px-8 mr-auto">
                    <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-gray-200">
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center">
                                <img class="hidden h-16 w-16 rounded-full sm:block" :src="app.app_logo" alt="">
                                <div>
                                    <div class="flex items-center">
                                        <img class="h-16 w-16 rounded-full sm:hidden" :src="app.app_logo" alt="">
                                        <h1 class="ml-3 text-2xl font-bold leading-7 text-gray-900 sm:leading-9 sm:truncate">PBCCMI</h1>
                                    </div>
                                    <dl class="mt-6 flex flex-col sm:ml-3 sm:mt-1 sm:flex-row sm:flex-wrap">
                                        <dt class="sr-only">Company</dt>
                                        <dd class="flex items-center text-sm text-gray-500 font-medium capitalize sm:mr-6">
                                        <!-- Heroicon name: solid/office-building -->
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" />
                                        </svg>
                                        {{ app.current_user.name }} ADMIN
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-8 text-right">
                    <p class="font-bold">School Year:</p>
                    <p class="text-blue-700 text-xl">{{ app.school_year.from }} - {{ app.school_year.to }}</p>
                </div>
            </div>

            <div class="mt-8">
                <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-lg leading-6 font-medium text-blue-700">Overview</h2>
                <div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div class="bg-blue-200 overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-gray-400"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Total Income</dt>
                                    <dd>
                                        <div class="text-lg font-medium text-gray-900">₱ {{income}}</div>
                                    </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-blue-200 px-5 py-3">
                            <div class="text-sm">
                                <a href="/reports" class="font-medium text-blue-700 hover:text-blue-800"> View all </a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-blue-200 overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <!-- Heroicon name: outline/scale -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Branches</dt>
                                    <dd>
                                        <div class="text-lg font-medium text-gray-900">{{ branches }}</div>
                                    </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-blue-200 px-5 py-3">
                            <div class="text-sm">
                                <a href="/branches" class="font-medium text-blue-700 hover:text-blue-800"> View all </a>
                            </div>
                        </div>
                    </div>
                    <!-- More items... -->
                </div>
                </div>
            </div>
        </main>
        <div class="w-full lg:flex items-center">
            <div class="lg:w-8/12 w-full mx-auto mb-8 px-8">
                <chart-component v-if="labels.length !== 0" :labels="labels" :datas="datas"></chart-component>
            </div>
            <div class="lg:w-4/12 w-full mx-auto mb-8 px-8">
                <ol class="list-decimal">
                    <li class="text-xs text-blue-700 font-bold" v-for="branch in branchData">
                        {{ branch.name }} - <span class="font-semibold text-gray-800">{{ branch.address }}</span>
                    </li>
                </ol>
            </div>
        </div>
        <div class="w-full lg:flex items-center">
            <div class="w-11/12 mx-auto mb-8 px-8 mt-2">
                <population-component v-if="population_showChart" :labels="population_labels" :studdata="population_rawData" class="chart-style"></population-component>
            </div>
        </div>
        <div class="flex-1 pb-8">
            <div class="mt-8">
                <div class="shadow sm:hidden">
                    <div class="flex">
                        <h2 class="max-w-6xl mt-8 px-4 text-lg leading-6 font-medium text-blue-700 sm:px-6 lg:px-8 mr-auto">Recent Payments</h2>
                        <a href="/reports" class="max-w-6xl mt-8 px-4 leading-6 hover:opacity-75 text-blue-700 sm:px-6 lg:px-8 ml-auto cursor-pointer">View more</a>
                    </div>
                    <ul role="list" class="mt-2 divide-y divide-gray-200 overflow-hidden shadow sm:hidden">
                        <li v-for="transaction in transactions">
                        <a href="#" class="block px-4 py-4 bg-white hover:bg-gray-50">
                            <span class="flex items-center space-x-4">
                            <span class="flex-1 flex space-x-2 truncate">
                                <!-- Heroicon name: solid/cash -->
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                </svg>
                                <span class="flex flex-col text-gray-500 text-sm truncate">
                                <span class="truncate">{{ transaction.type === 'STUDENT' ? transaction.student.first_name+' '+transaction.student.last_name : transaction.branch.name }}</span>
                                <span class="text-gray-900 font-medium">₱ {{transaction.amount}}</span>
                                <time datetime="2020-07-11">{{ transaction.created_at }}</time>
                                </span>
                            </span>
                            <!-- Heroicon name: solid/chevron-right -->
                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            </span>
                        </a>
                        </li>

                        <!-- More transactions... -->
                    </ul>
                </div>

                <!-- Activity table (small breakpoint and up) -->
                <div class="hidden sm:block">
                <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex">
                        <h2 class="max-w-6xl mt-8 px-4 text-lg leading-6 font-medium text-blue-700 sm:px-6 lg:px-8 mr-auto">Recent Payments</h2>
                        <a href="/reports" class="max-w-6xl mt-8 px-4 cursor-pointer leading-6 hover:opacity-75 text-blue-700 sm:px-6 lg:px-8 ml-auto">View more</a>
                    </div>
                    <div class="flex flex-col mt-2">
                    <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" scope="col">Paying</th>
                            <th class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider" scope="col">Amount</th>
                            <th class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider" scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="transaction in transactions" class="bg-white">
                                <td class="max-w-0 w-full px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <div class="flex">
                                    <a href="#" class="group inline-flex space-x-2 truncate text-sm">
                                        <!-- Heroicon name: solid/cash -->
                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                        </svg>
                                        <p class="text-gray-500 truncate group-hover:text-gray-900">{{ transaction.type === 'STUDENT' ? transaction.student.first_name+' '+transaction.student.last_name : transaction.branch.name }}</p>
                                    </a>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-500">
                                    <span class="text-gray-900 font-medium">₱ {{transaction.amount}} </span>
                                </td>
                                <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-500">
                                    <time datetime="2020-07-11">{{ transaction.created_at }}</time>
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
        </div>
    </div>
</template>

<script>
import ChartComponent from '../branchesChart.vue';
import PopulationComponent from '../incomeChart.vue';

export default {
    components: {
        ChartComponent,
        PopulationComponent
    },
    data() {
        return {
            showChart: false,
            transactions: [],
            income: 0,
            students: 0,
            branches: 0,
            rawData: [],
            labels: [],
            datas: [],
            branchData: [],
            population_rawData: [],
            population_labels: [],
            population_showChart: false
        }
    },
    methods: {
        async getTransactions() {
            await axios.get('/full-transactions')
            .then(response => {
                this.transactions = response.data.transactions
                this.income = response.data.income
                this.students = response.data.student_count
                this.branches = response.data.branch_count
            })
        },
        async getDatas() {
            axios.get('/enroll-data')
            .then(response => {
                console.log(response.data);
                response.data.enroll.forEach((val, key, arr) => {
                    this.population_rawData.push(val.students)
                    this.population_labels.push(parseInt(val.school_year.to));
                    if (Object.is(arr.length - 1, key)) {
                        this.population_rawData.push(((val.students) * parseFloat(response.data.rate)) +  parseFloat(val.students))
                        this.population_labels.push(parseInt(val.school_year.to) + 1);
                        this.population_showChart = true
                    }
                });
                return
            })
        },
        async getBranches() {
            axios.get('/branch-list')
            .then(response => {
                response.data.forEach((val, key, arr) => {
                    this.labels.push(key+1);
                    this.datas.push(val.students)
                })
                this.branchData = response.data
            })
        },
    },
    created() {
        this.getDatas();
        this.getTransactions();
        this.getBranches();
    }
}
</script>

<style scoped>
.chart-style {
    max-height: 1100px !important;
}
</style>
