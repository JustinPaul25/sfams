<template>
    <div class="p-10 bg-blue-100">
        <div class="border-b border-blue-700 dark:border-gray-700 mb-4">
            <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button @click="selected = 'student'" :class="selected == 'student' ? 'bg-blue-700 text-white' : 'text-blue-700'" class="inline-block hover:opacity-75 hover:border-blue-700 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300" type="button" role="tab" aria-controls="student" aria-selected="false">Student</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button @click="selected = 'branch'" :class="selected == 'branch' ? 'bg-blue-700 text-white' : 'text-blue-700'" class="inline-block hover:opacity-75 hover:border-blue-700 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300 active" type="button" role="tab" aria-controls="branch" aria-selected="true">Branch</button>
                </li>
            </ul>
        </div>
        <div>
            <Student v-if="selected === 'student'"></Student>
            <Branch v-if="selected === 'branch'"></Branch>
        </div>
    </div>
</template>

<script>
    import Student from "./student.vue";
    import Branch from "./branch.vue";

    export default {
        components: {
            Student,
            Branch
        },
        data() {
            return {
                selected: 'student'
            }
        }
    }
</script>