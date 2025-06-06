<script setup lang="ts">
import Layout from '@/Layouts/Layout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps<{
	title: string;
	videos: {
		data: Array<{
			id: number;
			title: string;
			description: string | null;
			preview: string | null;
			created_at: string;
		}>;
	};
}>();
</script>

<template>
	<Head :title="title" />
	<Layout>
		<template #title>
			{{ title }}
		</template>

		<div class="py-12">
			<div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
				<div
					class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8"
				>
					<div
						v-if="videos.data.length === 0"
						class="flex items-center text-base font-semibold leading-tight text-gray-800 dark:text-gray-200"
					>
						<div class="mr-4">У вас пока нет видео.</div>
					</div>
					<div
						v-else
						class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3"
					>
						<div
							v-for="video in videos.data"
							:key="video.id"
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
								<p class="line-clamp-3 text-sm text-gray-600">
									{{ video.description || 'Без описания' }}
								</p>

								<div class="mt-4 flex justify-between text-sm">
									<Link
										:href="`/videos/${video.id}`"
										class="text-blue-500 hover:underline"
									>
										Смотреть
									</Link>
									<Link
										:href="route('videos.show', video.id)"
										class="text-yellow-500 hover:underline"
									>
										Редактировать
									</Link>
								</div>
							</div>
						</div>
					</div>
				</div>
				<Link
					:href="route('videos.create')"
					class="mt-4 block w-36 rounded-sm bg-yellow-300 p-2 text-gray-200 dark:text-gray-800"
				>
					Загрузить видео
				</Link>
			</div>
		</div>
	</Layout>
</template>
