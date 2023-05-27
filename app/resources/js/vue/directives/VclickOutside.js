export default {
    mounted(element,  { value }) {
        element.clickOutside = function (event) {
            if (!(element === event.target || element.contains(event.target))) {
                value(event)
            }
        }
        document.body.addEventListener("click", element.clickOutside)
    },
    unmounted(element, { value }) {
        document.body.removeEventListener("click", element.clickOutside)
    },
    name: 'click-outside'
    }
