<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Layout from '@/Layouts/Layout.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps<{
	title: string;
}>();

const form = useForm({
	password: '',
});

const submit = () => {
	form.post(route('password.confirm'), {
		onFinish: () => {
			form.reset();
		},
	});
};
</script>

<template>
	<Head :title="title" />
	<Layout>
		<template #title>
			{{ title }}
		</template>

		<div
			class="mx-auto mt-10 w-full overflow-hidden bg-[#D5F2F2] px-6 py-4 shadow-md dark:bg-[#010326] sm:max-w-md sm:rounded-lg"
		>
			<div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
				This is a secure area of the application. Please confirm your
				password before continuing.
			</div>

			<form @submit.prevent="submit">
				<div>
					<InputLabel for="password" value="Password" />
					<TextInput
						id="password"
						type="password"
						class="mt-1 block w-full"
						v-model="form.password"
						required
						autocomplete="current-password"
						autofocus
					/>
					<InputError class="mt-2" :message="form.errors.password" />
				</div>

				<div class="mt-4 flex justify-end">
					<PrimaryButton
						class="ms-4"
						:class="{ 'opacity-25': form.processing }"
						:disabled="form.processing"
					>
						Confirm
					</PrimaryButton>
				</div>
			</form>
		</div>
	</Layout>
</template>
