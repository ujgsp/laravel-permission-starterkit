function previewFile(input, elementId) {
    var target = $('#' + elementId);
    var file = input.files[0];

    if (file) {
        var reader = new FileReader();

        reader.onload = function() {
            target.attr("src", reader.result);
        }

        reader.readAsDataURL(file);
    }
}

function previewFileBeforeAdd(input, elementId) {
    var target = $('#' + elementId);
    var file = input.files[0];

    if (file) {
        var reader = new FileReader();

        reader.onload = function() {
            var imagePreview = '<div class="image-preview">' +
                '<img src="' + reader.result + '" class="img-fluid rounded">' +
                '</div>';
            target.html(imagePreview);
        }

        reader.readAsDataURL(file);
    }
}


// function previewFileAdd(input, elementTarget) {
//     var target = $('#' + elementTarget); // Pastikan elemen target ada

//     var file = input.files[0];

//     if (file) {
//         var reader = new FileReader();

//         reader.onload = function() {
//             // Mengecek apakah preview gambar ada
//             if (target.find(input).length) {
//                 // Jika ada, hanya mengganti src-nya
//                 target.find(input).attr("src", reader.result);
//                 target.find(input).attr("class", 'img-fluid rounded');
//             } else {
//                 // Jika tidak ada, tambahkan preview gambar ke dalam div target
//                 var imagePreview = '<div class="image-preview">' +
//                     '<img src="' + reader.result + '" class="img-fluid rounded">' +
//                     '</div>';
//                 target.after(imagePreview);
//                 $("#show-image").after(imagePreview);
//             }
//         }

//         reader.readAsDataURL(file);
//     }
// }

// function previewFileAdd(input, elementTarget) {
//     var target = $('#' + elementTarget); // Pastikan elemen target ada

//     var file = input.files[0];

//     if (file) {
//         var reader = new FileReader();

//         reader.onload = function() {
//             // Mengecek apakah preview gambar ada
//             if (target.find('img').length) {
//                 // Jika ada, hanya mengganti src-nya
//                 target.find('img').attr("src", reader.result);
//             } else {
//                 // Jika tidak ada, tambahkan preview gambar ke dalam div target
//                 var imagePreview = '<div class="image-preview">';
//                 imagePreview += '<img src="' + reader.result + '" class="img-fluid rounded">';
//                 imagePreview += '</div>';
//                 target.html(imagePreview);
//             }
//         }

//         reader.readAsDataURL(file);
//     }
// }

function previewFileAdd(input, elementTarget) {
    var target = $('#' + elementTarget);

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            if (target.length) {
                target.attr('src', e.target.result);
            } else {
                var imagePreview = '<img src="' + e.target.result + '" class="img-fluid rounded" id="' + elementTarget + '">';
                $('#' + elementTarget + 'Wrapper').html(imagePreview);
            }
        }

        reader.readAsDataURL(input.files[0]);
    }
}