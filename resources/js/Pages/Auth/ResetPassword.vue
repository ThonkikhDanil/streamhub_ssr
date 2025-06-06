<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Layout from '@/Layouts/Layout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps<{
	title: string;
	email: string;
	token: string;
}>();

const form = useForm({
	token: props.token,
	email: props.email,
	password: '',
	password_confirmation: '',
});

const submit = () => {
	form.post(route('password.store'), {
		onFinish: () => {
			form.reset('password', 'password_confirmation');
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
			<form @submit.prevent="submit">
				<div>
					<InputLabel for="email" value="Email" />

					<TextInput
						id="email"
						type="email"
						class="mt-1 block w-full"
						v-model="form.email"
						required
						autofocus
						autocomplete="username"
					/>

					<InputError class="mt-2" :message="form.errors.email" />
				</div>

				<div class="mt-4">
					<InputLabel for="password" value="Password" />

					<TextInput
						id="password"
						type="password"
						class="mt-1 block w-full"
						v-model="form.password"
						required
						autocomplete="new-password"
					/>

					<InputError class="mt-2" :message="form.errors.password" />
				</div>

				<div class="mt-4">
					<InputLabel
						for="password_confirmation"
						value="Confirm Password"
					/>

					<TextInput
						id="password_confirmation"
						type="password"
						class="mt-1 block w-full"
						v-model="form.password_confirmation"
						required
						autocomplete="new-password"
					/>

					<InputError
						class="mt-2"
						:message="form.errors.password_confirmation"
					/>
				</div>

				<div class="mt-4 flex items-center justify-end">
					<PrimaryButton
						:class="{ 'opacity-25': form.processing }"
						:disabled="form.processing"
					>
						Reset Password
					</PrimaryButton>
				</div>
			</form>
		</div>
	</Layout>
</template>
