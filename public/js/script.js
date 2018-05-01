$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#comment').on('show.bs.modal', function (e) {
        $('#commenttable_type').val($(e.relatedTarget).data('type'));
        $('#commenttable_id').val($(e.relatedTarget).data('id'));
    });

    $('#author_button').click(function(e){

        e.preventDefault();

        var form = $(this).parents('form');
        var data = $(form).serialize();

        $(form).find('.message').empty();
        $(form).find('.is-invalid').removeClass('is-invalid');
        // debugger;

        $.ajax({
            type: "POST",
            url: $(form).attr('action'),
            data: data,
            context:form,
            cache: false,
            success: function(data, textStatus, jqXHR){
                // debugger;
                $('.comment_block').prepend(data);
                $(this).find('input, textarea').val('');
                $('#comment').modal('hide');
            },
            error: function(jqXHR, textStatus, errorThrown){
                for(var key in jqXHR.responseJSON.errors) {

                    $(this).find('.message').append('<p class="alert alert-danger" role="alert">'+jqXHR.responseJSON.errors[key]+'</p>');
                    var name = '[name="'+ key + '"]';
                    // debugger;

                    if($(this).find(name).length){

                        $(this).find(name).addClass('is-invalid');

                    }else if($(this).find('.valid_'+key).length){

                        $(this).find('.valid_'+key).addClass('is-invalid');

                    }

                }
            }
        });


    });

});