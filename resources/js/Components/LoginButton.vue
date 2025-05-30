<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
	<Link
		class="flex items-center rounded-2xl border border-transparent px-4 py-1 text-[#010326] transition-all hover:bg-[#116EBF] hover:text-[#D5F2F2] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#116EBF] focus-visible:ring-offset-2 dark:text-[#D5F2F2] dark:hover:bg-[#1F82BF] dark:hover:text-[#010326] dark:focus-visible:ring-[#1F82BF] dark:focus-visible:ring-offset-gray-800"
		:href="route('login')"
	>
		<div class="relative top-1 mr-4 text-2xl">
			<i class="fi fi-br-user" />
		</div>
		<div class="font-semibold">Войти</div>
	</Link>
</template>
