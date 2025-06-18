import { ComputedRef, InjectionKey, Ref } from 'vue';
import { User } from './types';

export interface UserContext {
	user: ComputedRef<User>;
}

export const UserKey: InjectionKey<UserContext> = Symbol('UserKey');

export interface SidebarContext {
	isSidebar: Ref<boolean>;
	toggleSidebar: () => void;
}

export const SidebarKey: InjectionKey<SidebarContext> = Symbol('SidebarKey');
