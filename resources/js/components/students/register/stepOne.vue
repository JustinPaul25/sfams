<template>
    <div>
        <p class="text-centered text-2xl text-gray-900 pt-2 font-bold">Personal Details</p>
        <div class="pt-3 sm:pt-2">
            <div role="group" aria-labelledby="label-notifications">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                    <div>
                        <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700" id="label-notifications">Student Department</div>
                    </div>
                    <div class="sm:col-span-2">
                        <div class="max-w-lg">
                            <div class="mt-4 space-y-4">
                                <div class="flex items-center">
                                    <input id="push-everything" name="push-notifications" v-model="form.department" value="ELEM" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                    <label for="push-everything" class="ml-3 block text-sm font-medium text-gray-700"> Elementary </label>
                                </div>
                                <div class="flex items-center">
                                    <input id="push-email" name="push-notifications" v-model="form.department" value="SRH" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                    <label for="push-email" class="ml-3 block text-sm font-medium text-gray-700"> Senior High </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-auto">
            <dl class="rounded-lg sm:grid sm:grid-cols-3">
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2">First Name</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.first_name" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="First Name">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2">Middle Name</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.middle_name" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Middle Name">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2">Last Name</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.last_name" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Last Name">
                        </div>
                    </div>
                </div>
            </dl>
            <dl class="rounded-lg sm:grid sm:grid-cols-3">
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2">Date of Birth</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.birth_date" type="date" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Date of Birth">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2">Place of Birth</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.birth_place" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Place of Birth">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2">Gender</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <select v-model="form.gender" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                <option value="" disabled selected>Select Gender</option>
                                <option value="1">Male</option>
                                <option value="0">Female</option>
                            </select>
                        </div>
                    </div>
                </div>
            </dl>
            <dl class="rounded-lg sm:grid sm:grid-cols-2">
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2">Grade to Enter</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <select v-model="form.grade_entered_id" type="date" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                <option value="" disabled>Select Grade Level</option>
                                <option v-for="level in levels" :value="level.id">{{ level.level }}</option>
                            </select>   
                        </div>
                    </div>
                </div>
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2">Mobile Number</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <masked-input mask="\+\63 (111) 111-1111" v-model="form.phone" placeholder="Phone Number" @input="rawVal = arguments[1]" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"/>
                        </div>
                    </div>
                </div>
            </dl>
            <dl class="rounded-lg sm:grid sm:grid-cols-3">
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2">Father's Name</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.father_name" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Father's Full Name">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col p-2 items-stretch">
                    <div class="flex self-center mt-auto mb-4">
                        <div class="flex items-center">
                            <input id="push-everything" name="push-notifications" v-model="form.father_is_deceased" value="0" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                            <label for="push-everything" class="ml-3 block text-sm font-medium text-gray-700"> Living </label>
                        </div>
                        <div class="flex items-center ml-5">
                            <input id="push-email" name="push-notifications" v-model="form.father_is_deceased" value="1" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                            <label for="push-email" class="ml-3 block text-sm font-medium text-gray-700"> Deceased </label>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2">Father's Contact Number</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <masked-input mask="\+\63 (111) 111-1111" v-model="form.father_phone" placeholder="Father's Phone Number" @input="rawVal = arguments[1]" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"/>
                        </div>
                    </div>
                </div>
            </dl>
            <dl class="rounded-lg sm:grid sm:grid-cols-3">
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2">Mother's Name</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.mother_name" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Mother's Full Name">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col p-2 items-stretch">
                    <div class="flex self-center mt-auto mb-4">
                        <div class="flex items-center">
                            <input id="push-everything" name="push-notifications" v-model="form.mother_is_deceased" value="0" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                            <label for="push-everything" class="ml-3 block text-sm font-medium text-gray-700"> Living </label>
                        </div>
                        <div class="flex items-center ml-5">
                            <input id="push-email" name="push-notifications" v-model="form.mother_is_deceased" value="1" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                            <label for="push-email" class="ml-3 block text-sm font-medium text-gray-700"> Deceased </label>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2">Mother's Contact Number</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <masked-input mask="\+\63 (111) 111-1111" v-model="form.mother_phone" placeholder="Mother's Phone Number" @input="rawVal = arguments[1]" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"/>
                        </div>
                    </div>
                </div>
            </dl>
            <dl class="rounded-lg sm:grid sm:grid-cols-2">
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2">Guardians's Name(If not living with parents)</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.guardian_name" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Guardians's Full Name">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2">Guardians's Contact Number</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <masked-input mask="\+\63 (111) 111-1111" v-model="form.guardian_phone" placeholder="Guardian's Phone Number" @input="rawVal = arguments[1]" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"/>
                        </div>
                    </div>
                </div>
            </dl>
            <p class="text-gray-900 text-xl pt-2">Current Address</p>
            <dl class="rounded-lg sm:grid sm:grid-cols-2">
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2">Purok/Street</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.purok_street" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Purok or Street">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2">Barangay</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.barangay" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Barangay">
                        </div>
                    </div>
                </div>
            </dl>
            <dl class="rounded-lg sm:grid sm:grid-cols-2">
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2">City</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.city" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="City">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2">Province</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.province" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Province">
                        </div>
                    </div>
                </div>
            </dl>
            <p class="text-gray-900 text-xl pt-2">Contact Person</p>
            <dl class="rounded-lg sm:grid sm:grid-cols-2">
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2">Name</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.contact_person" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Full Name">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2">Phone Number</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.contact_number" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Phone Number">
                        </div>
                    </div>
                </div>
            </dl>
        </div>
        <div class="pt-5">
            <div class="flex justify-end">
            <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Cancel</button>
            <button type="button" @click="nextStep()" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Proceed</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['levels'],
    data() {
        return {
            form: {
                department: '',
                first_name: '',
                middle_name: '',
                last_name: '',
                birth_date: '',
                birth_place: '',
                gender: '',
                grade_entered_id: '',
                phone: '',
                father_name: '',
                father_is_deceased: '',
                father_phone: '',
                mother_name: '',
                mother_is_deceased: '',
                mother_phone: '',
                guardian_name: '',
                guardian_phone: '',
                purok_street: '',
                barangay: '',
                city: '',
                province: ''
            }
        }
    },
    methods: {
        nextStep() {
            this.$emit('next-step')
        }
    }
}
</script>