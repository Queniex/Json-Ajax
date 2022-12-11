<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
    <script>
        tailwind.config = {
          theme: {
            container: {
              center: true,
              padding: '16px'
            },
            extend: {
              colors: {
                clifford: '#da373d',
              }
            }
          }
        }
      </script>
      <style type="text/tailwindcss">
        @import url('https://fonts.googleapis.com/css2?family=Comic+Neue&family=Dosis:wght@500&family=Luckiest+Guy&family=Poppins:ital,wght@0,300;0,500;0,600;0,800;0,900;1,600&display=swap');
        @layer utilities {
          .content-auto {
            content-visibility: auto;
          }
/* 
          *{
            border: red 1px solid;
          } */

        }
      </style>
</head>
<body>
    <div class="container">
        <div class="mt-10 mb-3">
            <form action="simpan.php" method="POST">
                <input class="h-3 w-36 bg-slate-200 p-4 border-black border-2" type="text" name="nama" placeholder="Nama User...">
                <input class="h-3 w-36 bg-slate-200 p-4 border-black border-2" type="text" name="asal" placeholder="Asal User...">
                <input class="p-2 bg-slate-200 hover:bg-slate-400" type="submit" name="submit" value="submit">
            </form>
        </div>

        <hr class="mb-2 mt-2">

        <div class="mt-2" id="content"></div>
    </div>

    <script>

        $(document).ready(() => {
            loadData();

            $('form').on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function() {
                        loadData();
                        resetForm();
                    }
                });
            })
        })

        function loadData() {
            $.get('data.php', (data) => {
                $('#content').html(data);
                $('.Hapus').click(function(e){
                    e.preventDefault();
                    $.ajax({
                        type: 'GET',
                        url: $(this).attr('href'),
                        success: function() {
                            loadData();
                        }
                    });    
                });
                $('.Update').click(function(e){
                    e.preventDefault();
                    $('[name=nama]').val($(this).attr('nama'));
                    $('[name=asal]').val($(this).attr('asal'));
                    $('form').attr('action', $(this).attr('href'))
                });
            });
        }

        function resetForm() {
            $('[type=text]').val('');
            $('[name=nama]').focus();
        }

    </script>
</body>
</html>