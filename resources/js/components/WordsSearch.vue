<template>
    <div>
        <div v-if="message" class="alert">{{ message }}</div>
        <div v-if="! loaded">Loading...</div>

      <form @submit.prevent="onSubmit($event)" v-else>
            <div class="form-group">
                <label for="word">Word</label>
                <input id="word" v-model="word.word" />
            </div>
            <div class="form-group">
                <label for="word_desc">Description</label>
                <input id="word_desc" type="text" v-model="word.description" />
            </div>
            <div class="form-group">
                <button type="submit" :disabled="saving">Update</button>
            </div>
        </form>
    </div>
</template>
<script>
    import api from '../api/words';

    export default {
        data() {
            return {
                message: null,
                loaded: false,
                saving: false,
                word: {
                    id: "",
                    word: "",
                    description: ""
                }
            };
        },
        methods: {
            onSubmit(event) {
                // @todo form submit event
                this.saving = true;

                api.update(this.word.id, {
                    word: this.word.word,
                    description: this.word.description,
                }).then((response) => {
                    this.message = 'Word updated';
                    setTimeout(() => this.message = null, 2000);
                    this.word = response.data.data;
                }).catch(error => {
                    console.log(error)
                }).then(_ => this.saving = false);
            }
        },
        created() {
            api.find(this.$route.params.id).then((response) => {
                setTimeout(() => {
                    this.loaded = true;
                    this.word = response.data.data;
                }, 5000);
            });
        }
    };

</script>
<style lang="scss" scoped>
    $red: lighten(red, 30%);
    $darkRed: darken($red, 50%);

    .form-group label {
        display: block;
    }

    .alert {
        background: $red;
        color: $darkRed;
        padding: 1rem;
        margin-bottom: 1rem;
        width: 50%;
        border: 1px solid $darkRed;
        border-radius: 5px;
    }

</style>
