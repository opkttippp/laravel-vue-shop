document.addEventListener('DOMContentLoaded', function () {
    const target = document.querySelector('.alert') ?? undefined
    if (typeof target !== 'undefined') {
        setTimeout(() => document.querySelector('.alert').innerHTML = '', 3000)
    }
})
