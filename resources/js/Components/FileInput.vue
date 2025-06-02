<script setup lang="ts">
import { ref } from 'vue';

const model = defineModel<File | null>({ required: true });
const emit = defineEmits<{
	(e: 'file-selected', file: File): void;
}>();

const fileInput = ref<HTMLInputElement | null>(null);
const dragOver = ref(false);

const handleFileChange = (e: Event) => {
	const target = e.target as HTMLInputElement;
	const files = target.files;
	if (files && files.length > 0) {
		model.value = files[0];
		emit('file-selected', files[0]);
	}
};

const handleDrop = (e: DragEvent) => {
	e.preventDefault();
	dragOver.value = false;
	if (e.dataTransfer?.files && e.dataTransfer.files.length > 0) {
		model.value = e.dataTransfer.files[0];
		emit('file-selected', e.dataTransfer.files[0]);
	}
};

const handleDragOver = (e: DragEvent) => {
	e.preventDefault();
	dragOver.value = true;
};

const handleDragLeave = () => {
	dragOver.value = false;
};

defineExpose({ focus: () => fileInput.value?.focus() });
</script>

<template>
	<div
		class="relative cursor-pointer rounded-md border-2 border-dashed p-4 text-center transition-colors duration-200"
		:class="{
			'border-indigo-500 bg-indigo-50': dragOver,
			'border-gray-300 dark:border-gray-700': !dragOver,
		}"
		@click="fileInput?.click()"
		@drop="handleDrop"
		@dragover="handleDragOver"
		@dragleave="handleDragLeave"
	>
		<p class="text-sm text-gray-600 dark:text-gray-300">
			Перетащите файл сюда или
			<span class="text-indigo-600 underline dark:text-indigo-400"
				>выберите</span
			>
		</p>
		<p
			class="mt-2 truncate text-sm font-medium text-gray-800 dark:text-gray-100"
		>
			{{ model?.name || 'Файл не выбран' }}
		</p>
		<input
			type="file"
			class="hidden"
			ref="fileInput"
			@change="handleFileChange"
		/>
	</div>
</template>
