<template>
    <div class="min-h-screen">
        <p class="text-centered text-2xl text-gray-900 pt-2 font-bold">Last School Attended</p>
        <div class="pt-3 sm:pt-2">
            <div class="mx-auto">
                <dl class="rounded-lg sm:grid sm:grid-cols-1">
                    <div class="flex flex-col p-1">
                        <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2"><span style="color:#ff0000">*</span>Name</dt>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="relative inline-block text-gray-700 w-full">
                                <input v-model="form.last_school_attended" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="School Name">
                            </div>
                        </div>
                    </div>
                </dl>
                <dl class="rounded-lg sm:grid sm:grid-cols-1">
                    <div class="flex flex-col p-1">
                        <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2"><span style="color:#ff0000">*</span>Address</dt>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="relative inline-block text-gray-700 w-full">
                                <input v-model="form.last_school_address" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="School Address">
                            </div>
                        </div>
                    </div>
                </dl>
                <dl class="rounded-lg sm:grid sm:grid-cols-2">
                    <div class="flex flex-col p-2">
                        <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2"><span style="color:#ff0000">*</span>Grade Level</dt>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="relative inline-block text-gray-700 w-full">
                                <select v-model="form.last_school_grade_section" type="date" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                    <option value="" disabled>Select Grade Level</option>
                                    <option v-for="level in levels" :value="level.level">{{ level.level }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col p-2">
                        <dt class="mt-2 text-lg leading-6 font-medium text-gray-700 ml-2"><span style="color:#ff0000">*</span>School Year</dt>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="relative inline-block text-gray-700 w-full">
                                <masked-input v-model="form.last_school_school_year" mask="1111-1111" type="text" placeholder="School Year" @input="rawVal = arguments[1]" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" />
                            </div>
                        </div>
                    </div>
                </dl>
            </div>
        </div>
        <div class="pt-5">
            <div class="flex justify-end">
            <button type="button" @click="prevStep()" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Back</button>
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
                last_school_attended: '',
                last_school_address: '',
                last_school_grade_section: '',
                last_school_school_year: ''
            }
        }
    },
    methods: {
        nextStep() {
            if(this.checkInputs()) {
                this.$emit('next-step', this.form)
            }
        },
        prevStep() {
            this.$emit('prev-step')
        },
        checkInputs() {
            var isCleared = true;
            if(this.form.last_school_attended === '') {
                this.required.push("School Name is Required.")
                var isCleared = false;
            }
            if(this.form.last_school_address === '') {
                this.required.push("School Address is Required.")
                var isCleared = false;
            }
            if(this.form.last_school_grade_section === '') {
                this.required.push("Grade and Section is Required.")
                var isCleared = false;
            }
            if(this.form.last_school_school_year === '') {
                this.required.push("School Year is Required.")
                var isCleared = false;
            }
            return isCleared;
        }
    }
}
</script>
