<br>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">

        </div>
        <div class="panel-body">
            <div class="container">
                <div class="panel panel-default" style="border: 1px solid #e0e0e0;">
                    <div class="panel-body">
                        <form action="">
                            <input type="text" name="input-title" id="input-title" class="input-title-new" placeholder="TITULO...">
                            <div class="news-object-section">
                                <div class="object-icon" id="add-news-object"><span id="add-icon" class="fas fa-plus"></span></div>
                                <div class="news-objects">
                                    <div class="object-icon"><span class="fas fa-heading"></span></div>
                                    <div class="object-icon"><span class="fas fa-paragraph"></span></div>
                                    <div class="object-icon"><span class="fas fa-image"></span></div>
                                    <div class="object-icon"><span class="fas fa-video"></span></div>
                                    <div class="object-icon"><span class="fab fa-youtube"></span></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
        
        </div>
    </div>
</div>

<script>
    $('#add-news-object').click(function() {
        if ($('.news-objects').css('display') == 'none') {
            $('#add-icon').removeClass('fa-plus').addClass('fa-times');
            $('.news-objects').css('display', 'inline-block')
        } else {
            $('#add-icon').removeClass('fa-times').addClass('fa-plus');
            $('.news-objects').css('display', 'none');
        }
    });
</script>