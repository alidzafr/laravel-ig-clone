<template>
    <div>
        <button class="btn btn-primary ms-4" @click="followUser" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
        props: ['userId', 'follows'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function() {
            return {
                status: this.follows,
            }
        },

        // on click response
        methods: {
            followUser() {
                axios.post('/follow/' + this.userId)
                    .then(response => {
                        this.status = ! this.status;

                        console.log(response.data);
                    })
                    // if 401 - unautorized user (not login) when click follow
                    // will be redirect into login page
                    .catch(errors => {
                        if(errors.response.status == 401) {
                            window.location = '/login';
                        }
                    });
            }
        },

        // text follow button (v-text)
        computed: {
            buttonText() {
                return (this.status) ? 'unfollow' : 'follow';
            }
        }
    }
</script>
