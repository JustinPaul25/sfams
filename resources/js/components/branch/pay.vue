<template>
    <div class="bg-blue-100 min-h-screen">
        <div class="py-6">
            <div class="sm:flex sm:items-center px-6">
                <div class="sm:flex-auto">
                    <h1 class="text-2xl font-semibold text-gray-900">{{ branch.name }}</h1>
                </div>
                <div class="sm:flex-auto">
                    <a href="/branches" class="ml-auto w-1/2 flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-white bg-blue-700 hover:bg-blue-500"> Back to branch list </a>
                </div>
            </div>
            <div class="mt-4 max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
                <main class="lg:col-span-12 xl:col-span-8">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                            <h1 class="text-xl font-semibold text-blue-700">Previous Transactions</h1>
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
                                            <tr v-for="transaction in transactions">
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-blue-700 sm:pl-6">{{ transaction.id }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-xs text-gray-500"><button @click="displayDescription(transaction.description)" class="text-blue-700 font-bold hover:opacity-75 cursor-pointer">View Description</button></td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">₱ {{ transaction.amount }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ transaction.created_at }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <aside class="block xl:col-span-4">
                    <div class="sticky top-6 space-y-4">
                        <div class="bg-white p-4 rounded border border-blue-600">
                            <div class="sm:flex-auto text-right">
                                <h1 class="text-xl font-semibold text-blue-700">{{ branch.name }}</h1>
                            </div>
                            <div v-if="account" class="flow-root mt-6">
                                <ul role="list" class="-my-5 divide-y divide-gray-200">
                                    <li class="py-1">
                                        <div class="flex items-center space-x-1">
                                            <div class="flex-shrink-0">
                                            <p class="text-gray-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                                                </svg>
                                            </p>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate">Back Account</p>
                                            </div>
                                            <div>
                                            <p class="text-sm text-blue-700 truncate">₱ {{ numberWithCommas(account.back_account) }}</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-sm text-blue-700 truncate">₱ <input v-model="form.back_account" class="text-right" type="number"></p>
                                        </div>
                                    </li>
                                    <li class="py-1">
                                        <div class="flex items-center space-x-1">
                                            <div class="flex-shrink-0">
                                            <p class="text-gray-500">
                                                <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>
                                            </p>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate">Renewal</p>
                                            </div>
                                            <div>
                                            <p class="text-sm text-blue-700 truncate">₱ {{ numberWithCommas(account.renewal) }}</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-sm text-blue-700 truncate">₱ <input v-model="form.renewal" class="text-right" type="number"></p>
                                        </div>
                                    </li>
                                    <li class="py-1">
                                        <div class="flex items-center space-x-1">
                                            <div class="flex-shrink-0">
                                            <p class="text-gray-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                                </svg>
                                            </p>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate">Royalty</p>
                                            </div>
                                            <div>
                                            <p class="text-sm text-blue-700 truncate">₱ {{ numberWithCommas(account.royalty) }}</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-sm text-blue-700 truncate">₱ <input v-model="form.royalty" class="text-right" type="number"></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-6">
                                <div class="relative inline-block text-gray-700 w-full mb-2">
                                    <input disabled type="text" :value="amountTotal()" class="text-right w-full h-10 pl-9 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Total">
                                    <div class="absolute inset-y-0 left-0 flex items-center px-2 pointer-events-none">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="71.668px" height="71.668px" viewBox="0 0 71.668 71.668" style="enable-background:new 0 0 71.668 71.668;" xml:space="preserve"><g><g><g><path d="M16.935,70.021c-2.158,0-3.926-0.748-5.252-2.225c-1.313-1.455-1.98-3.598-1.98-6.364V31.289H3.5     c-1.93,0-3.5-1.57-3.5-3.5c0-1.93,1.57-3.5,3.5-3.5h6.203v-3.667H3.5c-1.93,0-3.5-1.57-3.5-3.5c0-1.93,1.57-3.5,3.5-3.5h6.203     v-3.25c0-3.085,0.738-5.337,2.194-6.693c1.443-1.348,3.731-2.031,6.8-2.031h17.215c4.984,0,8.499,0.369,11.395,1.197     c3.022,0.839,5.014,2.35,6.715,3.856c2.019,1.787,3.576,4.008,4.627,6.6c0.043,0.105,0.084,0.213,0.123,0.321h9.396     c1.93,0,3.5,1.57,3.5,3.5c0,1.93-1.57,3.5-3.5,3.5h-7.99c0.028,0.488,0.043,0.952,0.043,1.408c0,0.746-0.031,1.494-0.096,2.259     h8.043c1.93,0,3.5,1.57,3.5,3.5c0,1.93-1.57,3.5-3.5,3.5h-9.656c-1.08,2.582-2.66,4.753-4.705,6.466     c-4.41,3.688-9.93,5.334-17.895,5.334h-11.79v18.252c0,2.799-0.683,4.965-2.029,6.438C20.733,69.267,18.998,70.021,16.935,70.021     z M3.499,27.289c-0.275,0-0.5,0.225-0.5,0.5s0.225,0.5,0.5,0.5h7.703c0.828,0,1.5,0.672,1.5,1.5v31.643     c0,2.002,0.407,3.468,1.21,4.356c0.756,0.842,1.716,1.231,3.022,1.231c1.22,0,2.155-0.401,2.943-1.265     c0.825-0.903,1.244-2.389,1.244-4.414V41.589c0-0.828,0.672-1.5,1.5-1.5H35.91c7.211,0,12.137-1.43,15.97-4.635     c1.886-1.58,3.296-3.655,4.188-6.168c0.213-0.598,0.779-0.997,1.414-0.997h10.684c0.275,0,0.5-0.225,0.5-0.5s-0.225-0.5-0.5-0.5     h-9.721c-0.436,0-0.848-0.188-1.133-0.516s-0.414-0.764-0.354-1.193c0.174-1.237,0.259-2.398,0.259-3.55     c0-0.828-0.056-1.698-0.174-2.738c-0.049-0.425,0.087-0.85,0.371-1.169c0.284-0.318,0.69-0.501,1.119-0.501h9.631     c0.274,0,0.5-0.225,0.5-0.5s-0.226-0.5-0.5-0.5H57.686c-0.651,0-1.229-0.42-1.429-1.039l-0.075-0.234     c-0.099-0.313-0.195-0.624-0.316-0.922c-0.875-2.157-2.166-4.002-3.836-5.479c-1.701-1.508-3.221-2.57-5.538-3.214     c-2.627-0.751-5.888-1.085-10.581-1.085H18.696c-2.251,0-3.895,0.424-4.754,1.226c-0.812,0.756-1.24,2.312-1.24,4.499v4.75     c0,0.828-0.672,1.5-1.5,1.5H3.499c-0.275,0-0.5,0.225-0.5,0.5s0.225,0.5,0.5,0.5h7.703c0.828,0,1.5,0.672,1.5,1.5v6.667     c0,0.828-0.672,1.5-1.5,1.5L3.499,27.289L3.499,27.289z M32.659,34.967H22.622c-0.828,0-1.5-0.672-1.5-1.5v-3.679     c0-0.828,0.672-1.5,1.5-1.5h22.767c0.604,0,1.151,0.364,1.385,0.924c0.231,0.559,0.105,1.203-0.32,1.633     c-1.352,1.361-3.072,2.375-5.117,3.015C38.979,34.596,36.06,34.967,32.659,34.967z M24.122,31.967h8.537     c2.588,0,4.841-0.228,6.717-0.679H24.122V31.967z M47.682,27.289h-25.06c-0.828,0-1.5-0.672-1.5-1.5v-6.667     c0-0.828,0.672-1.5,1.5-1.5h25.125c0.69,0,1.291,0.471,1.456,1.141c0.275,1.116,0.415,2.307,0.415,3.538     c0,1.39-0.165,2.696-0.491,3.885C48.948,26.836,48.355,27.289,47.682,27.289z M24.122,24.289h22.349     c0.098-0.627,0.147-1.292,0.147-1.988c0-0.575-0.037-1.137-0.111-1.679H24.122V24.289z M45.814,16.622H22.622     c-0.828,0-1.5-0.672-1.5-1.5v-3.897c0-0.828,0.672-1.5,1.5-1.5h10.037c6.754,0,11.224,1.205,13.664,3.684     c0.254,0.271,0.461,0.522,0.665,0.779c0.359,0.45,0.429,1.066,0.179,1.586C46.917,16.292,46.393,16.622,45.814,16.622z      M24.122,13.622h16.552c-2.027-0.595-4.707-0.897-8.015-0.897h-8.537V13.622z"/></g></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                                    </div>
                                </div>
                                <div class="relative inline-block text-gray-700 w-full mb-2">
                                    <p class="text-sm font-medium text-gray-900 truncate">OR Number</p>
                                    <input type="text" v-model="form.or_number" class="text-right w-full h-10 pl-9 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="OR Number">
                                    <span v-if="form.or_number === ''" class="text-red-500 font-bold text-xs">* This Field is Required</span>
                                </div>
                                <button v-if="!isSending" @click="processPayment()" class="w-full flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-white bg-blue-700 hover:bg-blue-500"> Pay </button>
                                <button v-else  disabled type="button" class="cursor-not-allowed w-full flex justify-center items-center rounded-lg px-4 py-2 text-white text-sm bg-blue-700 opacity-75">
                                    <svg class="mr-3 h-5 w-5 animate-spin text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    <span class="font-medium"> Processing... </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
        <div id="printMe" hidden>
            <div style="text-align: center;">
                <img style="display: block; margin: 0 auto; height: 70px; width: 70px;" alt="image name" :src="app.logo_url" />
            </div>
            <p style="text-align: center; margin-bottom: -10px; font-size: 1.5em; font-weight: bold;">Philippine Baptist Christian College of Mindanao, Inc.</p>
            <p style="text-align: center;">Fd. Rd. 2, Tibal-og, Sto Tomas Davao del Norte</p>
            <p style="text-align: right;"> Date: {{ dateNow() }}</p>
            <p>Payer: <span style="font-size: 1.5em; font-weight: bold; margin-left: 3px">{{ branch.name }}</span></p>
            <table style="font-family: arial, sans-serif; border-collapse: collapse; width: 100%;">
            <tr>
                <th></th>
                <th></th>
            </tr>
            <tr v-if="this.form.back_account !== 0">
                <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Back Account</td>
                <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">₱ {{ this.form.back_account }}</td>
            </tr>
            <tr v-if="this.form.renewal !== 0">
                <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Renewal</td>
                <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">₱ {{ this.form.renewal }}</td>
            </tr>
            <tr v-if="this.form.royalty !== 0">
                <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Royalty</td>
                <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">₱ {{ this.form.royalty }}</td>
            </tr>
            <tr v-if="this.form.per_student_total !== 0">
                <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Student Fee</td>
                <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">₱ {{ this.form.per_student_total }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #dddddd; text-align: left; padding: 8px; font-size: 1rem; font-weight: bold;">Total</td>
                <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">₱ {{ amountTotal() }}</td>
            </tr>
            </table>
            <p style="font-size: 1.5em; font-weight: bold; margin-left: 3px">OR No.:</p>
            <p>{{ form.or_number }}</p>
            <p style="font-size: 1.5em; font-weight: bold; margin-left: 3px">Amount in words:</p>
            <p>{{ amountTotal() | toWords }} pesos.</p>
        </div>
        <sweet-modal ref="descriptionModal">
            <p class="font-bold text-lg">Payment Description</p>
            <p class="text-lg mt-2">{{ description }}</p>
        </sweet-modal>
    </div>
