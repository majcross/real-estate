<template>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
        <Box class="md:col-span-7 flex items-center w-full">
            <div class="w-full text-center font-medium text-gray-500">No images</div>
        </Box>

        <div class="md:col-span-5 flex flex-col gap-4">
            <Box>
                <template #header>
                Basic info
                </template>
                <Price :price="listing.price" class="text-2xl font-bold" />
                <ListingSpace :listing="listing" class="text-lg" />
                <ListingAddress :listing="listing" class="text-gray-500" />
            </Box>

            <Box>
                <template #header>
                Monthly Payment
                </template>
                <div>
                    <label class="label">Interest rate ({{ interestRate }}%)</label>
                    <input v-model.number="interestRate"
                    type="range" min="0.1" max="20" step="0.1"
                    class="w-full h-4 bg-gray-200 rounded appearance-none cursor-pointer dark:bg-gray-700">

                    <label class="label">Duration ({{ duration }} years)</label>
                    <input v-model.number="duration"
                     type="range" min="3" max="35" step="1"
                    class="w-full h-4 bg-gray-200 rounded appearance-none cursor-pointer dark:bg-gray-700">

                    <div class="text-gray-600 dark:text-gray-300 mt-2">
                        <div class="text-gray-400">
                            Your Monthly Payment
                            <Price :price="monthlyPayment" class="text-3xl"/>
                        </div>
                    </div>
                    <div class="mt-2 text-gray-500">
                        <div class="flex justify-between">
                            <div>Total Paid</div>
                            <div>
                                <Price :price="totalPaid" class="font-medium"/>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 text-gray-500">
                        <div class="flex justify-between">
                            <div>Principal Paid</div>
                            <div>
                                <Price :price="listing.price" class="font-medium"/>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 text-gray-500">
                        <div class="flex justify-between">
                            <div>Intreset Paid</div>
                            <div>
                                <Price :price="totalInterest" class="font-medium"/>
                            </div>
                        </div>
                    </div>
                </div>
            </Box>
        </div>
    </div>
</template>
<script setup>
import ListingAddress from '@/Components/ListingAddress.vue'
import ListingSpace from '@/Components/UI/ListingSpace.vue';
import Price from '@/Components/UI/Price.vue';
import Box from '@/Components/UI/Box.vue'
import { ref } from 'vue';
import {useMonthlyPayment} from '@/Composables/useMonthlyPayment'


const interestRate = ref(2.5)
const duration = ref(25)
const props = defineProps({
    listing:Object
})
   const {monthlyPayment, totalPaid, totalInterest} = useMonthlyPayment(props.listing.price, interestRate, duration)
// const monthlyPayment = computed(()=>{
//     const principle = props.listing.price
//     const monthlyInterest = interestRate.value/100/12
//     const numberOfPaymentMonths = duration.value*12

//     return principle * monthlyInterest * (Math.pow(1 + monthlyInterest, numberOfPaymentMonths)) / (Math.pow(1 + monthlyInterest, numberOfPaymentMonths) - 1)

// })
</script>
<script>

// import MainLayout from '../../Layouts/MainLayout.vue';
// export default {
//     layout: MainLayout
// }
</script>