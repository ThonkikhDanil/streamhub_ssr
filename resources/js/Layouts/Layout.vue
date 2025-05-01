<script setup lang="ts">
import Header from '@/Components/Header.vue';
import Sidebar from '@/Components/Sidebar.vue';
import { ref, provide } from 'vue';
import { SidebarKey } from '@/keys';

const isSidebar = ref(false);

function toggleSidebar() {
	isSidebar.value = !isSidebar.value;
}

provide(SidebarKey, { isSidebar, toggleSidebar });
</script>

<template>
	<Header />
	<Sidebar />
	<slot />
</template>
