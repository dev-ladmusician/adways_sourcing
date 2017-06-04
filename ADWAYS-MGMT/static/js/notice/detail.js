$(document).ready(function () {
    var dirName = $('#sg-create-date').val();
    var $summernote = $('#summernote');
    $summernote.summernote({
        height: 700,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: true,                 // set focus to editable area after initializing summernote
        fontNames: ["nanumbarunpenr", 'Oswald', "Noto Sans KR", 'Arial', 'Arial Black'],
        fontNamesIgnoreCheck: ["nanumbarunpenr","Noto Sans KR", 'Oswald'],
        fontSizes: [8,9,10,11,12,13,14,15,16,18,24,36],
        onImageUpload: function (files) {
            if (files.length > 5) {
                alert('사진은 총 5장 까지만 부탁드립니다.');
            } else {
                for(var i=0; i < files.length; i++) {
                    sendFile(files[i], $(this));
                }
            }
        },
        onMediaDelete : function($target, editor, $editable) {
            console.log($target[0].src); // img
        }
    });

    function sendFile(file, editor) {
        data = new FormData();
        data.append("image", file);
        data.append("dir_name", dirName);
        data.append("type", 'notice');

        $.ajax({
            data: data,
            type: "POST",
            url: "/ADWAYS-MGMT/core/image_upload",
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
                var rtv = jQuery.parseJSON(data);
                if (rtv.state) {
                    editor.summernote('insertImage', rtv.content);
                } else {
                    alert(rtv.content);
                }
            }
        });
    }

    // submit form
    $('#ng-submit').click(function () {
        if (validateForm()) {
            $('#aw-form').submit();
        }
    });

    function validateForm () {
        var checkTitle = $('#title').val().length > 0 ? true : false;
        var checkSummary = $('#summary').val().length > 0 ? true : false;
        var checkContent = $('#summernote').val().length > 10 ? true : false;
        if (!checkTitle) {
            alert('제목을 입력해주세요.');
            return false;
        }
        if (!checkSummary) {
            alert('간단한 설명을 입력해주세요.');
            return false;
        }
        if (!checkContent) {
            alert('내용을 입력해주세요.');
            return false;
        }
        return true;
    }
});
