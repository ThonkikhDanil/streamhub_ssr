<script setup lang="ts">
import Layout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';

interface Video {
	id: number;
	title: string;
	description: string | null;
	path: string;
	preview: string | null;
	mime_type: string;
}

defineProps<{
	video: Video;
	videoUrl: string;
}>();
</script>

<template>
	<Head :title="video.title" />
	<Layout>
		<template #title>
			{{ video.title }}
		</template>
		<video
			:src="videoUrl"
			controls
			preload="metadata"
			class="m-6 w-1/2 rounded-lg shadow-lg"
		>
			Your browser does not support the video tag.
		</video>
	</Layout>
</template>
