// ----------------------------Flash delete message--------------------------------------------
const target = document.querySelector('.alert')
if (typeof target !== 'undefined') {
    setTimeout(() => document.querySelector('.alert').innerHTML = '', 3000)
}
// -------------------------------------------------------------------------------------------
