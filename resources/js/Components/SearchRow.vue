<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';

defineProps<{
	status?: string;
}>();

const form = useForm({
	search: '',
});

function submit() {
	if (!form.search || form.search.trim() === '') {
		return;
	}
	form.post(route('search'));
}
</script>

<template>
	<form @submit.prevent="submit" class="flex">
		<input
			v-model="form.search"
			type="text"
			class="w-96 rounded-s-2xl border-2 border-r-0 border-[#202020] bg-[#D5F2F2] text-[#010326] dark:border-[#D5F2F2] dark:bg-[#010326] dark:text-[#D5F2F2]"
			placeholder="Введите запрос"
		/>
		<button
			type="submit"
			class="rounded-e-2xl bg-[#010326] px-8 py-1 text-2xl transition-all hover:bg-[#116EBF] dark:bg-[#D5F2F2] dark:hover:bg-[#1F82BF]"
		>
			<span class="relative top-1 text-[#D5F2F2] dark:text-[#010326]">
				<i class="fi fi-br-search" />
			</span>
		</button>
	</form>
</template>
