<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href = "//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel = "stylesheet"/>
    <link href="<?= base_url('assets/font-awesome-4.7.0/css/font-awesome.min.css');?>" rel = "stylesheet"/>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="<?php echo base_url();?>">Beranda</a>
        <a class="nav-link" href="<?php echo base_url('pages/daftarbuku');?>">Daftar Buku</a>
        <a class="nav-link" href="<?php echo base_url('pages/daftarpenerbit');?>">Daftar Penerbit</a>
        <!-- <a class="nav-link disabled">Disabled</a> -->
      </div>
    </div>
  </div>
</nav>
<div class = "container">