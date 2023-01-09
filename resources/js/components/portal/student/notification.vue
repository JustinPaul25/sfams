<template>
    <div>
        <a href="/student-notifications" class="text-indigo-100 hover:bg-indigo-600 hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
            <span class="flex-1">Notification</span>
        </a>
    </div>
</template>

<script>
export default {
    data() {
        return {
            currentUrl: ''
        }
    },
    created() {
        this.currentUrl = window.location.href;
        window.Echo.private('notifyStud')
        .listen('NotifyStudent', (e) => {
            console.log(e)
        });
    },
}
</script>
