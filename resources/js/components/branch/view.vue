<template>
    <div class="pt-8 min-h-screen bg-blue-100">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6 flex">
                <div>
                    <h3 class="text-2xl leading-6 font-medium text-blue-700 flex place-self-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />
                        </svg>
                        {{ branch.name }}</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500 ml-8">{{ branch.address }}</p>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap pb-3 mx-4 md:mx-24 lg:mx-0">
            <div class="w-full p-2 lg:w-1/4 md:w-1/2">
                <div class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                    <div class="flex flex-row justify-between items-center">
                        <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 group-hover:text-gray-50">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                            </svg>
                        </div>
                    </div>
                    <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">{{ branch.student_count}}</h1>
                    <div class="flex flex-row justify-between group-hover:text-gray-200">
                        <p>Number of Students</p>
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
                        <tr v-for="payment in transactions">
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
                                        ₱ {{ account.back_account }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-sm font-medium text-gray-900">Royalty</td>
                                    <td class="text-sm text-gray-900 font-light">
                                        ₱ {{ account.royalty }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-sm font-medium text-gray-900">renewal</td>
                                    <td class="text-sm text-gray-900 font-light">
                                        ₱ {{ account.renewal }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-sm font-medium text-gray-900">Total:</td>
                                    <td class="text-sm font-medium text-gray-900">₱ {{ remainingBalance() }}</td>
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
        props: ['branch', 'account', 'transactions'],
        methods: {
            remainingBalance() {
                const account = this.account;

                return parseInt(account.back_account) + parseInt(account.per_student_total) + parseInt(account.renewal) + parseInt(account.royalty);
            },
            openAccountModal() {
                this.$refs.accountModal.open()
            },
        }
    }
</script>