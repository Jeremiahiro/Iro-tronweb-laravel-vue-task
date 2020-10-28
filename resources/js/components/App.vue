<template>
    <div class="antialiased">
        <div class="word-div">
            <form>
                <input type="search" id="word-search" class="textfield" placeholder="Search word..." />
            </form>
            <table>
                <tr>
                    <td>
                        <strong>WORD:</strong>
                        Definition: Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse, laudantium ratione!
                        Iure
                        iste voluptatibus quasi dolores, cumque vel maiores nobis numquam tempora rerum dolorum dicta
                        natus
                        veniam asperiores recusandae reiciendis.
                        <br>
                        <span class="tag-container ">
                            Synonyms: <a href="#" class="tag">alpha</a> <a href="#" class="tag">bravo</a>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>WORD:</strong>
                        Definition: Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse, laudantium ratione!
                        Iure
                        iste voluptatibus quasi dolores, cumque vel maiores nobis numquam tempora rerum dolorum dicta
                        natus
                        veniam asperiores recusandae reiciendis.
                        <br>
                        <span class="tag-container ">
                            Synonyms: <a href="#" class="tag">alpha</a> <a href="#" class="tag">bravo</a>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>WORD:</strong>
                        Definition: Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse, laudantium ratione!
                        Iure
                        iste voluptatibus quasi dolores, cumque vel maiores nobis numquam tempora rerum dolorum dicta
                        natus
                        veniam asperiores recusandae reiciendis.
                        <br>
                        <span class="tag-container ">
                            Synonyms: <a href="#" class="tag">alpha</a> <a href="#" class="tag">bravo</a>
                        </span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</template>
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

    .word-definition {
        list-style-type: none;
    }

    .definition {
        color: #fff;
    }

    table {
        color: #333;
        background: white;
        border: 1px solid grey;
        font-size: 12pt;
        border-collapse: collapse;
    }

    table tr,
    table td {
        padding: .5em;
        border: 1px solid lightgrey;
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
