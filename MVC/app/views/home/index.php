
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <title>MVC</title>
   <link rel="stylesheet" href="../css/style2.css">
    
    <style>
        
    </style>
</head>
<body>
    <div class="containerR" style="height: 100vh;z-index:-100;">
        <h1 id="welcome-text">Selamat Datang!!!</h1>
    </div>

    <div class="containerR" >
        <div class="" id="jumbotron-content" style="border:none;">
            <h2>Inventaris Alat Pembelajaran</h2>
            <br><br>
            <h3>Peraturan Peminjaman</h3>
            <ol>
                <li>Menemui petugas inventaris ketika akan meminjam dan mengembalikan barang</li>
                <li>Lama waktu peminjaman hanya 2 hari</li>
                <li>Menyerahkan kartu identitas ketika melakukan peminjaman sebagai jaminan</li>
            </ol>
            <a class="btn btn-dark" href="<?= BASE_URL ?>/pinjam" style="z-index: 100">mengerti & mulai pinjam</a>
        </div>
        
    </div>
    
    <script>
        window.addEventListener('scroll', function () {
            const welcomeText = document.getElementById('welcome-text');
            const jumbotronContent = document.getElementById('jumbotron-content');
            const scrollPosition = window.scrollY;

          
            welcomeText.style.opacity = 1 - (scrollPosition / 400);

           
            if (welcomeText.style.opacity < 0) {
                welcomeText.style.opacity = 0;
            }

           
            jumbotronContent.style.opacity = scrollPosition / 500; 

           
            if (jumbotronContent.style.opacity > 1) {
                jumbotronContent.style.opacity = 1;
            }
        });
    </script>
</body>
</html>
