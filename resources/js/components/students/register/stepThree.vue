<template>
    <div class="min-h-screen">
        <p class="text-centered text-2xl text-gray-900 pt-2 font-bold">Admission Officer</p>
        <div class="pt-3 sm:pt-2">
            <div class="mx-auto">
                <dl class="rounded-lg sm:grid sm:grid-cols-2">
                    <div class="flex flex-col p-2">
                        <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2">Requirements Type</dt>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="relative inline-block text-gray-700 w-full">
                                <select v-model="type" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                    <option value="" disabled>Select Type</option>
                                    <option value="fresh_graduate">Fresh Graduate</option>
                                    <option value="transferee">Transferee</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div v-if="type == 'fresh_graduate'" class="flex flex-col p-2">
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2">Level</dt>
                            <div class="relative inline-block text-gray-700 w-full">
                                <select v-model="level" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                    <option value="" disabled>Choose Level</option>
                                    <option value="KTN">KTN</option>
                                    <option value="Grade_One">Grade 1</option>
                                    <option value="Grade_Seven">Grade 7</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </dl>
            </div>
            <div v-if="type == 'transferee'">
                <fieldset class="space-y-5 ml-5">
                    <legend class="sr-only">Transferee</legend>
                    <div class="relative flex items-start">
                        <div class="flex items-center h-5">
                        <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                        <label for="comments" class="font-medium text-gray-700">PSA Birth Certificate</label>
                        <span id="comments-description" class="text-gray-500"><span class="sr-only"> </span>(Original)</span>
                        </div>
                    </div>
                    <div class="relative flex items-start">
                        <div class="flex items-center h-5">
                        <input id="candidates" aria-describedby="candidates-description" name="candidates" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                        <label for="candidates" class="font-medium text-gray-700">Good Moral</label>
                        </div>
                    </div>
                    <div class="relative flex items-start">
                        <div class="flex items-center h-5">
                        <input id="offers" aria-describedby="offers-description" name="offers" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                        <label for="offers" class="font-medium text-gray-700">Card</label>
                        <span id="offers-description" class="text-gray-500"><span class="sr-only"></span>(Form 138)</span>
                        </div>
                    </div>
                    <div class="relative flex items-start">
                        <div class="flex items-center h-5">
                        <input id="offers" aria-describedby="offers-description" name="offers" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                        <label for="offers" class="font-medium text-gray-700">Form 137</label>
                        <span id="offers-description" class="text-gray-500"><span class="sr-only"></span>(Request in School)</span>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div v-else>
                <fieldset v-if="level == 'KTN'" class="space-y-5 ml-5">
                    <legend class="sr-only">Transferee</legend>
                    <div class="relative flex items-start">
                        <div class="flex items-center h-5">
                        <input id="candidates" aria-describedby="candidates-description" name="candidates" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                        <label for="candidates" class="font-medium text-gray-700">Certificate of Completion</label>
                        </div>
                    </div>
                    <div class="relative flex items-start">
                        <div class="flex items-center h-5">
                        <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                        <label for="comments" class="font-medium text-gray-700">PSA Birth Certificate</label>
                        <span id="comments-description" class="text-gray-500"><span class="sr-only"> </span>(Original)</span>
                        </div>
                    </div>
                </fieldset>
                <fieldset v-if="level == 'Grade_One'" class="space-y-5 ml-5">
                    <legend class="sr-only">Transferee</legend>
                    <div class="relative flex items-start">
                        <div class="flex items-center h-5">
                        <input id="candidates" aria-describedby="candidates-description" name="candidates" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                        <label for="candidates" class="font-medium text-gray-700">Certificate of Completion</label>
                        </div>
                    </div>
                    <div class="relative flex items-start">
                        <div class="flex items-center h-5">
                        <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                        <label for="comments" class="font-medium text-gray-700">PSA Birth Certificate</label>
                        <span id="comments-description" class="text-gray-500"><span class="sr-only"> </span>(Original)</span>
                        </div>
                    </div>
                    <div class="relative flex items-start">
                        <div class="flex items-center h-5">
                        <input id="candidates" aria-describedby="candidates-description" name="candidates" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                        <label for="candidates" class="font-medium text-gray-700">ECCD Checklist</label>
                        </div>
                    </div>
                    <div class="relative flex items-start">
                        <div class="flex items-center h-5">
                        <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                        <label for="comments" class="font-medium text-gray-700">Card</label>
                        <span id="comments-description" class="text-gray-500"><span class="sr-only"> </span>(Form 138)</span>
                        </div>
                    </div>
                </fieldset>
                <fieldset v-if="level == 'Grade_Seven'" class="space-y-5 ml-5">
                    <legend class="sr-only">Transferee</legend>
                    <div class="relative flex items-start">
                        <div class="flex items-center h-5">
                        <input id="candidates" aria-describedby="candidates-description" name="candidates" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                        <label for="candidates" class="font-medium text-gray-700">Certificate of Completion</label>
                        </div>
                    </div>
                    <div class="relative flex items-start">
                        <div class="flex items-center h-5">
                        <input id="candidates" aria-describedby="candidates-description" name="candidates" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                        <label for="candidates" class="font-medium text-gray-700">1x1 Picture</label>
                        </div>
                    </div>
                    <div class="relative flex items-start">
                        <div class="flex items-center h-5">
                        <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                        <label for="comments" class="font-medium text-gray-700">PSA Birth Certificate</label>
                        <span id="comments-description" class="text-gray-500"><span class="sr-only"> </span>(Original)</span>
                        </div>
                    </div>
                    <div class="relative flex items-start">
                        <div class="flex items-center h-5">
                        <input id="candidates" aria-describedby="candidates-description" name="candidates" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                        <label for="candidates" class="font-medium text-gray-700">Good Moral</label>
                        </div>
                    </div>
                    <div class="relative flex items-start">
                        <div class="flex items-center h-5">
                        <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                        <label for="comments" class="font-medium text-gray-700">Card</label>
                        <span id="comments-description" class="text-gray-500"><span class="sr-only"> </span>(Form 138)</span>
                        </div>
                    </div>
                    <div class="relative flex items-start">
                        <div class="flex items-center h-5">
                        <input id="offers" aria-describedby="offers-description" name="offers" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                        <label for="offers" class="font-medium text-gray-700">Form 137</label>
                        <span id="offers-description" class="text-gray-500"><span class="sr-only"></span>(Request in School)</span>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="pt-5">
            <div class="flex justify-end">
            <button type="button" @click="prevStep()" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Back</button>
            <button type="button" @click="nextStep()" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Proceed to Preview</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                type:'',
                level: ''
            }
        },
        methods: {
            nextStep() {
            this.$emit('next-step')
            },
            prevStep() {
                this.$emit('prev-step')
            }
        }
    }
</script>