/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    $('#comment_form').on('submit', function () {
        if ($('#comment_text').val() === '') {
            event.preventDefault();
        }
    });
});
