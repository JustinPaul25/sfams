<template>
    <div style="z-index: 9900" v-show="isLoading" class="w-full h-full fixed block top-0 left-0 bg-white opacity-75">
        <div class="block h-0 items-baseline my-0 opacity-75 relative space-x-2.5 text-center text-theme-purple top-1/2">
            <div :class="$grid.breakpoint == '' ? 'loading-spinner-mobile' : 'mx-auto'" >
              <!-- <i class="fas fa-circle-notch fa-spin fa-5x"></i> -->
                <svg class="spinner-svg font-black w-20 h-20 animate-spin text-theme-purple" aria-hidden="true" data-prefix="fas" data-icon="circle-notch" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M288 39.056v16.659c0 10.804 7.281 20.159 17.686 23.066C383.204 100.434 440 171.518 440 256c0 101.689-82.295 184-184 184-101.689 0-184-82.295-184-184 0-84.47 56.786-155.564 134.312-177.219C216.719 75.874 224 66.517 224 55.712V39.064c0-15.709-14.834-27.153-30.046-23.234C86.603 43.482 7.394 141.206 8.003 257.332c.72 137.052 111.477 246.956 248.531 246.667C393.255 503.711 504 392.788 504 256c0-115.633-79.14-212.779-186.211-240.236C302.678 11.889 288 23.456 288 39.056z"/>
                </svg>
            </div>
            <div v-if="message" class="text-theme-purple text-2xl">
                {{ __(message) }}
            </div>
        </div>
      </div>
</template>

<script>
    export default {
        props: {
            isLoading: Boolean,
            message: String
        },
    }
</script>

<style>
    .loading-spinner-mobile {
        margin-left: 42%;
        margin-right: 50%;
    }
</style>
