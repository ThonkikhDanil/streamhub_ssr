<script setup lang="ts">

</script>

<template>
	<form action="" class="flex">
		<input
			type="text"
			class="w-96 bg-[#D5F2F2] dark:bg-[#010326] text-[#010326] dark:text-[#D5F2F2] rounded-s-2xl border-2 border-[#202020] border-r-0"
			placeholder="Введите запрос"
		/>
		<button
			type="submit"
			class="bg-[#010326] dark:bg-[#D5F2F2] hover:bg-[#116EBF] dark:hover:bg-[#1F82BF] transition-all text-2xl py-1 px-8 rounded-e-2xl"
		>
			<span class="text-[#D5F2F2] dark:text-[#010326] relative top-1">
				<i class="fi fi-br-search" />
			</span>
		</button>
	</form>
</template>
