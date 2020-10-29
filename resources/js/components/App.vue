<template>
    <div class="antialiased">
        <div class="word-div">
            <form>
                <input type="search" v-model="query" id="word-search" class="textfield"
                    placeholder="Search word..." />
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
                        <hr>
                        <strong class="word">{{ data['word'] }}</strong>
                        <ul class="definition" v-if="data['results']">
                            <li v-for="define in data['results']" :key="define.id">
                                {{ define['definition'] }}
                                <br>
                                <span class="syllables" v-if="define['synonyms']">
                                    Synonyms:
                                    <a class="tag" href="#" v-for="synonym in define['synonyms']" :key="synonym.id"
                                        :disabled="loading" @click="handlerFunction(synonym)">{{ synonym }}</a>
                                </span>
                            </li>
                        </ul>
                        <hr>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    import _ from "lodash";

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
            searchWord: _.debounce(function () {
                this.error = this.words = null;
                var searchUrl = '/api/word_search/?q=';
                axios.get(searchUrl + this.query)
                    .then((response) => {
                        console.log(response)
                        this.loading = false;
                        this.data = response.data;
                    }).catch(function (error) {
                        this.loading = false;
                        this.error = error.response.data.message || error.message;
                    });
            }),
            handlerFunction(synonym) {
                this.query = synonym;
                this.searchWord();
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
    $size: 16px;

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
        padding: $size - 1;
        border-radius: 2px;
        font-size: $size;
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
            font-size: $size;
            padding: .5em;
            border: 1px solid lightgrey;
        }

        td {
            font-size: $size;
            padding: .5em;
            border: 1px solid lightgrey;
        }
    }

    ul {
        font-size: $size;

        li {
            padding: 4px auto;

            span {
                font-style: italic;
                margin-left: $size/2;
            }
        }
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
