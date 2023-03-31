<template>

    <div class="container">
        <h2>Home</h2>
        <form action="#" name="form">
            <input type="text" pattern="\d{3}-\d{2}-d{1}" title="Error" name="name1" value="100">
            <input type="text" name="name2" value="100">
            <button type="submit">Enter</button>
        </form>
        <div id="show">
111
        </div>
    </div>

</template>

<script>


export default {
    name: "Home",
    mounted() {
        this.javaScript();
    },
    methods: {
        javaScript() {

            // let form = document.forms[1].elements[0].value;
            // form = 'qwert';
            //
            // for (let i = 0; i < document.forms[1].elements.length; i++){
            //     // console.log(document.forms[1].elements[i]);
            //     document.forms[1].elements[i].onfocus = function () {
            //         document.forms[1].elements[i].style.border = '1px solid red';
            //     }
            //     document.write('Hello!!');
            // }

            let a = 99999999999999999999999n;
            let b = {
                id: 10,
                age: 30
            }

            let id = Symbol('id');
            b[id] = 500;

            console.log(typeof b);
            console.log(b);

        }
    }
}

</script>

<style scoped>

</style>
