<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pendaftaran</title>
</head>
<body>
  <div><?= $nama; ?>, Terima kasih sudah mendaftar di Bimbel Gama UI.</div>
  <div>
    Silahkan Transfer ke :
    <div>
      <p>Nama Bank : BCA</p>
      <p>Nama Rekening : Yayasan Gama UI</p>
      <p>Nomor Rekening : 0313431545</p>
      <p>Total Biaya Pendaftaran : Rp. 500.000,00</p>
    </div>
    <div>
      Lakukan Konfirmasi jika sudah melakukan pembayaran dengan masuk login akun:
      <p>username : <?= $email ?></p>
      <p>password : gama2018</p>
    </div>
    <div align="center">
        <a href="<?= $_SERVER['HTTP_HOST'] ?>/site/" target="_blank" style="background-color: #4CAF50;border: none;color: white;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;padding: 10px;width: 50%;">Konfirmasi</a>
    </div>
  </div>
</body>
</html>