</template>

<script>
import _debounce from "lodash/debounce";

export default {
    props: ['branch'],
    data() {
        return {
            description: '',
            transactions: [],
            account: null,
            isSending: false,
            form: {
                branch_id: 0,
                back_account: 0,
                renewal: 0,
                royalty: 0,
                per_student_total: 0,
                or_number: ''
            }
        }
    },
    watch: {
          'form.back_account': _debounce(function(newVal, oldVal) {
              if(newVal > parseInt(this.account.back_account)) {
                this.form.back_account = parseInt(this.account.back_account)
              }
          }, 500),
          'form.renewal': _debounce(function(newVal, oldVal) {
              if(newVal > parseInt(this.account.renewal)) {
                this.form.renewal = parseInt(this.account.renewal)
              }
          }, 500),
          'form.royalty': _debounce(function(newVal, oldVal) {
              if(newVal > parseInt(this.account.royalty)) {
                this.form.royalty = parseInt(this.account.royalty)
              }
          }, 500),
          'form.per_student_total': _debounce(function(newVal, oldVal) {
              if(newVal > parseInt(this.account.per_student_total)) {
                this.form.per_student_total = parseInt(this.account.per_student_total)
              }
          }, 500),
        },
    methods: {
        async print () {
            await this.$htmlToPaper('printMe');
        },
        dateNow() {
            const date = new Date();

            let day = date.getDate();
            let month = date.getMonth() + 1;
            let year = date.getFullYear();

            return `${day}-${month}-${year}`;
        },
        amountTotal() {
            return parseInt(this.form.back_account) + parseInt(this.form.renewal) + parseInt(this.form.royalty) + parseInt(this.form.per_student_total);
        },
        async getTransactions() {
            await axios.get(`/branch/${this.branch.id}/transactions`)
            .then(response => {
                this.transactions = response.data
            })
        },
        async getAccount() {
            await axios.get(`/branch/${this.branch.id}/account`)
            .then(response => {
                this.account = response.data
            })
        },
        numberWithCommas(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        },
        displayDescription(description) {
            this.description = description
            this.$refs.descriptionModal.open()
        },
        async processPayment() {
            this.form.branch_id = this.branch.id
            this.isSending = true
            if(this.amountTotal() === 0) {
              this.$swal.fire({
                  icon: 'Error',
                  title: 'Cannot proceed empty amount.',
                  text: '',
              })
              this.isSending = false
            } else {
                if(this.form.or_number !== '') {
                    await axios.post('/pay-branch', this.form)
                    .then(response => {
                        this.isSending = false
                        this.print()
                        this.getTransactions()
                        this.getAccount()
                        this.form = {
                            branch_id: null,
                            back_account: 0,
                            renewal: 0,
                            royalty: 0,
                            per_student_total: 0,
                        }
                        this.$swal.fire({
                            icon: 'Success',
                            title: 'Payment Successfully Saved.',
                            text: '',
                        })
                    })
                } else {
                    this.$swal.fire({
                        icon: 'Error',
                        title: 'OR Number is Required',
                        text: '',
                    })
                    this.isSending = false
                }
            }
        }
    },
    created() {
        this.getTransactions()
        this.getAccount()
    }
}
</script>
