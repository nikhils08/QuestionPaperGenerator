function loadChapters(subject, chapter){
    var subject_id = $(subject).val();
    
    $(chapter).html("<option value = '' selected> Select Chapter </option>");
    
    $.get("functions.php?getchapters=result&subject_id="+subject_id, function(data){
        //window.alert(data);
        //window.alert(data.length);
        var i = 1;

        var dataSubstring = data;
        //window.alert(data.length);

        while(dataSubstring!=""){

            //window.alert("i = " + i);
            
            dataSubstring = dataSubstring.substr(i);

           // window.alert('substring is ' + dataSubstring);
            
            var option_value = dataSubstring.substring(dataSubstring.indexOf('ID')+2, dataSubstring.indexOf('NAME'));
           //window.alert("ID = " + option_value);

            var option_data = dataSubstring.substring(dataSubstring.indexOf('%#')+2, dataSubstring.indexOf('#%'));
            //window.alert("NAME = "+ option_data);


            i = dataSubstring.indexOf('>');

            //window.alert(dataSubstring.indexOf('>'));

            //window.alert("Previous i = " + i);

            if(i <= 0 || dataSubstring == "")
                break;

            i++;

            //window.alert("Incremented i = " + i);

            $(chapter).append("<option value = "+option_value+ ">" + option_data + "</option>");
        }
    });
}

$(document).ready(function () {
    
    $('#addsubject').bootstrapValidator( {
        container: '#messages',
        live: 'enabled',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           subject_name: {
               validators: {
                   notEmpty: {
                        message: 'The Subject Name is required and cannot be empty'
                    },
               }
           },
        },
    });
    
    $('#editsubject').bootstrapValidator({
        container: '.messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           edit_subject_name: {
               validators: {
                   notEmpty: {
                        message: 'The Subject Name is required and cannot be empty'
                    },
               }
           },
        },
    });
    
    $('#addchapter').bootstrapValidator({
            container: '#messages',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                chap_subject: {
                    validators: {
                        notEmpty: {
                            message: 'The Subject is not selected'
                        },
                    }
                },
                chap_name: {
                    validators: {
                        notEmpty: {
                            message: 'The Chapter Name is required'
                        },
                    }
                },
            },
        });
    
    $('#editchapter').bootstrapValidator({
        container: '.messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           edit_chap_subject: {
               validators: {
                   notEmpty: {
                        message: 'The Subject is Not Selected'
                    },
               }
           },
            edit_chap_name: {
               validators: {
                   notEmpty: {
                        message: 'The Chapter Name is required and cannot be empty'
                    },
               }
           },
        },
    });
    
    $('#generatesubject').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           subject_selection: {
               validators: {
                   notEmpty: {
                        message: 'The Subject is Not Selected'
                    },
               }
           },
            totalmarks_subject: {
               validators: {
                   notEmpty: {
                        message: 'Marks Not Selected'
                    },
               }
           },
        },
    });
    
    $('#generatechapter').bootstrapValidator({
        container: '.messages',
        
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           chapter_subject: {
               validators: {
                   notEmpty: {
                        message: 'The Subject is Not Selected'
                    },
               }
           },
            total_marks_chapter: {
               validators: {
                   notEmpty: {
                        message: 'Marks Not Selected'
                    },
               }
           },
            chapter_name: {
               validators: {
                   notEmpty: {
                        message: 'The Chapter Is Not Selected'
                    },
               }
           }
        }
    });
    
    $("#subject").change(function () {
        loadChapters('#subject', '#chapter');
    });
    
    $('#chapter_subject').change(function(){
        loadChapters('#chapter_subject', '#chapter_name');
    });
    
    $('#btncancel').on('click', function(event){
        setTimeout(function() {
            location.reload();
        }, 500);
    });
    
    $('.edit_btn').on('click', function(event){
        $('#modaltitle').html("Edit Question");
        var button = $(this);
        var question_id = button.data('question-id');
        var chap_name = button.data('chapter-name');
        var sub_name = button.data('subject');

        $('#selectedchapter').show();
        $('#selectedsubject').show();
        

        $('#selectedsubject').html(" Old Subject&#58;&#45; " + sub_name);
        $('#selectedchapter').html(" Old Chapter&#58;&#45; " + chap_name);

        $('#btntoperform').attr('name', 'btntoedit');
        $('#btntoperform').html("<span class = 'fa fa-check'></span> Edit Question");

        fetchEdit(question_id);

        checkQuestionAndMarks();

        //window.alert("Button clicked " + question_id);
    });

    $('#btnadd').on('click', function(event){
        
        $('#modaltitle').html("Add Question");
        
        $('#selectedchapter').hide();
        $('#selectedsubject').hide();
        
        $('#question_id').removeAttr('value');
        
        $('#question').removeAttr('value');
        $('#question').attr('placeholder', 'Enter New Question');
        
        $('#question_marks').removeAttr('value');
        $('#question_marks').attr('placeholder', 'Minimum 1');
        
        $('#btntoperform').attr('name', 'btntoadd');
        $('#btntoperform').attr('value', 'Add Question');
        
        
        $('#addquestion').bootstrapValidator({
            container: '#messages',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                question: {
                    validators: {
                        notEmpty: {
                            message: 'The Question is required and cannot be empty'
                        },
                        stringLength: {
                            min: 1,
                            message: 'The Question must be more than 1 character'
                        },
                    }
                },
                question_marks: {
                    validators: {
                        notEmpty: {
                            message: 'The Marks are required and cannot be empty'
                        },
                    }
                },
                chapter: {
                    validators: {
                        notEmpty: {
                            message: 'The Chapter is not selected'
                        },
                    }
                },
                subject: {
                    validators: {
                        notEmpty: {
                            message: 'The Subject is not selected'
                        },
                    }
                },
            },
        });
    });

} );

function checkQuestionAndMarks(){
    $('#addquestion').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            question: {
                validators: {
                    notEmpty: {
                        message: 'The Question is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        message: 'The Question must be more than 1 character'
                    },
                }
            },
            question_marks: {
                validators: {
                    notEmpty: {
                        message: 'The Marks are required and cannot be empty'
                    },
                }
            },
        },
    });
}

function fetchEdit(question_id){
    var ques_id = question_id;
    
    $.get("functions.php?edit_data=result&ques_id="+ques_id, function(data){
        var question_data = data.substring(data.indexOf('ques=')+5, data.indexOf('>'));
        //window.alert(question_data);

        $('#question').attr('value', question_data);

        var question_marks = data.substring(data.indexOf('marks=')+6, data.indexOf("ques"));
        //window.alert(question_marks);

        $('#question_marks').attr('value', question_marks);

        $('#question_id').attr('value', ques_id);
    });
}
