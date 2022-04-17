const el = document.getElementsByClassName('nav-link')
const url = document.location.href
console.log(el);
for (let i = 0; i < el.length; i++) {
    if (url === el[i].href) {
        el[i].className += ' active'
    }
}

// tinymce.init({
//     selector: '.editor',
//     plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
//     toolbar_mode: 'floating',
//     relative_urls : false,
//     file_picker_callback : elFinderBrowser
// });
//
// function elFinderBrowser(callback, value, meta)
// {
//     tinymce.activeEditor.windowManager.openUrl({
//         title: 'File Manager',
//         url: '/elfinder/tinymce5',
//         /**
//          * On message will be triggered by the child window
//          *
//          * @param dialogApi
//          * @param details
//          * @see https://www.tiny.cloud/docs/ui-components/urldialog/#configurationoptions
//          */
//         onMessage: function (dialogApi, details) {
//             if (details.mceAction === 'fileSelected') {
//                 const file = details.data.file;
//
//                 // Make file info
//                 const info = file.name;
//
//                 // Provide file and text for the link dialog
//                 if (meta.filetype === 'file') {
//                     callback(file.url, {text: info, title: info});
//                 }
//
//                 // Provide image and alt text for the image dialog
//                 if (meta.filetype === 'image') {
//                     callback(file.url, {alt: info});
//                 }
//
//                 // Provide alternative source and posted for the media dialog
//                 if (meta.filetype === 'media') {
//                     callback(file.url);
//                 }
//
//                 dialogApi.close();
//             }
//         }
//     });
// }
