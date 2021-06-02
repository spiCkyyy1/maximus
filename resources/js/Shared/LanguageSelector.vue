<template>
    <div>
        <ul class="lang-rtl">
            <li class="lang_switcher">
                    <inertiaLink class="icon-lang" :href="route('language', [selectable_locale])">
                        <span v-if="selectable_locale == 'ar'"> AR</span>
                        <span v-else>EN</span>
                    </inertiaLink>
            </li>
        </ul>
    </div>
</template>

<script>
import Icon from '@/Shared/Icon'
export default {
    name: "LanguageSelector",
    components: {
        Icon,
    },
    computed: {
        selectable_locale() {
            $("#frontEndloader").css("display", "block");
            if(this.$page.props.locale == 'ar') {
                let file = document.createElement('link');
                file.rel = 'stylesheet';
                file.href = '/css/rtl.css';
                document.head.appendChild(file);
                $("#frontEndloader").css("display", "none");
                return 'en';
            }
            let file = document.createElement('link');
                file.rel = 'stylesheet';
                file.href = '/css/ltr.css';
                document.head.appendChild(file);
                $("#frontEndloader").css("display", "none");
            return 'ar';

        }
    },
}
</script>

<style scoped>
</style>
