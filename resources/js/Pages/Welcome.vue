<script setup lang="ts">
import Layout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';

defineProps<{
	title: string;
}>();
</script>

<template>
	<Head :title="title" />
	<Layout>
		<template #title>
			{{ title }}
		</template>

		<p class="m-4 dark:text-white">Hello World!</p>
	</Layout>
</template>
