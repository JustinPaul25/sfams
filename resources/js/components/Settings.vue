<template>
    <div>
        <nav class="flex border-b border-gray-100 text-sm font-medium">
            <button v-if="!checkRole()" @click="selected = 1" :class="selected === 1 ? 'border-current text-blue-500' : 'hover:text-blue-500 border-transparent text-gray-800'" class="-mb-px border-b p-4 font-semibold">
                Student Fee Utility
            </button>

            <button v-if="checkRole()" @click="selected = 2" :class="selected === 2 ? 'border-current text-blue-500' : 'hover:text-blue-500 border-transparent text-gray-800'" class="-mb-px border-b p-4 font-semibold">
                Branch Fee Utility
            </button>

            <button v-if="checkRole()" @click="selected = 3" :class="selected === 3 ? 'border-current text-blue-500' : 'hover:text-blue-500 border-transparent text-gray-800'" class="-mb-px border-b p-4 font-semibold">
                School Year Utility
            </button>
        </nav>
        <div>
            <Student v-if="selected === 1"></Student>
            <Branch v-if="selected === 2"></Branch>
            <SchoolYear v-if="selected === 3"></SchoolYear>
        </div>
    </div>
</template>

<script>
import Student from "./utilities/student.vue";
import Branch from "./utilities/branch.vue";
import SchoolYear from "./utilities/SchoolYear.vue";

export default {
    components: {
        Student,
        Branch,
        SchoolYear
    },
    data() {
        return {
            selected: 1
        }
    },
    methods: {
        checkRole() {
            return this.app.is_admin
        }
    }
}
</script>
