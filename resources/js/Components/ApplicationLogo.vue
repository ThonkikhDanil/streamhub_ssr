<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
	<Link
		:href="route('welcome')"
		class="rounded-2xl border border-transparent text-4xl font-semibold transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#116EBF] focus-visible:ring-offset-2 dark:focus-visible:ring-[#1F82BF] dark:focus-visible:ring-offset-gray-800"
	>
		<span class="text-[#010326] dark:text-[#D5F2F2]">Stream</span>
		<span class="text-[#116EBF] dark:text-[#1F82BF]">Hub</span>
	</Link>
</template>
