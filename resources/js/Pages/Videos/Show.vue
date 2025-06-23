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

		<div class="pb-12">
			<div
				class="mx-3 my-4 sm:mx-6 sm:my-8 lg:mx-8 xl:mx-auto xl:max-w-6xl"
			>
				<!-- Видеоплеер с адаптивным размером -->
				<div
					class="relative mb-4 overflow-hidden rounded-lg shadow-lg sm:mb-6 sm:rounded-xl lg:shadow-xl"
				>
					<video
						:src="videoUrl"
						controls
						preload="metadata"
						class="h-auto w-full bg-black"
						controlsList="nodownload"
						:poster="
							video.preview
								? `/storage/${video.preview.replace('public/', '')}`
								: undefined
						"
					>
						<p
							class="p-4 text-center text-gray-600 dark:text-gray-400"
						>
							Ваш браузер не поддерживает воспроизведение видео.
						</p>
					</video>
				</div>

				<!-- Информация о видео -->
				<div class="space-y-4 sm:space-y-6">
					<!-- Заголовок -->
					<!-- <div class="border-b border-gray-200 pb-4 dark:border-gray-700">
						<h1
							class="text-xl font-bold leading-tight text-gray-900 dark:text-white sm:text-2xl lg:text-3xl"
						>
							{{ video.title }}
						</h1>
					</div> -->

					<!-- Описание видео -->
					<div
						class="rounded-lg bg-gray-50 p-4 dark:bg-gray-800 sm:p-6"
					>
						<h2
							class="mb-3 text-lg font-semibold text-gray-900 dark:text-white"
						>
							Описание
						</h2>
						<p
							class="whitespace-pre-wrap text-sm leading-relaxed text-gray-700 dark:text-gray-300 sm:text-base"
						>
							{{
								video.description
									? video.description
									: 'Описание отсутствует'
							}}
						</p>
					</div>

					<!-- Техническая информация -->
					<div
						class="rounded-lg border border-gray-200 bg-white p-4 dark:border-gray-700 dark:bg-gray-900 sm:p-6"
					>
						<h2
							class="mb-4 text-lg font-semibold text-gray-900 dark:text-white"
						>
							Информация о файле
						</h2>
						<div
							class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3"
						>
							<!-- Тип файла -->
							<div class="flex items-center space-x-3">
								<div
									class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-100 dark:bg-blue-900"
								>
									<svg
										class="h-4 w-4 text-blue-600 dark:text-blue-400"
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
								<div>
									<p
										class="text-xs text-gray-500 dark:text-gray-400"
									>
										Тип файла
									</p>
									<p
										class="text-sm font-medium text-gray-900 dark:text-white"
									>
										{{ video.mime_type }}
									</p>
								</div>
							</div>

							<!-- ID видео -->
							<div class="flex items-center space-x-3">
								<div
									class="flex h-8 w-8 items-center justify-center rounded-full bg-green-100 dark:bg-green-900"
								>
									<svg
										class="h-4 w-4 text-green-600 dark:text-green-400"
										fill="none"
										stroke="currentColor"
										viewBox="0 0 24 24"
									>
										<path
											stroke-linecap="round"
											stroke-linejoin="round"
											stroke-width="2"
											d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"
										></path>
									</svg>
								</div>
								<div>
									<p
										class="text-xs text-gray-500 dark:text-gray-400"
									>
										ID
									</p>
									<p
										class="text-sm font-medium text-gray-900 dark:text-white"
									>
										#{{ video.id }}
									</p>
								</div>
							</div>

							<!-- Статус превью -->
							<div class="flex items-center space-x-3">
								<div
									class="flex h-8 w-8 items-center justify-center rounded-full"
									:class="
										video.preview
											? 'bg-green-100 dark:bg-green-900'
											: 'bg-gray-100 dark:bg-gray-800'
									"
								>
									<svg
										class="h-4 w-4"
										:class="
											video.preview
												? 'text-green-600 dark:text-green-400'
												: 'text-gray-400'
										"
										fill="none"
										stroke="currentColor"
										viewBox="0 0 24 24"
									>
										<path
											stroke-linecap="round"
											stroke-linejoin="round"
											stroke-width="2"
											d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
										></path>
									</svg>
								</div>
								<div>
									<p
										class="text-xs text-gray-500 dark:text-gray-400"
									>
										Превью
									</p>
									<p
										class="text-sm font-medium"
										:class="
											video.preview
												? 'text-green-600 dark:text-green-400'
												: 'text-gray-500 dark:text-gray-400'
										"
									>
										{{ video.preview ? 'Есть' : 'Нет' }}
									</p>
								</div>
							</div>
						</div>
					</div>

					<!-- Действия с видео -->
					<!-- <div
						class="flex flex-col space-y-3 sm:flex-row sm:space-x-4 sm:space-y-0"
					>
						<button
							type="button"
							class="flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 active:bg-blue-800 dark:focus:ring-offset-gray-900"
						>
							<svg
								class="mr-2 h-4 w-4"
								fill="none"
								stroke="currentColor"
								viewBox="0 0 24 24"
							>
								<path
									stroke-linecap="round"
									stroke-linejoin="round"
									stroke-width="2"
									d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"
								></path>
							</svg>
							Поделиться
						</button>

						<button
							type="button"
							class="flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 dark:focus:ring-offset-gray-900"
						>
							<svg
								class="mr-2 h-4 w-4"
								fill="none"
								stroke="currentColor"
								viewBox="0 0 24 24"
							>
								<path
									stroke-linecap="round"
									stroke-linejoin="round"
									stroke-width="2"
									d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
								></path>
							</svg>
							Добавить в избранное
						</button>
					</div> -->
				</div>
			</div>
		</div>
	</Layout>
</template>
