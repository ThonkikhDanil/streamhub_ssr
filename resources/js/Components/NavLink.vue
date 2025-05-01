<script setup lang="ts">
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps<{
    href: string;
    active?: boolean;
}>();

const static_classes =
    'flex items-center my-2 px-4 pt-3 pb-2 border-b-2 leading-5 transition duration-150 ease-in-out font-semibold hover:bg-[#116EBF] dark:hover:bg-[#1F82BF] focus:bg-[#116EBF] dark:focus:bg-[#1F82BF]';
const dynamic_classes = computed(() =>
    props.active
        ? 'border-indigo-400 dark:border-indigo-600 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-indigo-700'
        : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none',
);
</script>

<template>
    <Link :href="href" :class="static_classes + ' ' + dynamic_classes">
        <slot />
    </Link>
</template>
