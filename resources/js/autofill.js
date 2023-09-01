// public/js/autofill.js
document.addEventListener('DOMContentLoaded', function () {
    var perpetratorLRN = document.getElementById('perpetrator_lrn');
    var perpetratorName = document.getElementById('perpetrator_name');
    var studentLRN = document.getElementById('student_lrn');
    var studentName = document.getElementById('student_name');

    perpetratorLRN.addEventListener('blur', function () {
        var lrn = perpetratorLRN.value;
        if (lrn) {
            fetch('/getStudentByLRN/' + lrn)
                .then(response => response.json())
                .then(data => {
                    if (data.student_name) {
                        perpetratorName.value = data.student_name;
                    }
                });
        }
    });

    studentLRN.addEventListener('blur', function () {
        var lrn = studentLRN.value;
        if (lrn) {
            fetch('/getStudentByLRN/' + lrn)
                .then(response => response.json())
                .then(data => {
                    if (data.student_name) {
                        studentName.value = data.student_name;
                    }
                });
        }
    });
});
