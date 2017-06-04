$(document).ready(function() {
    var name = $('#aw-name');
    var email = $('#aw-email');
    var phone = $('#aw-phone');
    var content = $('#aw-content');
    var file = $('#aw-file');


    $('#aw-form-submit').click(function() {
        var checkName = name.val().length > 0 ? true : false;
        var checkEmail = email.val().length > 0 ? true : false;
        var checkPhone = phone.val().length > 0 ? true : false;
        var checkContent = content.val().length > 0 ? true : false;
        var checkfile = file.val().length > 0 ? true : false;

        if (!checkName) {
            alert('이름을 입력해주세요');
            return false;
        }
        if (!checkEmail) {
            alert('이메일을 입력해주세요');
            return false;
        }
        if (!checkPhone) {
            alert('연락처를 입력해주세요');
            return false;
        }
        if (!checkContent) {
            alert('내용을 입력해주세요');
            return false;
        }
        if (!checkfile) {
            alert('이력서를 첨부해주세요.');
            return false;
        }

        $('#aw-form').submit();
    })
});
