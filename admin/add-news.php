<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buat News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
      * {
          font-family: 'Poppins';
      }
  </style>
  <body>
    <div class="container py-5">
        <h1>Buat Berita</h1>
        <form action="functions/fn_news.php?act=create" method="post" enctype="multipart/form-data" class="mt-5">
            <label for="">Judul Berita</label>
            <input type="text" name="judul" required class="form-control mb-2">
            <label for="">Kategori Berita</label>
            <select name="kategori" id="" class="form-select mb-2">
              <option value="Umum">Umum</option>
              <option value="Kesehatan">Kesehatan</option>
            </select>
            <label for="">Gambar</label>
            <input type="file" name="gambar" class="form-control mb-2">
            <label for="">Teks Berita</label>
            <textarea name="text_berita" id="" cols="30" rows="10" required class="form-control"></textarea>
            <label for="">Tanggal Posting</label>
            <input type="date" name="tgl_posting" required class="form-control mb-2">
            <button type="submit" class="btn rounded-pill btn-primary my-5">Simpan</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>