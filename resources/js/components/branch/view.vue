<template>
    <div class="pt-8 min-h-screen bg-blue-100">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6 flex">
                <div>
                    <h3 class="text-2xl leading-6 font-medium text-blue-700 flex place-self-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                </svg>{{ branch.name }}</h3>
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
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                            </svg>
                        </div>
                    </div>
                    <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">{{ student.grades[0].average }}</h1>
                    <div class="flex flex-row justify-between group-hover:text-gray-200">
                    <p>Number of Students</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['branch']
    }
</script>