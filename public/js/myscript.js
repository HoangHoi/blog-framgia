/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function notify(id, c, m) {
    $(id).removeClass();
    $(id).addClass(c);
    $(id).html(m);
    $(id).slideDown();
    $(id).delay(3000).slideUp();
}

function message(c, m) {
    notify('#message', c, m);
}

function entry() {
    this.url = '';
    this.type = 'POST';
    this.form = $('#form_new_entry');
    this.modal = $('#myModal');
    this.inputs = null;
    this.btnSave = $('#btn_save');
    this.btnPublish = $('#btn_publish');
    this.data = null;
    this.result = null;

    this.init = function (url) {
        this.url = url;
        var curent = this;
        this.inputs = this.form.find("input, select, button, textarea");
        $(this.btnSave).on('click', function () {
            curent.save();
        });
        $(this.btnPublish).on('click', function () {
            curent.publish();
        });
    };
    this.getData = function () {
        this.data = this.form.serialize();
        this.inputs.parent().parent().removeClass('has-error').prop('title', '');
        this.inputs.prop("disabled", true);
    };
    this.sendRequest = function () {
        var curent = this;
        $.ajax({
            url: curent.url,
            type: curent.type,
            dataType: "json",
            async: false,
            data: curent.data,
            complete: function (data) {
                if (data.status === 200) {
                    curent.modal.modal("hide");
                    curent.form.trigger('reset');
                    message('alert alert-success', '<strong>Success!</strong> Add new entry a successful.');
                    setTimeout(function () {
                        window.location.reload(1);
                    }, 4000);
                } else {
                    $.each(data.responseJSON, function (index, value) {
                        $('[id=' + index + ']').parent().parent().addClass('has-error').prop('title', value);
                    });
                }
                $.each(data, function (index, value) {
                    console.log(index + ':' + value);
                });
            }
        });
        this.inputs.prop("disabled", false);
    };
    this.save = function () {
        this.getData();
        this.data = this.data + '&published=0';
        this.sendRequest();
    };
    this.publish = function () {
        this.getData();
        this.data = this.data + '&published=1';
        this.sendRequest();
    };
    return this;
}

function entryEdit() {
    this.url = '';
    this.preUrl = '';
    this.type = 'POST';
    this.preForm = '#form_edit_entry_';
    this.inputs = null;
    this.form = null;
    this.data = null;
    this.result = null;
    this.entry_id = null;

    this.init = function (entry_id) {
        this.url = this.preUrl + '/' + entry_id;
        this.entry_id = entry_id;
        this.form = $(this.preForm + this.entry_id);
        this.inputs = this.form.find("input, select, button, textarea");
    };
    this.setPreUrl = function (preUrl) {
        this.preUrl = preUrl;
    };
    this.getData = function () {
        this.data = this.form.serialize();
        this.inputs.parent().parent().removeClass('has-error').prop('title', '');
        this.inputs.prop("disabled", true);
    };
    this.sendRequest = function () {
        var curent = this;
        $.ajax({
            url: curent.url,
            type: curent.type,
            dataType: "json",
            async: false,
            data: curent.data,
            complete: function (data) {
                if (data.status === 200) {
                    message('alert alert-success', '<strong>Success!</strong> Edit the entry a successful.');
                    setTimeout(function () {
                        window.location.reload(1);
                    }, 4000);
                } else {
                    $.each(data.responseJSON, function (index, value) {
                        $('[id=' + index + '_' + curent.entry_id + ']').parent().parent().addClass('has-error').prop('title', value);
                    });
                }
                $.each(data, function (index, value) {
                    console.log(index + ':' + value);
                });
            }
        });
        this.inputs.prop("disabled", false);
    };
    this.save = function (entry_id) {
        this.init(entry_id);
        this.getData();
        this.data = this.data + '&published=0';
        this.sendRequest();
    };
    this.publish = function (entry_id) {
        this.init(entry_id);
        this.getData();
        this.data = this.data + '&published=1';
        this.sendRequest();
    };
    return this;
}
