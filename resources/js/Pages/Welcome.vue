<script setup lang="ts">
import Layout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
	title: {
		type: String,
	},
});
</script>

<template>
	<Head :title="title" />
	<Layout>
		<p class="m-4">Hello World!</p>
	</Layout>
</template>
