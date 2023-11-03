<template>
    <div>
        <ListingAddress :listing="listing"/>
    </div>
</template>
<script setup>
defineProps({
    listing:Object
})
</script>
<script>
import ListingAddress from '@/Components/ListingAddress.vue'
// import MainLayout from '../../Layouts/MainLayout.vue';
// export default {
//     layout: MainLayout
// }
</script>