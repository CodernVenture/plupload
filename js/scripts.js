
function initPlupload(filterMimeTypes){

    // tipurile de fisiere acceptate
    var initFilterMimeTypes = (typeof filterMimeTypes == 'undefined')? [] : jQuery.parseJSON(filterMimeTypes);
    // console.log(initFilterMimeTypes);
    var uploader = new plupload.Uploader({
        runtimes : 'html5,flash,silverlight,html4',
        browse_button : 'pickfiles', // you can pass an id...
        container: document.getElementById('container'), // ... or DOM Element itself
        url : 'upload.php',
        chunk_size: '1mb',
        //max_file_count: 1,
        flash_swf_url : '../js/Moxie.swf',
        silverlight_xap_url : '../js/Moxie.xap',

        filters : {
            max_file_size : '500mb',
            mime_types: initFilterMimeTypes
//            mime_types: [
//                {title : "Image files", extensions : "jpg,gif,png"},
//                {title : "Zip files", extensions : "zip"},
//                {title : "PDF files", extensions : "pdf"}
//            ]
        },

        init: {
            PostInit: function() {
                document.getElementById('filelist').innerHTML = '';

                document.getElementById('uploadfiles').onclick = function() {
                    //adaugare parametrii la urlul obiectului
                    // var dosar = $(this).attr('data-did');
                    // var module = $(this).attr('data-module');
                    // uploader.settings.url = uploader.settings.url+'?dossier='+dosar+'&module='+module;
                    uploader.start();
                    return false;
                };
            },

            FilesAdded: function(up, files) {
                plupload.each(files, function(file) {
                    // redenumire fisier la upload in id inregistrare+ numefisier
                    // file.name = recordId + '-' + file.name;
                    document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                });
            },

            UploadProgress: function(up, file) {
                document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
            },

            Error: function(up, err) {
                document.getElementById('console').appendChild(document.createTextNode("\nError #" + err.code + ": " + err.message));
            },

            UploadComplete: function(up, files){
                //reload page on upload finish
                // location.reload();
            }
        }
    });

    uploader.init();
}