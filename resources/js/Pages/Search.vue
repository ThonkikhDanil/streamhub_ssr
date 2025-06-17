<script setup lang="ts">
import Layout from '@/Layouts/Layout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps<{
	title: string;
	videos: Array<{
		id: number;
		title: string;
		description: string | null;
		preview: string | null;
		created_at: string;
		user?: {
			id: number;
			name: string;
		};
	}>;
}>();
</script>

<template>
	<Head :title="title" />
	<Layout>
		<template #title>
			{{ title }}
		</template>

		<div class="m-6 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
			<Link
				v-for="video in videos"
				:key="video.id"
				:href="route('videos.show', video.id)"
				class="overflow-hidden rounded-xl bg-[#D5F2F2] shadow dark:bg-[#010326]"
			>
				<img
					v-if="video.preview"
					:src="`/storage/${video.preview.replace('public/', '')}`"
					alt="preview"
					class="h-48 w-full object-cover"
				/>

				<div class="space-y-2 p-4">
					<h2
						class="text-xl font-semibold text-[#010326] dark:text-[#D5F2F2]"
					>
						{{ video.title }}
					</h2>
				</div>

				<div class="space-y-2 p-4">
					<h2
						class="text-sm font-semibold text-[#010326] dark:text-[#D5F2F2]"
					>
						{{ video.user?.name }}
					</h2>
				</div>
			</Link>
		</div>
	</Layout>
</template>
