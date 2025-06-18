<script setup lang="ts">
import FileInput from '@/Components/FileInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Layout from '@/Layouts/Layout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps<{
	title: string;
	status?: string;
}>();

const form = useForm({
	title: '',
	description: '',
	video: null as File | null,
	preview: null as File | null,
});

const onVideoSelected = (file: File) => {
	if (!form.title) {
		const nameWithoutExt = file.name.replace(/\.[^/.]+$/, '');
		form.title = nameWithoutExt;
	}
};

function submit() {
	form.post(route('videos.store'), {
		preserveScroll: true,
	});
}
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
						v-if="status"
						class="mb-4 text-sm font-medium text-green-600"
					>
						{{ status }}
					</div>
					<form
						@submit.prevent="submit"
						enctype="multipart/form-data"
					>
						<div>
							<InputLabel for="title" value="Title" />

							<TextInput
								id="title"
								type="text"
								class="mt-1 block w-full"
								v-model="form.title"
								required
								autofocus
							/>

							<InputError
								class="mt-2"
								:message="form.errors.title"
							/>
						</div>

						<div class="mt-4">
							<InputLabel for="description" value="Description" />

							<TextInput
								id="description"
								type="text"
								class="mt-1 block w-full"
								v-model="form.description"
								autofocus
							/>

							<InputError
								class="mt-2"
								:message="form.errors.description"
							/>
						</div>

						<div class="mt-4">
							<FileInput
								v-model="form.video"
								@file-selected="onVideoSelected"
							/>

							<InputError
								class="mt-2"
								:message="form.errors.video"
							/>
						</div>

						<div class="mt-4">
							<FileInput v-model="form.preview" />

							<InputError
								class="mt-2"
								:message="form.errors.preview"
							/>
						</div>

						<div class="mt-4 flex items-center justify-end">
							<Link
								:href="route('videos.index')"
								class="me-4 rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
							>
								Отмена
							</Link>
							<PrimaryButton
								class="ms-4"
								:class="{ 'opacity-25': form.processing }"
								:disabled="form.processing"
							>
								Загрузить видео
							</PrimaryButton>
						</div>
					</form>
				</div>
			</div>
		</div>
	</Layout>
</template>
