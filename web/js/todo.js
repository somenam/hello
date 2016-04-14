/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var todoGet = '?r=todo%2Fget';
var todoCreate = '?r=todo%2Fcreate';
var todoUpdate = '?r=todo%2Fupdate';
var todoDelete = '?r=todo%2Fdelete';
var isOwner = true;
var dataForAjax = {};

$(document).ready(function () {
    makeRequest('', todoGet, function (data) {
        listTodo(data);
    });

});



$(document).ready(function () {
    $("#list_todo").delegate("li .del", "click", function () {
        dataForAjax.todoId = $(this).parent().attr('id');
        makeRequest(dataForAjax, todoDelete, function (data) {
            listTodo(data);
        });
    });

});

// апдейт

$(document).ready(function () {
    $("#list_todo").delegate("li .up", "click", function () {
        $(this).parent().append('<input type="text" class="form-control" id="todo_title_new" value="'+ $(this).parent().find('.todo_title').text() +'">');
        $(this).parent().append('<textarea id="todo_content_new" class="form-control" rows="3">'+$(this).parent().find('.todo_content').text()+'</textarea>');
        $(this).parent().append('<button type="button" id="update_todo" class="btn btn-primary" style="margin-top: 10px;">Принять</button>');
        $(this).parent().append('<button type="button" id="cansel" class="btn btn-primary" style="margin-top: 10px;">Отмена</button>');
        
    });

});

$(document).ready(function () {
    $("#list_todo").delegate("li #update_todo", "click", function () {
        dataForAjax.todoId = $(this).parent().attr('id');
        dataForAjax.title = $(this).parent().find('#todo_title_new').val();
        dataForAjax.content = $(this).parent().find('#todo_content_new').val();
        makeRequest(dataForAjax, todoUpdate, function (data) {
            listTodo(data);
        });
    });

});

$(document).ready(function () {
    $("#list_todo").delegate("li #cansel", "click", function () {
        $(this).parent().find('#todo_title_new, #todo_content_new, #update_todo, #cansel').remove();
    });

});

$(document).ready(function () {
    $("#user_list .user").click(function () {
        if ($(this).attr('id') !== 'owner') {
            isOwner = false;
            dataForAjax.id = $(this).attr('id');
            $('#todo_form').hide('slow');
        } else {
            delete dataForAjax.id;
            isOwner = true;
            $('#todo_form').show('slow');
        }

        makeRequest(dataForAjax, todoGet, function (data) {
            listTodo(data);
        });
    });

});

//create
$(document).ready(function ()
{
    $("#create_todo").click(function () {
        dataForAjax.title = $('#todo_title').val();
        dataForAjax.content = $('#todo_content').val();
        makeRequest(dataForAjax, todoCreate, function (data) {
            clearForm();
            listTodo(data);
        });
    });
});

function makeRequest(data, url, callback)
{
    $.ajax({
        type: "POST",
        url: url,
        dataType: "json",
        data: data,
        success: function (data) {
            callback(data);
        }
    });
}





function listTodo(todos) {
    $("#list_todo").empty();
    for (var i = 0; i < todos.length; i++) {
        $("#list_todo").append(viewTodo(todos[i]));
    }
}

function viewTodo(todo) {
    var control = '';
    if(isOwner){
        control = '<i class="glyphicon glyphicon-pencil control up"></i><i class="glyphicon glyphicon-remove control del"></i>';
    }
    var todoElem = '<li id="' + todo.id + '" class="item list-group-item list-group-item-success"><div class="todo_title">' + todo.title + '</div><div class="todo_content">' + todo.content + '</div>'+ control +'</li>';
    return todoElem;
}

function clearForm() {
    dataForAjax.title = $('#todo_title').val('');
    dataForAjax.content = $('#todo_content').val('');
}




