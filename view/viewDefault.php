<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Сервис коротких ссылок</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        <script src="view/js/script.js"></script>
    </head>
    <body>
        <div class="container" style="margin-top:15px">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Сервис коротких ссылок</h3>
                </div>
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="javascript:
                                      var urlLong = document.getElementById('url').value;
                                      makeRequest('<?php echo 'http://' . $_SERVER['SERVER_NAME']; ?>', urlLong);">
                                    <label for="url">Вставьте длинную ссылку сюда:</label>
                                    <div class="input-group">
                                        <input type="url" class="form-control" name="url" id="url" required>
                                        <span class="input-group-btn">
                                            <input type="submit" class="btn btn-default" value="Укоротить">
                                        </span>
                                    </div>
                                </form>                     
                            </div>
                            <div class="col-md-6">
                                <label for="result">Короткая ссылка:</label>
                                <div class="form-control" id="result"></div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="panel-footer">
                    &copy; 2015 Чернышов
                </div>
            </div> 
        </div>
    </body>
</html>
