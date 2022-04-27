<template>
    <nav class="fixed top-0 w-full flex bg-white z-50 items-center justify-between py-6 sm:py-4 px-2.5 sm:px-12 shadow-base">
        <div class="flex items-center">
            <Link :href="!$page.props.user ? '/' : route('dashboard')" class="group">
                <div class="w-36 sm:w-40">
                    <svg viewBox="0 0 116 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="group-hover:-translate-x-[1px] transition-transform" d="M31.5534 23.002V5.78093C31.5534 3.65112 28.9392 2.55578 27.4801 4.07708L18.8469 12.7181C17.935 13.6308 17.935 15.1521 18.8469 16.1258L27.4193 24.7059C28.9392 26.2272 31.5534 25.1318 31.5534 23.002Z" fill="#00ADB5"/>
                        <path class="group-hover:-translate-y-[1px] transition-transform" d="M2.43185 30H19.5765C21.7044 30 22.7987 27.3834 21.2788 25.9229L12.7065 17.3428C11.7945 16.43 10.2746 16.43 9.30187 17.3428L0.729543 25.9229C-0.790373 27.4442 0.24317 30 2.43185 30Z" fill="#301A4B"/>
                        <path class="group-hover:translate-y-[1px] transition-transform" d="M5.28932 16.2475L17.4486 4.07708C18.9686 2.61663 17.8742 0 15.7463 0H3.58701C2.24949 0 1.21594 1.09533 1.21594 2.43408V14.6045C1.21594 16.6734 3.7694 17.7688 5.28932 16.2475Z" fill="#FED766"/>
                        <path d="M55.7505 9.12778V20.9331H53.501L47.6038 13.7525V20.9331H44.9287V9.12778H47.1782L53.0755 16.3083V9.12778H55.7505Z" fill="#301A4B"/>
                        <path d="M68.0314 18.3773H62.5597L61.5262 20.9331H58.7296L64.0189 9.12778H66.6939L71.9832 20.9331H69.1258L68.0314 18.3773ZM67.1803 16.3083L65.2956 11.8053L63.4109 16.3083H67.1803Z" fill="#301A4B"/>
                        <path d="M77.0901 20.3245C76.1174 19.7769 75.327 19.0466 74.7799 18.1339C74.2327 17.2211 73.9287 16.1866 73.9287 14.9696C73.9287 13.8134 74.2327 12.7789 74.7799 11.8053C75.327 10.8925 76.1174 10.1623 77.0901 9.61459C78.0629 9.06692 79.1572 8.82352 80.434 8.82352C81.6499 8.82352 82.7442 9.06692 83.717 9.61459C84.6897 10.1623 85.4801 10.8925 86.0272 11.8053C86.5744 12.718 86.8784 13.7525 86.8784 14.9696C86.8784 16.1257 86.5744 17.1602 86.0272 18.1339C85.4801 19.0466 84.6897 19.7769 83.717 20.3245C82.7442 20.8722 81.6499 21.1156 80.434 21.1156C79.218 21.1156 78.1237 20.8722 77.0901 20.3245ZM82.3186 18.3164C82.8658 18.0122 83.3522 17.5253 83.6562 16.9777C83.9602 16.43 84.1425 15.7606 84.1425 15.0304C84.1425 14.3002 83.9602 13.6308 83.6562 13.0832C83.3522 12.5355 82.8658 12.0487 82.3186 11.7444C81.7715 11.4401 81.1027 11.2576 80.434 11.2576C79.7652 11.2576 79.0964 11.4401 78.5493 11.7444C78.0021 12.0487 77.5157 12.5355 77.2117 13.0832C76.9077 13.6308 76.7254 14.3002 76.7254 15.0304C76.7254 15.7606 76.9077 16.43 77.2117 16.9777C77.5157 17.5253 78.0021 18.0122 78.5493 18.3164C79.0964 18.6207 79.7652 18.8032 80.434 18.8032C81.1635 18.8032 81.7715 18.6207 82.3186 18.3164Z" fill="#301A4B"/>
                        <path d="M94.9644 16.3083L93.3837 17.9513V20.9331H90.6478V9.12778H93.3837V14.6044L98.6122 9.06693H101.652L96.7275 14.361L101.895 20.9331H98.7338L94.9644 16.3083Z" fill="#301A4B"/>
                        <path d="M112.109 18.3773H106.637L105.604 20.9331H102.746L108.036 9.12778H110.711L116 20.9331H113.143L112.109 18.3773ZM111.258 16.3083L109.373 11.8053L107.488 16.3083H111.258Z" fill="#301A4B"/>
                    </svg>
                </div>
            </Link>
            <template v-if="$page.props.user">
                <Link class="ml-5 sm:ml-8 text-naoka-purple flex items-center text-lg" :href="route('dashboard')">
                    <i class="naoka-icon SolidDashboard sm:mr-4 text-3xl"></i>
                    <div class="hidden sm:block">Dashboard</div>
                </Link>
            </template>
        </div>

        <div class="flex items-center">
            <slot/>
            <div class="rounded-full ml-4 sm:ml-8" v-if="$page.props.user">
                <jet-dropdown align="right" width="48">
                    <template #trigger>
                        <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                        </button>

                        <span v-else class="inline-flex rounded-md">
                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                {{ $page.props.user.name }}

                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </span>
                    </template>

                    <template #content>
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            Manage Account
                        </div>

                        <jet-dropdown-link :href="route('profile.show')">
                            Profile
                        </jet-dropdown-link>

                        <jet-dropdown-link :href="route('api-tokens.index')" v-if="$page.props.jetstream.hasApiFeatures">
                            API Tokens
                        </jet-dropdown-link>

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form @submit.prevent="logout">
                            <jet-dropdown-link as="button">
                                Log Out
                            </jet-dropdown-link>
                        </form>
                    </template>
                </jet-dropdown>
            </div>
        </div>
    </nav>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import JetDropdown from '@/Jetstream/Dropdown.vue'
import JetDropdownLink from '@/Jetstream/DropdownLink.vue'
import {defineComponent} from "vue";

export default defineComponent({
    components: {
        Link,
        JetDropdown,
        JetDropdownLink
    },
    methods: {
        logout() {
            this.$inertia.post(route('logout'));
        },
    }
})
</script>
