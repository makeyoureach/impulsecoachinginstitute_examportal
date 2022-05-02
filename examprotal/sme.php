<?php
    require_once('../head.php');
?>
<html>
    <body style="margin-top: 60px;">
        <div id="wrapper">
            <form method="post" action="excelupload.php" enctype="multipart/form-data">
                <select name="section">
                    <option>Select</option>
                    <option value='section1'>Section 1</option>
                    <option value='section2'>Section 2</option>
                </select>
                <input type="file" name="file"/>
                <input type="submit" name="submit_file" id="submit-btn"  value="Submit"/>
            </form>
        </div>

        <div id="loading_gif" style="display: none;">
            <img src="../images/loading.gif"  alert/>
            <p>Uploading...</p>
        </div>
    </body>
    <script>
        $('#submit-btn').click(function(){
            $('#loading_gif').css('display','block');
        });
    </script>
</html>
