<template>
    <Box>
            <div>
                <Link :href="route('listing.show', {listing: listing.id})">
                    <div class="flex items-center">
                        <Price :price="listing.price" />
                        <div class="text-xs text-gray-500 gap-1">
                            <Price :price="monthlyPayment"/> pm
                        </div>
                    </div>
                    <ListingSpace :listing="listing" class="text-lg"/>
                    <ListingAddress :listing="listing" class="text-gray"/>
                </Link>
            </div>
            <div>
                <Link :href="route('listing.edit', {listing: listing.id})">Edit</Link>
            </div>
            <div>
                <Link :herf="route('listing.destroy', {listing: listing.id})" method="DELETE" as="button">DELETE</Link>
            </div>
        </Box>
</template>
<script setup>
    import ListingAddress from '@/Components/ListingAddress.vue'
    import Box from '@/Components/UI/Box.vue'
    import ListingSpace from '@/Components/UI/ListingSpace.vue';
    import Price from '@/Components/UI/Price.vue';
    import {Link} from '@inertiajs/vue3'
    import { useMonthlyPayment } from '@/Composables/useMonthlyPayment'
    const props = defineProps({listing: Object})
    const {monthlyPayment} = useMonthlyPayment(
        props.listing.price, 2.5, 25)
</script>