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

		<div class="py-12">
			<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
				<div
					class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg"
				>
					<div class="p-6 text-gray-900 dark:text-gray-100">
						Вы вошли в аккаунт!
					</div>
				</div>
			</div>
		</div>
	</Layout>
</template>
