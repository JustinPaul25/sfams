<template>
    <div class="pt-8 min-h-screen bg-blue-100">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Notifications</h1>
                </div>
            </div>
            <div>
                <ul role="list" class="divide-y divide-gray-200">
                    <li v-for="nofication in notifications" class="relative bg-white py-5 px-4 hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                        <div class="flex justify-between space-x-3">
                        <div class="min-w-0 flex-1">
                            <a href="#" class="block focus:outline-none">
                            <span class="absolute inset-0" aria-hidden="true"></span> 
                            <p class="text-sm font-medium text-gray-900 truncate">{{ notifcation.user.name }}</p>
                            </a>
                        </div>
                        <time datetime="2021-01-27T16:35" class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">Time: {{ notification.created_at }}</time>
                        </div>
                        <div class="mt-1">
                            <p class="line-clamp-2 text-sm text-gray-600">{{ notification.action }}</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['logs']
    }
</script>
