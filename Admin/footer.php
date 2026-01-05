</main>
<footer class=bg-light>
    <div class="bg-light text-center p-3" style=background : #CCCCCC>
        © 2024 Copyright: E-Ciremai
    </div>
</footer>

<script>
$(document).ready(function() {
    $('#summernote').summernote({
        callbacks: {
            onImageUpload: function(files) {        // ← diperbaiki agar callback berjalan
                for (let i = 0; i < files.length; i++) {
                    $.upload(files[i]);
                }
            }
        },
        height: 230
    });

    $.upload = function(file) {
        let data = new FormData();
        data.append("file", file);                 // ← diperbaiki (sebelumnya file.name)

        $.ajax({
            method: "POST",                        // ← 'methode' salah
            url: "upload_gambar.php",
            cache: false,
            contentType: false,
            processData: false,
            data: data,                            // ← 'out' diganti ke 'data'
            success: function(img) {
                $('#summernote').summernote('insertImage', img);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error(textStatus + " " + errorThrown);
            }
        });
    };
});

</script>

</body>

</html>