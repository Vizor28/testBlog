<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    {{ $browser }}

                </div>
            </div>

        </div>

        <div class="container mt-4">
            <div class="row">

                @yield('content')

            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Коментар</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="comment-form" action="{{ url('/comment/store') }}">
                            <div class="message"></div>
                            <div class="form-group">
                                <label for="author_comment" class="col-form-label" name="author">Автор</label>
                                <input type="text" class="form-control" name="author" id="author_comment" />
                            </div>
                            <div class="form-group">
                                <label for="author_content" class="col-form-label">Повідомлення</label>
                                <textarea class="form-control" id="author_content" name="content"></textarea>
                            </div>
                            <input type="hidden" name="type" id="commenttable_type"/>
                            <input type="hidden" name="id" id="commenttable_id"/>
                            <div class="reg">
                                <button type="button" class="btn btn-success" id="author_button">Відправити</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="{{ asset('js/script.js') }}"></script>

    </body>
</html>
