<template>
    <div>
        <ul class="lang-rtl">
            <li class="lang_switcher">
                <a class="icon-lang" :href="url +'/'+ selectable_locale">
                    <span v-if="selectable_locale == 'ar'"> AR</span>
                    <span v-else>EN</span>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>

export default {
    name: "LanguageSelector",
    data(){
        return{
            url: '/language'
        }
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
