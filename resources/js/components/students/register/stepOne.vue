<template>
    <div>
        <div v-if="required.length > 0" class="rounded-md bg-red-50 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                <!-- Heroicon name: solid/x-circle -->
                <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
                </div>
                <div class="ml-3">
                <h3 class="text-sm font-medium text-red-800">There were {{ required.length }} errors with your submission</h3>
                <div class="mt-2 text-sm text-red-700">
                    <ul role="list" class="list-disc pl-5 space-y-1">
                        <li v-for="message in required">{{ message }}</li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
        <p class="text-centered text-2xl text-gray-900 pt-2 font-bold">Personal Details</p>
        <div class="pt-3 sm:pt-2">
            <div role="group" aria-labelledby="label-notifications">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                    <div>
                        <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700" id="label-notifications">Student Department</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-auto">
            <dl>
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2"><span style="color:#ff0000">*</span>Branch</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <select v-model="form.branch" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                <option value="" disabled selected>Select Branch</option>
                                <option v-for="branch in branches" :value="branch.id">{{ branch.name }} - {{ branch.address }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </dl>
        </div>
        <div class="mx-auto">
            <dl class="rounded-lg sm:grid sm:grid-cols-3">
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2"><span style="color:#ff0000">*</span>First Name</dt>
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
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2"><span style="color:#ff0000">*</span>Last Name</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.last_name" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Last Name">
                        </div>
                    </div>
                </div>
            </dl>
            <dl class="rounded-lg sm:grid sm:grid-cols-3">
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2"><span style="color:#ff0000">*</span>Date of Birth</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.birth_date" type="date" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Date of Birth">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2"><span style="color:#ff0000">*</span>Place of Birth</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.birth_place" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Place of Birth">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2"><span style="color:#ff0000">*</span>Gender</dt>
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
            <dl class="rounded-lg sm:grid sm:grid-cols-3">
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2"><span style="color:#ff0000">*</span>Grade to Enter</dt>
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
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2"><span style="color:#ff0000">*</span>Mobile Number</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <masked-input mask="\+\63 (111) 111-1111" v-model="form.phone" placeholder="Phone Number" @input="rawVal = arguments[1]" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"/>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2"><span style="color:#ff0000">*</span>Email</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input type="email" v-model="form.email" placeholder="Email" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                        </div>
                    </div>
                </div>
            </dl>
            <dl class="rounded-lg sm:grid sm:grid-cols-2">
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2">Father First Name</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.father_name" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Father's Full Name">
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
            <dl class="rounded-lg sm:grid sm:grid-cols-2">
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2">Mother First Name</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.mother_name" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Mother's Full Name">
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
            <p class="text-gray-900 text-xl pt-2">Contact Person</p>
            <dl class="rounded-lg sm:grid sm:grid-cols-2">
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2"><span style="color:#ff0000">*</span>Name</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.contact_person" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Full Name">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2"><span style="color:#ff0000">*</span>Phone Number</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <masked-input v-model="form.contact_person_number" mask="\+\63 (111) 111-1111" type="text" placeholder="Phone Number" @input="rawVal = arguments[1]" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" />
                        </div>
                    </div>
                </div>
            </dl>
            <p class="text-gray-900 text-xl pt-2">Current Address</p>
            <span class="text-sm font-bold" style="color:#ff0000">Put N/A or None if nothing to input</span>
            <dl class="rounded-lg sm:grid sm:grid-cols-2">
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2"><span style="color:#ff0000">*</span>Purok/Street</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.purok_street" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Purok or Street">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2"><span style="color:#ff0000">*</span>Barangay</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.barangay" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Barangay">
                        </div>
                    </div>
                </div>
            </dl>
            <dl class="rounded-lg sm:grid sm:grid-cols-2">
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2"><span style="color:#ff0000">*</span>City</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.city" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="City">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col p-2">
                    <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2"><span style="color:#ff0000">*</span>Province</dt>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative inline-block text-gray-700 w-full">
                            <input v-model="form.province" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Province">
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
    props: ['levels', 'branches'],
    data() {
        return {
            required: [],
            form: {
                first_name: '',
                middle_name: '',
                last_name: '',
                birth_date: '',
                birth_place: '',
                gender: '',
                grade_entered_id: '',
                phone: '',
                email: '',
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
                province: '',
                contact_person: '',
                contact_person_number: '',
                last_school_attended: '',
                last_school_address: '',
                last_school_grade_section: '',
                last_school_school_year: '',
                branch: ''
            }
        }
    },
    methods: {
        async nextStep() {
            if(this.checkInputs()) {
                this.$emit('next-step', this.form)
            } else {
                window.scrollTo(0,0);
            }
        },
        checkInputs() {
            var isCleared = true;
            if(this.form.branch === '') {
                this.required.push("Branch Is Required.")
                var isCleared = false;
            }
            if(this.form.first_name === '') {
                this.required.push("Student First Name Is Required.")
                var isCleared = false;
            }
            if(this.form.last_name === '') {
                this.required.push("Student Last Name Is Required.")
                var isCleared = false;
            }
            if(this.form.birth_date === '') {
                this.required.push("Student Birth Date Is Required.")
                var isCleared = false;
            }
            if(this.form.birth_place === '') {
                this.required.push("Student Birth Place Is Required.")
                var isCleared = false;
            }
            if(this.form.birth_place === '') {
                this.required.push("Student Gender Is Required.")
                var isCleared = false;
            }
            if(this.form.grade_entered_id === '') {
                this.required.push("Student Grade Entered Is Required.")
                var isCleared = false;
            }
            if(this.form.phone === '') {
                this.required.push("Student Phone Is Required.")
                var isCleared = false;
            }
            if(this.form.mother_name === '' && this.form.father_name === '') {
                this.required.push("Please add Mother and Father first names. Or type N/A if none")
            }
            if(this.form.mother_phone === '' && this.form.father_phone === '') {
                this.required.push("Please add Mother and Father contact number. Or type N/A if none")
            }
            if(this.form.purok_street === '') {
                this.required.push("Purok or Street is empty please add N/A or None")
            }
            if(this.form.barangay === '') {
                this.required.push("Barangay is required")
            }
            if(this.form.city === '') {
                this.required.push("City is required")
            }
            if(this.form.province === '') {
                this.required.push("Province is required")
            }
            if(this.form.contact_person === '') {
                this.required.push("Contact Person is required")
            }
            if(this.form.contact_person_number === '') {
                this.required.push("Contact Person Number is required")
            }
            if(this.form.email === '') {
                this.required.push("Email is required")
            }
            return isCleared
        },
    }
}
</script>
