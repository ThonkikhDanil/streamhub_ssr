<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
	<Link
		:href="route('welcome')"
		class="rounded-2xl border border-transparent text-4xl font-semibold"
	>
		<span class="text-[#010326] dark:text-[#D5F2F2]">Stream</span>
		<span class="text-[#116EBF] dark:text-[#1F82BF]">Hub</span>
	</Link>
</template>
