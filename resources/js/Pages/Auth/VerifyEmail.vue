<script setup lang="ts">
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Layout from '@/Layouts/Layout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps<{
	title: string;
	status?: string;
}>();

const form = useForm({});

const submit = () => {
	form.post(route('verification.send'));
};

const verificationLinkSent = computed(
	() => props.status === 'verification-link-sent',
);
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
				Thanks for signing up! Before getting started, could you verify
				your email address by clicking on the link we just emailed to
				you? If you didn't receive the email, we will gladly send you
				another.
			</div>

			<div
				class="mb-4 text-sm font-medium text-green-600 dark:text-green-400"
				v-if="verificationLinkSent"
			>
				A new verification link has been sent to the email address you
				provided during registration.
			</div>

			<form @submit.prevent="submit">
				<div class="mt-4 flex items-center justify-between">
					<PrimaryButton
						:class="{ 'opacity-25': form.processing }"
						:disabled="form.processing"
					>
						Resend Verification Email
					</PrimaryButton>

					<Link
						:href="route('logout')"
						method="post"
						as="button"
						class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
						>Log Out</Link
					>
				</div>
			</form>
		</div>
	</Layout>
</template>
