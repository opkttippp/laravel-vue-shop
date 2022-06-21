document.addEventListener('DOMContentLoaded', function () {
    const el = document.getElementsByClassName('nav-link')
    const url = document.location.href

    for (let i = 0; i < el.length; i++) {
        if (url === el[i].href) {
            el[i].className += ' active'
        }
    }
})

