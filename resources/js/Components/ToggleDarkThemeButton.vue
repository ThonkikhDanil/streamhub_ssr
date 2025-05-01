<script setup lang="ts">
import { useDark, useToggle } from '@vueuse/core';

const isDark = useDark();
const toggleDark = useToggle(isDark);
</script>

<template>
	<button @click="toggleDark()">
		<span class="relative top-1">
			<i :class="['fi', isDark ? 'fi-br-brightness' : 'fi-br-moon-stars']" />
		</span>
	</button>
</template>
