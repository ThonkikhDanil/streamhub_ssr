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

		<div class="pb-12">
			<div
				class="mx-3 my-4 grid grid-cols-1 gap-4 sm:mx-4 sm:my-6 sm:gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"
			>
				<Link
					v-for="video in videos"
					:key="video.id"
					:href="route('videos.show', video.id)"
					class="group overflow-hidden rounded-xl bg-[#D5F2F2] shadow-md transition-all duration-200 hover:shadow-lg active:scale-[0.98] dark:bg-[#010326] sm:rounded-2xl"
				>
					<!-- Контейнер изображения с правильным соотношением сторон -->
					<div
						class="relative aspect-video w-full overflow-hidden bg-gray-200 dark:bg-gray-700"
					>
						<img
							v-if="video.preview"
							:src="`/storage/${video.preview.replace('public/', '')}`"
							alt="preview"
							class="h-full w-full object-cover transition-transform duration-200 group-hover:scale-105"
						/>
						<!-- Плейсхолдер для видео без превью -->
						<div
							v-else
							class="flex h-full w-full items-center justify-center bg-gray-300 dark:bg-gray-600"
						>
							<svg
								class="h-12 w-12 text-gray-400"
								fill="none"
								stroke="currentColor"
								viewBox="0 0 24 24"
							>
								<path
									stroke-linecap="round"
									stroke-linejoin="round"
									stroke-width="2"
									d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"
								></path>
							</svg>
						</div>
					</div>

					<!-- Контент карточки с улучшенными отступами -->
					<div class="p-3 sm:p-4">
						<!-- Заголовок видео -->
						<h2
							class="mb-2 line-clamp-2 text-base font-semibold leading-tight text-[#010326] dark:text-[#D5F2F2] sm:text-lg"
						>
							{{ video.title }}
						</h2>

						<!-- Информация об авторе -->
						<div class="flex items-center justify-between">
							<p
								class="text-xs text-gray-600 dark:text-gray-400 sm:text-sm"
							>
								{{ video.user?.name || 'Неизвестный автор' }}
							</p>
							<!-- Дата создания (скрыта на очень маленьких экранах) -->
							<span
								class="hidden text-xs text-gray-500 dark:text-gray-500 sm:inline"
							>
								{{
									new Date(
										video.created_at,
									).toLocaleDateString('ru-RU', {
										day: 'numeric',
										month: 'short',
									})
								}}
							</span>
						</div>
					</div>
				</Link>
			</div>

			<div
				v-if="videos.length === 0"
				class="flex flex-col items-center justify-center py-12 text-center"
			>
				<svg
					class="mb-4 h-16 w-16 text-gray-400"
					fill="none"
					stroke="currentColor"
					viewBox="0 0 24 24"
				>
					<path
						stroke-linecap="round"
						stroke-linejoin="round"
						stroke-width="2"
						d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"
					></path>
				</svg>
				<h3
					class="mb-2 text-lg font-medium text-gray-900 dark:text-gray-100"
				>
					Видео не найдены
				</h3>
				<p class="text-sm text-gray-500 dark:text-gray-400">
					Пока что здесь нет видео для отображения
				</p>
			</div>
		</div>
	</Layout>
</template>
