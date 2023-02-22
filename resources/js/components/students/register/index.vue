<template>
    <div class="p-8 bg-blue-100">
        <form class="space-y-8 divide-y divide-gray-200">
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div>
                <div>
                    <h3 class="text-2xl leading-6 font-medium text-gray-900">Student Information Form</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Please make sure to fill the required fields.</p>
                </div>

                <nav aria-label="Progress" class="mt-2 p-2 rounded bg-white">
                    <ol role="list" class="space-y-4 md:flex md:space-y-0 md:space-x-8">
                        <li class="md:flex-1">
                        <!-- Completed Step -->
                            <a class="group pl-4 py-2 flex flex-col border-l-4 border-blue-600 hover:border-blue-800 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
                                <span class="text-xs text-blue-600 font-semibold tracking-wide uppercase group-hover:text-blue-800">Step 1</span>
                                <span class="text-sm font-medium">Personal details</span>
                            </a>
                        </li>

                        <li class="md:flex-1">
                        <!-- Current Step -->
                            <a v-if="step > 1" class="pl-4 py-2 flex flex-col border-l-4 border-blue-600 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4" aria-current="step">
                                <span class="text-xs text-blue-600 font-semibold tracking-wide uppercase group-hover:text-gray-700">Step 2</span>
                                <span class="text-sm font-medium">School Last Attended</span>
                            </a>
                            <a v-else class="group pl-4 py-2 flex flex-col border-l-4 border-gray-200 hover:border-gray-300 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4" aria-current="step">
                                <span class="text-xs text-gray-500 font-semibold tracking-wide uppercase">Step 2</span>
                                <span class="text-sm font-medium">School Last Attended</span>
                            </a>
                        </li>

                        <!-- <li class="md:flex-1">
                            <a v-if="step > 2" class="pl-4 py-2 flex flex-col border-l-4 border-blue-600 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4" aria-current="step">
                                <span class="text-xs text-blue-600 font-semibold tracking-wide uppercase group-hover:text-gray-700">Step 3</span>
                                <span class="text-sm font-medium">Admission Officer</span>
                            </a>
                            <a v-else class="group pl-4 py-2 flex flex-col border-l-4 border-gray-200 hover:border-gray-300 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
                                <span class="text-xs text-gray-500 font-semibold tracking-wide uppercase group-hover:text-gray-700">Step 3</span>
                                <span class="text-sm font-medium">Admission Officer</span>
                            </a>
                        </li> -->

                        <li class="md:flex-1">
                        <!-- Upcoming Step -->
                            <a v-if="step > 3" class="pl-4 py-2 flex flex-col border-l-4 border-blue-600 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4" aria-current="step">
                                <span class="text-xs text-blue-600 font-semibold tracking-wide uppercase group-hover:text-gray-700">Step 3</span>
                                <span class="text-sm font-medium">Preview</span>
                            </a>
                            <a v-else class="group pl-4 py-2 flex flex-col border-l-4 border-gray-200 hover:border-gray-300 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
                                <span class="text-xs text-gray-500 font-semibold tracking-wide uppercase group-hover:text-gray-700">Step 3</span>
                                <span class="text-sm font-medium">Preview</span>
                            </a>
                        </li>
                    </ol>
                </nav>
                <step-one v-if="step == 1" :levels="levels" :branches="branches" @next-step="nextStepTwo"></step-one>
                <step-two v-if="step == 2" @prev-step="prevStep" :levels="levels" @next-step="nextStepFour"></step-two>
                <step-three v-if="step == 3" @prev-step="prevStep" @next-step="nextStepFour"></step-three>
                <step-four v-if="step == 4" :levels="levels" @prev-step="prevStep" :form="form"></step-four>
            </div>
        </div>
        </form>
    </div>
</template>

<script>

import StepFour from './stepFour.vue'
import StepOne from './stepOne.vue'
import StepThree from './stepThree.vue'
import StepTwo from './stepTwo.vue'

export default {
    components: { StepOne, StepTwo, StepThree, StepFour },
    props: ['levels', 'branches'],
    data() {
        return {
            step: 1,
            form: {}
        };
    },
    methods: {
        incStep(inc) {
            this.step = this.step + inc
        },
        prevStep() {
            if(this.step === 4) {
                if(this.form.grade_entered_id === 1) {
                    this.step = this.step - 3
                } else {
                    this.step -= 1
                }
            } else {
                this.step -= 1
            }
        },
        nextStepTwo(form) {
            this.form = form
            if(form.grade_entered_id === 1) {
                this.form.last_school_attended = 'N/A'
                this.form.last_school_address = 'N/A'
                this.form.last_school_grade_section = 'N/A'
                this.form.last_school_school_year = 'N/A'
                this.incStep(3)
            } else {
                this.incStep(1)
            }
        },
        nextStepThree(form) {
            this.form.last_school_attended = form.last_school_attended
            this.form.last_school_address = form.last_school_address
            this.form.last_school_grade_section = form.last_school_grade_section
            this.form.last_school_school_year = form.last_school_school_year
            this.incStep()
        },
        nextStepFour(form) {
            this.form.last_school_attended = form.last_school_attended
            this.form.last_school_address = form.last_school_address
            this.form.last_school_grade_section = form.last_school_grade_section
            this.form.last_school_school_year = form.last_school_school_year
            this.incStep(2)
        }
    }
}
</script>
