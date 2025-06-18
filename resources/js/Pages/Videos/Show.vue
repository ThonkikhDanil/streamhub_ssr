<script setup lang="ts">
import Layout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';
import 'vidstack/bundle';
import 'vidstack/icons';

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
		<!-- <media-player
			.title="video.title"
			.src="videoUrl"
			load="visible"
			poster-load="visible"
			playsInline
			class="m-6 w-80 rounded-lg shadow-lg"
		>
			<media-provider>
				<media-play-button
					class="group relative inline-flex h-10 w-10 cursor-pointer items-center justify-center rounded-md outline-none ring-inset ring-sky-400 hover:bg-white/20 data-[focus]:ring-4"
				>
					<media-icon
						type="play"
						class="hidden h-8 w-8 group-data-[paused]:block"
					></media-icon>
					<media-icon
						type="pause"
						class="h-8 w-8 group-data-[paused]:hidden"
					></media-icon>
				</media-play-button>
			</media-provider>
		</media-player> -->
	</Layout>
</template>
