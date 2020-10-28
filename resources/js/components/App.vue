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
<style>
    body {
        font-family: 'Nunito';
        padding: 0;
        margin: 0;
    }

    .antialiased {
        min-height: 100vh;
        background-color: #1a202c;
        color: #fff;
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
    }

    table tr,
    table td {
        font-size: 16px;
        padding: .5em;
        border: 1px solid lightgrey;
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
        /* pointer-events: none; */
        /* color: white; */
        margin: 0 4px;
        font-weight: bold;
        color: #333;
        text-decoration: none;
    }

</style>
