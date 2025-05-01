import { InjectionKey, Ref } from 'vue';

export interface SidebarContext {
	isSidebar: Ref<boolean>;
	toggleSidebar: () => void;
}

export const SidebarKey: InjectionKey<SidebarContext> = Symbol('SidebarKey');
