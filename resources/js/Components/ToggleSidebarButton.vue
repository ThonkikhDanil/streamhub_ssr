<script setup lang="ts">
import { inject } from 'vue';
import { SidebarKey } from '@/keys';

const sidebar = inject(SidebarKey);

if (!sidebar) {
	throw new Error('Sidebar context is not provided');
}

const { isSidebar, toggleSidebar } = sidebar;
</script>

<template>
	<button @click="toggleSidebar()">
		<span class="relative top-1">
			<i :class="['fi', isSidebar ? 'fi-br-cross' : 'fi-br-menu-burger']" />
		</span>
	</button>
</template>
