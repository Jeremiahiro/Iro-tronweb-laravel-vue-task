<template>
    <div class="antialiased">
        <div class="word-div">
            <form>
                <input v-model="query" type="search" id="word-search" class="textfield" placeholder="Search word..." />
            </form>
            <div v-if="error" class="alert text-center">{{ error }}</div>
            <div v-if="loading" class="loading text-center">Loading...</div>
            <table v-if="data && query">
                <tr v-if="data['message']">
                    <td class="text-center">
                        {{ data['message'] }}
                    </td>
                </tr>
                <tr v-else>
                    <td>
                        <strong class="word">{{ data['word'] }}</strong>
                        <ul class="definition" v-if="data['results']">
                            <li v-for="definition in data['results']" :key="definition.id">
                                {{ definition['definition'] }}
                            </li>
                        </ul>
                        <hr>
                        <span class="syllables" v-if="data['syllables']">
                            Syllables ({{ data['syllables']['count'] }}):
                            <a class="tag" href="#" v-for="syllable in data['syllables']['list']" :key="syllable.id"
                                :disabled="loading" @click="handlerFunction(syllable)">{{ syllable }}</a>
                        </span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                loading: false,
                error: null,
                data: null,
                query: null,
            };
        },
        watch: {
            query(after, before) {
                this.searchWord();
            }
        },
        methods: {
            searchWord() {
                this.error = this.users = null;
                this.loading = true;
                var query = this.query
                axios.get(`/api/words/` + query)
                    .then(response => {
                        console.log(response);
                        this.loading = false;
                        this.data = response.data;
                    })
                    .catch(function (error) {
                        this.loading = false;
                        this.error = error.response.data.message || error.message;
                    });
            },
            handlerFunction(syllable) {
                this.query = syllable;
                this.searchWord();
                // console.log(syllable)
            }
        }
    }

</script>
<style lang="scss" scoped>
    $font-stack: Helvetica,
    sans-serif;
    $primary-color: #333;
    $gray: #333;
    $darkgray: #1a202c;
    $lightgrey: rgb(211, 211, 211);
    $white: #fff;
    
    body {
        font: 100% $font-stack;
        padding: 0;
        margin: 0;
    }

    .antialiased {
        background-color: $darkgray;
        color: $white;
        min-height: 100vh;
        margin: 0;
        padding: 0;
    }

    .word-div {
        max-width: 70vw;
        padding: 40px;
        margin: 0 auto;
    }

    .textfield {
        padding: 15px;
        border-radius: 2px;
        font-size: 16px;
        width: 100%;
        transition: opacity 200ms ease-out;
        margin-bottom: 20px;
        -webkit-appearance: textfield;
        appearance: textfield;
    }

    .word {
        text-transform: uppercase;
    }

    table {
        min-width: 100%;
        color: #333;
        background: white;
        border: 1px solid grey;
        border-collapse: collapse;

        tr {
            font-size: 16px;
            padding: .5em;
            border: 1px solid lightgrey;
        }

        td {
            font-size: 16px;
            padding: .5em;
            border: 1px solid lightgrey;
        }
    }

    .syllables {
        font-style: italic;
    }

    .text-center {
        text-align: center;
    }

    .tag-container {
        display: flex;
        flex-flow: row wrap;
    }

    .tag {
        margin: 0 4px;
        font-weight: bold;
        color: $gray;
        text-decoration: none;
    }

</style>
