<script setup lang="ts">
import { useDark, useToggle } from '@vueuse/core';

const isDark = useDark();
const toggleDark = useToggle(isDark);
</script>

<template>
	<button
		@click="toggleDark()"
		class="rounded-2xl border border-transparent px-3 py-2 text-[#010326] transition-all hover:bg-[#116EBF] hover:text-[#D5F2F2] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#116EBF] focus-visible:ring-offset-2 dark:text-[#D5F2F2] dark:hover:bg-[#1F82BF] dark:hover:text-[#010326] dark:focus-visible:ring-[#1F82BF] dark:focus-visible:ring-offset-gray-800"
	>
		<span class="relative top-1">
			<i
				:class="[
					'fi',
					isDark ? 'fi-br-brightness' : 'fi-br-moon-stars',
				]"
			/>
		</span>
	</button>
</template>
