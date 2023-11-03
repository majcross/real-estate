<template>
    &nbsp;
    <Link href="/listing/create">Create New List</Link>
    <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div class="text-lg font-medium">
                    <Link :href="route('listing.index')">Listing</Link></div>
                <div>x</div>
                <div>x</div>
            </nav>
        </div>
    </header>
    <!-- <div>
        The page with a time {{ timer }}
    </div> -->
    <div v-if="flashSuccess " class="success">
        {{flashSuccess  }}
    </div>
    <!-- <div>
        {{ y }}
    </div> -->
    <slot>Default</slot>
</template>
<script setup>
    import {Link, usePage} from '@inertiajs/vue3'
    import { computed } from '@vue/reactivity';
    // page.props.flash.success
    // const x = ref(0)
    // const y = computed(() => x.value * 2)
    const page = usePage()
    const flashSuccess = computed(() => page.props.flash.success)

    // import { ref } from 'vue'

    // const timer = ref(0)
    // setInterval(() => {
    //  timer.value++   
    // }, 1000);
</script>
<style scoped>
    .success{
        background-color: green;
        color: white;
    }
</style>