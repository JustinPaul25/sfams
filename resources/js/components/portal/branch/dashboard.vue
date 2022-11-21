<template>
    <div>
        <main class="flex-1 pb-8">
            <div class="bg-white shadow">
                <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
                <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-gray-200">
                    <div class="flex-1 min-w-0">
                    <!-- Profile -->
                    <div class="flex items-center">
                        <img class="hidden h-16 w-16 rounded-full sm:block" :src="app.app_logo" alt="">
                        <div>
                        <div class="flex items-center">
                            <img class="h-16 w-16 rounded-full sm:hidden" :src="app.app_logo" alt="">
                            <h1 class="ml-3 text-2xl font-bold leading-7 text-gray-900 sm:leading-9 sm:truncate">{{ app.current_user.name }}</h1>
                        </div>
                        <dl class="mt-6 flex flex-col sm:ml-3 sm:mt-1 sm:flex-row sm:flex-wrap">
                            <dt class="sr-only">Company</dt>
                            <dd class="flex items-center text-sm text-gray-500 font-medium capitalize sm:mr-6">
                            <!-- Heroicon name: solid/office-building -->
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" />
                            </svg>
                                {{ branch.address }}
                            </dd>
                        </dl>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="mt-8">
                <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h2 class="text-lg leading-6 font-medium text-blue-700">Overview</h2>
                    <div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-3">
                        <div class="bg-blue-200 overflow-hidden shadow rounded-lg">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-gray-400"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Number of Students</dt>
                                        <dd>
                                            <div class="text-3xl font-medium text-gray-900">{{ branch.student_count }}</div>
                                        </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-blue-200 px-5 py-3">
                                <div class="text-sm">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="bg-blue-200 overflow-hidden shadow rounded-lg">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-gray-400"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Remaining Balance</dt>
                                        <dd>
                                            <div class="text-3xl font-medium text-gray-900">₱ {{ remainingBalance() }}</div>
                                        </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-blue-200 px-5 py-3">
                                <div class="text-sm">
                                    <p @click="openAccountModal()" class="cursor-pointer font-medium text-blue-700 hover:text-blue-800"> View all </p>
                                </div>
                            </div>
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
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Transaction Number</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Description</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Amount</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Date</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="payment in branch.payments">
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-blue-700 sm:pl-6">{{ payment.id }}</td>
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
        </main>
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
                                        ₱ {{ branch.account.back_account }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-sm font-medium text-gray-900">Renewal</td>
                                    <td class="text-sm text-gray-900 font-light">
                                        ₱ {{ branch.account.renewal }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-sm font-medium text-gray-900">Royalty Fee</td>
                                    <td class="text-sm text-gray-900 font-light">
                                        ₱ {{ branch.account.royalty }}
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
    </div>
</template>

<script>
    export default {
        props: ['branch'],
        methods: {
            remainingBalance() {
                const account = this.branch.account;

                return parseInt(account.back_account) + parseInt(account.renewal) + parseInt(account.royalty);
            },
            openAccountModal() {
                this.$refs.accountModal.open()
            },
        }
    }
</script>